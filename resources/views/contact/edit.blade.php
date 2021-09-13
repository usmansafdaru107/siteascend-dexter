@extends('layouts.app_main')

@section('title', 'Edit Contact')

@section('css_styles')
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
						<h4 class="mb-sm-0">Edit Contact</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Contact</li>
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

                            <h4 class="card-title mb-4 text-center">Edit Contact</h4>
                            <form action="{{ route('admin.contact.update', ['contact' => $contact->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="contactFirstName">Contact First Name</label>
                                            <input type="text" name="contactFirstName" id="contactFirstName" class="form-control" value="{{ old('contactFirstName', $contact->first_name) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="contactLastName">Contact Last Name</label>
                                            <input type="text" name="contactLastName" id="contactLastName" class="form-control" value="{{ old('contactLastName', $contact->last_name) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="middleName">Middle Name</label>
                                            <input type="text" name="middleName" id="middleName" class="form-control" value="{{ old('middleName', $contact->middle_name) }}" maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="salutation">Salutation</label>
                                            <input type="text" name="salutation" id="salutation" class="form-control" value="{{ old('salutation', $contact->salutation) }}" maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="suffix">Suffix</label>
                                            <input type="text" name="suffix" id="suffix" class="form-control" value="{{ old('suffix', $contact->suffix) }}" maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="managementLevel">Management Level</label>
                                            <input type="text" name="managementLevel" id="managementLevel" class="form-control" value="{{ old('managementLevel', $contact->management_level) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="department">Department</label>
                                            <input type="text" name="department" id="department" class="form-control" value="{{ old('department', $contact->department) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="jobFunction">Job Function</label>
                                            <input type="text" name="jobFunction" id="jobFunction" class="form-control" value="{{ old('jobFunction', $contact->job_function) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="jobTitle">Job Title</label>
                                            <input type="text" name="jobTitle" id="jobTitle" class="form-control" value="{{ old('jobTitle', $contact->job_title) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="directPhoneNumber">Direct Phone Number</label>
                                            <input type="text" name="directPhoneNumber" id="directPhoneNumber" class="form-control" value="{{ old('directPhoneNumber', $contact->direct_phone_number) }}" required maxlength="255">
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
                                            <input type="text" name="mobilePhone" id="mobilePhone" class="form-control" value="{{ old('mobilePhone', $contact->mobile_phone) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="emailAddress">Email Address</label>
                                            <input type="text" name="emailAddress" id="emailAddress" class="form-control" value="{{ old('emailAddress', $contact->email_address) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="supplementEmail">Supplement Email</label>
                                            <input type="text" name="supplementEmail" id="supplementEmail" class="form-control" value="{{ old('supplementEmail', $contact->supplemental_email) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="zoominfoCompanyProfileURL">Zoominfo Company Profile URL</label>
                                            <input type="text" name="zoominfoCompanyProfileURL" id="zoominfoCompanyProfileURL" class="form-control" value="{{ old('zoominfoCompanyProfileURL', $contact->zoominfo_contact_profile_url) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="linkedinCompanyProfileURL">Linkedin Company Profile URL</label>
                                            <input type="text" name="linkedinCompanyProfileURL" id="linkedinCompanyProfileURL" class="form-control" value="{{ old('linkedinCompanyProfileURL', $contact->linkedin_contact_profile_url) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="personStreet">Person Street</label>
                                            <input type="text" name="personStreet" id="personStreet" class="form-control" value="{{ old('personStreet', $contact->street) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="personCity">Person City</label>
                                            <input type="text" name="personCity" id="personCity" class="form-control" value="{{ old('personCity', $contact->city) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="personState">Person State</label>
                                            <input type="text" name="personState" id="personState" class="form-control" value="{{ old('personState', $contact->state) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="personZipCode">Person Zip Code</label>
                                            <input type="text" name="personZipCode" id="personZipCode" class="form-control" value="{{ old('personZipCode', $contact->zip) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="personCountry">Person Country</label>
                                            <input type="text" name="personCountry" id="personCountry" class="form-control" value="{{ old('personCountry', $contact->country) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="mb-4">
                                            <label class="form-label" for="emailDomain">Email Domain</label>
                                            <input type="text" name="emailDomain" id="emailDomain" class="form-control" value="{{ old('emailDomain', $contact->email_domain) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
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
<script>
    $(document).ready(function(){
        setTimeout(() => {
            $("#message_success").hide('slow');
        }, 5000);
        setTimeout(() => {
            $("#message_error").hide('slow');
        }, 5000);
    });
</script>
    <!-- <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script> -->
@stop