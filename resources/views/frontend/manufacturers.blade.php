@extends('layouts.front')
@section('page_title')
   Manufacturers
@endsection
@section('content')
    <div class="container text-center pt-5">

        @php
            $manufacturers = \App\User::where('account_type', '=', 'manufacturer')->get();

        @endphp

        <h4 class="text-left">MANUFACTURERS</h4>

        <div class="row pt-4">

            @foreach($manufacturers as $manufacturer)
                <div class="col-md-3">
                    <div class="card" style=" padding: 20px; background: #FFFFFF; box-shadow: -1px 13px 20px #F0F2F4; border-radius: 5px; width: 290px; height: 500px;">

                        <div class="card-up white lighten-1"></div>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Avatar -->
                                <div class="avatar mx-auto white">
                                    <img src="{{asset($manufacturer->factory_image_url)}}" class="rounded-circle" alt="" width="200" height="100">
                                </div>
                                <!-- Content -->

                            </div>

                        </div>

                        <div class="card-body">

                            <div class="text-center">
                                <h3 class="testimonial_heading font-weight-bold">{{$manufacturer->company_name}}</h3>
                                <p class="testimonial_heading2">{{$manufacturer->address}}</p>
                                <a href="manufacturer-details?manufacturer={{base64_encode(json_encode($manufacturer))}}" class="btn btn-danger btn-sm mb-2">View dealer</a>
                                <a href="#" class="btn btn-outline-primary btn-sm">Message dealer</a>

                            </div>
                            <br>
                            <!-- Quotation -->
                            <p class="testimonial_text">{{substr($manufacturer->factory_description, 0, 136)}}</p>
                        </div>

                    </div>
                </div>
                @endforeach
        </div>
    </div>
@endsection
