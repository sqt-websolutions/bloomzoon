@extends('dashboard.buyer.layout')
@section('page_title')
    Buyer's Dashboard
@endsection
@php
$messages = $user_metas->Message;
@endphp
        @section('content')
        <div class="col-md-10">
                <div class="row col-md-12 text-center " style="background-color: #AF2E1D !important; padding: 10px; text-align: center !important; color:white ">
                    <h1 class="text-center m-auto pt-3 pb-3 "><b>Chat History</b></h1>
                </div>

                    @foreach($messages as $message)
                        <div class="row col-md-12 p-3 " style="background-color: #fff !important; padding: 20px; ">
                            @if($message->reply_id)
                                <div class="col-md-6 offset-6 p-3 " style="border: 1px solid #ddd; border-radius: 5px ">
                                    <p>Admin</p>
                                    <div class="row ">
                                        <div class="col-md-6 text-left ">{{\Carbon\Carbon::parse($message->reply_id->created_at)->format('M d Y')}}</div>
                                        <div class="col-md-6 text-right ">{{\Carbon\Carbon::parse($message->reply_id->created_at)->format('g:i A')}}</div>
                                    </div>
                                    <p>{{$message->reply_id->reply}}</p>
                                </div>
                                @else
                                <div class="col-md-6 offset-6 p-3 " style="border: 1px solid #ddd; border-radius: 5px ">
                                    <p>Awaiting admin response...</p>
                                </div>
                                @endif
                        </div>
                        <div class="row col-md-12 p-3 " style="background-color: #fff !important; padding: 20px; ">
                            <div class="col-md-4 p-3 " style="border: 1px solid #ddd; border-radius: 5px ">
                                <p> {{Auth::user()->name}} </p>
                                <div class="row ">
                                    <div class="col-md-6 text-left ">{{\Carbon\Carbon::parse($message->created_at)->format('M d Y')}}</div>
                                    <div class="col-md-6 text-right ">{{\Carbon\Carbon::parse($message->created_at)->format('g:i A')}}</div>
                                </div>
                                <p>{{$message->message}}</p>
                            </div>
                        </div>
                    @endforeach

                <div class="row col-md-12 text-center " style="background-color: #fff !important; padding: 10px; text-align: center !important; color:white; border-top: solid #ccc 1px; ">
                    <form class="form-inline  col-md-8 m-auto" name="chatForm">
                        <textarea name="message"  class="form-control col-md-10" style=""></textarea>
                        <input type="hidden" name="subject" value="{{$chat->subject}}" />
                        <input type="hidden" name="user_id" value="{{$chat->user_id}}" />
                        <input type="hidden" name="issue_type" value="{{$chat->issue_type}}" />
                        <br />
                        <button class="btn btn-secondary btn-sm col-md-10 text-white" style="height:45px; margin-top: 15px; border-radius:3px !important;">Send</button>
                    </form>
                </div>
            </div>
        @endsection

@push('scripts')
    <script>
        FormHandler('chatForm', {
            requestUrl: '/api/v1/crud/messages',
            cb: response => {
                if (response.success) {
                    return swal({
                        title: 'Success!',
                        text: 'Message sent, admin will respond shortly',
                        icon: 'success',
                        button: 'Okay'
                    }).then(() => {
                        window.location.reload();
                    })
                }

                return swal({
                    title: 'Error!',
                    text: 'We had error sending your message. Please Try Again',
                    icon: 'error',
                    button: 'Try Again'
                });
            }
        });
    </script>
@endpush
