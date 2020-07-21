@extends('dashboard.buyer.layout')
@section('page_title')
    Buyer's Dashboard
@endsection
@php
$delivered_count = $transit_count = 0;
   foreach($user_metas->Order as $order){
       if($order->status === 'delivered'){
           ++$delivered_count;
       }
       if($order->status === 'transit'){
            ++$transit_count;
       }
}

@endphp

        @section('content')
        <div class="col-md-10">
                <div class="row col-md-12 text-center" style="background-color: #AF2E1D !important; padding: 10px; text-align: center !important; color:white">
                    <h1 class="text-center m-auto pt-3 pb-3"><b>Your Delivery Status</b></h1>
                </div>
                <div class="row col-md-12" style="background-color: #2B2950 !important; padding-left: 20px; padding-right: 20px; padding-bottom: 20px; padding-top: 100px;">

                    <div class="col-md-3 text-center m-auto">
                        <div class="p-5 m-5 m-auto" style="border-radius: 50%; width: 200px; height: 200px; background-color: #5C5B78; color: white; vertical-align: middle; border: 8px solid #AF2E1D;">
                            <div class="pt-5 m-auto">
                                <h1>{{$delivered_count}}</h1>
                            </div>
                        </div>
                        <h3 class="text-white">Total Delivered Product</h3>
                    </div>

                    <div class="col-md-3 text-center m-auto">
                        <a href="wallet-transaction-history">
                            <div class="p-5 m-5 m-auto" style="border-radius: 50%; width: 200px; height: 200px; background-color: #5C5B78; color: white; vertical-align: middle; border: 8px solid #AF2E1D;">
                                <div class="pt-5 m-auto">
                                    <h1>{{$transit_count}}</h1>
                                </div>
                            </div>
                            <h3 class="text-white">Product in Transit</h3>
                        </a>
                    </div>

                </div>
                <div class="row col-md-12 mt-0" style="background-color: #2B2950 !important; padding: 20px;">

                    <div class="col-md-6 mb-2">
                        @foreach($user_metas->Order as $order)
                            @if($order->status === 'delivered')
                                <div class="p-4" style="background-color: white !important; padding: 20px; width: 100%; height: 100%;">
                                    <div class="col-md-3 pl-0">
                                        <div class="col-md-2">
                                            @foreach($order->id->order_details as $order_detail)
                                                <img alt="{{$order_detail->product_id->featured_img_url}}" src="{{asset($order_detail->product_id->featured_img_url)}}" class="img" width="40">
                                            @endforeach

                                        </div>
{{--                                        <div class="col-md-2 ml-3"> --}}
{{--                                            <img src="buyer_asset/img/logitech.png" class="img" width="40"> --}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="col-md-5">
                                        <p><span>Billing Address: {{$order->user_id->billing_address}}</span> </p>
                                        <p><span>Amount: {{number_format($order->total_amount)}} </span> </p>
                                        <p><span>Delivery Agent: {{$order->delivery_agent_id->name}} </span></p>
                                    </div>
{{--                                    <div class="col-md-4 pt-4" style="margin: 0 auto !important;">--}}
{{--                                        <select name="" id="" class="form-control">--}}
{{--                                            <option value="">Edit Status</option>--}}
{{--                                            <option value="">Packaged</option>--}}
{{--                                            <option value="">Received</option>--}}
{{--                                            <option value="">On Transit</option>--}}
{{--                                            <option value="">Warehouse</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="col-md-6 mb-2">
                        @foreach($user_metas->Order as $order)
                            @if($order->status === 'transit')
                        <div class="p-4" style="background-color: white !important; padding: 20px; width: 100%; height: 100%;">
                            <div class="col-md-3 pl-0">
                                <div class="col-md-2">
                                    @foreach($order->id->order_details as $order_detail)
                                        <img alt="{{$order_detail->product_id->featured_img_url}}" src="{{asset($order_detail->product_id->featured_img_url)}}" class="img" width="40">
                                    @endforeach

                                </div>

                            </div>
                            <div class="col-md-5">
                                <p><span>Billing Address: {{$order->user_id->billing_address}}</span> </p>
                                <p><span>Amount: {{number_format($order->total_amount)}} </span> </p>
                                <p><span>Delivery Agent: {{$order->delivery_agent_id->name}} </span></p>
                            </div>
{{--                            <div class="col-md-4 pt-4" style="margin: 0 auto !important;">--}}
{{--                                <select name="" id="" class="form-control">--}}
{{--                                <option value="">Edit Status</option>--}}
{{--                                <option value="">Packaged</option>--}}
{{--                                <option value="">Received</option>--}}
{{--                                <option value="">On Transit</option>--}}
{{--                                <option value="">Warehouse</option>--}}
{{--                            </select>--}}
{{--                            </div>--}}
                        </div>
                            @endif
                            @endforeach

                    </div>
                    <div class="col-md-12" style="margin-bottom: 200px;"></div>

                </div>
            </div>
        @endsection
