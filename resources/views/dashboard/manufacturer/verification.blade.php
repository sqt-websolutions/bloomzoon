@extends('dashboard.manufacturer.layout')
@section('page_title')
    Manufacturer's Dashboard - Verification
@endsection

        @section('content')
        <div class="col-md-10">
            <div class="row col-md-12 text-center" style="border-bottom: 1px solid #f2f2f2;">
                    <h1 class="text-center m-auto pt-3 pb-3 "><b>Verify Your Account</b></h1>
                </div>
            <div class="row mt-5">
                <div class="col-md-8 offset-2">
                    <form name="manufacturerVerificationForm">
                        <div class="form-group m-5">
                            <label for="account-number">Upload Company Registration Document</label>
                            <input name="company_reg_doc_url" id="account-number" class="form-control" type="file" placeholder="">
                        </div>
                        <div class="form-group m-5">
                            <label for="account-number">Company Registration ID</label>
                            <input name="company_reg_id" id="account-number" class="form-control" type="text" placeholder="">
                        </div>
                        <div class="form-group m-5">
                            <label for="account-number">Proof of Address</label>
                            <input name="prof_addr_doc_url" id="account-number" class="form-control" type="file" placeholder="">
                        </div>
                        <div class="form-group m-5">
                            <label for="validid">Valid ID</label>
                            <input name="valid_id_doc_url" id="validid" class="form-control" type="file" placeholder="">
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group m-5">
                            <label for="narration">Narration</label>
                            <textarea name="narration" id="narration" class="form-control" type="text" rows="6" placeholder="Create an application to be verified"></textarea>
                        </div>
                        <div class="form-group justify-content-center text-center m-5">
                            <button class="btn" style="border: 1px solid white;width: 150px; background-color:#AF2E1D; border-radius: 20px; color: white;">SEND</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        @endsection

@push('scripts')
    <script>
        FormHandler('manufacturerVerificationForm', {
            requestUrl:'/api/v1/crud/verifications',
            requestType: 'POST',
            cb: response => {
                if(response.success){
                    return swal({
                        title: 'Success!',
                        text: 'Verification Docs sent for reviews, admin will revert shortly',
                        icon: 'success',
                        button: 'Ok'
                    })
                }
                console.log(response);
                return swal({
                    title: 'Error!',
                    text: 'We had uploading your verification credentials',
                    icon: 'error',
                    button: 'Try Again'
                })
            }
        })
    </script>
@endpush
