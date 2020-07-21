
        
@extends('dashboard.professional-service.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="row col-md-12 text-center" style="background-color: #AF2E1D !important; padding: 10px; text-align: center !important; color:white">
                    <h1 class="text-center m-auto pt-3 pb-3"><b>Add To Your Gallery</b></h1>
                </div>
                <div class="row mb-3" style="background-color: #fff !important; padding: 20px;">
                    <div class="col-md-8 p-5 offset-2">
                        <form>
                            <div class="form-group mt-5">
                                <label for="exampleFormControlInput1" style="font-size: 16px;;">Choose Image: </label>
                                <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Subject: " style="height: 40px; border-radius: 0;">
                            </div>
                            <div class="form-group mt-5">
                                <label for="exampleFormControlInput1" style="font-size: 16px;;">Description: </label>
                                <textarea class="form-control" rows="5" ></textarea>
                            </div>
                            <div class="form-group pull-right mt-5">
                                <a href="account-details " class="btn btn-danger ">Save</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @endsection
    