

@extends('dashboard.shopper.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

@section('content')
    <div class="col-md-10 ">
        <div class="p-0">
            <div class="row col-md-12 ml-1 mt-5" style="padding: 10px; text-align: right !important; border-bottom: 1px solid #f2f2f2;">
                <div class="col-md-12 text-center ml-0">
                    <h2>Update Account Details</h2>
                </div>

            </div>
            <div class="row mb-3" style="padding: 20px;">
                <div class="col-md-8 p-5 offset-2">
                    <form name="sellerAccountDetailsForm">
                        <div class="form-group text-center">
                            <img src="seller_asset/img/card.png" alt="">
                        </div>
                        <div class="form-group mb-5">
                            <label for="exampleFormControlInput1" style="font-size: 16px;;">Bank: </label>
                            <select name="cvv" id="" class="form-control" >
                                <option value="">Select bank</option>
                                <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                                <option value="First Bank Of Nigeria Plc">First Bank Of Nigeria Plc</option>
                                <option value="Ecobank Nigeria">Ecobank Nigeria</option>
                                <option value="Access Bank">Access Bank</option>
                                <option value="First City Monument Bank">First City Monument Bank</option>
                            </select>
                            <p>Current Bank: {{$user_metas->PaymentMethod[0]->cvv ?? ''}}</p>
                        </div>

                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="type" value="bank">

                        <div class="form-group mb-5">
                            <label for="card_name" style="font-size: 16px;">Account Name: </label>
                            <input type="text" id="card_name" value="{{$user_metas->PaymentMethod[0]->card_name ?? ''}}" name="card_name" class="form-control" placeholder="Pro seller">
                        </div>

                        @if(count($user_metas->PaymentMethod))
                            <input type="hidden" name="_method" value="put">
                        @endif

                        <div class="form-group mb-5">
                            <label for="card_number" style="font-size: 16px;">Account Number: </label>
                            <input type="text" id="card_number" maxlength="10" value="{{$user_metas->PaymentMethod[0]->card_number ?? ''}}" name="card_number" class="form-control" placeholder="xxxxxxxxxx">
                        </div>

                        <div class="form-group mb-5 text-center">
                            <button class="btn btn-danger btn-rounded btn-lg">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        FormHandler('sellerAccountDetailsForm', {
            requestUrl: "/api/v1/crud/paymentmethods/{{ $payment_method_exits = count($user_metas->PaymentMethod) ? Auth::user()->id : ''}}",
            cb: response => {
                if(response.success){
                    return swal({
                        title: 'Success!!',
                        text:  'Payment account details updated successfully',
                        icon: 'success'
                    })
                }
                console.log(response);
                return swal({
                    title: 'Failed!!',
                    text:   'There was an error updating your payment Account details, please try again.',
                    icon:   'error'
                })
            }
        })
    </script>

@endpush
