@extends('layouts.front')
@section('page_title')
Product Details
@endsection

@php
$product = \App\Product::where('id',$product->id)->first();
@endphp
@section('content')
<!--products-area start-->

<div class="mm-page mm-slideout" id="mm-0">
    <div class="product-details-area mt-20">
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
                                            {{-- <li>Tags:--}}
                                            {{-- <a href="#">Tech,</a>--}}
                                            {{-- <a href="#">Apple</a>--}}
                                            {{-- </li>--}}
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
                                        <a href="cart" class="add-to-cart cart" data-product-id="{{$product->id}}">Add to Cart</a>
                                        <a href="cart" class="add-to-cart text-white bg-danger" >Check out</a>
                                        {{-- <a href="#" class="add-to-cart compare">+ ADD to Compare</a>--}}
                                    </div>
                                    <div class="product-features mt-50">
                                        <ul class="list-none">
                                            {{-- <li>Satisfaction 100% Guaranteed</li>--}}
                                            {{-- <li>Free shipping on orders over $99</li>--}}
                                            {{-- <li>14 day easy Return</li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-review-area mt-45">
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
                                <tbody>
                                    <tr>
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
                                    @foreach($product->reviews as $review)
                                    <li>

                                        <div class="comment-avatar text-center">
                                            <img src="{{ $review->user_id->profile_pic_url }}" alt="" height="50" width="50" h>
                                            <div class="product-rating mt-10">
                                                
                                                @for ($i = 1; $i < 5; $i++) 
                                                @if($i > $review->rating)
                                                <i class="fa fa-star-o"></i>
                                                @else
                                                <i class="fa fa-star"></i>
                                                @endif
                                                @endfor 
                                                

                                            </div>
                                        </div>
                                        <div class="comment-desc">
                                            <span>{{ date($review->createdAt) }}</span>
                                            <h4>{{$review->user_id->name}}</h4>
                                            <p>{{$review->review_message}}. </p>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="blog-comment-form product-comment-form mt-05">
                                <h4><span>Add Review</span></h4>
                                <form name="reviewForm" id="reviewForm">
                                    <div class="row mt-30">
                                        @if(Auth::user())
                                        <div class="col-sm-6 single-form">
                                            <input type="text" value="{{Auth::user()->name}}" disabled>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" value="{{Auth::user()->email}}" disabled>
                                        </div>
                                        @else
                                        <div class="col-sm-4 single-form">
                                            <h5>Please login to add review</h5>
                                            <a href="/login" class="btn btn-danger btn-lg">Login</a>
                                        </div>
                                        <div class="col-sm-4 single-form">
                                        </div>
                                        @endif
                                        <div class="col-sm-12">
                                            <div class="product-rating style-2">
                                                <span>Your Rating:</span>
                                                <i class="fa fa-star-o" onclick="rate(1)" id="star1"></i>
                                                <i class="fa fa-star-o" onclick="rate(2)" id="star2"></i>
                                                <i class="fa fa-star-o" onclick="rate(3)" id="star3"></i>
                                                <i class="fa fa-star-o" onclick="rate(4)" id="star4"></i>
                                                <i class="fa fa-star-o" onclick="rate(5)" id="star5"></i>

                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea name="review_message" placeholder="Messages"></textarea>
                                        </div>
                                        <input type="hidden" value="{{$product->id}}" name="product_id" />
                                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id" />
                                        <input type="hidden" value="0" id="rating" name="rating" />
                                        <input type="hidden" value="1" name="status" />
                                        <div class="col-sm-12">
                                            @if(Auth::user())
                                            <button name="" class="btn-common mt-25">Submit</button>
                                            @else
                                            <a href="/login" class="btn btn-danger btn-lg">Login</a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
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

                <ul class="slick-dots" style="" role="tablist">
                    <li class="slick-active" role="presentation"><button type="button" role="tab" id="slick-slide-control00" aria-controls="slick-slide00" aria-label="1 of 2" tabindex="0" aria-selected="true">1</button></li>
                    <li role="presentation"><button type="button" role="tab" id="slick-slide-control01" aria-controls="slick-slide04" aria-label="2 of 2" tabindex="-1">2</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--products-area end-->

@endsection

@push('scripts')
<script>
    [...document.getElementsByClassName('cart')].map(element => {
        element.onclick = async e => {
            e.preventDefault();
            const productId = e.target.getAttribute('data-product-id');
            const quantity = document.getElementById(`qty_${productId}`).value;

            const response = await (await fetch(`/api/v1/cart/add/${productId}/${quantity}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json'
                }
            })).json();

            if (response.success) {
                return swal({
                    'title': 'Cart Updated',
                    'text': 'Product Added to cart successfully',
                    'icon': 'success'
                })
            }
        }
    });

    function rate(rate) {
        var s1 = document.getElementById('star1')
        var s2 = document.getElementById('star2')
        var s3 = document.getElementById('star3')
        var s4 = document.getElementById('star4')
        var s5 = document.getElementById('star5')
        var rateInput = document.getElementById('rating');
        switch (rate) {
            case 1:
                s1.className = 'fa fa-star';
                s2.className = 'fa fa-star-o';
                s3.className = 'fa fa-star-o';
                s4.className = 'fa fa-star-o';
                s5.className = 'fa fa-star-o';
                rateInput.value = 1;
                break;
            case 2:
                s1.className = 'fa fa-star';
                s2.className = 'fa fa-star';
                s3.className = 'fa fa-star-o';
                s4.className = 'fa fa-star-o';
                s5.className = 'fa fa-star-o';
                rateInput.value = 2;
                break;
            case 3:
                s1.className = 'fa fa-star';
                s2.className = 'fa fa-star';
                s3.className = 'fa fa-star';
                s4.className = 'fa fa-star-o';
                s5.className = 'fa fa-star-o';
                rateInput.value = 3;
                break;
            case 4:
                s1.className = 'fa fa-star';
                s2.className = 'fa fa-star';
                s3.className = 'fa fa-star';
                s4.className = 'fa fa-star';
                s5.className = 'fa fa-star-o';
                rateInput.value = 4;
                break;
            case 5:
                s1.className = 'fa fa-star';
                s2.className = 'fa fa-star';
                s3.className = 'fa fa-star';
                s4.className = 'fa fa-star';
                s5.className = 'fa fa-star';
                rateInput.value = 5;
                break;
            default:
                s1.className = 'fa fa-star-0';
                s2.className = 'fa fa-star-0';
                s3.className = 'fa fa-star-0';
                s4.className = 'fa fa-star-0';
                s5.className = 'fa fa-star-0';
                rateInput.value = 0;
                break;
        }
    }



    FormHandler('reviewForm', {
        requestUrl: '/api/v1/crud/reviews',
        requestType: 'POST',
        cb: response => {
            if (response.success) {
                return swal({
                    title: 'Success!',
                    text: 'Reviews created successfully!',
                    icon: 'success',

                })
            }
            return swal({
                title: 'Error!',
                text: 'We had error adding your review. Please try again',
                icon: 'error',
                button: 'Try Again'
            })
        }
    })
</script>
@endpush