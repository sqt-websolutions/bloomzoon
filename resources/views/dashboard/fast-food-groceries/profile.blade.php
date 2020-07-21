

@extends('dashboard.fast-food-groceries.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="row text-center" style="text-align: center !important; color:white; background-color: #fff;">
                    <div class="col-md-4 offset-4" style="background-color: #02499B !important; padding-top: 40px; padding-bottom: 40px; border-bottom-left-radius: 50%; border-bottom-right-radius: 50%;">
                        <i class="fa fa-user-circle fa-4x"></i>
                        <h1 class="text-center m-auto pt-3 pb-3"><b>Profile</b></h1>
                        <a href="#" class="btn btn-default">My Account Information</a>
                    </div>
                </div>
                <div class="row mb-3" style="background-color: #fff !important; padding: 20px;">
                    <div class="col-md-8 offset-2 mt-3 p-5" style="border-bottom: 2px solid #cccccc;">
                        <a href="account-information">
                            <div class="col-md-3">
                                <img src="../../../../public/fast_food_asset/img/profil.png" class="img img-circle m-auto" width="80" height="80">
                            </div>
                            <div class="col-md-6">
                                <span class="" style="color: #02499B  !important; font-size: 19px;">
                                    <b> Update Company Logo</b>
                                </span>
                            </div>
                            <div class="col-md-3 text-right">
                                <i class="fa fa-angle-right fa-4x"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8 offset-2 mt-3 p-5" style="border-bottom: 2px solid #cccccc;">
                        <a href="update-account-details">
                            <div class="col-md-3">
                                <i style="color: #02499B  !important;" class="fas fa-credit-card  fa-4x pl-3"></i>
                            </div>
                            <div class="col-md-6">
                                <span class="" style="color: #02499B  !important; font-size: 19px;">
                                   <b> Account Details</b>
                                </span>
                                <p style="font-size: 15px;">View and edit your details to receive payment</p>
                            </div>
                            <div class="col-md-3 text-right">
                                <i class="fa fa-angle-right fa-4x"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8 offset-2 mt-3 p-5" style="border-bottom: 2px solid #cccccc;">
                        <a href="user-subscription">
                            <div class="col-md-3">
                                <i style="color: #02499B  !important;" class="fas fa-money-check fa-4x pl-3"></i>
                            </div>
                            <div class="col-md-6">
                                <span class="" style="color: #02499B  !important; font-size: 19px;">
                                   <b>User Subscription</b>
                                </span>
                            </div>
                            <div class="col-md-3 text-right">
                                <i class="fa fa-angle-right fa-4x"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8 offset-2 mt-3 p-5" style="border-bottom: 2px solid #cccccc;">
                        <div class="col-md-3">
                            <i style="color: #02499B  !important;" class="fa fa-sign-out fa-4x pl-3"></i>
                        </div>
                        <div class="col-md-6">
                            <span class="" style="color: #02499B  !important; font-size: 19px;"><b> Sign Out</b></span>
                        </div>
                        <div class="col-md-3 text-right">
                            <i class="fa fa-angle-right fa-4x"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
