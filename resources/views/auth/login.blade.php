@extends('layouts.app')

@section('title', 'Login')

@section('content')
    
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="bg-white-10 rounded5">
							<div class="content-top-agile p-10 pb-0">
								<h2 class="text-white">Get started with Us</h2>
								<p class="text-white-50 mb-0">Sign in to start your session</p>							
							</div>
							<div class="p-30">
								<form action="{{ route('login') }}" method="post">
									@csrf
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent text-white"><i class="ti-email"></i></span>
											</div>
											<input type="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
											</div>
											<input type="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox text-white">
											<input type="checkbox" name="remember" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-right">
											<a href="javascript:void(0)" class="text-white hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-danger btn-rounded mt-10">SIGN IN</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>														

							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop