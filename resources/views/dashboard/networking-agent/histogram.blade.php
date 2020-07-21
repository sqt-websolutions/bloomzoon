

@extends('dashboard.networking-agent.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
            <div class="row col-md-12 text-center mt-5 mb-5" style="padding: 10px; text-align: center !important; border-bottom: 1px solid #f2f2f2;">
                <h1 class="text-center m-auto pt-3 pb-3 "><b>Your Histogram History</b></h1>
            </div>
{{--            <div class="row mt-5 mb-5" style="border-bottom: #f2f2f2 solid 1px;">--}}
{{--                <div class="col-md-12">--}}
{{--                    <h5 class="p-3">STAGE 1</h5>--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 25px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;">Paul214</button>--}}
{{--                    <p class="text-center"><strong>Active</strong></p>--}}
{{--                    <hr style="background-color: #1DAF3F; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 25px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;">Paul214</button>--}}
{{--                    <p class="text-center"><strong>Active</strong></p>--}}
{{--                    <hr style="background-color: #1DAF3F; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 25px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;">Paul214</button>--}}
{{--                    <p class="text-center"><strong>Active</strong></p>--}}
{{--                    <hr style="background-color: #1DAF3F; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 25px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;">Paul214</button>--}}
{{--                    <p class="text-center"><strong>Active</strong></p>--}}
{{--                    <hr style="background-color: #1DAF3F; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 25px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;">Paul214</button>--}}
{{--                    <p class="text-center"><strong>Active</strong></p>--}}
{{--                    <hr style="background-color: #1DAF3F; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 25px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;">Paul214</button>--}}
{{--                    <p class="text-center"><strong>Active</strong></p>--}}
{{--                    <hr style="background-color: #1DAF3F; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="row mt-5 mb-5" style="border-bottom: #f2f2f2 solid 1px;">--}}
{{--                <div class="col-md-12">--}}
{{--                    <h5 class="p-3">STAGE 2</h5>--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 35px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;">Paul214</button>--}}
{{--                    <p class="text-center"><strong>Active</strong></p>--}}
{{--                    <hr style="background-color: #1DAF3F; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 35px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;">Paul214</button>--}}
{{--                    <p class="text-center"><strong>Active</strong></p>--}}
{{--                    <hr style="background-color: #1DAF3F; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 35px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;">Paul214</button>--}}
{{--                    <p class="text-center"><strong>Active</strong></p>--}}
{{--                    <hr style="background-color: #1DAF3F; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 35px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;"></button>--}}
{{--                    <p class="text-center"><strong></strong></p>--}}
{{--                    <br>--}}
{{--                    <hr style="background-color: gray; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 35px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;"></button>--}}
{{--                    <p class="text-center"><strong></strong></p>--}}
{{--                    <br>--}}
{{--                    <hr style="background-color: gray; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <a href="createseller" class="btn" style="background: #02499B; color: white; border-radius: 30px;">Add Seller</a>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="row mt-5 mb-5" style="border-bottom: #f2f2f2 solid 1px;">--}}
{{--                <div class="col-md-12">--}}
{{--                    <h5 class="p-3">STAGE 3</h5>--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <img style="margin-left: 35px;" class="text-center" src="../../../../public/agent_asset/img/human.png"><br>--}}
{{--                    <button class="btn" style="font-size: 10px; background: #AF2E1D; color: white; border-radius: 30px;"></button>--}}
{{--                    <p class="text-center"><strong></strong></p>--}}
{{--                    <br>--}}
{{--                    <hr style="background-color: gray; height: 5px; margin-top: -10px;">--}}
{{--                </div>--}}
{{--                <div class="col-md-4">--}}
{{--                    <a href="createseller" class="btn" style="background: #02499B; color: white; border-radius: 30px;">Add Seller</a>--}}
{{--                    <p style="color: #02499B;">(Needs 20 sellers to--}}
{{--                        complete this stage)</p>--}}
{{--                </div>--}}

{{--            </div>--}}
        </div>
        @endsection
