<?php


namespace App\Http\ViewComposers;


use App\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ShopViewComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'products' => DB::table('categories')
                ->leftJoin('products', 'categories.id', '=', 'products.category_id')
                ->get(),
            'brands' => Brand::all(),
            'colors' => []
        ]);
    }
}
