<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bloomzon - @yield('page_title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="manifest" href="site">
    <link rel="apple-touch-icon" href="icon">
    <!-- Place favicon.ico in the root directory -->

    <!-- bootstrap v4.0.0 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- fontawesome-icons css -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- themify-icons css -->
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <!-- elegant css -->
    <link rel="stylesheet" href="assets/css/elegant.css">
    <!-- elegant css -->
    <link rel="stylesheet" href="assets/css/jquery.mmenu.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- venobox css -->
    <link rel="stylesheet" href="assets/css/venobox.css">
    <!-- slick css -->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!-- slick-theme css -->
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <!-- cssanimation css -->
    <link rel="stylesheet" href="assets/css/cssanimation.min.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css" />
    <!-- helper css -->
    <link rel="stylesheet" href="assets/css/helper.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style type="text/css">
        .single-product-cat{
            padding: 0px !important;
            height: 220px !important;
        }
        .single-product-cat img{
            max-height: 220px !important
        }
    </style>
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
@php
$adverts = \App\Advert::all();
@endphp

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

<!--header-area start-->
<header class="header-area">
    <div class="desktop-header">
        <!--header-top-->
        <div class="header-top">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-2 text-right">
                        <img src="assets/images/download.png" height="30" width="auto" class="img img-responsive">
                    </div>
                    @foreach($adverts as $advert)
                        @if($advert->advert_position === 'Header')
                            <div class="col-lg-4">
                                <a href="{{$advert->advert_link}}" target="_blank">
                                    <img src="{{asset($advert->advert_image_url1)}}" height="60" width="100%" class="img img-responsive">
                                </a>
                            </div>
                            @endif
                            @endforeach

                    <div class="col-lg-2">
                        <div class="topbar-right">
                            <div class="currency-bar lang-bar pull-right">
                                <ul>
                                    <li><a href="#" class="btn btn-primary pt-0 pb-0" style="background-color: #23374D !important"><img src="assets/images/icons/gb.png" alt="" />English <i class="fa fa-angle-down"></i></a>
                                        <ul>
                                            <li><a href="#"> <img src="assets/img/us.jpg" width="30" height="20"> English</a></li><br>
                                            <li><a href="#"> <img src="assets/img/fr.jpg" width="30" height="20"> French</a></li><br>
                                            <li><a href="#"> <img src="assets/img/sp.jpg" width="30" height="20"> Spanish</a></li><br>
                                            <li><a href="#"> <img src="assets/img/chinese.jpg" width="30" height="20"> Chinese</a></li><br>
                                            <li><a href="#"> <img src="assets/img/arabic.jpg" width="30" height="20"> Arabic</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header-bottom-->
        @php($categories = \App\Category::all())
        <div class="sticker header-bottom" style="background-color: #aa1607 !important; color: #fff;">
            <div class="container-fluid mr-5 ml-5 pr-5 pl-5">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="/"><img src="assets/images/bloomzon_white.png" width="90" height="auto" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mainmenu row">
                            <div class="dropdown col-md-2">
                                <a class="btn dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Help
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="bottom-start" style="position: absolute; transform: translate3d(10px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="faq">FAQ</a>
                                    <a class="dropdown-item" href="accountpolicy">Account Policy</a>
                                    <a class="dropdown-item" href="services">Services</a>
                                </div>
                            </div>
                            <div class="search-box col-md-10">
                                <select class="form-control" style="width: 80px; height: 45px !important; border-top-right-radius: 0px; border-bottom-right-radius:  0px;">
                                    <option value="all">All</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" placeholder="What do you need?" style="height: 45px;" />
                                <button style="height: 45px; background-color: #ccc; border-top-right-radius: 5px; border-bottom-right-radius:  5px; color: #333; width: 60px;"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="register-login">
                            <button type="button" class="badge btn btn-outline-light mr-2">Track Delivery</button>
                            <a href="cart" class="btn btn-success mr-2"> <span class="text-white">My Cart </span><i class="fa fa-lg fa-shopping-cart text-light"> {{ json_decode(\Illuminate\Support\Facades\Redis::get('cart'), true) ? ( count( json_decode(\Illuminate\Support\Facades\Redis::get('cart'), true)) ) : ''}} </i></a>
                           @if(Auth::user())
                                <a href="logout" class="text-white mr-2"><i class="fa fa-lg fa-sign-out text-light"></i> Logout</a>
                                <a href="/home" class="text-white mr-2"><i class="fa fa-lg fa-dashboard text-light"></i> My Account </a>
                            @else
                                <a href="register" class="text-white mr-2"><i class="fa fa-lg fa-registered text-light"></i> Register</a>
                                <a href="login" class="text-white mr-2"><i class="fa fa-lg fa-sign-in text-light"></i> Login</a>
                               @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--products-search-->
        <div class="products-search" style="background-color: #013677 !important; color: #fff; height: 61px;">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-xl-3 col-lg-3 text-center ml-0 mr-0">
                        <div class="collapse-menu mt-2">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" class="vm-menu">
                                        <i class="fa fa-navicon"></i>
                                        <span>All Categories</span>
                                    </a>

                                    <ul class="vm-dropdown" style="display: none; width: 50% !important; left: 25% !important; text-align: left;">
                                        @foreach($transformedCategories as $category => $children)
                                        <li style="padding: 8px !important;">
                                            <a href="/category/{{$category}}">{{$category}}</a>
                                            @if(!empty($children))
                                            <ul class="mega-menu">
                                                <li class="megamenu-single">
                                                    <span class="mega-menu-title">Sub-Category</span>
                                                    <ul>
                                                        @foreach($children as $child)
                                                            @if($child)
                                                                <li><a href="/category/{{$child}}">{{$child}}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach

{{--                                        @foreach($transformedCategories as $category => $children)--}}
{{--                                            <li style="padding: 8px !important;"><a href="/category/{{$category}}">{{$category}}</a>--}}
{{--                                                @if(!empty($children))--}}
{{--                                                    <ul class="mega-menu">--}}
{{--                                                    @foreach($children as $child)--}}
{{--                                                            @if($child)--}}
{{--                                                                <li class="megamenu-single"><a href="/category/{{$child}}">{{$child}}</a>--}}

{{--                                                                </li>--}}
{{--                                                            @endif--}}
{{--                                                    </ul>--}}
{{--                                                    @endforeach--}}
{{--                                                @endif--}}
{{--                                            </li>--}}

{{--                                        @endforeach--}}

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-6">
                        <div class="mainmenu text-white">
                            <nav>
                                <ul>
                                    <li><a href="/shop">shop</a></li>
                                    @foreach($categories as $category)
                                        <li><a href="/category/{{lcfirst($category->name)}}">{{$category->name}}</a></li>
                                    @endforeach

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--mobile-header-->
    <div class="sticker mobile-header">
        <div class="container-fluid">
            <!--logo and cart-->
            <div class="row align-items-center">
                <div class="col-sm-4 col-6">
                    <div class="logo">
                        <a href="index"><img src="assets/images/logo.png" alt="logo" /></a>
                    </div>
                </div>
                <div class="col-sm-8 col-6">
                    <div class="mini-cart text-right">
                        <ul>
                            <li><a href="#"><i class="icon_heart_alt"></i><span>1</span></a></li>
                            <li class="minicart-icon"><a href="#"><i class="icon_bag_alt"></i><span>2</span></a>
                                <div class="cart-dropdown">
                                    <ul>
                                        <li>
                                            <div class="mini-cart-thumb">
                                                <a href="#"><img src="assets/images/products/cart/thumb-1.jpg" alt="" /></a>
                                            </div>
                                            <div class="mini-cart-heading">
                                                <span>$460.00 x 1</span>
                                                <h5><a href="#">Kabino Bedside Table</a></h5>
                                            </div>
                                            <div class="mini-cart-remove">
                                                <button><i class="ti-close"></i></button>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mini-cart-thumb">
                                                <a href="#"><img src="assets/images/products/cart/thumb-2.jpg" alt="" /></a>
                                            </div>
                                            <div class="mini-cart-heading">
                                                <span>$460.00 x 1</span>
                                                <h5><a href="#">Kabino Bedside Table</a></h5>
                                            </div>
                                            <div class="mini-cart-remove">
                                                <button><i class="ti-close"></i></button>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="minicart-total fix">
                                        <span class="pull-left">total:</span>
                                        <span class="pull-right">$460.00</span>
                                    </div>
                                    <div class="mini-cart-checkout">
                                        <a href="shopping-cart" class="btn-common view-cart">VIEW CARD</a>
                                        <a href="checkout" class="btn-common checkout mt-10">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--search-box-->
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="search-box mt-sm-15">
                        <select>
                            <option>All Categories</option>
                            <option>Phones &amp; Tablets</option>
                            <option>Electronics</option>
                            <option>Bloomzon Products</option>
                            <option>Wholesalers</option>
                            <option>Home &amp; Kitchen</option>
                            <option>Baby, Kids &amp; Toys</option>
                        </select>
                        <input type="text" placeholder="What do you need?" />
                        <button>Search</button>
                    </div>
                </div>
            </div>
            <!--site-menu-->
            <div class="row mt-sm-10">
                <div class="col-lg-12">
                    <a href="#my-menu" class="mmenu-icon pull-left"><i class="fa fa-bars"></i></a>

                    <div class="mainmenu">
                        <nav id="my-menu">
                            <ul>
                                <li><a href="realestate">Real Estate</a></li>
                                <li><a href="fashion_designer_tailoring">Fashion Designing &amp; Tailoring</a></li>
                                <li><a href="bloomzontrip">Bloomzon Trip</a></li>
                                <li><a href="bloomzon">Bloomzon Products</a></li>
                                <li><a href="groceries">Food &amp; Groceries</a></li>
                                <li><a href="proservice">Professional Services</a></li>
                                <li><a href="delivery">Delivery Agent</a></li>
                                <li><a href="manufacturers">Manufacturer</a></li>
                            </ul>
                        </nav>
                    </div>

                    <!--category-->
                    <div class="collapse-menu mt-0 pull-right">
                        <ul>
                            <li><a href="javascript:void(0);" class="vm-menu"><i class="fa fa-navicon"></i><span>All Departments</span></a>
                                <ul class="vm-dropdown">
                                    <li><a href="#"><i class="fa fa-laptop"></i>Phones &amp; Tablets <b class="caret"></b></a>
                                        <ul class="mega-menu">
                                            <li class="megamenu-single">
                                                <ul>
                                                    <li><a href="phones">Iphone</a></li>
                                                    <li><a href="phones">Samsung</a></li>
                                                    <li><a href="phones">Techno</a></li>
                                                    <li><a href="phones">Infinix</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="fa fa-desktop"></i>Electronics <b class="caret"></b></a>
                                        <ul class="mega-menu">
                                            <li class="megamenu-single">
                                                <ul>
                                                    <li><a href="#">Fridge</a></li>
                                                    <li><a href="#">Gas Cooker</a></li>
                                                    <li><a href="#">Television</a></li>
                                                    <li><a href="#">Speakers</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="fa fa-camera"></i>Bloomzon Products</a></li>
                                    <li><a href="#"><i class="fa fa-headphones"></i>Wholesalers</a></li>
                                    <li><a href="#"><i class="fa fa-music"></i>Home &amp; Kitchew</a></li>
                                    <li><a href="#"><i class="fa fa-mobile"></i>Baby, Kids &amp; Toys</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header-area end-->

@yield('content')

<!--footer-area start-->
<footer class="footer-area mt-50" style="background-color: #000;">
    <div class="container-fluid pl-5 pr-5">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="fooer-widget">
                    <h4 class="text-white">BLOOMZON</h4>
                    <div class="footer-menu">
                        <div class="row footer-list border-right">
                            <div class="col">
                                <ul>
                                    <li><a href="about">About</a> </li>
                                    <li><a href="services">Services</a> </li>
                                    <li><a href="agent">Agents</a> </li>
                                    <li><a href="investor_relations">Investor Relations</a></li>
                                    <li><a href="bloomzontrip">Bloomzon trip</a></li>
                                    <li><a href="make_money">Make Money with Us</a></li>
                                    <li><a href="sell_on_bloomzon">Sell on bloomzon</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul>
                                    <li><a href="career">Career</a> </li>
                                    <li><a href="blog">Blog</a> </li>
                                    <li><a href="faq">FAQ</a> </li>
                                    <li><a href="sell_your_service">Sell Your Services on bloomzon</a></li>
                                    <li><a href="advertise_on_bloomzon">Advertise on bloomzon tv</a></li>
                                    <li><a href="contact_us">contact us</a></li>
                                    <li><a href="advertise_your_products">Advertise Your Products</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3 mt-sm-45">
                <div class="fooer-widget">
                    <h4 class="text-white">LEGAL</h4>
                    <div class="footer-menu">
                        <div class="row footer-list border-right">
                            <div class="col">
                                <ul>
                                    <li><a href="termsandcondititons">Terms and Condition</a> </li>
                                    <li><a href="retailpolicy">Retail Policy</a> </li>
                                    <li><a href="accountpolicy">Account Policy</a> </li>
                                    <li><a href="accountpolicy">Become an Affiliate</a></li>
                                    <li><a href="cookies">cookies</a> </li>
                                    <li><a href="gifts">Gifts</a> </li>
                                    <li><a href="datapolicy">data policy</a> </li>
                                    <li><a href="privacy">Privacy</a> </li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul>
                                    <li><a href="refundpolicy">Refund Policy</a> </li>
                                    <li><a href="shippingreturns">Shipping &amp; Returns</a> </li>
                                    <li><a href="qualitycontrol">Quality Control</a> </li>
                                    <li><a href="accountpolicy">Account Policy</a> </li>
                                    <li><a href="register">Register</a> </li>
                                    <li><a href="login">Login</a> </li>
                                    <li><a href="help">Help</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mt-sm-45">
                <div class="footer-widget">
                    <div class="subscribe-form">
                        <h4 class="text-white">SOCIAL MEDIA</h4>
                    </div>
                    <div class="social-icons style-2">
                        <div class="row footer-list">
                            <div class="col">
                                <ul>
                                    <li class="text-white"><img src="assets/img/tv.PNG" alt="" width="20"> Youtube</li>
                                    <li class="text-white pt-3"><img src="assets/img/facebook-logo.png" alt="" width="20"> Facebook</li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul>
                                    <li class="text-white"><img src="assets/img/twitter-logo.PNG" alt="" width="20"> Twitter</li>
                                    <li class="text-white pt-3"><img src="assets/img/youtube.JPEG" alt="" width="20"> Bloomzon</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer-area end-->

<!-- modernizr js -->
<script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<!-- jquery-3.3.1 version -->
<script src="{{asset('assets/js/vendor/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!-- bootstra.min js -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- mmenu js -->
<script src="{{asset('assets/js/jquery.mmenu.js')}} "></script>
<!-- easing js -->
<script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
<!---slick-js-->
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<!---letteranimation-js-->
<script src="{{asset('assets/js/letteranimation.min.js')}}"></script>
<!-- jquery-ui js -->
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<!-- jquery.countdown js -->
<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
<!-- venobox js -->
<script src="{{asset('assets/js/venobox.min.js')}}"></script>
<!-- plugins js -->
<script src="{{asset('assets/js/plugins.js')}}"></script>
<!-- main js -->
<script src="{{asset('assets/js/main.js')}}"></script>

<!-- form js -->
<script src="{{asset('assets/js/lib/form.js')}}"></script>
<!-- sweet alert -->
<script src="{{asset('assets/js/sweetalert.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<div class="mm-wrapper__blocker mm-slideout"><a href="#mm-0">
        <span class="mm-sronly">Close menu</span></a></div>
<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up"></i></a>

<!-- Modal -->
<div class="modal fade" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <img src="assets/images/products/product-details/1.jpg" alt="" />
                                </div>
                            </div>
                            <div id="product-2" class="tab-pane fade">
                                <div class="product-details-thumb">
                                    <img src="assets/images/products/product-details/2.jpg" alt="" />
                                </div>
                            </div>
                            <div id="product-3" class="tab-pane fade">
                                <div class="product-details-thumb">
                                    <img src="assets/images/products/product-details/3.jpg" alt="" />
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs products-nav-tabs horizontal quick-view mt-10">
                            <li><a class="active" data-toggle="tab" href="#product-1"><img src="assets/images/products/product-details/thumb-1.jpg" alt="" /></a></li>
                            <li><a data-toggle="tab" href="#product-2"><img src="assets/images/products/product-details/thumb-2.jpg" alt="" /></a></li>
                            <li><a data-toggle="tab" href="#product-3"><img src="assets/images/products/product-details/thumb-3.jpg" alt="" /></a></li>
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
                                        <label>Quantity:</label>
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

@stack('scripts')
</body>

</html>
