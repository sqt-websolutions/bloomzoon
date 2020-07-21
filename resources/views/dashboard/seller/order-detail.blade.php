@extends('dashboard.seller.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
            <div class="row col-md-12 text-center" style="border-bottom: 1px solid #f2f2f2;">
                    <h1 class="text-center m-auto pt-3 pb-3 "  style="color: #02499B;"><b>Orders Details</b></h1>
            </div>
            <div class="row col-md-12 mt-5 mb-5">
                <div class="col-md-3 text-right offset-2">
                    <img class="img" src="{{asset($order->user_id->profile_pic_url)}}" width="80" height="80" style="border-radius: 40px;" >
                </div>
                <div class="col-md-5 text-left">
                    <h4>BUYER ID:{{$order->user_id->id}}</h4>
                    <h4>LOCATION: {{$order->user_id->billing_address}}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="padding: 20px;">
{{--                    <h4 style="color: #02499B;" class="text-center">Order Details</h4>--}}
                    <div class="panel panel-white">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                    <thead style="background-color: #02499B; color: white;">
                                    <tr>
                                        <th>Product Id</th>
                                        <th>Address</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                  @foreach($order->id->order_details as $order_detail)
                                      <tr>
                                          <td>{{$order_detail->product_id->id}}</td>
                                          <td>{{$order->user_id->billing_address}}</td>
                                          <td>{{$order_detail->quantity}}</td>
                                          <td>{{$order_detail->product_id->product_price}}</td>
                                          <td>{{$order->payment_method === 1 ? 'Card': 'Cash'}}</td>
                                          <td>
                                              <select class="btn">
                                                  <option>Moved to warehouse</option>
                                                  <option>Out of stock</option>
                                                  <option>Packaged</option>
                                                  <option>Size not available</option>
                                                  <option>Delivered</option>
                                              </select>
                                          </td>
                                      </tr>
                                  @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
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



        </div>
        @endsection
