@extends('dashboard.shopper.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="p-0">
                <div class="row col-md-12 ml-1" style="padding: 10px; text-align: right !important; border-bottom: 1px solid #f2f2f2;">
                    <div class="col-md-12 text-center ml-0">
                        <h1 style="color: #02499B;"><b>Delivery Request Details</b></h1>
                    </div>

                </div>
                <div class="col-md-12 mt-0" style="background-color: #fff;">
                    <div class="row pt-4">
                        <div class="col-md-4 mt-5 ml-4">
                            @php($order_qty = 0)
                            @foreach($order->id->order_details as $order_detail)
                                @php($order_qty+=$order_detail->quantity)
                            <h4><span style="font-weight: bolder">Seller Details:</span> {{$order_detail->product_id->user_id->name}},  </h4><br>
                            @endforeach
                            <h5><span style="font-weight: bolder">No of Product:</span> {{$order_qty}}</h5><br>
                            <h5><span style="font-weight: bolder">Billing Address:</span> {{$order->user_id->billing_address}}</h5><br>
                            <hr />
                            <h5><span style="font-weight: bolder">Buyer:</span> {{$order->user_id->name}}</h5><br>
                            <h5><span style="font-weight: bolder">Contact No.:</span> {{$order->user_id->phone}}</h5>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <h4><span style="font-weight: bolder">Product(s):</span>
                                @foreach($order->id->order_details as $order_detail)
                                <img src="{{$order_detail->product_id->featured_img_url}}" width="80" height="80">
                                @endforeach
                            </h4>
                        </div>


                    </div><br><br><hr><br><br>

                    <div class="row mt-5">
                        <div class="col-md-4">

                        </div>

                        <div class="col-md-4">
                            <p><span style="font-weight: bolder">State: </span> <span class="ml-5">{{$order->user_id->state}}</span></p><br><br>
                            <div class="form-group">
                                <label>Status</label>
                                <select id="order_status" class="form-control">
                                    <option value=""> Select Order Status </option>
                                    <option value="In stock">In stock</option>
                                    <option value="Yet to arrive">Yet to arrive</option>
                                    <option value="Packaged">Package</option>
                                    <option value="Proceed to package">Proceed to package</option>
                                    <option value="Reject">Reject</option>
                                </select>
                            </div><br><br>
                            <div class="form-group" hidden id="assign_order">
                                <label>Assign Order</label>
                                <select name="orderReadyForPickUp?" id="pick_up_status" class="form-control">
                                    <option value="0">Select Pick Up Status</option>
                                    <option value="1">Ready for Pick Up</option>
                                    <option value="2">Not Ready for Pick Up</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div><br>

                    <div class="row text-center">
                        <div class="col-md-12 text-center">
                            <a href="store-in-warehouse?order={{base64_encode(json_encode($order))}}" hidden id="proceed_btn" style="border-radius: 25px; width: 140px;" type="button" class="btn btn-danger mr-5">Proceed</a>
                            <button style="border-radius: 25px; width: 140px;" type="button" class="btn btn-info" id="updateOrderStatus">Save</button>                        </div>
                    </div><br>
                </div>
                </div>
            </div>
        @endsection

@push('scripts')
    <script>
        localStorage.setItem('__bz__or__identifier', `{{md5($order->id->order_id)}}`);

        const proceedBtn = document.getElementById('proceed_btn');
        const assignOrder = document.getElementById('assign_order');
        let status = 'new';
        const saveOrderBtn = document.getElementById('updateOrderStatus')
        document.getElementById('order_status').addEventListener('change', e => {
            if(e.target.value === 'In stock'){
                localStorage.setItem('__bz__or__identifier1', `{{md5('In stock')}}`);
                status = e.target.value;
                saveOrderBtn.hidden = true;
                return proceedBtn.hidden = assignOrder.hidden = false;
            }
            proceedBtn.hidden = assignOrder.hidden = true;
            status = e.target.value;
            saveOrderBtn.hidden = false;
        });

        saveOrderBtn.addEventListener('click', async e => {
           await axios.post(`/api/v1/crud/orders/{{$order->id->order_id}}`, JSON.stringify({status, _method:'put'}), {
                headers: {'Content-Type':'application/json', 'Accept':'application/json'}
            }).then( res => {
               if(res.data.success){
                   return swal({
                       title: 'Success',
                       text: 'Order status updated successfully',
                       icon: 'success'
                   })
               }

               return swal({
                   title: 'Error',
                   text: 'Order status not updated successfully',
                   icon: 'error'
               })
           })

        });


    </script>


@endpush
