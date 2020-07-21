@extends('dashboard.fast-food-groceries.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection
@php
$food_catalogues = \App\FoodCatalogue::all();
@endphp

        @section('content')
        <div class="col-md-10">
                <div class="row col-md-12 text-center" style="background-color: #02499B !important; padding: 10px; text-align: center !important; color:white">
                    <h1 class="text-center m-auto pt-3 pb-3"><b>Create Menu</b></h1>
                </div>
                <div class="row mb-3" style="background-color: #fff !important; padding: 20px;">
                    <div class="col-md-6 card p-5 offset-3">
                        <form name="createMenuForm">
                            <div class="form-group mt-5">
                                <select name="catalogue_id" id="" class="form-control" style="height: 40px; border-radius: 0;">
                                    <option value="">Select Catalogue</option>
                                    @foreach($food_catalogues as $catalogue)
                                        <option value="{{$catalogue->id}}">{{$catalogue->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-5">
                                <label for="exampleFormControlInput1" style="font-size: 16px;;">Choose Image File: </label>
                                <input type="file" name="featured_img_url" class="form-control" style="height: 40px; border-radius: 0; ">
                            </div>
                            <div class="form-group mt-5">
                                <label for="description" style="font-size: 16px;;">Description: </label>
                                <textarea id="description" name="description" class="form-control" style="height: 40px; border-radius: 0; "></textarea>
                            </div>
                            <div class="form-inline mt-5 mb-4">
                                <label for="amount" style="font-size: 16px;" class="mr-5">Amount: </label>
                                <label for="currency"></label>
                                <select name="currency" id="currency" class="form-control " style="height: 40px; border-radius: 0; ">
                                    <option value="3">£</option>
                                    <option value="2">$</option>
                                    <option value="1">N</option>
                                </select>
                                <input type="text" id="amount" name="amount" class="form-control" style="height: 40px; border-radius: 0; ">
                            </div>
                            <div class="form-inline mt-5 mb-4">
                                <label for="discount" style="font-size: 16px;" class="mr-5">Discount: </label>
                                <input type="text" id="discount" class="form-control" style="height: 40px; border-radius: 0; ">
                            </div>
                            <div class="form-group mt-5 text-center">
                                <button class="btn btn-danger btn-lg">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @endsection

@push('scripts')
    <script>
        FormHandler('createMenuForm', {
            requestUrl: '/api/v1/crud/foodMenus',
            cb: response => {
                if(response.success){
                    return swal({
                        title: 'Success!!',
                        text:  'Food Menu Added successfully',
                        icon: 'success'
                    })
                }
                console.log(response);
                return swal({
                    title: 'Failed!!',
                    text:   'There was an adding the food menu, please try again.',
                    icon:   'error'
                })
            }
        })
    </script>

@endpush
