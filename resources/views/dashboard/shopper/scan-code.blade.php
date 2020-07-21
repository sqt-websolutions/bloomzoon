

@extends('dashboard.shopper.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
                <div class="card p-0">
                <div class="row col-md-12 ml-1" style="padding: 10px; text-align: right !important; border-bottom: 1px solid #f2f2f2;">
                        <div class="col-md-8 text-left ml-0">
                            <h2>Order Details Barcode</h2>
                        </div>
                    </div>
                <div class="row mb-3" style="padding: 20px;">

                    <div class="col-md-6  p-5 offset-3">
                        <div style="">
                            <div id="qrcode"></div>
                        </div>
                            <button  id="print" class="btn btn-danger btn-lg form-control" style="margin-top: 30px; width:41%">Print</button>
                    </div>

                </div>
                </div>
            </div>
        @endsection

@push('scripts')
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <script type="text/javascript">
        new QRCode(document.getElementById("qrcode"), { text:
                'Order Total: {{number_format($ordId->total_amount)}}\nDelivery Address: {{$ordId->user_id->billing_address}}\nBuyer Name: {{$ordId->user_id->name}}\nBuyer Phone: {{$ordId->user_id->phone}}',
        });

        document.getElementById('print').onclick = e => {

            let win = window.open('','','left=0,top=0,width=552,height=477,toolbar=0,scrollbars=0,status =0');

            let content = '<html lang="">';
            content += '<title>OrderId{{$ordId->id->order_id}}qrcode</title>';
            content += '<body onload="window.print(); window.close();">';
            content += document.getElementById("qrcode").innerHTML;
            content += '</body>';
            content += '</html>';
            win.document.write(content);
            win.document.close();

        }
    </script>

@endpush
