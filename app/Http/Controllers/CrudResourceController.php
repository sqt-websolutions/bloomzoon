<?php

namespace App\Http\Controllers;

use App\Events\GenericEvent;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use  App\Events\OrderCreated;

class CrudResourceController extends Controller
{
    use JsonResponse;

    public $entity_callback_map;
    public $model_events_map;

    public function __construct()
    {
        $this->entity_callback_map = [];

        $this->model_events_map = [
            'Order'=> ['Created'],
            'User'=> ['CreatedForOrder']
        ];
    }

    public function getEntityModelAttributes($entity): object
    {
        $entity_name = substr( Str::ucfirst($entity), 0, -1 );
        return (object) ['model' => "\App\\".$entity_name, 'name' => Str::lower($entity_name), 'transformed_entity' => $entity_name ];
    }

    /**
     * @param $entity
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($entity): \Illuminate\Http\JsonResponse
    {

        $parsedEntity = $this->getEntityModelAttributes($entity);

        $entity_model = $parsedEntity->model;
        $entity_name = $parsedEntity->name;

        if($entities = $entity_model::all()){
            return $this->send_response(true, $entities, 200, $entity_name . 's retrieved successfully' );
        }
        return $this->send_response(false, null, 400, 'no ' .$entity_name . 's found ' );
    }

    public function getEntityCallbacks($key, Request $request, $entity_model)
    {

        $this->entity_callback_map['user'] = [
            'exists' => static function() use($request, $entity_model){
                $email = $request->email;
                $user = $entity_model::where('email' , '=', $email)->first();
                if( $user ){
                   return true;
                }
                return false;
            },
        ];

        $this->entity_callback_map['product'] = [
            'exists' => static function() use($request, $entity_model){
                $product_name = $request->product_name;
                $product = $entity_model::where('product_name' , '=', $product_name)->first();
                if( $product ){
                    return true;
                }
                return false;
            }
        ];

        return $this->entity_callback_map[$key] ?? [];
    }

    /**
     * @param $entity
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store($entity, Request $request): \Illuminate\Http\JsonResponse
    {
        $entity_name = substr( Str::ucfirst($entity), 0, -1 );
        $entity_validation_class = '\App\Http\Requests\\'.$entity_name;
        $entity_model = '\App\\'.$entity_name;

        $entity_name_ = Str::lower($entity_name);
        $entity_validation_rules =  ( new $entity_validation_class )->rules();
        $this->validate($request, $entity_validation_rules);
        $callbacks_arr = $this->getEntityCallbacks($entity_name_, $request , $entity_model);

        if( !empty($callbacks_arr) && $callbacks_arr['exists']() ) {
            return $this->send_response(false, null, 400, $entity_name_ . ' exists');
        }
        $request_data = $request->data;
        $entity_data = $request_data[$entity_name_] ?? $request->all();

        \Log::info($request_data);
        if( $created = $entity_model::create( $entity_data )){
            $created->type = $entity_name;
            $this->fire_event($created);
          return $this->send_response(true, $entity_data, 201, Str::lower($entity_name) . ' created successfully');
        }
        return $this->send_response(false, null, 400, Str::lower($entity_name) . ' not created');
    }

    /**
     * @param $entity
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($entity, $id): \Illuminate\Http\JsonResponse
    {
        $entity_name = substr( Str::ucfirst($entity), 0, -1 );
        $entity_model = '\App\\'.$entity_name;
        $entity_result = $entity_model::find($id);
        if($entity_result){
            return $this->send_response(true, $entity_result, 200, Str::lower($entity_name) .' retrieved successfully');
        }
        return $this->send_response(false, null, 400, Str::lower($entity_name) .' not found');
    }

    /**
     * @param $entity
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($entity, $id, Request $request): \Illuminate\Http\JsonResponse
    {
        $parsedEntity = $this->getEntityModelAttributes($entity);
        $model = $parsedEntity->model;
        $name = $parsedEntity->name;

       // $transformed_entity = $parsedEntity->transformed_entity;
//        $validations = $this->getEntityValidationRules($transformed_entity);
//        $this->validate($request, $validations);

        if( $model::find($id)->update($request->all()) ){
            return $this->send_response(true, $request->all(), 200,  $name .' updated successfully');
        }

        return $this->send_response(false, null, 400, $name .' not updated');

    }

    /**
     * @param $entity
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($entity, $id, Request $request): \Illuminate\Http\JsonResponse
    {
        $parsedEntity = $this->getEntityModelAttributes($entity);
        $model = $parsedEntity->model;
        $name = $parsedEntity->name;
        if( $model::destroy($id) ){
            return $this->send_response(true, $request->all(), 200,  $name .' deleted successfully');
        }
        return $this->send_response(false, null, 400, $name .' not deleted');
    }

    public function fire_event($data){
        return event(new GenericEvent($data));
    }

}
