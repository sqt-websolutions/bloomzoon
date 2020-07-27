@extends('dashboard.grocery.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="row col-md-12 text-center" style="background-color: #02499B !important; padding: 10px; text-align: center !important; color:white">
                    <h1 class="text-center m-auto pt-3 pb-3"><b>Create Catalogue</b></h1>
                </div>
                <div class="row mb-3" style="background-color: #fff !important; padding: 20px;">
                    <div class="col-md-6 card p-5 offset-3">
                        <form name="foodCatalogue">

                            <div class="form-group">
                                <label for="featured_image_url" style="font-size: 16px;;"> Catalogue Image: </label>
                                <input type="file" name="featured_img_url" class="form-control" id="featured_image_url" style="height: 40px; border-radius: 0;">
                            </div>

                            <div class="form-group">
                                <label for="catalogue_name" style="font-size: 16px;;"> Catalogue Name: </label>
                                <input type="text" name="name" class="form-control" id="catalogue_name" placeholder="" style="height: 40px; border-radius: 0;">
                            </div>
                            <div class="form-group">
                                <label for="description" style="font-size: 16px;;">Description: </label>
                                <textarea name="description" id="description" cols="20" rows="7" class="form-control" style="border-radius: 0;" placeholder=""></textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @endsection
@push('scripts')
    <script>
        FormHandler('foodCatalogue', {
            requestUrl: '/api/v1/crud/foodCatalogues',
            cb: response => {
                if(response.success){
                    return swal({
                        title: 'Success!!',
                        text:  'Food Catalogue created successfully',
                        icon: 'success'
                    })
                }
                console.log(response);
                return swal({
                    title: 'Failed!!',
                    text:   'There was an error creating the catalogue, please try again.',
                    icon:   'error'
                })
            }
        })
    </script>

@endpush
