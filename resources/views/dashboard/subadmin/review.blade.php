

@extends('dashboard.subadmin.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection

        @section('content')
        <div class="col-md-10">
            <div class="row mb-5 mt-5">
                <div class="col-md-12 text-center">
                    <h2>Review &amp; Feedback</h2>
                </div>
            </div>
            <div class="row">
        <div class="col-md-6">
            <form action="#" class="col-10 search-wrap">
                <div class="input-group">
                    <div class="input-group-prepend text-light">
                        <button class="btn btn-outline-secondary input-group-text dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ALL</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Location</a>
                            <a class="dropdown-item" href="#">Seller</a>
                            <a class="dropdown-item" href="#">Category</a>

                        </div>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2">
            <div class="dropdown col-2">
                <a style="background-color: white; color: black;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sort
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="">Name</a>
                    <a class="dropdown-item" href="">Date</a>
                    <a class="dropdown-item" href="">Account</a>
                </div>
            </div>
        </div>
    </div>


            <div class="container" style="background-color: #fff; padding: 20px;">

                <div class="row" style="color: #02499B">
                    <div class="col-md-2">
                        <h5>Names</h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Review Messages</h5>
                    </div>
                    <div class="col-md-2">
                        <h5>Products</h5>
                    </div>
                    <div class="col-md-2">
                        <h5>For User</h5>
                    </div>
                    <div class="col-md-2">
                        <h5>Action</h5>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="row" style="background-color: white; color: black; border-radius: 20px; padding: 20px; border-bottom: 1px solid #f2f2f2;">
                        <div class="col-md-2">
                            <p>Osy02</p>
                        </div>
                        <div class="col-md-4">
                            <p>He declined the goods</p>
                        </div>
                        <div class="col-md-2">
                            <img src="../../../../public/subadmin_asset/img/bag.png" height="35" width="35" alt="bag">
                        </div>
                        <div class="col-md-2">
                            <p>Rider 92</p>
                        </div>
                        <div class="col-md-2">
                            <div class="dropdown col-2">
                                <a style="background-color: white; color: black;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Approve
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                    <a class="dropdown-item" href="">Approve</a>
                                    <a class="dropdown-item" href="">Reject</a>
                                    <a class="dropdown-item" href="">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="background-color: white; color: black; border-radius: 20px; padding: 20px; border-bottom: 1px solid #f2f2f2;">
                        <div class="col-md-2">
                            <p>Osy02</p>
                        </div>
                        <div class="col-md-4">
                            <p>Good Services</p>
                        </div>
                        <div class="col-md-2">
                            <img src="../../../../public/subadmin_asset/img/shoe.png" height="35" width="35" alt="bag">
                        </div>
                        <div class="col-md-2">
                            <p>Seller 92</p>
                        </div>
                        <div class="col-md-2">
                            <div class="dropdown col-2">
                                <a style="background-color: white; color: black;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Approve
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                    <a class="dropdown-item" href="">Approve</a>
                                    <a class="dropdown-item" href="">Reject</a>
                                    <a class="dropdown-item" href="">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="background-color: white; color: black; border-radius: 20px; padding: 20px; border-bottom: 1px solid #f2f2f2;">
                        <div class="col-md-2">
                            <p>Osy02</p>
                        </div>
                        <div class="col-md-4">
                            <p>He declined the goods</p>
                        </div>
                        <div class="col-md-2">
                            <img src="../../../../public/subadmin_asset/img/bag.png" height="35" width="35" alt="bag">
                        </div>
                        <div class="col-md-2">
                            <p>Rider 92</p>
                        </div>
                        <div class="col-md-2">
                            <div class="dropdown col-2">
                                <a style="background-color: white; color: black;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Approve
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                    <a class="dropdown-item" href="">Approve</a>
                                    <a class="dropdown-item" href="">Reject</a>
                                    <a class="dropdown-item" href="">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="background-color: white; color: black; border-radius: 20px; padding: 20px; border-bottom: 1px solid #f2f2f2;">
                        <div class="col-md-2">
                            <p>Osy02</p>
                        </div>
                        <div class="col-md-4">
                            <p>Good Services</p>
                        </div>
                        <div class="col-md-2">
                            <img src="../../../../public/subadmin_asset/img/shoe.png" height="35" width="35" alt="bag">
                        </div>
                        <div class="col-md-2">
                            <p>Seller 92</p>
                        </div>
                        <div class="col-md-2">
                            <div class="dropdown col-2">
                                <a style="background-color: white; color: black;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Approve
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                    <a class="dropdown-item" href="">Approve</a>
                                    <a class="dropdown-item" href="">Reject</a>
                                    <a class="dropdown-item" href="">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="background-color: white; color: black; border-radius: 20px; padding: 20px; border-bottom: 1px solid #f2f2f2;">
                        <div class="col-md-2">
                            <p>Osy02</p>
                        </div>
                        <div class="col-md-4">
                            <p>He declined the goods</p>
                        </div>
                        <div class="col-md-2">
                            <img src="../../../../public/subadmin_asset/img/bag.png" height="35" width="35" alt="bag">
                        </div>
                        <div class="col-md-2">
                            <p>Rider 92</p>
                        </div>
                        <div class="col-md-2">
                            <div class="dropdown col-2">
                                <a style="background-color: white; color: black;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Approve
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                    <a class="dropdown-item" href="">Approve</a>
                                    <a class="dropdown-item" href="">Reject</a>
                                    <a class="dropdown-item" href="">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="background-color: white; color: black; border-radius: 20px; padding: 20px; border-bottom: 1px solid #f2f2f2;">
                        <div class="col-md-2">
                            <p>Osy02</p>
                        </div>
                        <div class="col-md-4">
                            <p>Good Services</p>
                        </div>
                        <div class="col-md-2">
                            <img src="../../../../public/subadmin_asset/img/shoe.png" height="35" width="35" alt="bag">
                        </div>
                        <div class="col-md-2">
                            <p>Seller 92</p>
                        </div>
                        <div class="col-md-2">
                            <div class="dropdown col-2">
                                <a style="background-color: white; color: black;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Approve
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                    <a class="dropdown-item" href="">Approve</a>
                                    <a class="dropdown-item" href="">Reject</a>
                                    <a class="dropdown-item" href="">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container">

                <nav>
                    <ul class="pagination d-flex justify-content-center flex-wrap pagination-rounded-flat pagination-success">
                        <li class="page-item"><a class="page-link" href="#" data-abc="true"><i class="fa fa-angle-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#" data-abc="true">1</a></li>
                        <li class="page-item"><a class="page-link" href="#" data-abc="true">2</a></li>
                        <li class="page-item"><a class="page-link" href="#" data-abc="true">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" data-abc="true">4</a></li>
                        <li class="page-item"><a class="page-link" href="#" data-abc="true"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        @endsection
