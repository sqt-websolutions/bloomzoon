@extends('dashboard.manufacturer.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

@section('content')
    <div class="col-md-10" style="padding: 20px;">
        <div class="card" style="background-color: #707070; border-radius: 20px; padding: 40px;">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2 text-center">
                    <img src="agent_asset/img/percent.png" width="80" height="80">
                    <br><br>
                    <p class="text-white" style="margin-left: 15px; margin-top: 10px;">Total Sales</p>
                </div>
                <div class="col-md-2 text-center">
                    <img src="agent_asset/img/chart.png" width="80" height="80">
                    <br><br>
                    <p class="text-white">Active Sales</p>
                </div>
                <div class="col-md-2 text-center">
                    <img src="agent_asset/img/stage.png" width="80" height="80">
                    <br><br>
                    <p class="text-white">Stage</p>
                </div>
                <div class="col-md-2 text-center">
                    <img src="agent_asset/img/sigma.png" width="80" height="80">
                    <br>
                    <br>
                    <p class="text-white">{{count($user_metas->Wallet) ? count($user_metas->Wallet) [0]->available_balance: 0}}</p>
                    <p class="text-white">Total Earned</p>
                </div>
                <div class="col-md-2 text-center">
                    <img style="margin-left: 25px;" src="agent_asset/img/net.png" width="80" height="80">
                    <br><br>
                    <p style="margin-left: 25px;" class="text-white">{{count($user_metas->Wallet) ? count($user_metas->Wallet) [0]->net_balance: 0}}</p>
                    <p style="margin-left: 15px;" class="text-white">Net Balance</p>
                </div>
            </div>
        </div>

        <div class="container" style="width: 500px;">
            <h4 class=" text-center mt-5 mb-5">Request Cash-out</h4>
            <form name="paymentRequestForm">
                <div class="form-group mt-5">
                    <label class="" for="account-number">Amount</label>
                    <input id="account-number" name="amount" class="form-control" type="text" placeholder="Enter Amount">
                </div>
                <div class="form-group mt-5">
                    <label class="" for="service">Narration</label>
                    <input id="service" name="narration" class="form-control" type="text" placeholder="">
                </div>

                <input type="hidden" value="{{Auth::user()->id}}" name="seller_id">

                <div class="form-group mt-5 text-center">
                    <button class="btn" style="border: 1px solid white;  width: 150px; background-color:#02499B; border-radius: 20px; color: white;">SEND</button>
                </div>

            </form>
        </div>
        <br><br>

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
