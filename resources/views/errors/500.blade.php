@extends('layouts.app')

@section('title', '500')

@section('content')
    <section class="error-page h-p100">
		<div class="container h-p100">
		  <div class="row h-p100 align-items-center justify-content-center text-center">
			  <div class="col-lg-7 col-md-10 col-12">
				  <div class="rounded5 bg-white-10 pb-40">
					  <h1 class="text-white font-size-180 font-weight-bold error-page-title"> 500</h1>
					  <h1 class="text-white">Uh-Ah</h1>
					  <h3 class="text-white">Internal Server Error !</h3>
					  <div class="my-30"><a href="{{ route('home') }}" class="btn btn-info">Back to dashboard</a></div>
					  <h5 class="text-white mb-15">-- OR --</h5>
					  <h4 class="text-white">Please try after some time</h4>			  			  
			      </div>							  			  
			  </div>				
		  </div>
		</div>
	</section>
@stop
