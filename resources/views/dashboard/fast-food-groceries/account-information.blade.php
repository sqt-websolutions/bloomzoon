

@extends('dashboard.fast-food-groceries.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="row text-center" style="text-align: center !important; color:white; background-color: #fff;">
                    <div class="col-md-12" style="background-color: #02499B !important; padding-top: 40px; padding-bottom: 40px; border-bottom-left-radius: 75%; border-bottom-right-radius: 75%;">
                        <img src="../../../../public/fast_food_asset/img/logo.png" class="img" alt=""><br><br>
                        <a href="#" class="btn btn-default btn-sm">Upload Logo</a>
                        <div class="pt-5" style="color: #fff  !important; font-size: 19px;">
                            <b> KFC Restaurant</b>
                            <p>08037483748</p>
                            <p>sqt@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 text-center" style="background-color: #fff !important; padding: 20px;">
                    <div class="col-md-12 mt-3 p-5" style="border-bottom: 2px solid #cccccc;">
                        <a href="#">
                            <span class="" style="color: #02499B  !important; font-size: 19px;">
                                <b> Services: </b>
                            </span>
                            <p>Intercontinental &amp; Local Dishes</p>
                        </a>
                    </div>
                    <div class="col-md-12 mt-3 p-5">
                        <a href="#">
                            <span class="" style="color: #02499B  !important; font-size: 19px;">
                                <b> Address: </b>
                            </span>
                            <p>Wuse II, Abuja</p>
                        </a>
                    </div>
                    <div class="col-md-12 mt-3 p-5">
                        <a href="edit-profile" class="btn btn-primary btn-lg">Edit Profile</a>
                    </div>
                </div>
            </div>
        @endsection
