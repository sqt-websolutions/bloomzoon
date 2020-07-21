@extends('dashboard.seller.layout')
@section('page_title')
    Seller's Dashboard
    @endsection
@section('content')
    <div class="col-md-10">
        <br>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-4 p-5">
                    <a href="#">
                        <div class="card align-items-center" style="padding: 20px; border-radius: 20px; height: 150px;">
                            <img src="seller_asset/img/dashicon.png" alt="">
                            <h4 style="color: #BA220E;">{{count($user_metas->Sale)}}</h4>
                            <h5 style="color: #02499B;">Total Sales</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 p-5">
                    <a href="#">
                        <div class="card align-items-center" style="padding: 20px; border-radius: 20px; height: 150px;">
                            <img src="seller_asset/img/dashicon2.png" alt="">
                            <h4 style="color: #BA220E;">{{count($user_metas->PaymentRequest)}}</h4>
                            <h5 style="color: #02499B;"><a href="/wallet-transaction-history"> Withdrawals </a> </h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 p-5">
                    <a href="#">
                        <div class="card align-items-center" style="padding: 20px; border-radius: 20px; height: 150px;">
                            <img src="seller_asset/img/dashicon3.png" alt="">
                            <h4 style="color: #BA220E;">{{count($user_metas->Purchase)}}</h4>
                            <h5 style="color: #02499B;">Total Purchase</h5>

                        </div>
                    </a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 p-5">
                    <a href="#">
                        <div class="card align-items-center" style="padding: 20px; border-radius: 20px; height: 150px;">
                            <img src="seller_asset/img/dashicon4.png" alt="">
                            <h4 style="color: #BA220E;">0 </h4>
                            <h5 style="color: #02499B;">Total Profit</h5>

                        </div>
                    </a>
                </div>
                <div class="col-md-4 p-5">
                    <a href="#">
                        <div class="card align-items-center" style="padding: 20px; border-radius: 20px; height: 150px;">
                            <img src="seller_asset/img/dashicon5.png" alt="">

                            <h5 style="color: #02499B;">Shoppers</h5>

                        </div>
                    </a>
                </div>
                <div class="col-md-4 p-5">
                    <a href="#">
                        <div class="card align-items-center" style="padding: 20px; border-radius: 20px; height: 150px;">
                            <a href="/accountupgrade">
                            <img src="seller_asset/img/dashicon6.png" alt="">
                            <h5 style="color: #02499B;"> Upgrade account  </h5>
                            </a>

                        </div>
                    </a>
                </div>


            </div>

        </div>
        <br>
    </div>
@endsection
