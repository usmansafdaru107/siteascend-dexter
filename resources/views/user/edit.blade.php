@extends('layouts.app_main')

@section('title', 'User Edit')

@section('css_styles')



    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
@stop


@section('content')

<div class="main-content">
	<div class="page-content">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">Edit User</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">User</li>
								<li class="breadcrumb-item active">Edit</li>
							</ol>
						</div>

					</div>
				</div>
			</div>
			<!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if(session()->has('success'))
                                <div class="alert alert-success" id="message_success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            @if(session()->has('error'))
                                <div class="alert alert-danger" id="message_error">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <h4 class="card-title mb-4 text-center">User Edit</h4>
                            <form action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="name">User Name</label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required maxlength="255">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required maxlength="255">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="role">Select User Role</label>
                                            <select class="select2 form-control @error('role') is-invalid @enderror" name="role" required data-placeholder="Choose User Role">
                                                @foreach ($roles as $role)
                                                    @if ($user->role->id == $role->id)
                                                        <option value="{{ $role->id }}" selected>{{ Str::upper($role->name) . ' - ' . $role->abbreviation }}</option>
                                                    @else
                                                        <option value="{{ $role->id }}">{{ Str::upper($role->name) . ' - ' . $role->abbreviation }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-0 text-center">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Update
                                            </button>
                                        </div>
                                    </div>

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

@section('js_scripts')
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
@stop
