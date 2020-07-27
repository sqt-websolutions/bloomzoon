<?php

namespace App\Http\Controllers;

use App\Events\GenericEvent;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use  App\Events\OrderCreated;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;



class CrudResourceController extends Controller
{
    use JsonResponse;

    public $entity_callback_map;
    public $model_events_map;

    public function __construct()
    {
        $this->entity_callback_map = [];

        $this->model_events_map = [
            'Order' => ['Created'],
            'User' => ['CreatedForOrder']
        ];
    }

    public function getEntityModelAttributes($entity): object
    {
        $entity_name = substr(Str::ucfirst($entity), 0, -1);
        $imgProp = null;
        //get image property
        switch ($entity_name) {
            case ('User'):
                $imgProp = 'profile_pic_url';
                break;
            case ('Product'):
                $imgProp = 'featured_img_url';
                break;
            default:
                $imgProp = 'featured_img_url';
        }
        return (object) ['model' => "\App\\" . $entity_name, 'name' => Str::lower($entity_name), 'transformed_entity' => $entity_name, 'imgProp' => $imgProp];
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

        if ($entities = $entity_model::all()) {
            return $this->send_response(true, $entities, 200, $entity_name . 's retrieved successfully');
        }
        return $this->send_response(false, null, 400, 'no ' . $entity_name . 's found ');
    }

    public function getEntityCallbacks($key, Request $request, $entity_model)
    {

        $this->entity_callback_map['user'] = [
            'exists' => static function () use ($request, $entity_model) {
                $email = $request->email;
                $user = $entity_model::where('email', '=', $email)->first();
                if ($user) {
                    return true;
                }
                return false;
            },
        ];

        $this->entity_callback_map['product'] = [
            'exists' => static function () use ($request, $entity_model) {
                $product_name = $request->product_name;
                $product = $entity_model::where('product_name', '=', $product_name)->first();
                if ($product) {
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

    public function store_orders(Request $request): \Illuminate\Http\JsonResponse
    {   
        $data =  $request->data;
        foreach ($data['order'] as $order){
            $new_order = new \App\Order();
            $new_order->buyer_id = $order['buyer_id'];
            $new_order->product_id = $order['product_id'];
            $new_order->quantity = $order['quantity'];
            $new_order->total_amount = $order['total_amount'];
            $new_order->status = $order['status'];
            $new_order->payment_method = $order['payment_method'];
            $new_order->seller_id = $order['seller_id'];
            $new_order->save();
        }

        return $this->send_response(false,$data, 200,' exists');
    }

    public function store($entity, Request $request): \Illuminate\Http\JsonResponse
    {

        $parsedEntity = $this->getEntityModelAttributes($entity);
        $entityImgProp = $parsedEntity->imgProp;//get image property name
        $entity_name = $parsedEntity->transformed_entity;

        $entity_validation_class = '\App\Http\Requests\\' . $entity_name;
        $entity_model = $parsedEntity->model;

        $entity_name_ = $parsedEntity->name;

        $entity_validation_rules =  (new $entity_validation_class)->rules();
        $this->validate($request, $entity_validation_rules);
        //check if entity exists
        $callbacks_arr = $this->getEntityCallbacks($entity_name_, $request, $entity_model);
        //executes when entity already exist on db
        if (!empty($callbacks_arr) && $callbacks_arr['exists']()) {
            return $this->send_response(false, null, 400, $entity_name_ . ' exists');
        }
        //get data from request
        $request_data = $request->data;
        $entity_data = $request_data[$entity_name_] ?? $request->all(); //
        $rel_data = array(); //instantiate relationship data
        \Log::info($request_data); //log
        //STORE DATA IN DB
        
        if ($created = $entity_model::create($entity_data)) {
           $imgUrl = $this->storeFile($request, $parsedEntity->imgProp, $entity_name); //handles the image upload
            if ($entity_model == '\App\User') { //check if entity type is user 
                try {
                    $relModel = '\App\\' . Str::ucfirst($entity_data['account_type']); //instantiate relationship model 
                    $rel_data['user_id'] = $created->id; //get user id
                    $rel_data['company_name'] = $entity_data['company_name']; //get compnie's name
                    $cr = $relModel::create($rel_data); // create relationship model
                } catch (QueryException $e) {
                    $created->delete();
                    return $this->send_response(true, $e, 400, Str::lower($entity_name) . ' was not created'); //executes if model not sent
                }
            }
            if($imgUrl != ''){
                $created->{$entityImgProp} = $imgUrl;
                $created->save();
            }
            $created->type = $entity_name; //
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
        $entity_name = substr(Str::ucfirst($entity), 0, -1);
        $entity_model = '\App\\' . $entity_name;
        $entity_result = $entity_model::find($id);
        if ($entity_result) {
            return $this->send_response(true, $entity_result, 200, Str::lower($entity_name) . ' retrieved successfully');
        }
        return $this->send_response(false, null, 400, Str::lower($entity_name) . ' not found');
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
        $imgProp = $parsedEntity->imgProp;
        $imgUrl = '';
        $mod = $model::find($id);
        //    $transformed_entity = $parsedEntity->transformed_entity;
        //    $validations = $this->getEntityValidationRules($transformed_entity);
        //    $this->validate($request, $validations);
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // $imageName = time().'.'.$request->image->extension();  
        // $request->image->move(public_path('images'), $imageName);

        if ($request->hasFile($imgProp)) {
            $imgName = time() . '.' . $request->{$imgProp}->getClientOriginalExtension();
            $imgUrl = $request->{$imgProp}->storeAs('/assets/profile_pic', $imgName, 'public');
        }
        if ($mod->update($request->all())) {
            if ($imgUrl != null) {
                $mod->{$imgProp} = $imgUrl;
                $mod->save();
            }
            return $this->send_response(true, $request->all(), 200,  $name . ' updated successfully');
        }

        return $this->send_response(false, null, 400, $name . ' not updated');
    }

    public function storeFile(Request $request, $prop, $entity)
    {
        $imgUrl = '';
        if ($request->hasFile($prop)) {
            $imgName = time() . '.' . $request->{$prop}->getClientOriginalExtension();
            $imgUrl = $request->{$prop}->storeAs('/assets/uploads/' . $entity, $imgName, 'public');
        }
        return $imgUrl;
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
        if ($model::destroy($id)) {
            return $this->send_response(true, $request->all(), 200,  $name . ' deleted successfully');
        }
        return $this->send_response(false, null, 400, $name . ' not deleted');
    }

    public function fire_event($data)
    {
        return event(new GenericEvent($data));
    }
}
