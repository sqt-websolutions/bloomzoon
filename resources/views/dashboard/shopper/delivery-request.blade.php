@extends('dashboard.shopper.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10 mb-5">
                <div class="card p-0">
                    <div class="row col-md-12 ml-1" style="padding: 10px; text-align: right !important; border-bottom: 1px solid #f2f2f2;">
                        <div class="col-md-12 text-center ml-0">
                            <h1 style="color: #02499B;"><b>Delivery Request</b></h1>
                        </div>

                    </div>
                    @php($orders = \App\Order::all())
                    <div class="row pl-5 pr-5 pt-5 pb-2">
                      @foreach($orders as $order)
                            <div class="col-md-4 p-3 mb-4">
                                <div class="card p-0" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1); border-radius: 0px !important;">
                                    <div class="badge pull-right text-white" style="top: 0; right: 0; position: absolute; background-color: green;">{{$order->status}}</div>
                                    <div class="row p-2">
                                        <div class="col-md-5">
                                            @foreach($order['id']['order_details'] as $order_detail)
                                            <img src="{{$order_detail->product_id->featured_img_url}}" class="img" width="60" alt="">
                                           @endforeach
                                        </div>
                                        <div class="col-md-7">
                                            @foreach($order['id']['order_details'] as $order_detail)
                                            <p><span style="font-weight: bolder">Seller:</span><span class="pl-5">{{$order_detail['product_id']['user_id']['name'] }}</span></p>
                                            @endforeach
                                            <p><span style="font-weight: bolder">Buyer:</span><span class="pl-5">{{$order['user_id']['name']}}</span></p>
                                            <p><span style="font-weight: bolder">Billing Address:</span><br><span>{{$order['user_id']['billing_address']}}</span></p>
                                            <p><span style="font-weight: bolder">STATE:</span><span class="pl-5">{{$order['user_id']['city']}}</span></p>
                                        </div>
                                        <div class="col-md-12 text-center mt-2">
                                            <a href="delivery-details?order={{base64_encode(json_encode($order))}}" type="button" class="btn btn-danger m-auto">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach

                    </div>
                    <div class="row text-center p-4">
                         <ul class="pagination">
                          <li><a href="#">1</a></li>
                          <li class="active"><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                         </ul>
                    </div>

                </div>
            </div>
        @endsection
