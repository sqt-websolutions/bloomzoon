@extends('dashboard.shopper.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="card p-0">
                <div class="row col-md-12 ml-1" style="padding: 10px; text-align: right !important; border-bottom: 1px solid #f2f2f2;">
                    <div class="col-md-8 text-left ml-0">
                        <h2><b>Store In Warehouse</b></h2>
                    </div>

                </div>
                <div class="row mb-3" style="padding: 20px;">
                    <div class="col-md-8 p-5 offset-2">
                        <form name="packageForm">
                            <div class="form-inline pt-4">
                                <label for="storage_location " class="col-md-4 " style="font-size: 16px;; ">Storage Location:  </label>
                                <input type="text" name="storage_location" id="storage_location" class="form-control col-md-8 " value=" " style="height: 40px; border-radius: 0; ">
                            </div>
                            <div class="form-inline pt-4">
                                <label for="description " class="col-md-4 " style="font-size: 16px;; ">Description:  </label>
                                <input type="text" id="description " class="form-control col-md-8" id="description" name="description" value="" style="height: 40px; border-radius: 0; ">
                            </div>
                            <div class="form-inline pt-4 ">
                                <label for="time_in " class="col-md-4 " style="font-size: 16px;; ">Time In:  </label>
                                <input type="text" id="time_in" name="time_in" class="form-control col-md- " value=" " style="height: 40px; border-radius: 0; ">
                            </div>
                            <div class="form-inline pt-4 ">
                                <label for="sender_name" class="col-md-4 " style="font-size: 16px;; ">Sender Name:  </label>
                                <input type="text" id="sender_name" class="form-control col-md-8 " value=" " style="height: 40px; border-radius: 0; ">
                                <input type="hidden" value="{{$order->id->order_id}}" name="order_id" />
                            </div>
                            <div class="form-group pt-4 text-center">
                                <label for="exampleFormControlInput1" class="col-md-4 mt-5" style=" font-size: 16px; ">Product Type: </label>
                                @foreach($order->id->order_details as $order_detail)
                                    <img src="{{asset($order_detail->product_id->featured_img_url)}}" width="40px " height="40px " class="col-md-2 img img-thumbnail " >
                                @endforeach
                            </div>
                            <div class="form-inline pt-2 ">
                                <label for="exampleFormControlInput1 " class="col-md-4 " style="font-size: 16px;; ">Buyer Name:  </label>
                                <input type="text" class="form-control col-md-8" disabled value="{{$order->user_id->name}}" style="height: 40px; border-radius: 0; ">
                            </div>
                            <div class="form-inline pt-2 ">
                                <label for="exampleFormControlInput1 " class="col-md-4 " style="font-size: 16px;; ">Billing Address:  </label>
                                <input type="text" class="form-control col-md-8" disabled value="{{$order->user_id->billing_address}}" style="height: 40px; border-radius: 0; ">
                            </div>
                            <div class="form-inline pt-2 ">
                                <label for="exampleFormControlInput1 " class="col-md-4 " style="font-size: 16px;; ">Buyer No:  </label>
                                <input type="text"  class="form-control col-md-8" disabled value="{{$order->user_id->phone}}" style="height: 40px; border-radius: 0; ">
                            </div>
                            <div class="form-inline pt-2 ">
                                <label for="exampleFormControlInput1 " class="col-md-4 " style="font-size: 16px;; ">Amount:</label>
                                <input type="text " class="form-control col-md-8" disabled value="{{number_format($order->total_amount)}}" style="height: 40px; border-radius: 0; ">
                            </div>
                            <div class="form-inline pt-2 ">
                                <label for="exampleFormControlInput1 " class="col-md-4"  style="font-size: 16px;; ">Delivery Fee:  </label>
                                <input type="text " class="form-control col-md-8" disabled value="{{number_format($order->delivery_fee)}}" style="height: 40px; border-radius: 0; ">
                            </div>

                            <div class="form-group m-auto text-right" style="margin-top: 50px !important;">
                                <button class="btn btn-primary ">Store</button>
                            </div>
                        </form>
                    </div>

                </div>
                </div>
            </div>
        @endsection

@push('scripts')
    <script>
        FormHandler('packageForm', {
            requestUrl: '/api/v1/crud/packagedGoods',
            cb: response => {
                if(response.success){
                    return swal({
                        title: 'Success!!',
                        text:  'Storing in warehouse successful',
                        icon: 'success'
                    }).then( () => {
                        window.location.href = '/scan-code?ordId={{base64_encode(json_encode($order))}}';
                    })
                }
                console.log(response);
                return swal({
                    title: 'Failed!!',
                    text:   'There was an storing in warehouse, please try again.',
                    icon:   'error'
                })
            }
        })
    </script>

@endpush
