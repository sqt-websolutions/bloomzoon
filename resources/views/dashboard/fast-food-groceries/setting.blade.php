

@extends('dashboard.fast-food-groceries.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="row text-center" style="background-color: #2B2950 !important; padding: 10px; text-align: center !important; color:white">
                    <div class="col-md-12">
                        <h1 class="text-center m-auto pt-3 pb-3"><b>Update Your Account</b></h1>
                    </div>
                </div>
                <form class="row mb-3" style="background-color: #fff !important; padding: 20px;" name="vendorUpdateForm">
                    @php $vendorDetail = $user_metas->Vendor ? $user_metas->Vendor[0]: new stdClass() @endphp
                    <div class="col-md-12 mt-3 p-5" style="border-bottom: 2px solid #cccccc;">
                        <div class="col-md-4 p-5">
                            <span class="m-auto" style="color: #02499B  !important; font-size: 19px;">
                               <b> Shop Location </b>
                            </span>
                        </div>
                        <div class="col-md-6 text-center">
                            <textarea name="address" rows="5" class="form-control">{{ $vendorDetail->address ?? ''}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3 p-5" style="border-bottom: 2px solid #cccccc;">
                        <div class="col-md-4 p-5">
                            <span class="m-auto" style="color: #02499B  !important; font-size: 19px;">
                               <b> Type of Service</b>
                            </span>
                        </div>
                        <div class="col-md-6 text-center">
                            <textarea name="service_type" rows="5" class="form-control">{{ $vendorDetail->service_type ?? ''}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3 p-5" style="border-bottom: 2px solid #cccccc;">
                        <div class="col-md-4 p-5">
                            <span class="m-auto" style="color: #02499B  !important; font-size: 19px;">
                               <b> Means of Delivery</b>
                            </span>
                        </div>
                        <div class="col-md-6 text-center">
                            <textarea name="delivery_mode" rows="5" class="form-control">{{ $vendorDetail->delivery_mode ?? ''}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3 p-5" style="border-bottom: 2px solid #cccccc;">
                        <div class="col-md-4 p-5">
                            <span class="m-auto" style="color: #02499B  !important; font-size: 19px;">
                               <b> Means of Identification</b>
                            </span>
                        </div>

                        <div class="col-md-6 text-center">
                            <input type="file" name="identity_file_url" class="form-control ">
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    @if(count($user_metas->Vendor))
                        <input type="hidden" value="put" name="_method">
                    @endif
                    <div class="col-md-12 p-5 text-center">
                        <button class="btn btn-danger btn-lg">Save Update</button>
                    </div>

                </form>
            </div>
        @endsection

@push('scripts')
    <script>
        FormHandler('vendorUpdateForm', {
            requestUrl: '/api/v1/crud/vendors/{{count($user_metas->Vendor) ? $user_metas->Vendor[0]->id: ''}}',
            cb: response => {
                if(response.success){
                    return swal({
                        title: 'Success!!',
                        text:  'Vendor Profile Updated successfully',
                        icon: 'success'
                    })
                }
                console.log(response);
                return swal({
                    title: 'Failed!!',
                    text:   'There was an error updating your vendor profile, please try again.',
                    icon:   'error'
                })
            }
        })
    </script>

@endpush
