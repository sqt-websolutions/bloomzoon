@extends('dashboard.fast-food-groceries.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection
        @section('content')
        <div class="col-md-10">

              @if(count($orders = $user_metas->Order))
                  @foreach($orders as $order)
                    <div class="col-md-4 p-3 mb-4">
                        <div class="card p-0" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1); border-radius: 0px !important;">
                            <div class="badge pull-right" style="top: 0; right: 0; position: absolute; background-color: green;">{{$order->status}}</div>
                            <div class="row p-2">
                                <div class="col-md-5">
                                    @foreach($order->id->order_details as $order_detail)
                                    <img src="{{$order_detail->product_id->featured_img_url}}" class="img" width="60">
                                    @endforeach
                                </div>
                                <div class="col-md-7">
                                    <p><span style="font-weight: bolder">Buyer:</span><span class="pl-5">{{$order->user_id->name}}</span></p>

                                    <p><span style="font-weight: bolder">Billing Address:</span><span class="pl-2">{{$order->user_id->billing_address}}</span></p>
                                    <p><span style="font-weight: bolder">Date:</span><span class="pl-2">{{\Carbon\Carbon::parse($order->created_at)->format('Y/m/d')}}</span></p>
                                </div>
                                <div class="col-md-12 text-center mt-2">
                                    <a href="order-details?order={{base64_encode(json_encode($order))}}" type="button" class="btn btn-danger m-auto">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                      @endforeach
              @endif

            </div>
        @endsection
