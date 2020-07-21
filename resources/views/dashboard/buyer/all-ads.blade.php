@extends('dashboard.buyer.layout')
@section('page_title')
    Buyer's Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
            @if(count($adverts= $user_metas->Advert))
                @foreach($adverts as $advert)
                <div class="col-md-4 p-5">
                    <div class="card p-0">
                        <div class="col-md-12 p-0 ">
                            <img src="{{asset($advert->advert_image_url1)}}" height="120" class="m-auto" width="100%">
                        </div>
                        <div class="col-md-12 text-center mt-3 ads" data-ads-id="{{$advert->id}}">
                            <p><b>url:</b>&nbsp;&nbsp;&nbsp;{{$advert->advert_link}}</p>
                            <p><b>Page Section:</b>&nbsp;&nbsp;&nbsp;{{$advert->advert_position}}</p>
                            <p><b>Amount:</b>&nbsp;&nbsp;&nbsp;{{number_format($advert->amount)}}</p>
                            <p><b>Status:</b>&nbsp;&nbsp;&nbsp;{{$advert->status === 1 ? 'Active': 'inactive'}}</p>
                            <button style="border-radius: 25px;" type="button" class="btn btn-danger btn-sm mb-2" data-action="delete">Delete</button>
                            <button style="border-radius: 25px;" type="button" class="btn btn-warning btn-sm mb-2" data-status="2"  data-action="post">{{$advert->status === 2 ? 'Paused': 'Pause'}}</button>
                            @if($advert->status === 2 )
                                <button style="border-radius: 25px;" type="button" class="btn btn-info btn-sm" data-status="1" data-action="post" data-action-reactivate="true">Re-activate</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <h3> You have no adverts running, create one now </h3>
            @endif
            </div>
        @endsection

@push('scripts')
        <script>
            [...document.querySelectorAll('.ads')].map(elem => {
                elem.addEventListener('click', e => {
                    axios[[e.target.getAttribute('data-action')]](`/api/v1/crud/adverts/${elem.getAttribute('data-ads-id')}`,
                        JSON.stringify( { status: e.target.getAttribute('data-status'),
                            _method: e.target.getAttribute('data-action') === 'delete' ? undefined : 'put'
                        }), {headers: {
                                'Content-Type':'application/json',
                                'Accept':'application/json'
                            }})
                        .then( res => {
                            return swal({
                                title: 'Success!',
                                text: 'Action Processed successfully',
                                icon: 'success'
                            }).then( () => window.location.reload())
                    })
                }, false)
            })
        </script>
@endpush
