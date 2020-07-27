
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/img/Vector (8).png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="subadmin_asset/css/custom-bs4-3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="subadmin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="subadmin_asset/css/ui.css">
    <link rel="stylesheet" href="subadmin_asset/css/style.css">
    <link rel="stylesheet" href="subadmin_asset/css/responsive.css">
    <title>Sub Admin Dashboard</title>

    <style>
        /* Fixed sidenav, full height */
        .sidenav1 {
            height: 100%;
            width: auto;
            color: #02499B;
            line-height: 40px;
            padding: 10px;
        }

        /* Style the sidenav links and the dropdown button */
        .sidenav1 a, .dropdown-btn {
            padding: 6px;
            text-decoration: none;
            font-size: 16px;
            color: #02499B;
            display: block;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
            border-bottom: solid 1px #f2f2f2;
        }

        /* On mouse-over */
        .sidenav1 a:hover, .dropdown-btn:hover {
            color: #fff;
            background-color: #02499B;
            /*border-radius: 5px;*/
        }

        /* Main content */
        .main1 {
            margin-left: 200px; /* Same as the width of the sidenav */
            font-size: 20px; /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        /* Add an active class to the active dropdown button */
        .active {
            background-color: #02499B;
            color: white;
            border-radius: 5px;
        }

        a .active {
            background-color: #02499B;
            color: white;
            border-radius: 5px;
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container1 {
            display: none;
            background-color: #f2f2f2;
            padding-left: 8px;
        }

        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: right;
            padding-right: 8px;
            padding-top: 20px;
        }

        /* Some media queries for responsiveness */
        @media screen and (max-height: 450px) {
            .sidenav1 {padding-top: 15px;}
            .sidenav1 a {font-size: 16px;}
        }
    </style>
</head>

<body style="background-color: #fff;">

<header class="section-header">

    <section class="header-top2 m-0 p-0">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-2 col-sm-2 col-2 text-white text-center" style="background-color: #ffffff; border-bottom: solid 1px #f2f2f2;">
                    <img class="logo" src="subadmin_asset/img/bloomzon.png" alt="logo" width="80" height="auto">
                </div>
                <div class="col-lg-6 p-2 text-white">
                </div>

                <div class="col-lg-2 text-white">

                </div>
                <!-- col.// -->
                <div class="col-lg-2 text-white text-right">
                    <!--<button clas="btn btn-danger"><i class="fas fa-ellipsis-h fa-2x"></i></button>-->
                    <!-- widgets-wrap.// -->
                </div>
                <!-- col.// -->
            </div>
            <!-- row.// -->
        </div>
        <!-- container.// -->
    </section>

</header>

<div class="">

    <div class="row">

        <div class="col-md-2">
            <div class="mt-3 mb-3">
                <div class="text-center mt-5 mb-5">
                    <img src="asset/img/userface.png" alt="" height="105" width="105"><br><br>
                    <span><strong>Login ID:</strong> {{$user_metas->User[0]->email}}</span>
                </div>
                <hr>
                <div class="sidenav1">
                    <a href="home"> <i class="fa fa-tachometer-alt mr-3"></i> Dashboard</a>
                    <button class="dropdown-btn"><i class="fas fa-user-cog mr-3"></i> User Management
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container1">
                        <a  href="createnewuser">Create New User</a>
                        <a href="allusers?users={{base64_encode(json_encode('users'))}}">All Users</a>
                    </div>
                    <button class="dropdown-btn"><i class="fas fa-user-cog mr-3"></i> Brands Management
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container1">
                        <a  href="createnewbrand">Create New Brand</a>
                        <a href="allusers?users={{base64_encode(json_encode('brands'))}}">All Brands</a>
                    </div>
                    <a href="review"><i class="fas fa-comments mr-3"></i> Review/Feedback</a>
                    <a href="messages"><i class="fas fa-envelope  mr-3"></i> Messages</a>
                    <a href="bloomzonproduct"><i class="fas fa-shopping-cart  mr-3"></i> Bloomzon Products</a>
                    <button class="dropdown-btn"><i class="fas fa-user-cog mr-1"></i> Application Creation
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container1">
                        <a  href="createcategory?categories={{base64_encode(json_encode('categories'))}}">Create Product Categories</a>
                        <a href="allcategory">All Categories</a>
                    </div>
                    <a href="manufacturer"><i class="fas fa-tasks mr-2"></i> Manufacturers Mgt.</a>
                    <button class="dropdown-btn"><i class="fas fa-money-check-alt mr-3"></i> Subscription
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container1">
                        <a href="allusers">All Users</a>
                        <a href="activeusers">Active Users</a>
                        <a  href="inactiveusers">Inactive Users</a>
                    </div>
                    <button class="dropdown-btn"><i class="fas fa-newspaper mr-3"></i> Newsletter
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container1">
                        <a href="allsubscribers">All Subscribers</a>
                        <a href="newsletter">Send Out Newsletter</a>
                        <a href="allnewslettersubcribers">All Newsletter Subscribers</a>
                    </div>
                    <a href="advert"><i class="fas fa-bullhorn mr-3"></i> Adverts</a>
                    <button class="dropdown-btn"><i class="fas fa-cash-register mr-3"></i> Payout Requests
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container1">
                        <a href="deliverypayout">Delivery Merchants</a>
                        <a  href="manufacturerpayout">Manufacturer</a>
                        <a  href="shopperpayout">Shopper</a>
                        <a href="fastfoodpayout">Fast Food</a>
                        <a href="grocerypayout">Grocery</a>
                        <a  href="networkingagentpayout">Networking Agent</a>
                        <a  href="proservicepayout">Professional Service</a>
                    </div>
                    <a href="/logout"><i class="fa fa-sign-out-alt mr-3"></i> Logout</a>
                </div>
            </div>

    </div>
       @yield('content')

    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa " crossorigin="anonymous "></script>
    <script src="subadmin_asset/js/js.js "></script>
    <script src="assets/js/lib/form.js "></script>
    <script src="assets/js/sweetalert.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>

@stack('scripts')
</body>

</html>
