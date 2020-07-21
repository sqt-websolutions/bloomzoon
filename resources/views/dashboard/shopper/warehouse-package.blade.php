@extends('dashboard.shopper.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection
        @php($packaged_good = \App\PackagedGood::all())
        @section('content')
        <div class="col-md-10">
                <div class="card p-0">
                <div class="row col-md-12 ml-1" style="padding: 10px; text-align: right !important; border-bottom: 1px solid #f2f2f2;">
                    <div class="col-md-8 text-left ml-0">
                        <h2>Shopper's Packaged Goods</h2>
                    </div>
{{--                    <div class="col-md-4 m-auto"><a href="new-package" class="btn btn-danger text-right">New Package</a></div>--}}
                </div>

                @foreach($packaged_good as $packaged_good)
                        <div class="row col-md-12 mb-2 ml-1" style="border-bottom: 1px solid #f2f2f2; padding: 20px;">
                            <div class="col-md-5">
                                @foreach($packaged_good['order_id']['id']['order_details'] as $order_detail)
                                <img src="{{$order_detail->product_id->featured_img_url}}" width="80">
                                @endforeach

                            </div>
                            <div class="col-md-5">
                                <p><span style="font-weight: bolder">Buyer: {{$packaged_good['order_id']['user_id']['name']}}</span></p>
                                <p><span style="font-weight: bolder">Billing Address:  {{$packaged_good['order_id']['user_id']['billing_address']}}</span></p>
                                <p><span style="font-weight: bolder"> {{\Carbon\Carbon::parse($packaged_good['created_at'])->format('Y/m/d')}}</span></p>
                            </div>

                            <div class="col-md-2">
                                <a href="delivery-details?delivery_details={{base64_encode(json_encode($packaged_good))}}" style="border-radius: 35px; width: 120px;" type="button" class="btn btn-danger">Details</a><br><br>
                                <a href="delivery-merchant" style="border-radius: 35px; width: 120px;" type="button" class="btn btn-info">Status</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endsection
