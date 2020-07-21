
        
@extends('dashboard.networking-agent.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
            <div class="row col-md-12 text-center" style="border-bottom: 1px solid #f2f2f2;">
                    <h1 class="text-center m-auto pt-3 pb-3 "><b>Verification</b></h1>
                </div>
            <div class="row mt-5">
                <div class="col-md-8 offset-2">
                    <form>
                        <div class="form-group m-5">
                            <label for="account-number">Proof of Address</label>
                            <input id="account-number" class="form-control" type="file" placeholder="">
                        </div>
                        <div class="form-group m-5">
                            <label for="validid">Valid ID</label>
                            <input id="validid" class="form-control" type="file" placeholder="">
                        </div>
                        <div class="form-group m-5">
                            <label for="narration">Narration</label>
                            <textarea id="narration" class="form-control" type="text" rows="6" placeholder="Create an application to be verified"></textarea>
                        </div>
                        <div class="form-group justify-content-center text-center m-5">
                            <button class="btn" style="border: 1px solid white;width: 150px; background-color:#AF2E1D; border-radius: 20px; color: white;">SEND</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        @endsection
    