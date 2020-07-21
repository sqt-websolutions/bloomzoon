@extends('dashboard.buyer.layout')
@section('page_title')
    Buyer's Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Favourites</h2>
                    </div>
                </div>
                <div class="row">
                                @if($favourites = $user_metas->Favourite)

                                    @foreach($favourites as $favourite)

                                        <div class="col-md-4 mb-3">
                                            <div class="row">
                                                <div class=" pt-3 pb-3" style="background-color: #f2f2f2 !important;">
                                                    <div class="col-md-3 m-auto text-left">
                                                        <img src="{{asset('buyer_assets/img/shoe.png')}}" width="80">
                                                    </div>
                                                    <div class="col-md-6 m-auto">
                                                        <p><span style="font-weight: bolder">{{$favourite->product_id->product_name}}</span></p>
                                                        <p> &#8358;{{$favourite->product_id->product_price}} <small style="text-decoration: line-through;"> &#8358;{{$favourite->product_id->product_sales_price}}</small></p>
                                                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <i class="fa fa-heart fa-2x" style="color: red"></i><br>
                                                        <button style="border-radius: 25px;" data-favourite-id="{{$favourite->id}}" type="button" class="btn btn-info mt-3 btn-sm">Remove</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    @endforeach
                                @else
                                @endif


                            </div>
                        </div>

        @endsection
