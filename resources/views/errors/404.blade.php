@extends('layouts.app')

@section('title', '404')

@section('content')
	<div class="my-5 pt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="text-center my-5">
						<h1 class="fw-bold text-error">4 <span class="error-text">0<img src="{{ asset('assets/images/error-img.png') }}" alt="error-img" class="error-img"></span> 4</h1>
						<h3 class="text-uppercase">Sorry, page not found</h3>
						<div class="mt-5 text-center">
							<a class="btn btn-primary waves-effect waves-light" href="{{ route('home') }}">Back to Dashboard</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
