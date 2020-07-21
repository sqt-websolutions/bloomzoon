@extends('dashboard.professional-service.layout')
@section('content')
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-4">
                <a href="wallet.html">
                    <div class="card text-center" style="color: #02499B; background-color: white; padding: 30px;">
                        <h2><i class="fas fa-cash-register"></i> Total Withdrawal</h2>
                        <h1><b>{{count($user_metas->PaymentRequest)}}</b></h1>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="request.html">
                    <div class="card text-center" style="color: #02499B; background-color: white; padding: 30px;">
                        <h2><i class="fas fa-shopping-cart"></i> Total Request</h2>
                        <h1><b>{{count($user_metas->Order)}}</b></h1>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <div class="card text-center pr-0" style="color: #02499B; background-color: white;">
                    <img src="assets/img/medium-fb-ad.png">
                </div>
            </div>
        </div>
        <br>
        <div class="row mt-5 mb-5" style="background-color: #02499B;">
            <h1 style=" color: #fff; margin: 0px auto;" class="p-3">
                <strong>PRODUCTS</strong>
            </h1>
        </div>

        <div class="row col-md-12 mb-5">
            @if(count($products = $user_metas->Product))
                @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="card text-center p-3 " style="color: #02499B; background-color: white; padding-right: 0px !important; z-index: -1; ">
                            <img src="{{$product->featured_img_url}}" alt="" height="120">
                        </div>
                        <div class="p-1 text-center " style="width: 50%; background-color: #b92c28; position: absolute; bottom: 0; right: 0; margin-bottom: -30px; ">
                            <h4 class="text-white ">{{$product->product_name}}</h4>
                        </div>
                    </div>
                    @endforeach
                @endif
        </div>
        <br>
        <div class="row col-md-12 mt-5 mb-5" style="background-color: #02499B;">
            <h1 style=" color: #fff; margin: 0px auto;" class="p-3">
                <strong>GALLERY</strong>
            </h1>
        </div>
        <div class="row col-md-12 mb-5 ">
            <div class="col-md-3">
                <div class="card text-center" style="color: #02499B; background-color: white; padding-right: 0px !important; z-index: -1; ">
                    <img src="asset/img/a.jpg" height="200" alt=" ">
                    <h3>Rail Talk</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center" style="color: #02499B; background-color: white; padding-right: 0px !important; z-index: -1; ">
                    <img src="asset/img/a.jpg" height="200" alt=" ">
                    <h3>Rail Talk</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center" style="color: #02499B; background-color: white; padding-right: 0px !important; z-index: -1; ">
                    <img src="asset/img/a.jpg" height="200" alt=" ">
                    <h3>Rail Talk</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-5" style="color: #02499B; background-color: white; padding-right: 0px !important; z-index: -1; ">
                    <i class="fas fa-sign-out-alt fa-4x" style="font-size: 100px"></i>
                    <h3>Logout</h3>
                </div>
            </div>
        </div>
    </div>
    @endsection
