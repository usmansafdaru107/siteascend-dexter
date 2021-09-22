@extends('layouts.app_main')

@section('title', 'Create Contact')

@section('css_styles')
<style>
    .nav_color {
        color: #919bae !important
    }
    .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }
    .nav_brand1 {
        background: none;
    }
    .vertical-line {
        border-left: 1px solid #919bae;
        height: 50px;
        position: relative;
        left: 4px;
        top: 12px;
    }
    </style>
    <!-- <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"> -->
@stop


@section('content')

<div class="main-content">
	<div class="page-content">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">Create Contact</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Contact</li>
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

                            <h4 class="card-title mb-4 text-center">Create Contact</h4>
                            <form action="{{ route('admin.contact.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="contactFirstName">Contact First Name</label>
                                            <input type="text" name="contactFirstName" id="contactFirstName" class="form-control" value="{{ old('contactFirstName') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="contactLastName">Contact Last Name</label>
                                            <input type="text" name="contactLastName" id="contactLastName" class="form-control" value="{{ old('contactLastName') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="middleName">Middle Name</label>
                                            <input type="text" name="middleName" id="middleName" class="form-control" value="{{ old('middleName') }}" maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="salutation">Salutation</label>
                                            <input type="text" name="salutation" id="salutation" class="form-control" value="{{ old('salutation') }}" maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="suffix">Suffix</label>
                                            <input type="text" name="suffix" id="suffix" class="form-control" value="{{ old('suffix') }}" maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="managementLevel">Management Level</label>
                                            <input type="text" name="managementLevel" id="managementLevel" class="form-control" value="{{ old('managementLevel') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="department">Department</label>
                                            <input type="text" name="department" id="department" class="form-control" value="{{ old('department') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="jobFunction">Job Function</label>
                                            <input type="text" name="jobFunction" id="jobFunction" class="form-control" value="{{ old('jobFunction') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="jobTitle">Job Title</label>
                                            <input type="text" name="jobTitle" id="jobTitle" class="form-control" value="{{ old('jobTitle') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="directPhoneNumber">Direct Phone Number</label>
                                            <input type="text" name="directPhoneNumber" id="directPhoneNumber" class="form-control" value="{{ old('directPhoneNumber') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="dialExtension">Dial Extension</label>
                                            <input type="text" name="dialExtension" id="dialExtension" class="form-control" value="{{ old('dialExtension') }}" maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="mobilePhone">Mobile Phone</label>
                                            <input type="text" name="mobilePhone" id="mobilePhone" class="form-control" value="{{ old('mobilePhone') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="emailAddress">Email Address</label>
                                            <input type="text" name="emailAddress" id="emailAddress" class="form-control" value="{{ old('emailAddress') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="supplementEmail">Supplement Email</label>
                                            <input type="text" name="supplementEmail" id="supplementEmail" class="form-control" value="{{ old('supplementEmail') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="aaEmail">AA Email</label>
                                            <input type="text" name="aaEmail" id="aaEmail" class="form-control" value="{{ old('aaEmail') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="zoominfoCompanyProfileURL">Zoominfo Contact Profile URL</label>
                                            <input type="text" name="zoominfoCompanyProfileURL" id="zoominfoCompanyProfileURL" class="form-control" value="{{ old('zoominfoCompanyProfileURL') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="linkedinCompanyProfileURL">Linkedin Contact Profile URL</label>
                                            <input type="text" name="linkedinCompanyProfileURL" id="linkedinCompanyProfileURL" class="form-control" value="{{ old('linkedinCompanyProfileURL') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="personStreet">Person Street</label>
                                            <input type="text" name="personStreet" id="personStreet" class="form-control" value="{{ old('personStreet') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="personCity">Person City</label>
                                            <input type="text" name="personCity" id="personCity" class="form-control" value="{{ old('personCity') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="personState">Person State</label>
                                            <input type="text" name="personState" id="personState" class="form-control" value="{{ old('personState') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="personZipCode">Person Zip Code</label>
                                            <input type="text" name="personZipCode" id="personZipCode" class="form-control" value="{{ old('personZipCode') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="personCountry">Person Country</label>
                                            <input type="text" name="personCountry" id="personCountry" class="form-control" value="{{ old('personCountry') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="mb-4">
                                            <label class="form-label" for="emailDomain">Email Domain</label>
                                            <input type="text" name="emailDomain" id="emailDomain" class="form-control" value="{{ old('emailDomain') }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
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

    <!-- <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script> -->
@stop

