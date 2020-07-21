@extends('dashboard.fast-food-groceries.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection
@php
$food_menus = \Illuminate\Support\Facades\DB::table('food_menus')
    ->leftJoin('food_catalogues', 'food_menus.catalogue_id', '=', 'food_catalogues.id')
    ->get();

$transformed_menus = [];
foreach ($food_menus as $food_menu){
    if(! isset($transformed_menus[$food_menu->name])){
        $transformed_menus[$food_menu->name] = [];
    }
    $transformed_menus[$food_menu->name][] = $food_menu;
}

@endphp
        @section('content')
        <div class="col-md-10">
                <div class="row col-md-12" style="background-color: #fff !important; padding: 10px; text-align: center !important;">
                    <div style="background-color: #02499B; width: 100%; padding: 10px 20px;">
                        <div class="col-md-9 text-left text-white">
                            <h1>
                                Food Menu
                            </h1>
                        </div>
                        <div class="col-md-3 pt-4">
                            <a href="add-to-catalogue" class="btn btn-danger btn-lg">Add to Catalogue</a>
                        </div>
                    </div>

                    @foreach($transformed_menus as $key => $menus)
                        <div class="row col-md-12">

                            <div class="col-md-12 mb-3">
                                <h3 style="color: #02499B;">{{$key}}</h3>
                            </div>
                            <div class="row col-md-12 mt-5 pb-5 m-auto" style="border-bottom: 1px #dddddd solid;">

                               @foreach($menus as $menu)
                                    <div class="col-md-4 text-center">
                                        <img src="{{asset($menu->featured_img_url)}}" width="220" alt="">
                                        <h3> Price: {{$menu->amount}}</h3>
                                        <p> Description: ({{$menu->description}})</p>
                                    </div>
                                   @endforeach


                            </div>
                        </div>
                        @endforeach

                </div>
            </div>
        @endsection
