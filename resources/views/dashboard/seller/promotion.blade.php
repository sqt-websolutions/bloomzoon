@extends('dashboard.seller.layout')
@section('page_title')
    Seller's Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
            <div class="row col-md-12 ml-1 mt-5 mb-5" style="padding: 10px; text-align: right !important; border-bottom: 1px solid #f2f2f2;">
                <div class="col-md-8 text-left ml-0">
                    <h2><i class="fas fa-bullhorn">
                        </i> Promotional Code</h2>
                </div>
                <div class="col-md-4 m-auto"><a href="promotion2" class="btn btn-danger text-right">Create New Code</a></div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-2" style="padding: 30px;">
                    @foreach($user_metas->Coupon as $coupon)
                        <div class="text-center align-items-center mt-4 mb-4" style="border-radius: 50px; padding: 30px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="#{{$coupon->id}}">Coupon Code</label>
                                    <input type="text" disabled id="#{{$coupon->id}}" value="{{$coupon->code}}" style="background-color: #F2F2F2; height: 50px;" class="form-control">
                                </div>
                                <div class="col-md-6 coupons">
                                    <h4>Description</h4>
                                    <p> {{$coupon->description}} </p>
                                    @if($coupon->status === 0)
                                        <p>Status: Deactivated</p>
                                    @else
                                        <p>Status: Active</p>
                                    <button class="btn" data-coupon-id="{{$coupon->id}}" style="color: white; background-color: #AF2E1D; border-radius: 20px;">Deactivate</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    <hr>

                </div>
            </div>

        </div>
        @endsection

@push('scripts')
    <script>
        [...document.querySelectorAll('.coupons')].map( elem => {
            elem.addEventListener('click', e => {
                axios
                    .delete(`/api/v1/crud/coupons/${e.target.getAttribute('data-coupon-id')}`)
                    .then( res => {
                        if(res.data.success){
                            swal({
                                title:'Success!!',
                                text: 'Coupon deleted successfully',
                                icon: 'success'
                            }).then( _ => window.location.reload())
                        }
                    })
            }, false)
        })
    </script>

@endpush
