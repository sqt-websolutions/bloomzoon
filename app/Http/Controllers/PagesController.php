<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Brand;
use App\Category;
use App\FoodMenu;
use App\Grocery;
use App\Http\Controllers\CrudResourceController;
use App\Http\Requests\Review;
use App\Manufacturer;
use App\Product;
use App\User;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public $query_callback;
    /**
     * @var array
     */
    public $with_map;

    public function __construct()
    {
        $this->query_callback = [
            'bproducts' => static function(){
                return Product::where('is_bloomzon_product', '=', true)->get();
            },
            'account_type' => static function($query_value) {
                return User::where('account_type', '=', json_decode(base64_decode($query_value)))->get();
            }
        ];

    }

    public function get_page_view(Request $request, $page_name = 'index', $directory = 'frontend'){
        
        $query = $request->query();
        $this->with_map = [
            'index' => static function(){
                return [
                    'products' =>  Product::all(),
                    'vendors' =>  Vendor::all(),
                    'manufacturers' => DB::table('users')->where('account_type', '=', 'manufacturer')->get(),
                    'adverts' => Advert::all(),
                    'food_menus' => FoodMenu::all(),
                    'groceries' => Grocery::all(),
                    'brands' => Brand::all()
                ];
            },
            $directory => static function()use($directory){
                return [
                    'page_title' => ucfirst($directory),
                    'colors' => [],
                    'brands' => [],
                    'products' => DB::table('categories')
                        ->where('name', '=', $directory )
                        ->leftJoin('products', 'categories.id', '=', 'products.category_id')
                        ->get()
                ];
            },
        ];
        
        $view = $directory .'.'.'.'. $page_name;
    
        $current_user = Auth::user();
        
        $view_callback_map = [
            
          'frontend' => function () use($view, $page_name, $current_user) {
            
            if(view()->exists($view)){
               return view($view)
                       ->with(!empty($this->with_map[$page_name]) ? $this->with_map[$page_name]() : [] );
            }
              if($current_user && $view = view()->exists('dashboard.'. $current_user->account_type . '.' .$page_name)) {
                  return view('dashboard.'. $current_user->account_type . '.' .$page_name);
              }
              if(!$current_user && view()->exists($view)){
                  return view($view)->with( !empty($this->with_map[$page_name]) ? $this->with_map[$page_name]() : [] );
              }

              if($current_user && ! view()->exists($view) ){
                  return view('frontend.404');
              }

              if(!$current_user && !view()->exists($view)){
                  return view('frontend.404');
              }

              return view('frontend.login');

          },
            'category' =>  function ()use($directory){
                return view('frontend.category')->with( !empty($this->with_map[$directory]) ? $this->with_map[$directory]() : [] );
        }

        ];


        if($directory !=='frontend'){
            return $view_callback_map['category']();
        }

       $view = $view_callback_map[$directory]();

        if(count($query)){
            foreach ($query as $key => $value ){
                if(!empty( $this->query_callback[$key])){
                    $view->with($key, $this->query_callback[$key]($value));
                } else {
                    $view->with($key, json_decode(base64_decode($value)));
                }
            }
        }

        return $view;

    }

}
