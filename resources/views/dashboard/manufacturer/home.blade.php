@extends('dashboard.manufacturer.layout')
@section('page_title')
    Manufacturer - Home
@endsection
        @section('content')
        <div class="col-md-10" style="padding: 20px;">
            <br>
            <div class="container">
                <div class="row">
                   <div class="col-md-3">
                       <a href="wallet">
                       <div class="card align-items-center" style="padding: 20px; border-radius: 20px; height: 150px;">
                           <i class="fas fa-funnel-dollar fa-3x"></i>
                           <h5 style="color: #02499B;" class="mt-3">Transaction Amount</h5>
                            <h4 style="color: #BA220E;">
                                @php
                                $total_sales = 0;
                                foreach ($user_metas->Sale as $sale){
                                    $total_sales+= $sale->total_amount;
                                }
                                @endphp
                                {{$total_sales}}
                            </h4>

                       </div>
                       </a>
                   </div>
                   <div class="col-md-3">
                       <a href="orderrequest">
                      <div class="card align-items-center" style="padding: 20px; border-radius: 20px; height: 150px;">
                          <i class="fas fa-shopping-cart fa-3x"></i>
                          <h5 style="color: #02499B;" class="mt-3">Order Requests</h5>
                          <h4 style="color: #BA220E;">{{count($user_metas->Order)}}</h4>

                      </div>
                       </a>
                   </div>
                   <div class="col-md-3">
                       <a href="factory-view">
                       <div class="card align-items-center pt-5" style="background-image: url({{asset($user_metas->User[0]->factory_image_url)}}); border-radius: 20px; height: 150px;">
                           <span style="background-color: #AF2E1D; color: white; border-radius: 20px; position: absolute; bottom: 0;"> Factory View</span>
                       </div>
                       </a>
                   </div>
                   <div class="col-md-3">
                       <a href="#">
                      <div class="card align-items-center" style="padding: 20px; border-radius: 20px; height: 150px;">
                          <img src="manufacturer_asset/img/carticon.png" alt="">

                          <h5 style="color: #02499B;">Start Shopping</h5>

                      </div>
                       </a>
                   </div>


                </div>

                <br><br>

                <div class="container">
                    <br>
                    <h2 class="text-center">Chat History</h2>


                    @if(count($issues = $user_metas->Issue))
                        @foreach($issues as $issue)
                            <div class="row mb-3 p-2" style="border-radius: 5px; border: 1px solid lightgrey;">
                                <div class="col-md-2">
                                    <img src="manufacturer_asset/img/profil.png" class="img" style="border-radius: 50px" width="70" height="70" >
                                </div>
                                <div class="col-md-5">
                                    <h5 class="">Admin</h5>
                                    <br>
                                    <span style="background-color: #02499B; border-radius: 30px; padding: 10px; color: white;">{{$issue->message}}</span>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-3 text-right">
                                    <h5 class="">Action</h5>
                                    <br>
                                    <a href="message-chat" class="btn" style="background-color: #BA220E; border-radius: 50px; color: white;">View/reply</a>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="text-center"><button class="btn btn-danger btn-lg">View All</button></div>
                </div>

            </div>
            <br>
        </div>
        @endsection
