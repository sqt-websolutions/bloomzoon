

@extends('dashboard.fast-food-groceries.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="row col-md-12 text-center" style="background-color: #AF2E1D !important; padding: 10px; text-align: center !important; color:white">
                    <h1 class="text-center m-auto pt-3 pb-3"><b>Update Account Details</b></h1>
                </div>
                <div class="row mb-3" style="background-color: #fff !important; padding: 20px;">
                    <div class="col-md-8 p-5 offset-2">
                        <form>
                            <div class="form-group text-center">
                                <img src="../../../../public/fast_food_asset/img/card.png" alt="">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1" style="font-size: 16px;;">Bank: </label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select bank</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1" style="font-size: 16px;;">Other Bank: </label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select bank</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" style="font-size: 16px;;">Account Number: </label>
                                <input type="text" class="form-control" placeholder="0000000000">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" style="font-size: 16px;;">Mobile Number: </label>
                                <input type="text" class="form-control" placeholder="0000000000">
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-danger btn-rounded btn-lg">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
