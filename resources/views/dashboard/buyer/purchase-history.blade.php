@extends('dashboard.buyer.layout')
@section('page_title')
    Buyer's Dashboard
@endsection
<?php 
    $orders = \App\Order::where('buyer_id',Auth::user()->id)->get();
   
?>
        @section('content')
        <div class="col-md-10">

                <div class="p-0">
                    <div class="row col-md-12 ml-1" style="padding: 10px; text-align: right !important; border-bottom: 1px solid #f2f2f2;">
                        <div class="col-md-12 text-center ml-0">
                            <h2>Purchase History</h2>
                            
                        </div>
                    </div>

                @if(count($orders))
                        @foreach($orders as $purchase)
                            <div class="row col-md-12 mb-2 ml-1" style="border-bottom: 1px solid #f2f2f2; padding: 20px;">
                                <div class="col-md-5">
                                    {{ $purchase}}
                                  
                                        <img src="{{asset($order_detail['product_id']->featured_img_url)}}" width="80" alt="{{$order_detail->product_id->featured_img_url}}">
                                       
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <p><span style="font-weight: bolder"></span>Product Details: @foreach($purchase as $p) {{$p->product_id->product_name}} ({{$p->quantity}} piece(s))@enforeach</p>
                                        <p><span style="font-weight: bolder">Billing Address: {{$purchase[0]->buyer_id->billing_address}}</span></p>
                                        <p><span style="font-weight: bolder">Purchase Date: {{$purchase[0]->created_at}}</span></p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-2">
                                    <a href="track-order" style="border-radius: 25px;" type="button" class="btn btn-danger btn-sm mb-2">Track Order</a>
                                    <a href="view-order-details?order={{base64_encode(json_encode($purchase))}}" style="border-radius: 25px;" type="button" class="btn btn-danger btn-sm mb-2">View Order Details</a>
                                    <a href="delivery-status" style="border-radius: 25px;" type="button" class="btn btn-info btn-sm">Delivery Status</a>
                                </div>

                            </div>
                            @endforeach
                            <div class="row col-md-12 text-center m-auto">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        @else
                    @endif


                </div>
            </div>
        @endsection
