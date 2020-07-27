@extends('layouts.front')

@section('content')
@php
    
    $products = \App\Product::where('user_id', '=', $manufacturer->id)->get();
@endphp
    <div class="mm-page mm-slideout" id="mm-0"><div class="product-details-area mt-20">
            <div class="container-fluid">
                <div class="product-details">
                    <div class="row">
                        <div class="col-lg-2 col-md-1">
                            <ul class="nav nav-tabs products-nav-tabs">
                                <li><a class="active" data-toggle="tab" href="#product-1"><img src="{{asset($manufacturer->profile_pic_url)}}" alt=""></a></li>
                                <li><a data-toggle="tab" href="#product-2"><img src="{{asset($manufacturer->profile_pic_url)}}" alt=""></a></li>
                                <li><a data-toggle="tab" href="#product-3"><img src="{{asset($manufacturer->profile_pic_url)}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="tab-content">
                                <div id="product-1" class="tab-pane fade in show active">
                                    <div class="product-details-thumb">
                                        <a class="venobox vbox-item" data-gall="myGallery" href="{{asset($manufacturer->profile_pic_url)}}"><i class="fa fa-search-plus"></i></a>
                                        <img src="{{asset($manufacturer->profile_pic_url)}}" alt="">
                                    </div>
                                </div>
                                <div id="product-2" class="tab-pane fade">
                                    <div class="product-details-thumb">
                                        <a class="venobox vbox-item" data-gall="myGallery" href="{{asset($manufacturer->profile_pic_url)}}"><i class="fa fa-search-plus"></i></a>
                                        <img src="{{asset($manufacturer->profile_pic_url)}}" alt="">
                                    </div>
                                </div>
                                <div id="product-3" class="tab-pane fade">
                                    <div class="product-details-thumb">
                                        <a class="venobox vbox-item" data-gall="myGallery" href="{{asset($manufacturer->profile_pic_url)}}"><i class="fa fa-search-plus"></i></a>
                                        <img src="{{asset($manufacturer->profile_pic_url)}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-sm-50">
                            <div class="product-details-desc">
                                <h4><small>NAMES:</small> <span class="pl-5">{{$manufacturer->company_name}}</span></h4>
                                <h4><small>LOCATION: </small> <span class="pl-4">{{$manufacturer->address}}</span></h4>
                                <h4><small>DESCRIPTION OF SERVICE: </small></h4>
                                <p>{{$manufacturer->factory_description}}</p>
                                <h4><small>CONTACT NUMBER: </small> <span class="pl-4">{{$manufacturer->phone}}</span></h4>
                                <h4><small>CONTACT EMAIL: </small> <span class="pl-5">{{$manufacturer->email}}</span></h4>
                                <h4><small>LAST SEEN: </small> <span class="pl-5">{{\Illuminate\Support\Carbon::parse($manufacturer->last_login)->format('y/m/d')}}</span></h4>
                                <h4><small>CHAT VENDOR: </small> <button class="btn btn-danger ml-5">Chat <i class="fa fa-comments fa-1x text-white"></i></button></h4>
                                <div class="social-icons style-5">
                                    <span>Share Link:</span>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><div class="product-review-area mt-45">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs product-review-nav">
                            <li><a class="active" data-toggle="tab" href="#termscond">Terms &amp; Conditions</a></li>
                            <li><a data-toggle="tab" href="#returnpol">Return Policy</a></li>
                            <li><a data-toggle="tab" href="#deliverter">Delivery Terms</a></li>
                            <li><a data-toggle="tab" href="#product_list">Products</a></li>
{{--                            <li><a data-toggle="tab" href="#reviews">Review (2)</a></li>--}}
                        </ul>
                        <div class="tab-content">
                            <div id="termscond" class="tab-pane fade in show active">
                                <div class="product-description">
                                    <h2>Manufacturer's Terms &amp; Conditions</h2>
                                    <p>{{$manufacturer->terms_conditions}}</p>
                                </div>
                            </div>
                            <div id="returnpol" class="tab-pane fade returnpol">
                                <div class="product-description">
                                    <h2>Manufacturer's Return Policy</h2>
                                    <p>{{$manufacturer->policy}}</p>
                                </div>
                            </div>
                            <div id="deliverter" class="tab-pane fade deliverter">
                                <div class="product-description">
                                    <h2>Manufacturer's Delivery Terms</h2>
                                    <p>{{$manufacturer->terms_of_purchase}}</p>
                                </div>
                            </div>
                            <div id="product_list" class="tab-pane fade product_list">
                                <div class="best-sellers mt-45">
                                    <div class="container-fluid fix">
                                        <div class="row four-items cv-visible">

                                            @foreach($products as $product)
                                                <div class="col-lg-3">
                                                    <div class="product-single">
                                                        <div class="product-title">
                                                            <small><a href="#">{{$product->product_name}}</a></small>
                                                            <h4><a href="#">{{$product->product_description}}</a></h4>
                                                        </div>
                                                        <div class="product-thumb">
                                                            <a href="#"><img src="{{$product->profile_pic_url}}" alt="" /></a>
{{--                                                            <div class="downsale"><span>-</span>$35</div>--}}
                                                            <div class="product-quick-view">
                                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view{{$product->id}}" tabindex="0">quick view</a>
                                                            </div>
                                                        </div>
{{--                                                        <div class="product-price-rating">--}}
{{--                                                            <div class="pull-left">--}}
{{--                                                                <span>$395.00</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="pull-right">--}}
{{--                                                                <i class="fa fa-star-o"></i>--}}
{{--                                                                <i class="fa fa-star-o"></i>--}}
{{--                                                                <i class="fa fa-star-o"></i>--}}
{{--                                                                <i class="fa fa-star-o"></i>--}}
{{--                                                                <i class="fa fa-star-o"></i>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="product-action">--}}
{{--                                                            <a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>--}}
{{--                                                            <a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>--}}
{{--                                                            <a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="quick-view{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <div class="tab-content">
                                                                            <div id="product-1" class="tab-pane fade in show active">
                                                                                <div class="product-details-thumb">
                                                                                    <img src="{{asset($manufacturer->profile_pic_url)}}" alt="" />
                                                                                </div>
                                                                            </div>
                                                                            <div id="product-2" class="tab-pane fade">
                                                                                <div class="product-details-thumb">
                                                                                    <img src="{{asset($manufacturer->profile_pic_url)}}" alt="" />
                                                                                </div>
                                                                            </div>
                                                                            <div id="product-3" class="tab-pane fade">
                                                                                <div class="product-details-thumb">
                                                                                    <img src="{{asset($manufacturer->profile_pic_url)}}" alt="" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <ul class="nav nav-tabs products-nav-tabs horizontal quick-view mt-10">
                                                                            <li><a class="active" data-toggle="tab" href="#product-1"><img src="{{asset($manufacturer->profile_pic_url)}}" alt="" /></a></li>
                                                                            <li><a data-toggle="tab" href="#product-2"><img src="{{asset($manufacturer->profile_pic_url)}}" alt="" /></a></li>
                                                                            <li><a data-toggle="tab" href="#product-3"><img src="{{asset($manufacturer->profile_pic_url)}}" alt="" /></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <div class="row">
                                                                            <div class="col-lg-8">
                                                                                <div class="product-details-desc">
                                                                                    <h2>Apple The New MacBook Retina 2016 MLHA2 12 inches</h2>
                                                                                    <ul>
                                                                                        <li>1.6 GHz dual-core Intel Core i5 (Turbo Boost up to 2.7 GHz) with 3 MB shared L3 cache 8 GB of 1600 MHz LPDDR3 RAM; 128 GB PCIe-based flash storage</li>
                                                                                        <li>13.3-Inch (diagonal) LED-backlit Glossy Widescreen Display, 1440 x 900 resolution Intel HD Graphics 6000</li>
                                                                                        <li>OS X El Capitan, Up to 12 Hours of Battery Life Macbook Air does not have a Retina display on any model.</li>
                                                                                    </ul>
                                                                                    <div class="product-meta">
                                                                                        <ul class="list-none">
                                                                                            <li>SKU: 00012 <span>|</span></li>
                                                                                            <li>Categories:
                                                                                                <a href="#">Tech</a>
                                                                                                <a href="#">Macbook</a>
                                                                                                <a href="#">Laptop</a>
                                                                                                <span>|</span>
                                                                                            </li>
                                                                                            <li>Tags:
                                                                                                <a href="#">Tech,</a>
                                                                                                <a href="#">Apple</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="social-icons style-5">
                                                                                        <span>Share Link:</span>
                                                                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                                                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                                                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                                                                        <a href="#"><i class="fa fa-rss"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="product-action stuck text-left">
                                                                                    <div class="free-delivery">
                                                                                        <a href="#"><i class="ti-truck"></i> Free Delivery</a>
                                                                                    </div>
                                                                                    <div class="product-price-rating">
                                                                                        <div>
                                                                                            <del>629.99</del>
                                                                                        </div>
                                                                                        <span>$495.00</span>
                                                                                        <div class="pull-right">
                                                                                            <i class="fa fa-star"></i>
                                                                                            <i class="fa fa-star"></i>
                                                                                            <i class="fa fa-star"></i>
                                                                                            <i class="fa fa-star"></i>
                                                                                            <i class="fa fa-star-o"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="product-colors mt-20">
                                                                                        <label>Select Color:</label>
                                                                                        <ul class="list-none">
                                                                                            <li>Red</li>
                                                                                            <li>Black</li>
                                                                                            <li>Blue</li>
                                                                                        </ul>

                                                                                    </div>
                                                                                    <div class="product-quantity mt-15">
                                                                                        <label>Quatity:</label>
                                                                                        <input type="number" value="1" />
                                                                                    </div>
                                                                                    <div class="add-to-get mt-50">
                                                                                        <a href="#" class="add-to-cart">Add to Cart</a>
                                                                                        <a href="#" class="add-to-cart compare">+ ADD to Compare</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


{{--    <div class="modal fade" id="terms-conditions" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <h2>TERMS &amp; CONDITIONS</h2>--}}
{{--                                    <p class="text-justify">--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="modal fade" id="return-policy" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <h2>RETURN POLICY</h2>--}}
{{--                                    <p class="text-justify">--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="modal fade" id="delivery-terms" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <h2>DELIVERY TERMS</h2>--}}
{{--                                    <p class="text-justify">--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}

{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti explicabo voluptatem quisquam nulla asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis adipisci, velit dolore magnam.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
