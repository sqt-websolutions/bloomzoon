@extends('layouts.front')
@section('page_title')
    {{$page_title}}
@endsection
@section('content')

    @php
        $categories = \Illuminate\Support\Facades\DB::table('categories as pc')
                               ->leftJoin('sub_categories as sc', 'pc.id', '=', 'sc.id')
                               ->select('pc.id as parent_id', 'pc.name as parent_name', 'sc.id as child_id', 'sc.name as child_name')
                               ->get();

        $transformedCategories = [];
        foreach ($categories as $category){
            if(!empty($transformedCategories[$category->parent_name])){
                $transformedCategories[$category->parent_name] = [];
            }
            $transformedCategories[$category->parent_name][] = $category->child_name;
        }
    @endphp

    <div class="shop-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-3">
                    <div class="sidebar">
                        <div class="vertical-menu">
                            <ul>
                                @foreach($transformedCategories as $category => $children)
                                    <li><a href="/category/{{$category}}">{{$category}}</a>
                                        @if(!empty($children))
                                            @foreach($children as $child)
                                                <ul>
                                                    @if($child)
                                                        <li><a href="/category/{{$child}}">{{$child}}</a></li>
                                                    @endif
                                                </ul>
                                            @endforeach
                                        @endif
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                        <div class="price_filter mt-40">
                            <div class="section-title">
                                <h3>Filter by price</h3>
                            </div>
                            <div class="price_slider_amount">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <input type="text" id="amount" name="price"  placeholder="Add Your Price" >
                                    </div>
                                    <div class="col-lg-6">
                                        <button>Filter</button>
                                    </div>
                                </div>
                            </div>
                            <div id="slider-range"></div>
                        </div>
                        <div class="list-filter mt-43">
                            <div class="">
                                <h3>Brands</h3>
                            </div>
                            <ul class="list-none mt-25">
                                @foreach($brands as $brand)
                                    <li>
                                        <input type="checkbox" id="{{$brand->id}}" >
                                        <label for="{{$brand->id}}">{{$brand->name}}</label>
                                    </li>
                                @endforeach
                                <li><a href="#">+ Show more</a></li>
                            </ul>
                        </div>
                        <div class="list-filter mt-43">
                            <div class="">
                                <h3>Colors</h3>
                            </div>
                            <ul class="list-none mt-25">
                                @foreach($colors as $color)
                                    <li>
                                        <label for="{{$color->id}}"></label>
                                        <input type="checkbox" id="{{$color->id}}" >
                                        <label for="{{$color->id}}">{{$color->name}}</label>
                                    </li>
                                @endforeach
                                <li><a href="#">+ Show more</a></li>
                            </ul>
                        </div>

                        <div class="products-list mt-30">
                            <div class=" mb-30">
                                <h3>Latest Items</h3>
                            </div>
                            <div class="one-carousel dots-none">
                                <div>
                                    <ul class="list-none">

                                        @foreach($products as $product)
                                            @if($product->product_name)
                                        <li>
                                            <div class="product-single style-2">
                                                <div class="row align-items-center m-0">
                                                    <div class="col-lg-4 p-0">
                                                        <div class="product-thumb">
                                                            <a href="/product-details?product={{base64_encode(json_encode($product))}}"><img src="{{asset($product->featured_img_url)}}" alt="" ></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 p-0">
                                                        <div class="product-title">
                                                            <h4>
                                                                <a href="/product-details?product={{base64_encode(json_encode($product))}}">{{$product->product_name}}</a>
                                                            </h4>
                                                        </div>
                                                        <div class="product-price-rating">
                                                            @if($product->product_sales_price)
                                                            <span>${{number_format($product->product_price)}}</span>
                                                            <del>${{number_format($product->product_price)}}</del>
                                                                @else
                                                                <span>${{number_format($product->product_price)}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-6">
                            <div class="">
                                <h3>{{$page_title}}</h3>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="products-sort">
                                <form>
                                    <select>
                                        <option>Default Sorting</option>
                                        <option>Sort by A - Z</option>
                                        <option>Sort Price Low - High</option>
                                    </select>
                                </form>
                            </div>
                            <div class="products-sort">
                                <form>
                                    <label>Show :</label>
                                    <select>
                                        <option>12</option>
                                        <option>8</option>
                                        <option>4</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="site-pagination pull-right">
                                <ul>
                                    <li><a href="#" class="active">1</a></li>
                                    <li>of</li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-view-system pull-right" role="tablist">
                                <ul class="nav nav-tabs">
                                    <li><a class="active" data-toggle="tab" href="#grid-products"><img src="assets/images/icons/icon-grid.png" alt="" ></a></li>
                                    <li><a data-toggle="tab" href="#list-products"><img src="assets/images/icons/icon-list.png" alt="" ></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="grid-products" class="tab-pane active">
                            <div class="row">
                                @foreach($products as $product)
                                    @if($product->product_name)
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-single">
                                            <div class="product-thumb">
                                                <a href="#"><img src="{{asset($product->featured_img_url)}}" alt="" ></a>
                                                <div class="product-quick-view">
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view{{$product->id}}">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-title">
                                                <small><a href="/category/{{$product->name}}">{{$product->name}}</a></small>
                                                <h4><a href="/product/{{$product->product_name}}">{{$product->product_name}}</a></h4>
                                            </div>

                                            <div class="product-price-rating">
                                                <div class="pull-left">
                                                    <span>${{number_format($product->product_price)}}</span>
                                                </div>
                                                <div class="pull-right">
                                                    @for($i=0; $i<$product->rating; $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @for($k=0; $k< (5 - $product->rating); $k++)
                                                        <i class="fa fa-star-o"></i>
                                                    @endfor

                                                    <span class="rating-quantity">({{$product->rating}})</span>
                                                </div>
                                            </div>
                                            <div class="product-action">
                                                <a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
                                                <a href="javascript:void(0);" data-product-id="{{$product->id}}" class="add-to-cart">Add to Cart</a>
                                                <a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
                                            </div>
                                        </div>

                                        <!--- quick view modal start -->



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
                                                                            <img src="{{asset($product->featured_img_url)}}" alt="" >
                                                                        </div>
                                                                    </div>
                                                                    <div id="product-2" class="tab-pane fade">
                                                                        <div class="product-details-thumb">
                                                                            <img src="{{asset($product->featured_img_url)}}" alt="" >
                                                                        </div>
                                                                    </div>
                                                                    <div id="product-3" class="tab-pane fade">
                                                                        <div class="product-details-thumb">
                                                                            <img src="{{asset($product->featured_img_url)}}" alt="" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <ul class="nav nav-tabs products-nav-tabs horizontal quick-view mt-10">
                                                                    <li><a class="active" data-toggle="tab" href="#product-1"><img src="{{asset($product->featured_img_url)}}" alt="" ></a></li>
                                                                    <li><a data-toggle="tab" href="#product-2"><img src="{{asset($product->featured_img_url)}}" alt="" ></a></li>
                                                                    <li><a data-toggle="tab" href="#product-3"><img src="{{asset($product->featured_img_url)}}" alt="" ></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="row">
                                                                    <div class="col-lg-8">
                                                                        <div class="product-details-desc">
                                                                            <h2>{{$product->product_name}}</h2>
                                                                            <p>
                                                                                {{$product->product_description}}
                                                                            </p>
                                                                            <div class="product-meta">
                                                                                <ul class="list-none">
                                                                                    <li>SKU: {{$product->stock_level}} <span>|</span></li>
                                                                                    <li>Categories:
                                                                                        <a href="/category/{{$product->name}}">{{$product->name}}</a>
                                                                                        {{--                                                                                    <a href="#">Macbook</a>--}}
                                                                                        {{--                                                                                    <a href="#">Laptop</a>--}}
                                                                                        <span>|</span>
                                                                                    </li>
{{--                                                                                    <li>Tags:--}}
{{--                                                                                        <a href="#">Tech,</a>--}}
{{--                                                                                        <a href="#">Apple</a>--}}
{{--                                                                                    </li>--}}
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
                                                                                    <del>${{number_format($product->product_sales_price)}}</del>
                                                                                </div>
                                                                                <span>${{number_format($product->product_price)}}</span>
                                                                                <div class="pull-right">
                                                                                    @for($i=0; $i<$product->rating; $i++)
                                                                                        <i class="fa fa-star"></i>
                                                                                    @endfor
                                                                                    @for($k=0; $k< (5 - $product->rating); $k++)
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    @endfor

                                                                                </div>
                                                                            </div>
                                                                            <div class="product-colors mt-20">
                                                                                <label>Select Color:</label>
                                                                                <ul class="list-none">
                                                                                    @foreach($colors as $color)
                                                                                        <li>
                                                                                            <label for="{{$color->id}}"></label>
                                                                                            <input type="checkbox" id="{{$color->id}}" >
                                                                                            <label for="black">{{$color->name}}</label>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>

                                                                            </div>
                                                                            <form name="addToCartForm">
                                                                                <div class="product-quantity mt-15">
                                                                                    <label>Quantity:</label>
                                                                                    <input type="number" min="1" name="qty" id="qty_{{$product->id}}" value="1" >
                                                                                </div>
                                                                                <div class="add-to-get mt-50">
                                                                                    <a class="add-to-cart" data-product-id="{{$product->id}}" href="javascript:void(0);">Add to Cart</a>

{{--                                                                                    <a href="#" class="add-to-cart compare">+ ADD to Compare</a>--}}
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- quick view modal end -->

                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="row align-items-center mt-30">
                        <div class="col-lg-6">
                            <div class="site-pagination">
                                <ul>
                                    <li><a href="#" class="active">1</a></li>
                                    <li>of</li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-results pull-right">
                                <span>Showing 1–3 of 60 results</span>
                                <div class="products-sort ml-35 mr-0">
                                    <form>
                                        <label>Show :</label>
                                        <select>
                                            <option>12</option>
                                            <option>8</option>
                                            <option>4</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="recent-viewed-products mt-50">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <h3>Recently Viewed Products</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row recent-products mlr-minus-12">

{{--                            <div class="col-lg-4">--}}

{{--                                <div class="product-single style-2">--}}
{{--                                    <div class="row align-items-center">--}}
{{--                                        <div class="col-lg-6 p-0">--}}
{{--                                            <div class="product-thumb">--}}
{{--                                                <a href="#"><img src="assets/images/products/6.jpg" alt="" ></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-6 p-0">--}}
{{--                                            <div class="product-title">--}}
{{--                                                <small><a href="#">Electronics</a></small>--}}
{{--                                                <h4><a href="#">Vantech VP-153C Camera</a></h4>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-price-rating">--}}
{{--                                                <i class="fa fa-star-o"></i>--}}
{{--                                                <i class="fa fa-star-o"></i>--}}
{{--                                                <i class="fa fa-star-o"></i>--}}
{{--                                                <i class="fa fa-star-o"></i>--}}
{{--                                                <i class="fa fa-star-o"></i>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-price-rating">--}}
{{--                                                <span>$195.00</span>--}}
{{--                                                <del>$229.99</del>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



{{--    <div class="container-fluid mt-60">--}}
{{--        <div class="brands-area">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="brand-items">--}}
{{--                        <div class="brand-item">--}}
{{--                            <a href="#">--}}
{{--                                <img class="brand-static" src="assets/images/brands/1.jpg" alt="" >--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-item">--}}
{{--                            <a href="#">--}}
{{--                                <img class="brand-static" src="assets/images/brands/2.jpg" alt="" >--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-item">--}}
{{--                            <a href="#">--}}
{{--                                <img class="brand-static" src="assets/images/brands/3.jpg" alt="" >--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-item">--}}
{{--                            <a href="#">--}}
{{--                                <img class="brand-static" src="assets/images/brands/4.jpg" alt="" >--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-item">--}}
{{--                            <a href="#">--}}
{{--                                <img class="brand-static" src="assets/images/brands/5.jpg" alt="" >--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-item">--}}
{{--                            <a href="#">--}}
{{--                                <img class="brand-static" src="assets/images/brands/6.jpg" alt="" >--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-item">--}}
{{--                            <a href="#">--}}
{{--                                <img class="brand-static" src="assets/images/brands/7.jpg" alt="" >--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-item">--}}
{{--                            <a href="#">--}}
{{--                                <img class="brand-static" src="assets/images/brands/8.jpg" alt="" >--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

    @push('scripts')
        <script>
            [...document.getElementsByClassName('add-to-cart')].map( element => {
                element.onclick = async e => {
                    e.preventDefault();
                    const productId = e.target.getAttribute('data-product-id');
                    const quantity = document.getElementById(`qty_${productId}`).value;

                    const response = await( await fetch(`/api/v1/cart/add/${productId}/${quantity}`, {
                        method: 'GET',
                        headers: {
                            'Accept':'application/json'
                        }
                    })).json();

                    if(response.success){
                        return swal({
                            'title': 'Cart Updated',
                            'text': 'Product Added to cart successfully',
                            'icon': 'success'
                        })
                    }
                    console.log(response);
                }
            })
        </script>
    @endpush

