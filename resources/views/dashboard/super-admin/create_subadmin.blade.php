 @extends('dashboard.super-admin.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection
        @section('content')
        <div class="col-md-10">
                    <div class="card p-5" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;">
                        <form name="createSubAdminForm">
                            <div class="form-group pl-5">
                                <label for="name " style="font-size: 16px; color: #666; font-weight: 500;">Name</label><br>
                                <input type="text" name="name" class="form-control col-md-9" id="name" placeholder="Cool Name" style="height: 40px;">
                            </div>
                            <div class="form-group pl-5 ">
                                <label for="exampleFormControlInput1 " style="font-size: 16px; color: #666; font-weight: 500;">Phone number</label><br>
                                <input type="text" name="phone" class="form-control col-md-9" id="phone" placeholder="080xxxxxxx" style="height: 40px;">

                            </div>
                            <div class="form-group pl-5 ">
                                <label for="email" style="font-size: 16px; color: #666; font-weight: 500;">Email</label><br>
                                <input type="email" name="email" class="form-control col-md-9" id="email" placeholder="name@example.com" style="height: 40px;">

                            </div>
                            <div class="form-group pl-5 ">
                                <label for="address " style="font-size: 16px; color: #666; font-weight: 500;">Address</label><br>
                                <input type="text" name="address" class="form-control col-md-9" id="address" placeholder="Abuja, Nigeria" style="height: 40px;">

                            </div>

                            <input type="hidden" name="operating_currency" value="naira" />
                            <input type="hidden" name="account_type" value="subadmin" />
                            <input type="hidden" id="verified" name="email_verified_at" value="" />


                            <div class="form-group pl-5 ">
                                <label for="password" style="font-size: 16px; color: #666; font-weight: 500;">Password</label><br>
                                <input type="password" name="password" class="form-control col-md-9" id="password" placeholder="secure token" style="height: 40px;">
                            </div>

                            <div class="form-group text-center">
                                <label for="grant " style="font-size: 16px; color: #666; font-weight: 500;">Grant access to application:</label>
                                <input type="checkbox" name="status" value="active" id="grant" style="margin: 20px" checked="checked"> YES <input type="checkbox" value="inactive" style="margin: 20px" checked="checked"> NO
                            </div>

                            <div class=" form-group text-center">
                                <button class="btn btn-danger btn-lg m-auto" style="vertical-align: middle;">Create</button>
                            </div>
                        </form>
                    </div>
            </div>
        @endsection

 @push('scripts')

     <script>

         let d = new Date().toLocaleDateString().slice(0, 16).split('/');
         d = `${d[2]}-${d[1]}-${d[0]}`;

         document.getElementById('verified').value = d + ' ' + new Date().toLocaleTimeString();

         FormHandler('createSubAdminForm', {
             requestUrl:'/api/v1/crud/users',
             cb: response => {
                 if(response.success){
                     return swal({
                         title: 'Success!',
                         text: 'Account created successfully!',
                         icon: 'success',
                         button: 'Okay'
                     });
                 }
                 console.log(response);
                 return swal({
                     title: 'Error!',
                     text: 'We had error creating the account.Please try again',
                     icon: 'error',
                     button: 'Try Again'
                 })
             }
         })
     </script>
 @endpush
