

@extends('dashboard.seller.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
            <div class="row col-md-12 ml-1 mt-5 mb-5" style="padding: 10px; text-align: right !important; border-bottom: 1px solid #f2f2f2;">
                <div class="col-md-12 text-center ml-0">
                    <h2><i class="fas fa-box-open"></i> Trading Policy</h2>
                </div>
            </div>
            <form class="" style="padding: 20px;" name="policiesForm">
                <div class="row mt-4 mb-4">
                    <div class="col-md-3 m-auto">
                        <h4 style="color: #02499B; ">Terms & Condition</h4>
                    </div>
                    <div class="col-md-7">
                        <textarea class="form-control" name="terms_and_conditions" rows="5">{{$user_metas->Seller[0]->terms_and_conditions ?? ''}}</textarea>
                    </div>

                </div>
                <hr>
                <div class="row mt-4 mb-4">
                    <div class="col-md-3 m-auto">
                        <h4 style="color: #02499B; ">Policy</h4>
                    </div>
                    <div class="col-md-7">
                        <textarea class="form-control" name="policy" rows="5">{{$user_metas->Seller[0]->policy ?? ''}}</textarea>
                    </div>

                </div>
                <hr>
                <div class="row mt-4 mb-4">
                    <div class="col-md-3 m-auto">
                        <h4 style="color: #02499B; ">Delivery Terms</h4>
                    </div>
                    <div class="col-md-7">
                        <textarea name="delivery_terms" class="form-control" rows="5">{{$user_metas->Seller[0]->delivery_terms ?? ''}}</textarea>
                    </div>

                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                </div>
                <hr>
                <div class="row mt-4 mb-4">
                    <div class="col-md-3 m-auto">
                        <h4 style="color: #02499B; ">Terms of Purchase</h4>
                    </div>
                    <div class="col-md-7">
                        <textarea name="terms_of_purchase" class="form-control" rows="5">{{$user_metas->Seller[0]->terms_of_purchase ?? ''}}</textarea>
                    </div>

                    @if(count($user_metas->Seller))
                        <input type="hidden" name="_method" value="put" />
                    @endif
                </div>

                <div class="col-md-8 m-auto">
                    <button class="btn m-auto" style="color: white; background-color: #AF2E1D; border-radius: 5px;">UPDATE</button>
                </div>

            </form>

        </div>
        @endsection

@push('scripts')
    <script>
        FormHandler('policiesForm', {
            requestUrl: '/api/v1/crud/sellers/{{count($user_metas->Seller) ? $user_metas->Seller[0]->id : ''}}',
            cb: response => {
                if(response.success){
                    return swal({
                        title: 'Success!!',
                        text:  'Policies Updated successfully',
                        icon: 'success'
                    }).then( () => window.location.reload())
                }
                console.log(response);
                return swal({
                    title: 'Failed!!',
                    text:   'There was an error your policies, please try again.',
                    icon:   'error'
                })
            }
        })
    </script>

@endpush
