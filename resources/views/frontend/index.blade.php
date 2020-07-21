@extends('layouts.front')
@section('page_title')
    Home
    @endsection
@section('content')
    <div class="mm-page mm-slideout" id="mm-0"><div class="slider-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="main-slider mt-30 mt-sm-0 slick-initialized slick-slider slick-dotted">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 2180px;">
                                    <div class="slider-single bg-1 slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" role="tabpanel" id="slick-slide00" aria-describedby="slick-slide-control00" style="width: 1090px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                        <div class="d-table">
                                            <!-- <div class="slider-caption">
                                                <h4>clothing</h4>
                                                <h2 class="cssanimation leDoorCloseLeft sequence">Men Collections</h2>
                                                <p>The 10 Best Man Collection 2018</p>
                                                <div class="slider-product-price">
                                                    <del>$120.00</del>
                                                    <span>$295.00</span>
                                                </div>
                                                <a href="#" class="btn-common mt-43">buy now</a>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="slider-single bg-2 slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="tabpanel" id="slick-slide01" aria-describedby="slick-slide-control01" style="width: 1090px; position: relative; left: -1090px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;">
                                        <div class="d-table">
                                            <!-- <div class="slider-caption">
                                                <h4>clothing</h4>
                                                <h2 class="cssanimation leDoorCloseLeft sequence">Gadgets</h2>
                                                <p>The 10 Best Man Collection 2018</p>
                                                <div class="slider-product-price">
                                                    <del>$120.00</del>
                                                    <span>$295.00</span>
                                                </div>
                                                <a href="#" class="btn-common mt-43">buy now</a>
                                            </div> -->
                                        </div>
                                    </div></div></div>

                            <ul class="slick-dots" style="" role="tablist"><li class="slick-active" role="presentation"><button type="button" role="tab" id="slick-slide-control00" aria-controls="slick-slide00" aria-label="1 of 2" tabindex="0" aria-selected="true">1</button></li><li role="presentation" class=""><button type="button" role="tab" id="slick-slide-control01" aria-controls="slick-slide01" aria-label="2 of 2" tabindex="-1">2</button></li></ul></div>
                    </div>
                    <div class="col-xl-4">
                        <div class="row mt-30">
                           @foreach($adverts as $advert)
                               @if($advert->advert_position === 'Body')
                                    <div class="col-md-12">
                                        <div class="banner-sm hover-effect">
                                            <a href="{{$advert->advert_link}}?referrer=bloomzon" target="_blank">
                                                <img src="{{$advert->advert_image_url1}}" height="341" alt="">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><div class="container-fluid mt-50" style="background-color: #eeeeee !important">
            <div class="brands-area">
                <div class="row">
                    <div class="col-lg-2">
                        <h2>Brands</h2>
                    </div>
                    <div class="col-lg-10">
                        <div class="brand-items slick-initialized slick-slider">
                            <div class="slick-list draggable">
                                @foreach($brands as $brand)
                                    <span style="width: 172px;margin-left: 10px">
                                        <a href="#">
                                            <img class="brand-static" src="{{$brand->featured_img_url}}" height="50" alt="">
                                        </a>
                                    </span>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><div class="products-area mt-47 mt-sm-37">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 fix">
                        <!--product-categories-->
                        <div class="row">
                            <div class="col-md-6" style="border-right: 1px solid #eee;">
                                <div class="best-sellers">
                                    <div class="row" style="background-color: #0149a0 !important; color: #fff;">
                                        <div class="col-lg-12">
                                            <div class="section-title text-left">
                                                <h3>MOST POPULAR</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row cv-visible">

                                       @foreach($products as $product)
                                           @if($product->product_name)
                                            <div class="col-lg-3">
                                                <div class="product-single">
                                                    <div class="product-thumb">
                                                        <a href="#"><img src="{{$product->featured_img_url}}" alt=""></a>
                                                        @if($product->product_sales_price)
                                                        <div class="downsale"><span>-</span>${{number_format($product->product_price - $product->product_sales_price)}}</div>
                                                        @endif
                                                        <div class="product-quick-view">
                                                            <div class="row">
                                                                <div class="col-md-4 p-0"><a href="product-details?product={{base64_encode(json_encode($product))}}" class="btn btn-success"><i class="fa fa-eye"></i></a></div>
                                                                <div class="col-md-4 p-0"><a href="javascript:void(0);" class="btn btn-success"><i class="fa fa-shopping-cart"></i></a></div>
                                                                <div class="col-md-4 p-0"><a href="javascript:void(0);" class="btn btn-success"><i class="ti-heart"></i></a></div></div>

                                                        </div>
                                                    </div>
                                                    <div class="product-title">
                                                        <h4><a href="#">{{$product->product_name}}</a></h4>
                                                        <small>
                                                            @if($product->product_sales_price)
                                                            <div class="product-price-rating">
                                                                <span>${{number_format($product->product_sales_price)}}</span>
                                                                <del>${{number_format($product->product_price)}}</del>
                                                            </div>
                                                                @else
                                                                <div class="product-price-rating">
                                                                    <span>${{number_format($product->product_price)}}</span>
                                                                </div>
                                                            @endif

                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                           @endforeach

                                    </div>
                                    <div class="text-center pt-2"><a href="/shop" class="btn btn-danger text-white">View All</a></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-categories mt-sm-40">
                                    <div class="row" style="background-color: #0149a0 !important; color: #fff;">
                                        <div class="col-lg-12">
                                            <div class="section-title text-right">
                                                <h3>WHOLESALERS/MANUFACTURERS</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-categories-carousel mt-30 slick-initialized slick-slider">
                                        <div class="slick-list draggable">
                                            <div class="slick-track" style="opacity: 1; width: 420px; transform: translate3d(0px, 0px, 0px);">
                                            @foreach($manufacturers as $manufacturer)

                                                <div class="col-lg-4 p-1 slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 140px;">
                                                    <div class="single-product-cat">
                                                        <a href="/manufacturer-details?manufacturer={{base64_encode(json_encode($manufacturer))}}" tabindex="0"><img src="{{asset($manufacturer->factory_image_url ?? '')}}" alt="" height="180"></a>
                                                        <h4><a href="/manufacturer-details?manufacturer={{base64_encode(json_encode($manufacturer))}}" tabindex="0">{{$manufacturer->company_name ?? ''}}</a></h4>
                                                    </div>
                                                </div>

                                                @endforeach
                                            </div>
                                        </div>


                                    </div>
                                    <div class="text-center pt-4"><a href="/manufacturers?manufacturers={{base64_encode(json_encode($manufacturers))}}" class="btn btn-danger text-white">View All</a></div>
                                </div>
                            </div>
                        </div>
                        <!--products-tab-->
                        <div class="products-tab mt-35">
                            <div class="row" style="background-color: #0149a0 !important; color: #fff;">
                                <div class="col-lg-12">
                                    <div class="section-title text-left">
                                        <h3>GROCERIES
                                            <a href="/groceries?groceries={{base64_encode(json_encode($groceries))}}" class="text-white pull-right"> SEE ALL</a>
                                        </h3>

                                    </div>

                                </div>
                            </div>
                            <div class="row cv-visible">

                                <div class="col-lg-2">

                                    @foreach($groceries as $grocery)
                                        <div class="product-single p-0" style="height: 230px; background-image: url('assets/img/g1.jpeg'); background-size: 350px; background-position: center;">
                                            <div class="product-thumb">
                                                <!-- <a href="#"><img src="assets/img/g1.jpeg" alt="" /></a> -->
                                            </div>
                                            <div class="product-title text-white pull-right" style="background-color: #bd1a09; padding: 10px; bottom: 0; right: 0; position: absolute; margin-bottom: -20px; ">
                                                <h4><a href="#" style="color: #fff !important;">{{$grocery->name}}</a></h4>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>


                            </div>
                        </div>
                        <div class="products-tab mt-35">
                            <div class="row" style="background-color: #0149a0 !important; color: #fff;">
                                <div class="col-lg-12">
                                    <div class="section-title text-left">
                                        <h3>FOOD MENUS
                                            <a href="/food-menus?food_menus={{base64_encode(json_encode($food_menus))}}" class="text-white pull-right"> SEE ALL</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row cv-visible">
                                @foreach($food_menus as $food_menu)
                                <div class="col-lg-2 offset-2">
                                    <div class="product-single p-0" style="height: 230px; background-image: url('assets/img/food1.jpg'); background-size: 350px; background-position: center;">
                                        <div class="product-thumb">
                                            <!-- <a href="#"><img src="assets/img/g1.jpeg" alt="" /></a> -->
                                        </div>
                                        <div class="product-title text-white pull-right" style="background-color: #bd1a09; padding: 10px; bottom: 0; right: 0; position: absolute; margin-bottom: -20px; ">
                                            <h4><a href="#" style="color: #fff !important;">{{$food_menu->type}}</a></h4>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                        <!--banner-section-->
                        <div class="row mt-40">
                            <div class="col-md-12" style="border-right: 1px solid #eee;">
                                <div class="best-sellers">
                                    <div class="row" style="background-color: #0149a0 !important; color: #fff;">
                                        <div class="col-lg-12">
                                            <div class="section-title text-left">
                                                <h3>MARKET BOKU
                                                    <a href="/shop" class="text-white pull-right"> SEE ALL</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row cv-visible">

                                        @foreach($products as $product)
                                            @if($product->product_name)
                                            <div class="col-lg-2">
                                                <div class="product-single">
                                                    <div class="product-thumb">
                                                        <a href="#"><img src="{{$product->featured_img_url}}" alt=""></a>
                                                        @if($product->product_sales_price)
                                                            <div class="downsale"><span>-</span>${{number_format($product->product_price - $product->product_sales_price)}}</div>
                                                        @endif
                                                        <div class="product-quick-view">
                                                            <div class="row">
                                                                <div class="col-md-4 p-0"><a href="/product-details?product={{base64_encode(json_encode($product))}}" class="btn btn-success"><i class="fa fa-eye"></i></a></div>
                                                                <div class="col-md-4 p-0"><a href="/cart" class="btn btn-success"><i class="fa fa-shopping-cart"></i></a></div>
                                                                <div class="col-md-4 p-0"><a href="javascript:void(0);" class="btn btn-success"><i class="ti-heart"></i></a></div></div>

                                                        </div>
                                                    </div>
                                                    <div class="product-title">
                                                        <h4><a href="#">{{$product->product_name}}</a></h4>
                                                        <small>
                                                            @if($product->product_sales_price)
                                                                <div class="product-price-rating">
                                                                    <span>${{number_format($product->product_sales_price)}}</span>
                                                                    <del>${{number_format($product->product_price)}}</del>
                                                                </div>
                                                            @else
                                                                <div class="product-price-rating">
                                                                    <span>${{number_format($product->product_price)}}</span>
                                                                </div>
                                                            @endif
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach

                                    </div>
                                    <div class="text-center pt-2"><a href="/shop" class="btn btn-danger text-white">View All</a></div>
                                </div>
                            </div>
                        </div>
                        <!--banner-section-->
                        <section class="row mt-40" style="background-color: #000;" id="#bloomzon_tv">
                            <div class="col-md-12">
                                <div class="row" style="background-color: #0149a0 !important; color: #fff;">
                                    <div class="col-lg-12">
                                        <div class="section-title text-left">
                                            <h3>BLOOMZON TV</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="container mx-auto" style="width:40%; height:auto">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7HgGiCK33ow" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div><div class="products-tab-area mt-45 mt-sm-40">
            <div class="container-fluid">
                <div class="row mt-40">
                    <div class="col-md-12" style="border-right: 1px solid #eee;">
                        <div class="best-sellers">
                            <div class="row" style="background-color: #0149a0 !important; color: #fff;">
                                <div class="col-lg-12">
                                    <div class="section-title text-left">
                                        <h3>VENDORS</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row cv-visible">
                                @foreach($vendors as $vendor)
                                <div class="col-lg-2">
                                    <div class="product-single p-0" style="background-image: url('assets/img/food1.jpg'); height: 220px; border-radius: 15px; background-size: contain; width: 100%;  background-repeat: no-repeat; background-position: center;">
                                        <div class="product-title pt-2" style=" width: 100%; background-color: #23374D; opacity: 0.8; position: absolute; bottom: 0; text-align: center; border-bottom-right-radius: 15px; border-bottom-left-radius: 15px;">
                                            <h4><a href="#" class="text-white">{{$vendor->name}}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-center pt-2"><a href="/vendors?vendors={{base64_encode(json_encode($vendors))}}" class="btn btn-danger text-white">MORE</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><div class="container-fluid mt-50">
            <div class="row mt-40">
                @foreach($adverts as $advert)
                    @if($advert->advert_position === 'Footer')
                        <div class="col-xl-4 col-lg-6">
                            <div class="banner-sm hover-effect">
                                <a href="{{$advert->advert_link}}">
                                    <img src="{{asset($advert->advert_image_url1)}}" height="270" width="100%" alt="">

                                </a>
                            </div>
                        </div>
                        @endif
                   @endforeach

            </div>
        </div></div>
@endsection
