@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="text-center">
                                                <div>
                                                    <a href="{{ route('home') }}" class="">
                                                        <img src="assets/images/logo-dark.png" alt="" height="20" class="auth-logo logo-dark mx-auto">
                                                        <img src="assets/images/logo-light.png" alt="" height="20" class="auth-logo logo-light mx-auto">
                                                    </a>
                                                </div>
    
                                                <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                                <p class="text-muted">Sign in to continue to {{ config('app.name', 'Laravel') }}.</p>
                                            </div>

                                            <div class="p-2 mt-5">
                                                <form action="{{ route('login') }}" method="POST">
													@csrf
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-mail-line auti-custom-input-icon"></i>
                                                        <label for="username">Email</label>
                                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required placeholder="Enter email">
                                                    </div>
                            
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" name="password" id="password" required placeholder="Enter password">
                                                    </div>
                            
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="remember" id="customControlInline">
                                                        <label class="form-check-label" for="customControlInline">Remember me</label>
                                                    </div>

													@if($errors->any())
														<p class="text-danger text-center font-weight-bold">The provided credentials do not match our records.</p>
													@endif

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                                    </div>

                                                    <!-- <div class="mt-4 text-center">
                                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                                    </div> -->
                                                </form>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <!-- <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Register </a> </p> -->
                                                <p>© <script>document.write(new Date().getFullYear())</script> Nazox. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="authentication-bg">
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--     
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
									@if($errors->any())
										<p class="text-danger text-center font-weight-bold">The provided credentials do not match our records.</p>
									@endif
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent text-white"><i class="ti-email"></i></span>
											</div>
											<input type="email" class="form-control pl-15 bg-transparent text-white plc-white" name="email" value="{{ old('email') }}" required placeholder="Email" autofocus>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
											</div>
											<input type="password" class="form-control pl-15 bg-transparent text-white plc-white" name="password" required placeholder="Password">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox text-white">
											<input type="checkbox" name="remember" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-danger btn-rounded mt-10">SIGN IN</button>
										</div>
									  </div>
								</form>														

							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

@stop