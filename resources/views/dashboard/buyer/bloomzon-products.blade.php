@extends('dashboard.buyer.layout')
@section('page_title')
    Buyer's Dashboard
@endsection

        @section('content')
        <div class="col-md-10">

                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Bloomzon Products</h1>
                    </div>
                </div>

                <div class="row">

                    @foreach($bproducts as $product)
                        <div class="col-md-3 mb-3 p-3">
                            <div class="p-3">
                                <div class="row bg-white p-5" style="height: 280px;">
                                    <img src="{{asset('buyer_assets/img/bag.png')}}" width="100%">
                                </div>
                                <div style="margin-top: -25px;" class="text-right"> <a href="product-list?bproducts=Ymxvb216b25fcHJvZHVjdHM=" class="btn btn-danger btn-lg">{{$product->product_name}}</a></div>
                            </div>
                        </div>
                        @endforeach

                </div>
            </div>
        @endsection
