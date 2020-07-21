@extends('dashboard.networking-agent.layout')
@section('page_title')

@endsection

        @section('content')
        <div class="col-md-10">
            <div class="row col-md-12 text-center " style="padding: 10px; text-align: center !important; border-bottom: 1px solid #f2f2f2;">
                    <h1 class="text-center m-auto pt-3 pb-3 "><b>Create Seller Account</b></h1>
                </div>
        <div class="row">
            <div class="col-md-8 offset-2 card mt-5 mb-5" style="padding: 20px;">
            <form name="createSellerForm">

                <div class="text-center align-items-center">
                    <img height="120" alt="Image preview..."  class="rounded" id="output" src="#">
                    <p></p>
                    <p style="color: #02499B;">
                        Upload Picture
                        <input type="file" accept="image/*" onchange="loadFile(event)" id="profile_pic_url" name="profile_pic_url">
                    </p>
                </div>


                <div class="form-group">
                    <label for="account-number">Seller Name</label>
                    <input id="account-number" name="name" class="form-control" type="text" placeholder="Enter Name">
                </div>
                <br>
                <div class="form-group">
                    <label for="service">Service Description</label>
                    <input id="service" name="service_description" class="form-control" type="text" placeholder="">
                </div>
                <br>
                <div class="form-group">
                    <label for="shop">Shop Address</label>
                    <input id="shop" name="address" class="form-control" type="text" placeholder="">
                </div>
                <br>
                <input type="hidden" name="agent_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" name="email" class="form-control" type="email" placeholder="Enter a valid username">
                </div>
                <br>

                <div class="form-group">
                    <label for="username">Phone</label>
                    <input id="phone" name="phone" class="form-control" type="text" placeholder="Enter a valid username">
                </div>
                <br>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" class="form-control" type="password" placeholder="Create a unique password">
                </div>
                <input type="hidden" name="account_type" value="buyer" />
                <br>
                <div class="form-group">
                    <label for="stage">Stage</label><br>
                    <select id="stage" name="stage" class="form-control">
                        <option value="1">Stage 1</option>
                        <option value="2">Stage 2</option>
                        <option value="3">Stage 3</option>
                    </select>
                </div>
                <br><br>

                <button class="btn" style="border: 1px solid white; margin-left: 400px; width: 150px; background-color:#AF2E1D; border-radius: 20px; color: white;">SUBMIT</button>

            </form>
            <br><br>
        </div>
        </div>
        </div>
        @endsection

@push('scripts')
<script>

    const loadFile = function(event) {
        const output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };


    const options = {
        requestUrl: '/api/v1/crud/users',
        cb: response => {
            if(response.success){
                return swal({
                    title: 'Success!',
                    text: 'User created successfully!',
                    icon: 'success',
                    button: 'Ok'
                })
            }
            console.log(response);
            return swal({
                title: 'Error!',
                text: 'Error occurred creating User, please try again',
                icon: 'error',
                button: 'Try Again'
            })
        }
    };

    FormHandler('createSellerForm', options)


</script>

@endpush
