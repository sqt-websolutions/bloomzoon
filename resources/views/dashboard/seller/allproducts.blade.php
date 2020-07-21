@extends('dashboard.seller.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
            <div class="row mt-5 mb-5" style="border-bottom: solid 1px #f2f2f2;">
                    <div class="col-md-9">
                        <h1 class="pt-4">My Product Catalogue</h1>
                    </div>
                    <div class="col-md-3 mt-4 text-right">
                        <a href="addnewproduct" class="btn btn-secondary">Add New Product</a>
                    </div>
                </div>

            <div class="row">

                @if(count($products = $user_metas->Product))
                    @foreach($products as $product)
                <div class="col-md-6">
                    <div class="row" style="border: 1px solid #f2f2f2; border-radius: 5px; margin: 10px;">
                    <div class="col-md-3 m-auto">
                        <img src="{{asset($product->featured_img_url)}}" width="100" height="auto">
                    </div>

                    <div class="col-md-4 text-center p-4">
                        <p><b>Product Name:</b>  {{$product->product_name}}</p>
                        <p><b>Product Price:</b>  {{$product->product_price}}</p>
                        <p><b>Stock Level :</b>  {{$product->stock_level}} </p>

                    </div>
                    <div class="col-md-4 text-right m-auto">
                        <p style="color: grey">13/04/2020</p>
                        <a href="product-details?product={{base64_encode(json_encode($product))}}" target="_blank" class="btn" style="background-color: #AF2E1D; border-radius: 5px; width: 130px; color: white;margin-top:2px">View Details</a>
                        <a href="edit-product?product={{base64_encode(json_encode($product))}}" target="_blank" class="btn" style="background-color: #AF2E1D; border-radius: 5px; width: 130px; color: white; margin-top:2px">Edit</a>
                        <a target="_blank" class="btn" style="background-color: #AF2E1D; border-radius: 5px; width: 130px; color: white; margin-top:2px">Delete</a>


                    </div>
                    </div>
                </div>
                    @endforeach
                    @else
                    <h3> You have not added any product</h3>
                @endif

            </div>


        </div>
        @endsection
