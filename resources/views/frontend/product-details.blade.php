@extends('layouts.front')
@section('page_title')
    Product Details
@endsection
@section('content')
    <!--products-area start-->
    <div class="mm-page mm-slideout" id="mm-0"><div class="product-details-area mt-20">
            <div class="container-fluid">
                <div class="product-details">
                    <div class="row">
                        <div class="col-lg-1 col-md-2">
                            <ul class="nav nav-tabs products-nav-tabs">
                                <li><a class="active" data-toggle="tab" href="#product-1"><img src="{{asset($product->featured_img_url)}}" alt=""></a></li>
                                <li><a data-toggle="tab" href="#product-2"><img src="{{asset($product->featured_img_url)}}" alt=""></a></li>
                                <li><a data-toggle="tab" href="#product-3"><img src="{{asset($product->featured_img_url)}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="tab-content">
                                <div id="product-1" class="tab-pane fade in show active">
                                    <div class="product-details-thumb">
                                        <a class="venobox vbox-item" data-gall="myGallery" href="{{asset($product->featured_img_url)}}"><i class="fa fa-search-plus"></i></a>
                                        <img src="{{asset($product->featured_img_url)}}" alt="">
                                    </div>
                                </div>
                                <div id="product-2" class="tab-pane fade">
                                    <div class="product-details-thumb">
                                        <a class="venobox vbox-item" data-gall="myGallery" href="{{asset($product->featured_img_url)}}"><i class="fa fa-search-plus"></i></a>
                                        <img src="{{asset($product->featured_img_url)}}" alt="">
                                    </div>
                                </div>
                                <div id="product-3" class="tab-pane fade">
                                    <div class="product-details-thumb">
                                        <a class="venobox vbox-item" data-gall="myGallery" href="{{asset($product->featured_img_url)}}"><i class="fa fa-search-plus"></i></a>
                                        <img src="{{asset($product->featured_img_url)}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mt-sm-50">
                            <div class="row">
                                <div class="col-lg-8 col-md-7">
                                    <div class="product-details-desc">
                                        <h2>{{$product->product_name}}</h2>
                                        <ul>
                                            <li>
                                                {{substr($product->product_description, 0, 900)}}...
                                            </li>

                                        </ul>
                                        <div class="product-meta">
                                            <ul class="list-none">
                                                <li>SKU: {{$product->stock_level}} <span>|</span></li>
                                                @if($product->category_id->name ?? $product->name)
                                                <li>Categories:
                                                    <a href="/category/{{$product->category_id->name ?? $product->name}}">{{$product->category_id->name ?? $product->name}}</a>
                                                    <span>|</span>
                                                </li>
                                                @endif
{{--                                                <li>Tags:--}}
{{--                                                    <a href="#">Tech,</a>--}}
{{--                                                    <a href="#">Apple</a>--}}
{{--                                                </li>--}}
                                            </ul>
                                        </div>
                                        <div class="product-meta">
                                            <ul class="list-none">
                                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#terms-conditions" tabindex="0">Terms &amp; Conditions</a> <span>|</span></li>
                                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#return-policy" tabindex="0">Return Policy</a> <span>|</span></li>
                                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#delivery-terms" tabindex="0">Delivery Terms</a></li>
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
                                <div class="col-lg-4 col-md-5">
                                    <div class="product-action stuck text-left">
                                        <div class="free-delivery">
                                            <a href="#"><i class="ti-truck"></i> Free Delivery</a>
                                        </div>
                                        <div class="product-price-rating">
                                            <div>
                                             @if($product->product_sales_price)
                                                    <del>{{$product->product_currency === 1 ? 'NGN': '$'}}{{number_format($product->product_price)}}</del>
                                            </div>
                                            <span>{{$product->product_currency === 1 ? 'NGN': '$'}}{{number_format($product->product_sales_price)}}</span>
                                            @else
                                                <span>${{number_format($product->product_price)}}</span>
                                            @endif

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
                                                @if($product->product_color === 'red')
                                                    <li>Red</li>
                                                @endif

                                                    @if($product->product_color === 'black')
                                                        <li>Black</li>
                                                    @endif

                                                    @if($product->product_color === 'blue')
                                                        <li>Blue</li>
                                                    @endif
                                            </ul>

                                        </div>
                                        <div class="product-quantity mt-15">
                                            <label>Quantity:</label>
                                            <input type="number" id="qty_{{$product->id}}" value="1">
                                        </div>
                                        <div class="add-to-get mt-50">
                                            <a href="cart" class="add-to-cart" data-product-id="{{$product->id}}">Add to Cart</a>
{{--                                            <a href="#" class="add-to-cart compare">+ ADD to Compare</a>--}}
                                        </div>
                                        <div class="product-features mt-50">
                                            <ul class="list-none">
{{--                                                <li>Satisfaction 100% Guaranteed</li>--}}
{{--                                                <li>Free shipping on orders over $99</li>--}}
{{--                                                <li>14 day easy Return</li>--}}
                                            </ul>
                                        </div>
                                    </div>
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
                            <li><a class="active" data-toggle="tab" href="#description">Description</a></li>
                            <li><a data-toggle="tab" href="#specifications">Specifications</a></li>
                            <li><a data-toggle="tab" href="#reviews">Reviews </a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="description" class="tab-pane fade in show active">
                                <div class="product-description">
                                    <h2>{{$product->product_name}}</h2>
                                    <p>{{$product->product_description}}</p>
                                    <div class="site-image mb-25">

                                    </div>
                                </div>
                            </div>
                            <div id="specifications" class="tab-pane fade specifications">
                                <table class="table table-bordered">
                                    <tbody><tr>
                                        <td>Customer Rating</td>
                                        <td>
                                            <div class="product-rating">
                                                @for($i=0; $i<$product->rating; $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                                @for($k=0; $k< (5 - $product->rating); $k++)
                                                        <i class="fa fa-star-o"></i>
                                                    @endfor

                                                <span>({{$product->rating}})</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td><strong class="price">${{number_format($product->product_price)}}</strong></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div id="reviews" class="tab-pane fade">
                                <div class="blog-comments product-comments mt-0">
                                    <ul class="list-none">
{{--                                        <li>--}}
{{--                                            <div class="comment-avatar text-center">--}}
{{--                                                <img src="assets/images/blog/comment/4.jpg" alt="">--}}
{{--                                                <div class="product-rating mt-10">--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star-o"></i>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="comment-desc">--}}
{{--                                                <span>27 Aug 2019</span>--}}
{{--                                                <h4>Jenney Kelley</h4>--}}
{{--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}

                                    </ul>
                                </div>
                                <div class="blog-comment-form product-comment-form mt-05">
                                    <h4><span>Add Review</span></h4>
                                    <div class="row mt-30">
                                        <div class="col-sm-6 single-form">
                                            <input type="text" placeholder="Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Email">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="product-rating style-2">
                                                <span>Your Rating:</span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea placeholder="Messages"></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <button class="btn-common mt-25">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="best-sellers mt-45">
            <div class="container-fluid fix">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h3 class="text-dark">Related Products</h3>
                        </div>
                    </div>
                </div>
                <div class="row four-items cv-visible slick-initialized slick-slider slick-dotted">
                    <div class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1; width: 7920px; transform: translate3d(-1584px, 0px, 0px);">
                            <div class="col-lg-3 slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" style="width: 396px;" tabindex="-1">

                            </div>
                        </div>
                    </div>

                    <ul class="slick-dots" style="" role="tablist"><li class="slick-active" role="presentation"><button type="button" role="tab" id="slick-slide-control00" aria-controls="slick-slide00" aria-label="1 of 2" tabindex="0" aria-selected="true">1</button></li><li role="presentation"><button type="button" role="tab" id="slick-slide-control01" aria-controls="slick-slide04" aria-label="2 of 2" tabindex="-1">2</button></li></ul></div>
            </div>
        </div>
    </div>
    <!--products-area end-->

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
            }
        })
    </script>
@endpush
