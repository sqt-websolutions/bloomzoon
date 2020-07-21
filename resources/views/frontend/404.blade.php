@extends('layouts.front')
@section('page_title')
    Page Not Found
@endsection
@section('content')

	<div class="error-msg-area display-table">
		<div class="vertical-middle">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-12">
						<div class="error-msg text-center">
							<img src="assets/images/404/1.png" alt="" >
							<h1>Opps! This page Could Not Be Found!</h1>
							<p>Sorry bit the page you are looking for does not exist, have been removed or name changed</p>
							<a href="/" class="btn-common mt-75">go to homepage</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
