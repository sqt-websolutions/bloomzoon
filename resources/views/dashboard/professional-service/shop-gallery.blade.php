

@extends('dashboard.professional-service.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="row col-md-12 text-center" style="background-color: #AF2E1D !important; padding: 10px; text-align: center !important; color:white">
                    <h1 class="text-center m-auto pt-3 pb-3"><b>How User Sees You</b></h1>
                    <a href="add-shop-gallery" style="border: 1px #fff solid; color: #fff; padding: 10px; border-radius: 20px; height: 40px; margin-top: 10px;">Add To Shop Gallery</a>
                </div>

                <div class="row col-md-12 mr-2 pt-5" style="background-color: #fff">
                    <form class="col-md-6 offset-3" name="updateProfile">
                        <ul class="list-group" style="border: none !important;">
                            <li class="list-group-item" style="border: none !important;">

                                <label>SHOP NAME</label>
                                <input class="form-control" name="company_name" value="{{$user_metas->User[0]->company_name}}" style="font-size: 14px; background-color:#fff; color: #000;" />
                                <input type="hidden" name="_method" value="put" />
                            </li>
                            <li class="list-group-item" style="border: none !important;">
                                <label>LOCATION</label>
                                <input name="phone" class="form-control" value="{{$user_metas->User[0]->phone}}" style="font-size: 14px; background-color:#fff; color: #000;" />
                            </li>
                            <li class="list-group-item" style="border: none !important;">
                                <label>SERVICE</label>
                                <textarea name="factory_description" class="form-control" style="font-size: 14px; background-color:#fff; color: #000;">{{$user_metas->User[0]->factory_description}}</textarea>
                            </li>
                            <li class="list-group-item" style="border: none !important;">
                                <label>CONTACT</label>
                                <input class="form-control" name="phone" value="{{$user_metas->User[0]->phone}}" style="font-size: 14px; background-color:#fff; color: #000;" />
                            </li>
                            <div class="m-5 text-center">
                                <button class="btn btn-danger btn-pill">SAVE</button>
                            </div>
                        </ul>
                    </form>
                    <div class="col-md-12">
                        <div class="row mt-5 mb-5" style="background-color: #02499B;">
                            <h1 style=" color: #fff; margin: 0px auto;" class="p-3">
                                <strong>Shop Picture</strong>
                            </h1>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-3">
                                <div class="card text-center" style="color: #02499B; background-color: white; padding-right: 0px !important; ">
                                    <img src="../../../../public/prof_asset/img/a.jpg" alt=" " height="200">
                                    <h3>Messurement</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center" style="color: #02499B; background-color: white; padding-right: 0px !important;">
                                    <img src="../../../../public/prof_asset/img/a.jpg" alt=" " height="200">
                                    <h3>Gown for Wedding</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center" style="color: #02499B; background-color: white; padding-right: 0px !important;">
                                    <img src="../../../../public/prof_asset/img/a.jpg" alt=" " height="200">
                                    <h3>AY Academy</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center" style="color: #02499B; background-color: white; padding-right: 0px !important;">
                                    <img src="../../../../public/prof_asset/img/a.jpg" alt=" " height="200">
                                    <h3>Our Work</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endsection
@push('scripts')
    <script>
        FormHandler('updateProfile', {
            requestUrl: '/api/v1/crud/users/{{Auth::user()->id}}',
            cb: response => {
                if(response.success){
                    return swal({
                        title: 'Success!!',
                        text:  'Profile Updated successfully',
                        icon: 'success'
                    })
                }
                console.log(response);
                return swal({
                    title: 'Failed!!',
                    text:   'There was an error updating your profile, please try again.',
                    icon:   'error'
                })
            }
        })
    </script>

@endpush

