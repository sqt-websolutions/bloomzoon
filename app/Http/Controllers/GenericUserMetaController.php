<?php

namespace App\Http\Controllers;

use App\Http\Requests\User;
use Illuminate\Http\Request;
use \App\User as DbUser;

class GenericUserMetaController extends Controller
{
        public function get_meta($model, $relationship , $entity, $foreign_key = null){
            return $model->$relationship('\App\\'.$entity, $foreign_key)->get();
        }

    public function handle($id)
    {

            $joins_arr = [
               'has_Many_Sale',
            //    'has_Many_Order',
               'has_Many_Product',
               'has_Many_PaymentRequest',
               'has_Many_Notification',
               'has_Many_Message',
               'has_Many_Review',
                'has_One_User',
                'has_Many_Purchase',
                'has_Many_Point',
                'has_One_User',
                'has_One_Seller',
                'has_One_Subscription',
                'has_Many_Notification',
                'has_Many_Coupon',
                'has_Many_Favourite',
                'has_Many_Payment',
                'has_Many_PaymentMethod',
                'has_Many_Advert',
                'has_Many_Issue',
                'has_Many_Dispute',
                'has_Many_Review',
                'has_Many_Feedback',
                'has_One_Wallet',
                'has_One_Vendor',
                'has_One_Manufacturer',
                'total_sales',
                'total_products',
                'total_paymentRequests',
                'total_messages',
                'total_notifications',
                'total_reviews',
                'detail_users',
                'total_purchases'

            ];


        $foreign_keys = [
            'User' => 'id',
            'Sale' => 'seller_id',
            'PaymentRequest' => 'seller_id',
            
        ];

        $entity_result = DbUser::find($id);

        $metas_arr =  $joins_arr ; //$relation_map[$entity]['metas'];
        $meta_data = [];

        foreach ($metas_arr as $key => $meta){
            $meta_string_arr = explode('_', $meta);
            if( count($meta_string_arr) === 3 ){
                $relation_ship_method = $meta_string_arr[0].$meta_string_arr[1];
                $meta_data[$meta_string_arr[2]] = $this->get_meta($entity_result, $relation_ship_method, $meta_string_arr[2], $foreign_keys[$meta_string_arr[2]] ?? 'user_id');
            } else if( count($meta_string_arr) === 2 ){
                $model_name = ucfirst(substr($meta_string_arr[1], 0, -1));
                $meta_data[$meta] = count($meta_data[$model_name]);
            }
        }
        
        return response()->json($meta_data);
    }
}
