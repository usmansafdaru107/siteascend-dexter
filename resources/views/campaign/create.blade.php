@extends('layouts.app_main')

@section('title', 'Create Campaign')

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
						<h4 class="mb-sm-0">Create Campaign</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Campaign</li>
								<li class="breadcrumb-item active">Create</li>
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
                            <h4 class="card-title mb-4 text-center">Create Campaign</h4>
                            <form action="{{ route('admin.campaign.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="campaignName">Campaign Name</label>
                                            <input type="text" name="campaignName" id="campaignName" class="form-control @error('campaignName') is-invalid @enderror" value="{{ old('campaignName') }}" required maxlength="255">
                                            @error('campaignName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="password">Select Multiple Companies (You can type to search in companies)</label>
                                            <select class="select2 form-control select2-multiple" name="companies[]" multiple="multiple" required data-placeholder="Choose company for campaign">
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-0 text-center">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Create
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