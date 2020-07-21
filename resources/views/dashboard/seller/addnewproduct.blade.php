@extends('dashboard.seller.layout')
@section('page_title')
    Seller's Dashboard - Add New Product
@endsection

        @section('content')
        <div class="col-md-10">
            <div class="row mt-5 mb-5" style="border-bottom: solid 1px #f2f2f2;">
                    <div class="col-md-12 text-center">
                        <h1 class="pt-4">Add New Product</h1>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="row m-5">
                        <div class="col-md-12" style="background-color: white; border-radius: 10px; padding: 10px;">
                            <h3 class="text-center">Product Details</h3>
                        </div>
                    </div>

                    <form name="addProductForm" id="addProductForm">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        <div class="row m-5">
                            <div class="col-md-4" style="">
                                <label for="product_name">Product Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="product_name" style="border-radius: 20px; background-color: #EFEFEF;"  id="product_name" class="form-control" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="row m-5">
                            <div class="col-md-4" style="">
                                <label for="featured_img_url">Product Featured Image</label>
                            </div>
                            <div class="col-md-8">
                                <input name="featured_img_url" style="border-radius: 20px; background-color: #EFEFEF;"  id="featured_img_url" class="form-control" type="file" placeholder="">
                            </div>
                        </div>

{{--                        <div class="row m-5">--}}
{{--                            <div class="col-md-4" style="">--}}
{{--                                <label for="featured_img_url">Product Featured Image 1</label>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-8">--}}
{{--                                <input name="featured_img_url1" style="border-radius: 20px; background-color: #EFEFEF;"  id="featured_img_url1" class="form-control" type="file" placeholder="">--}}
{{--                            </div>--}}
{{--                        </div>--}}



                    <div class="row m-5">
                        <div class="col-md-4" style="">
                            <label for="subject">Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea id="product_description" name="product_description" class="form-control" rows="5" placeholder=""></textarea>
                        </div>
                    </div>


                            <div class="row m-5">
                                <div class="col-md-4" style="">
                                    <label for="product_color">Product Color</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="product_color" style="border-radius: 20px; background-color: #EFEFEF;"  id="product_color" class="form-control" >
                                        <option value="blue">Blue</option>
                                        <option value="red">Red</option>
                                        <option value="black">Black</option>
                                        <option value="gold">Gold</option>

                                    </select>
                                </div>
                            </div>

                            <div class="row m-5">
                                <div class="col-md-4" style="">
                                    <label for="currency">Product Category</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="category_id" style="border-radius: 20px; background-color: #EFEFEF;"  id="category_id" class="form-control" >
                                        @php
                                            $categories = \App\Category::all();
                                        @endphp

                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                    <div class="row m-5">
                        <div class="col-md-5" style="">
                           <div class="card" style="background-color: #02499B; padding: 5px;">
                               <h4 class="text-white text-center">Stock</h4>
                           </div>
                        </div>
                        <div class="col-md-7">
                           <div class="" style="padding: 5px;">
                               <input name="stock_level" type="text" class="form-control" placeholder="10" >
                           </div>
                        </div>
                    </div>
                    <div class="container" style="background-color: white;">
                        <div class="row m-5">
                            <div class="col-md-4" style="">
                                <label for="qty">Minimum Quantity</label>
                            </div>

                            <div class="col-md-8">
                                <input name="minimum_order_quantity" style="border-radius: 20px; background-color: #EFEFEF;"  id="qty" class="form-control" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row m-5">
                            <div class="col-md-4" style="">
                                <label for="weight">Weight</label>
                            </div>
                            <div class="col-md-8">
                                <input name="weight" style="border-radius: 20px; background-color: #EFEFEF;"  id="weight" class="form-control" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row m-5">
                            <div class="col-md-4" style="">
                                <label for="price">Price</label>
                            </div>
                            <div class="col-md-8">
                                <input name="product_price" style="border-radius: 20px; background-color: #EFEFEF;"  id="price" class="form-control" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row m-5">
                            <div class="col-md-4" style="">
                                <label for="currency">Currency</label>
                            </div>
                            <div class="col-md-8">
                                <select name="product_currency" style="border-radius: 20px; background-color: #EFEFEF;"  id="currency" class="form-control" type="text">
                                    <option value="1">Naira</option>
                                    <option value="2">Dollar</option>
                                    <option value="3">Pounds</option>
                                </select>
                            </div>
                        </div>
                        <div class="row m-5">
                            <div class="col-md-4" style="">
                                <label for="dis">Discount</label>
                            </div>
                            <div class="col-md-8">
                                <input name="product_sales_price" style="border-radius: 20px; background-color: #EFEFEF;"  id="dis" class="form-control" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row text-center m-5">
                            <button class="btn m-auto" style="border: 1px solid white;width: 150px; background-color:#AF2E1D; border-radius: 20px; color: white;">ADD PRODUCT</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection

@push('scripts')
    <script>
        FormHandler('addProductForm', {
            requestUrl: '/api/v1/crud/products',
            requestType: 'POST',
            cb: response => {
                if(response.success){
                    return swal({
                        title: 'Success!!',
                        text:  'Product Added successfully',
                        icon: 'success'
                    }).then( () => {
                        window.location.href = '/allproducts';
                    })
                }
                console.log(response);
                return swal({
                    title: 'Failed!!',
                    text:   'There was an error Adding the product, please try again.',
                    icon:   'error'
                })
            }
        })
    </script>

@endpush
