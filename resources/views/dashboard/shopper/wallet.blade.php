@extends('dashboard.shopper.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

@php($payment_requests = \App\PaymentRequest::all())
        @section('content')
        <div class="col-md-10">
                <div class="row col-md-12 text-center" style="background-color: #AF2E1D !important; padding: 10px; text-align: center !important; color:white">
                    <h1 class="text-center m-auto pt-3 pb-3 text-white"><b>Payment Request</b></h1>
                </div>
                <div class="row col-md-12 mb-3" style="background-color: #2B2950 !important; padding: 20px;">
                    @foreach($payment_requests as $payment_request)
                        <div class="mb-2 p-4" style="border-radius: 0; background-color: #5C5B78; width: 100%; color: white;">
                            <div class="col-md-4">
                                <p class="text-white">{{\Carbon\Carbon::parse($payment_request->seller_id[0]->created_at)->format('Y/m/d')}}</p>
                                <img src="{{$payment_request->seller_id[0]->profile_pic_url}}" class="img img-circle" width="70" height="70">
                            </div>
                            <div class="col-md-5">
                                <p class="p-0 mb-3" style="font-size: 12px;"><span>SELLER ID: </span></p>
                                <p class="p-0 mb-3" style="font-size: 12px;"><span>REQUEST: </span></p>
                                <p class="p-0 mb-3" style="font-size: 12px;"><span>AMOUNT: </span></p>
                                <a href="request-details?request={{base64_encode(json_encode($payment_request))}}" class="btn btn-danger btn-sm">Proceed to Payment</a>
                            </div>
                            <div class="col-md-3">
                                <p class="p-0 mb-3"><span>{{$payment_request->seller_id[0]->id}}</span></p>
                                <p class="p-0 mb-3"><span>{{$payment_request->narration}}</span></p>
                                <p class="p-0 mb-3"><span>{{number_format($payment_request->amount)}}</span></p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endsection
