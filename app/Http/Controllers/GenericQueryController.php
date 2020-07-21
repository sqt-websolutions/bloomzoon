<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenericQueryController extends Controller
{
    public function handle($entity, Request $request  ){

         $query_params = $request->query();
         $model = '\App\\'.$entity;
         $query = null;

         foreach ( $query_params as $key => $value){
             $query = (new $model)->where($key, '=', $value);
         }
         return $query->get();
    }
}
