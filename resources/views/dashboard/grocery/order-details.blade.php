@extends('dashboard.grocery.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="row col-md-12" style="background-color: #fff !important; padding: 10px;">
                    <div class="mb-5" style="background-color: #02499B; width: 100%; padding: 10px 20px;">
                        <div class="col-md-12 text-center text-white">
                            <h1>
                                Order Details
                            </h1>
                        </div>
                    </div>
                    <div class="row col-md-5 m-auto text-center mt-5 mb-5" style="background-color: #fff; -moz-box-shadow: 0 0 3px #ccc; -webkit-box-shadow: 0 0 3px #ccc; box-shadow: 0 0 3px #ccc;">
                        <div class="col-md-4 text-right p-3">
                            <img src="{{asset($order->user_id->profile_pic_url)}}" class="img img-circle m-auto" width="80" height="80">
                        </div>
                        <div class="col-md-8 text-left">
                            <h3 style=" color: #02499B; ">BUYER ID: {{$order->user_id->id}}</h3>
                            <h3 style="color: #02499B; ">LOCATION: {{$order->user_id->billing_address || $order->user_id->address }}</h3>
                        </div>
                    </div>
                    <div class="row col-md-12 mt-5 mb-5 pb-5">
                        <table class="table text-center table-bordered mt-5" style="margin-bottom: 100px;">
                            <thead style="background-color:  #fff; font-size: 16px; vertical-align: middle;">
                                <tr style="height: 60px; text-align: center !important;" class="text-center">
                                    <th class="text-center" style="border: solid 1px #ddd;">PRODUCT ID</th>
                                    <th class="text-center" style="border: solid 1px #ddd;">ADDRESS</th>
                                    <th class="text-center" style="border: solid 1px #ddd;">BILLING ADDRESS</th>
                                    <th class="text-center" style="border: solid 1px #ddd;">QUANTITY </th>
                                    <th class="text-center" style="border: solid 1px #ddd;">AMOUNT</th>
                                    <th class="text-center" style="border: solid 1px #ddd;">METHOD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 60px;">
                                    @php
                                    $total_quantity = 0;
                                    @endphp
                                    @foreach($order->id->order_details as $order_detail)
                                        <td style="border: solid 1px #ddd;">{{$order_detail->product_id->id}}</td>
                                        <td style="border: solid 1px #ddd;">{{$order->user_id->address}}</td>
                                        <td style="border: solid 1px #ddd;">{{$order->user_id->billing_address}}</td>
                                        @php $total_quantity+=$order_detail->quantity @endphp
                                        @endforeach
                                        <td style="border: solid 1px #ddd;">{{$total_quantity}}</td>


                                        <td style="border: solid 1px #ddd;">{{number_format($order->total_amount)}}</td>
                                    <td style="border: solid 1px #ddd;">{{$order->payment_method === 1 ? 'Card': 'Cash' }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-md-4 m-auto mt-5 mb-5">
                            <div class="form-inline">
                                <label class="mr-5">Action: </label>
                                <select name="" id="" class="form-control col-md-8" style="border-radius: 0px; height: 40px;">
                                    <option value="">Sent on delivery</option>
                                    <option value="">On transit</option>
                                    <option value="">Delivered</option>
                                    <option value="">Out of stock</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endsection
