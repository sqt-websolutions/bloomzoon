

@extends('dashboard.shopper.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10" style="background-color: #000 !important;">
                <div class="row col-md-12 text-center" style="padding: 10px; text-align: center !important; color:white; border-bottom: 1px solid #333; ">
                    <h1 class="text-center m-auto pt-3 pb-3 "><b>Edit Contact</b></h1>
                </div>
                <div class="row mb-3 " style="background-color: #000 !important; padding: 20px; ">
                    <div class="col-md-8 p-5 offset-2 ">
                        @php($user = $user_metas->User[0])
                        <form name="shopperProfileUpdateForm">
                            <div class="form-group text-center">
                                <img src="{{$user->profile_pic_url}}" class="img img-circle " width="120 " height="120 "><br>
                                <h3 class="text-white">{{$user->name}}</h3>
                            </div>

                            <div class="form-group ">
                                <label for="name " style="font-size: 16px; color: #fff; font-weight: 500; ">Select Profile Pic</label><br>
                                <input type="file" name="profile_pic_url" class="form-control col-md-9 " id="name " style="height: 40px; ">
                            </div>

                            <input type="hidden" value="put" name="_method">

                            <div class="form-group ">
                                <label for="name " style="font-size: 16px; color: #fff; font-weight: 500; ">Name</label><br>
                                <input type="text" name="name" class="form-control col-md-9 " id="name " value="{{$user->name}}" style="height: 40px; ">
                            </div>


                            <div class="form-group ">
                                <label for="phone " style="font-size: 16px; color: #fff; font-weight: 500; ">Phone number</label><br>
                                <input type="text" name="phone" class="form-control col-md-9 " id="phone " value="{{$user->phone}}" style="height: 40px; ">
                            </div>
                            <div class="form-group ">
                                <label for="email" style="font-size: 16px; color: #fff; font-weight: 500; ">Email</label><br>
                                <input type="email" name="email" class="form-control col-md-9 " id="email" value="{{$user->email}}" style="height: 40px; ">
                            </div>
                            <div class="form-group ">
                                <label for="address" style="font-size: 16px; color: #fff; font-weight: 500; ">Address</label><br>
                                <input type="text" name="address" class="form-control col-md-9 " id="address" placeholder="{{$user->address}}" style="height: 40px; ">
                            </div>

                            <div class="form-group mt-5">
                                <button class="btn btn-danger btn-block btn-lg col-md-9">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @endsection

@push('scripts')
    <script>

        FormHandler('shopperProfileUpdateForm', {
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
