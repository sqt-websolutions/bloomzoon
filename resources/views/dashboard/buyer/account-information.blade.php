

@extends('dashboard.buyer.layout')
@section('page_title')
    Buyer's Dashboard
@endsection
        @section('content')
        <div class="col-md-10">
                <div class="row mb-3 " style="background-color: #000 !important; padding: 20px; ">
                    <div class="col-md-8 p-5 offset-2 " style="height: 800px;">
                        <form>
                            <div class="form-group text-center ">
                                <img src="{{asset($user_metas->User[0]->profile_pic_url)}}" class="img img-circle " width="120 " height="120 "><br>
                                <h3 class="text-white">{{$user_metas->User[0]->name}}</h3>
                            </div>
                            <h4 class="text-white text-center mt-5">{{$user_metas->User[0]->name}}</h4>
                            <h4 class="text-white text-center mt-5">{{$user_metas->User[0]->phone}}</h4>
                            <h4 class="text-white text-center mt-5">{{$user_metas->User[0]->email}}</h4>
                            <h4 class="text-white text-center mt-5">{{$user_metas->User[0]->last_login}}</h4>
                            <div class="text-center mt-5">
                                <a href="edit-profile" class="btn btn-danger btn-lg">Edit Profile</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @endsection
