

@extends('dashboard.professional-service.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection
@section('content')
    <div class="col-md-10">
        <div class="row col-md-12 text-center" style="background-color: #AF2E1D !important; padding: 10px; text-align: center !important; color:white">
            <h1 class="text-center m-auto pt-3 pb-3"><b>Your Wallet Account</b></h1>
        </div>
        <div class="row col-md-12" style="background-color: #2B2950 !important; padding: 20px;">

            <div class="col-md-3 text-center m-auto">
                <div class="p-5 m-5 m-auto" style="border-radius: 50%; border:solid #AF2E1D 10px; width: 200px; height: 200px; background-color: #5C5B78; color: white; vertical-align: middle;">
                    <div class="pt-5 m-auto">
                        <h1>{{count($user_metas->Order)}}</h1>
                    </div>
                </div>
                <h3 class="text-white">Total Orders</h3>
            </div>

            <div class="col-md-3 text-center m-auto">
                <a href="wallet-transaction-history">
                    <div class="p-5 m-5 m-auto" style="border-radius: 50%; border:solid #f2f2f2 10px; width: 200px; height: 200px; background-color: #5C5B78; color: white; vertical-align: middle;">
                        <div class="pt-5 m-auto">
                            <h1>{{$user_metas->Wallet ? $user_metas->Wallet[0]->available_balance: 0}}</h1>
                        </div>
                    </div>
                    <h3 class="text-white">Available Cash</h3>
                </a>
            </div>

            <div class="col-md-3 text-center m-auto">
                <div class="p-5 m-5 m-auto" style="border-radius: 50%; border:solid #AF2E1D 10px; width: 200px; height: 200px; background-color: #5C5B78; color: white; vertical-align: middle;">
                    <div class="pt-5 m-auto">
                        <h1>{{$user_metas->Wallet? $user_metas->Wallet[0]->net_balance: 0}}</h1>
                    </div>
                </div>
                <h3 class="text-white">Cleared Balance</h3>
            </div>

            <div class="col-md-3 text-center m-auto">
                <div class="p-5 m-5 m-auto" style="border-radius: 50%; border:solid #f2f2f2 10px; width: 200px; height: 200px; background-color: #5C5B78; color: white; vertical-align: middle;">
                    <div class="pt-5 m-auto">
                        <h1>{{count($user_metas->Sale)}}</h1>
                    </div>
                </div>
                <h3 class="text-white">Total Sales</h3>
            </div>

        </div>
        <div class="row col-md-12 mt-0 mb-5" style="background-color: #2B2950 !important; padding: 20px; margin-bottom: 100px !important;">
            <form class="col-md-6 offset-3 mb-5" name="paymentRequestForm">
                <h3 class="text-white text-center">Request Cash Out</h3>
                <div class="form-inline mt-5" >
                    <label for="" class="text-white col-md-3"><b>Amount:</b> </label>
                    <input type="text" name="amount" class="form-control col-md-8" placeholder="Enter amount...">
                </div>
                <div class="form-inline mt-5">
                    <label for="" class="text-white col-md-3"><b>Narration:</b> </label>
                    <input type="text" name="narration" class="form-control col-md-8" placeholder="">
                </div>
                <input type="hidden" name="seller_id" value="{{Auth::user()->id}}">
                <div class="text-center mt-5">
                    <button class="btn btn-danger btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        const options = {
            requestUrl: '/api/v1/crud/paymentRequests',
            cb: response => {
                if(response.success){
                    return swal({
                        title: 'Success!',
                        text: 'Payment Request sent successfully!',
                        icon: 'success',
                        button: 'Ok'
                    })
                }
                console.log(response);
                return swal({
                    title: 'Error!',
                    text: 'Error occurred sending payment request, please try again',
                    icon: 'error',
                    button: 'Try Again'
                })
            }
        };

        FormHandler('paymentRequestForm', options)


    </script>
@endpush
