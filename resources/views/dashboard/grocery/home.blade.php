@extends('dashboard.grocery.layout')
@section('content')

    @php
        $catalogues = \App\FoodCatalogue::all();
    @endphp

    <div class="col-md-10">
        <div class="row">
            <div class="col-md-4 offset-2">
                <a href="wallet">
                    <div class="card text-center" style="color: #02499B; background-color: white; padding: 30px;">
                        <h2><i class="fas fa-cash-register"></i> Total Withdrawal</h2>
                        <h1><b>{{count($user_metas->PaymentRequest)}}</b></h1>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <div class="card text-center" style="color: #02499B; background-color: white; padding: 30px;">
                    <h2><i class="fas fa-shopping-cart"></i> Shopping</h2>
                    <h1><b>{{count($user_metas->Purchase)}}</b></h1>
                </div>
            </div>
        </div>
        <br>
        <div class="row pl-5 mt-5 mb-5" style="background-color: #02499B">
            <h1 style=" color: #fff;">
                <strong>KITCHEN MENU</strong>
            </h1>
        </div>
        <div class="row  m-auto pl-5">
            @foreach($catalogues as $catalogue)
                <div class="col-md-3 ml-5">
                    <div class="card text-center p-3 ">
                        <img src="{{$catalogue->featured_image_url}}" alt=" " height="160px" width="100%">
                    </div>
                    <div class="p-1 text-center " style="background-color: #b92c28;">
                        <h4 class="text-white ">{{$catalogue->name}}</h4>
                    </div>
                </div>
                @endforeach
        </div>
        <!-- <div class="row " style="padding: 15px; ">
            <div class="col-md-12 card " style="padding: 15px; text-align: right; ">
                <p>Copyright 2020 - Bloomzon </p>
            </div>
        </div> -->
    </div>
@endsection
