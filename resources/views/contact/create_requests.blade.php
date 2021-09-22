@extends('layouts.app_main')

@section('title', 'Requests to Create Contacts')

@section('content')

<div class="main-content">
	<div class="page-content">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">Request to Create Contacts</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Contacts</li>
								<li class="breadcrumb-item">To Create</li>
								<li class="breadcrumb-item active">Queue</li>
							</ol>
						</div>

					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="overflow-x: auto;">

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

                            <table id="datatable" class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>Delete</th>
                                    <th>Add New Contact</th>
                                    <th>Requesting User Name</th>
                                    <th>Requesting User Email</th>
                                    <th>Company Name</th>
                                    <th>Prospect Title</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($contactRequests as $contactRequest)
                                        <tr id="{{ $contactRequest->id }}">
                                            @php
                                                $user = \App\Models\User::where('id', '=', $contactRequest->requested_by)->get(["name", "email"]);
                                                if($user->isEmpty())
                                                    $user = ['name' => '', 'email' => ''];
                                                else
                                                    $user = $user[0];
                                            @endphp
                                            <td>
                                                <form action="{{ route('admin.contact-request.destroy', ['contact_request' => $contactRequest->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-secondary btn-sm edit" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Contact Request">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-outline-secondary btn-sm add_new_contact_btn" data-contact-request-id="{{ $contactRequest->id }}" data-company-name="{{ $contactRequest->company_name }}" data-prospect-title="{{ $contactRequest->prospect_title }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Contact!">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </td>
                                            <td>{{ $user['name'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>{{ $contactRequest->company_name }}</td>
                                            <td>{{ $contactRequest->prospect_title }}</td>
                                           
                                            
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

		</div>
	</div>
</div>


<!-- Add new Contact Model -->
<div class="modal fade" id="create_new_contact_modal" tabindex="-1" role="dialog" aria-labelledby="create_new_contact_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                    <div class="col-lg-2">
                        <div class="mb-2">
                            <label class="form-label" for="salutation">Salutation</label>
                            <input type="text" name="salutation" id="salutation" class="form-control" value="{{ old('salutation') }}" maxlength="255">
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="mb-2">
                            <label class="form-label" for="prospectTitle">ProspectTitle</label>
                            <input type="text" name="prospectTitle" id="prospectTitle" class="form-control" value="{{ old('prospectTitle') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid prospect Title.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="mb-2">
                            <label class="form-label" for="companyName">Company Name</label>
                            <input type="text" name="companyName" id="companyName" class="form-control" value="{{ old('companyName') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid Company Name.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-2">
                            <label class="form-label" for="jobTitle">Job Title</label>
                            <input type="text" name="jobTitle" id="jobTitle" class="form-control" value="{{ old('jobTitle') }}" required maxlength="255">
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="mb-2">
                            <label class="form-label" for="directPhoneNumber">Direct Phone Number</label>
                            <input type="text" name="directPhoneNumber" id="directPhoneNumber" class="form-control" value="{{ old('directPhoneNumber') }}" required maxlength="255">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-2">
                            <label class="form-label" for="dialExtension">Extension</label>
                            <input type="text" name="dialExtension" id="dialExtension" class="form-control" value="{{ old('dialExtension') }}" maxlength="255">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-2">
                            <label class="form-label" for="mobilePhone">Mobile Phone</label>
                            <input type="text" name="mobilePhone" id="mobilePhone" class="form-control" value="{{ old('mobilePhone') }}" required maxlength="255">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-2">
                            <label class="form-label" for="emailAddress">Email Address</label>
                            <input type="text" name="emailAddress" id="emailAddress" class="form-control" value="{{ old('emailAddress') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid email address name.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-2">
                            <label class="form-label" for="zoominfoCompanyProfileURL">Zoominfo Contact Profile URL</label>
                            <input type="text" name="zoominfoCompanyProfileURL" id="zoominfoCompanyProfileURL" class="form-control" value="{{ old('zoominfoCompanyProfileURL') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid Zoominfo Contact Profile URL provided.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-2">
                            <label class="form-label" for="linkedinCompanyProfileURL">Linkedin Contact Profile URL</label>
                            <input type="text" name="linkedinCompanyProfileURL" id="linkedinCompanyProfileURL" class="form-control" value="{{ old('linkedinCompanyProfileURL') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid Linkedin Contact Profile URL provided.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mt-2 text-center">
                            <button type="button" id="store_new_contact_btn" data-contact-request-id="" class="btn btn-primary waves-effect waves-light me-1">
                                Add Contact
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: Add new Contact Model -->
@stop

@section("js_scripts")
<script src="{{ asset('custom_js/services/ajaxService.js') }}"></script>
<script>
    
    (function(){
        var urls = {
            storeMiniContact: '{{ route("admin.contact.storeMiniContact") }}'
        }
        $(document).ready(function() {
            const classes = {
                add_new_contact_btn: 'add_new_contact_btn'
            };
            const elementIds = {
                create_new_contact_modal: 'create_new_contact_modal',

                salutation: 'salutation',
                prospectTitle: 'prospectTitle',
                companyName: 'companyName',
                jobTitle: 'jobTitle',
                directPhoneNumber: 'directPhoneNumber',
                dialExtension: 'dialExtension',
                mobilePhone: 'mobilePhone',
                emailAddress: 'emailAddress',
                zoominfoCompanyProfileURL: 'zoominfoCompanyProfileURL',
                linkedinCompanyProfileURL: 'linkedinCompanyProfileURL',

                store_new_contact_btn: 'store_new_contact_btn',

                datatable: 'datatable'
            };

            $("." + classes.add_new_contact_btn).on('click', function() {
                var prospectCompany = $(this).attr('data-company-name');
                var prospectTitle = $(this).attr('data-prospect-title');
                var contactRequestId = $(this).attr('data-contact-request-id');
                emptyCreateContactModalInfo();
                $("#" + elementIds.prospectTitle).val(prospectTitle);
                $("#" + elementIds.companyName).val(prospectCompany);
                $("#" + elementIds.store_new_contact_btn).attr("data-contact-request-id", contactRequestId);
                $("#" + elementIds.create_new_contact_modal).modal("show");
            });

            $("#" + elementIds.store_new_contact_btn).on("click", handleStoreContact);

            function handleStoreContact() {
                var contactData = {
                    salutation: $("#" + elementIds.salutation).val(),
                    prospectTitle: $("#" + elementIds.prospectTitle).val(),
                    companyName: $("#" + elementIds.companyName).val(),
                    jobTitle: $("#" + elementIds.jobTitle).val(),
                    directPhoneNumber: $("#" + elementIds.directPhoneNumber).val(),
                    dialExtension: $("#" + elementIds.dialExtension).val(),
                    mobilePhone: $("#" + elementIds.mobilePhone).val(),
                    emailAddress: $("#" + elementIds.emailAddress).val(),
                    zoominfoCompanyProfileURL: $("#" + elementIds.zoominfoCompanyProfileURL).val(),
                    linkedinCompanyProfileURL: $("#" + elementIds.linkedinCompanyProfileURL).val(),
                    contactRequestId: $("#" + elementIds.store_new_contact_btn).attr("data-contact-request-id")
                }
                // validate
                if(contactData.prospectTitle.length <= 0) {
                    $("#" + elementIds.prospectTitle).addClass("is-invalid");
                    return;
                } else {
                    $("#" + elementIds.prospectTitle).removeClass("is-invalid");
                }
                if(contactData.companyName.length <= 0) {
                    $("#" + elementIds.companyName).addClass("is-invalid");
                    return;
                } else {
                    $("#" + elementIds.companyName).removeClass("is-invalid");
                }
                if(contactData.emailAddress.length <= 0) {
                    $("#" + elementIds.emailAddress).addClass("is-invalid");
                    return;
                } else {
                    $("#" + elementIds.emailAddress).removeClass("is-invalid");
                }
                console.log(urls, contactData);
                ajaxService.makeAjaxRequest("POST", urls.storeMiniContact, contactData).done(function(data) {
                    $("#" + elementIds.create_new_contact_modal).modal("hide");
                    toastr["success"](`Contact created Successfully!`);
                    $('#' + elementIds.datatable + " tr#" + contactData.contactRequestId).remove();
                }).fail(function(err){
                    $("#" + elementIds.create_new_contact_modal).modal("hide");
                    switch(err.responseJSON.type) {
                        case "contact-request-not-found":
                            toastr["error"](`Invalid contact request selected, please refresh the page and try again!.`);
                            break;
                        case "company-not-found":
                            toastr["error"](`Invalid Company Name provided, please verify first that this company exist in the system.`);
                            break;
                        default:
                            toastr["error"](`Something unexpected happened please refresh and try again!`);
                    }
                });
            }
            function emptyCreateContactModalInfo() {
                $("#" + elementIds.salutation).val("");
                $("#" + elementIds.companyName).val("");
                $("#" + elementIds.prospectTitle).val("");
                $("#" + elementIds.jobTitle).val("");
                $("#" + elementIds.directPhoneNumber).val("");
                $("#" + elementIds.dialExtension).val("");
                $("#" + elementIds.mobilePhone).val("");
                $("#" + elementIds.emailAddress).val("");
                $("#" + elementIds.zoominfoCompanyProfileURL).val("");
                $("#" + elementIds.linkedinCompanyProfileURL).val("");
            }
        });
    }());
</script>
@stop