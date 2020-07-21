

@extends('dashboard.shopper.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card text-center " style="color: #02499B; background-color: #5C5B78; padding: 60px; ">
                            <h1 class="text-white"><b>Update Delivery Status</b></h1>
                        </div>
                    </div>
                </div>
                <div class="row" style="height: 250px;">
                    <div class="col-md-4 mb-4">
                        <img src="shopper/img/g1.jpeg" alt="Snow" style="width:100%; height: 100%;">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="shopper/img/g2.jpg" alt="Forest" style="width:100%; height: 100%;">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="shopper/img/g3.jpg" alt="Mountains" style="width:100%; height: 100%;">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="shopper/img/shoe.png" alt="Snow" style="width:100%; height: 250px;">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="shopper/img/logitech.png" alt="Forest" style="width:100%; height: 250px;">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="shopper/img/bag.png" alt="Mountains" style="width:100%; height: 250px;">
                    </div>
                    <div class="col-md-6 form-group offset-3 mt-5">
                        <select name="delivery_status" id="delivery_status" class="form-control form-group-lg" style="height: 50px; color: white; background-color: #2B2950;">
                            <option value="Delivery Action">Delivery Action</option>
                            <option value="Processing">Processing</option>
                            <option value="On Transit">On Transit</option>
                            <option value="Delivered to Client">Delivered to Client</option>
                            <option value="Await Balance Payment">Await Balance Payment</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                </div>

            </div>
        @endsection
