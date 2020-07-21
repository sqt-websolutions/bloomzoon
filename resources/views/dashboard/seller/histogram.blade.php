@extends('dashboard.seller.layout')
@section('page_title')
    Seller's Dashboard - Orders
@endsection
        @section('content')
        <div class="col-md-10">
            <div class="row col-md-12 text-center" style="border-bottom: 1px solid #f2f2f2;">
                    <h1 class="text-center m-auto pt-3 pb-3 "><b>Orders</b></h1>
                </div>
            @if(count($orders = $user_metas->Order))
            <div class="panel panel-white">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead style="background-color: #02499B; color: white;">
                            <tr>
                                <th>Order Id</th>
                                <th>Price</th>
                                <th>Items</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                             @foreach($orders as $order)
                            <tr>
                                <td>Order {{$order->id->order_id}}</td>
                                <td>{{$order->total_amount}}</td>
                                @php
                                $products_map = [];

                                foreach ($order->id->order_details as $order_detail){
                                    if(empty($products_map[$key = $order_detail->product_id->product_name])){
                                        $products_map[$key] = 0;
                                    }
                                    ++$products_map[$key];
                                }
                                @endphp

                                <td>

                                    @foreach($products_map as $product_name => $product_count)
                                        {{$product_count}} {{$product_name}},
                                    @endforeach
                                </td>
                                <td>{{\Illuminate\Support\Carbon::parse($order->created_at)->format('d-m-y g:i A')}}</td>
                                <td><span style="padding: 5px; border-radius: 10px;" class="badge-danger">{{$order->status === 1 ? 'New': 'Completed'}}</span></td>
                                <td><a href="order-detail?order={{base64_encode(json_encode($order))}}" style="background-color: #E5E5E5; color: black;" class="btn">Details</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br><br><br>
            <nav>
                <ul class="pagination d-flex justify-content-center flex-wrap pagination-rounded-flat pagination-success">
                    <li class="page-item"><a class="page-link" href="#" data-abc="true"><i class="fa fa-angle-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#" data-abc="true">1</a></li>
                    <li class="page-item"><a class="page-link" href="#" data-abc="true">2</a></li>
                    <li class="page-item"><a class="page-link" href="#" data-abc="true">3</a></li>
                    <li class="page-item"><a class="page-link" href="#" data-abc="true">4</a></li>
                    <li class="page-item"><a class="page-link" href="#" data-abc="true"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </nav>
            @else
                <h3>You have no orders yet</h3>
            @endif

        </div>
        @endsection
