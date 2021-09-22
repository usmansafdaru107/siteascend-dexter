@extends('layouts.app_main_without_sidebar')

@section('title', 'Company Accordion View in Campaign')

@section('css_styles')

    <link rel="stylesheet" href="{{asset('custom_css/style.css')}}">

@stop

@section('content')
<div class="main-content">

<div class="page-content" style="margin-top: 15px !important;">
    <!-- <div class="container-fluid"> -->
    <div class="">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Boxed Width</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                            <li class="breadcrumb-item active">Boxed Width</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-1" id="bitdefender">{{ $campaign->name }}</h4>

                        <div class="row justify-content-center">
                            <div class="col-xl-3 col-md-3">
                                <div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->name }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Campaign Name :</p>
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->solution }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Solution :</p>
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->solutionURL }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Solution URL :</p>
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->campaignGoal }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Campaign Goal :</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->salesRep }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Sales Rep :</p>
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->salesRepEmail }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Sales Rep Email :</p>
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->salesRepNumber }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Sales Rep Number :</p>
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->salesRepBridge }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Sales Rep Meeting Bridge :</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->calendarAccess }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Calender Access URL :</p>
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->calendarUsername }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Calendar Username :</p>
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->calendarPassword }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Calender Password :</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->calendarInviteAdmin }}</h5>
                                        <p class="text-muted mb-0 text-truncate">Invite admin Alias :</p>
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->DGRAlias }}</h5>
                                        <p class="text-muted mb-0 text-truncate">DGR Admin Alias :</p>
                                        <h5 class="float-end font-size-14 m-0">{{ $campaign->CSRAlias }}</h5>
                                        <p class="text-muted mb-0 text-truncate">CSR Admin Alias :</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- start row -->
        <div class="row">
            <div class="col-lg-7">
                <div class="card" style="max-height: 300px; overflow-y: auto;">
                    <div class="card-body">
                        <div class="table-responsive">
                        @if(!$companies || count($companies) <= 0)
                            <div class="text-center">
                                <p>No Companies available in this campaign.</p>
                            </div>
                        @else
                            <table id="companies_table" class="table table-centered table-hover table-bordered dt-responsive nowrap" data-bs-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="text-white">
                                    <tr>
                                        <th>Company Name</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        @php
                                            $status = ($company->pivot->status_id) ? App\Models\CampaignCompanyStatus::find($company->pivot->status_id)->status_name : "";
                                        @endphp
                                        <tr id="{{$company->id}}" data-campaign-id="{{ $campaign->id }}" style="cursor: pointer;">
                                            <td>{{$company->name}}</td>
                                            <td>{{$company->city}}</td>
                                            <td>{{$company->state}}</td>
                                            <td>
                                                <a href="#" class="change_status" id="{{ $company->id }}" data-company-id="{{ $company->id }}" data-campaign-id="{{ $campaign->id }}" data-status-id="{{ $company->pivot->status_id }}">
                                                    {{ Str::replace('-', ' ', Str::upper($status))}}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-xl-12 col-md-12">
                                <div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-14 m-0" id="company_details_hq"></h5>
                                        <p class="text-muted mb-2 text-truncate">HQ :</p>
                                        <h5 class="float-end font-size-14 m-0">
                                            <input type="text" disabled="true" id="company_details_to_dial_extension" class="form-control form-control-sm">
                                        </h5>
                                        <p class="text-muted mb-2 text-truncate">To Dial Extension :</p>
                                        <h5 class="float-end font-size-14 m-0">
                                            <input type="text" disabled="true" id="company_details_to_dial_directory" class="form-control form-control-sm">
                                        </h5>
                                        <p class="text-muted mb-2 text-truncate">To Dial Directory :</p>
                                        <h5 class="float-end font-size-14 m-0">
                                            <input type="text" disabled="true" id="company_details_to_dial_operator" class="form-control form-control-sm">
                                        </h5>
                                        <p class="text-muted mb-2 text-truncate">To Dial Operator :</p>
                                        <h5 class="float-end font-size-14 m-0" id="company_details_company_url"></h5>
                                        <p class="text-muted mb-2 text-truncate">Company URL :</p>
                                        <h5 class="float-end font-size-14 m-0" id="company_details_linkedin_profile"></h5>
                                        <p class="text-muted mb-2 text-truncate">Company LinkedIn Profile :</p>
                                        <h5 class="float-end font-size-14 m-0" id="company_details_zoominfo_profile"></h5>
                                        <p class="text-muted mb-2 text-truncate">Company ZoomInfo Profile :</p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-outline-dark btn-sm" style="display: none;" id="edit_company_btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill"></i></button>
                                    <button class="btn btn-outline-dark btn-sm" style="display: none;" id="update_company_btn" data-company-id=""><i class="ri-check-fill"></i></button>
                                    <button class="btn btn-outline-dark btn-sm" style="display: none;" id="dismiss_company_edit_btn"><i class="ri-close-fill"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="max-height: 400px; overflow-y: auto;">
                    <div class="card-body">
                        <div class="text-center" id="no_contacts_div">
                            <p>No contacts</p>
                        </div>
                        <div class="table-responsive" id="contacts_table_div">
                            <table id="contacts_table" class="table table-bordered table-centered table-hover dt-responsive nowrap" data-bs-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Prospect Name</th>
                                        <th>Title</th>
                                        <th>Management Level</th>
                                        <th>Direct Dial</th>
                                        <th>Ext.</th>
                                        <th>Mobile</th>
                                    </tr>
                                </thead>
                                <tbody id="contacts_table_body">
                                    <!-- <tr class="contacts_table_rows" id="" style="cursor: pointer;">
                                        <td>:prospect_name</td>
                                        <td>:title</td>
                                        <td>:management_level</td>
                                        <td>:direct_dial</td>
                                        <td>:ext</td>
                                        <td>:mobile</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-7 col-md-7">
                                <div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-1 col-form-label text-truncate">Name</label>
                                        <div class="col-sm-3">
                                            <input type="text" disabled="true" id="contact_details_prospect_name" class="form-control form-control-sm">
                                        </div>

                                        <label for="inputEmail3" class="col-sm-2 col-form-label text-truncate">Direct Dial</label>
                                        <div class="col-sm-3">
                                            <input type="text" disabled="true" id="contact_details_direct_dial" class="form-control form-control-sm" maxlength="255">
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 col-form-label text-truncate">Ext.</label>
                                        <div class="col-sm-2">
                                            <input type="text" disabled="true" id="contact_details_ext" class="form-control form-control-sm" maxlength="255">
                                        </div>

                                        <label for="inputEmail3" class="col-sm-1 col-form-label text-truncate">Title</label>
                                        <div class="col-sm-3">
                                            <input type="text" disabled="true" id="contact_details_title" class="form-control form-control-sm" maxlength="255">
                                        </div>
                                        <label for="inputEmail3" class="col-sm-2 col-form-label text-truncate">Mobile</label>
                                        <div class="col-sm-6">
                                            <input type="text" disabled="true" id="contact_details_mobile" class="form-control form-control-sm" maxlength="255">
                                        </div>

                                        <label for="inputEmail3" class="col-sm-1 col-form-label text-truncate">Email</label>
                                        <div class="col-sm-11">
                                            <input type="text" disabled="true" id="contact_details_email" class="form-control form-control-sm" maxlength="255">
                                        </div>
                                        <label for="inputEmail3" class="col-sm-3 col-form-label text-truncate">AA Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" disabled="true" id="contact_details_aa_email" class="form-control form-control-sm" maxlength="255">
                                        </div>

                                        <label for="inputEmail3" class="col-sm-3 col-form-label text-truncate">LinkedIn Profile</label>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-3">
                                                <input type="text" disabled="true" class="form-control form-control-sm" id="contact_details_linkedin_profile" maxlength="255">
                                                <div class="input-group-prepend input-group-sm">
                                                    <span class="input-group-text" id="contact_details_linkedin_profile_url"><i class="ri-links-line" id=""></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-3 col-form-label text-truncate">ZoomInfo Profile</label>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-3">
                                                <input type="text" disabled="true" class="form-control form-control-sm" id="contact_details_zoominfo_profile" maxlength="255">
                                                <div class="input-group-prepend input-group-sm">
                                                    <span class="input-group-text" id="contact_details_zoominfo_profile_url"><i class="ri-links-line" id=""></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-outline-dark btn-sm" style="display: none;" id="edit_contact_btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill"></i></button>
                                    <button class="btn btn-outline-dark btn-sm" style="display: none;" id="update_contact_btn" data-campaign-id="" data-company-id="" data-contact-id=""><i class="ri-check-fill"></i></button>
                                    <button class="btn btn-outline-dark btn-sm" style="display: none;" id="dismiss_contact_edit_btn"><i class="ri-close-fill"></i></button>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-5">
                                <div class="mb-4">
                                    <textarea name="notes" disabled id="notes" class="form-control" cols="10" rows="10" placeholder="Notes:"></textarea>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-outline-dark btn-sm" style="display: none;" id="edit_contact_note_btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill"></i></button>
                                    <button class="btn btn-outline-dark btn-sm" style="display: none;" id="update_contact_note_btn" data-campaign-id="" data-company-id="" data-contact-id=""><i class="ri-check-fill"></i></button>
                                    <button class="btn btn-outline-dark btn-sm" style="display: none;" id="dismiss_contact_note_edit_btn"><i class="ri-close-fill"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row mb-4">
            <div class="col-md-12 float-right">
                <div>
                    <button id="add_new_contact_btn" data-company-id="" class="btn btn-outline-light float-end" style="display: none;">Add New Contact</button>
                    <button id="request_to_delete_contact_btn" data-company-id="" data-contact-id="" class="btn btn-outline-light float-end mx-2 text-danger" style="display: none;">Request to Delete Current Record</button>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- End Page-content -->

<!-- Add new Contact Model -->
<div class="modal fade" id="create_new_contact_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Center modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                    <div class="col-lg-2">
                        <div class="mb-2">
                            <label class="form-label" for="salutation">Salutation</label>
                            <input type="text" name="salutation" id="salutation" class="form-control" value="{{ old('salutation') }}" maxlength="255">
                            <div class="invalid-feedback">
                                Invalid company name.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="mb-2">
                            <label class="form-label" for="contactFirstName">Contact First Name</label>
                            <input type="text" name="contactFirstName" id="contactFirstName" class="form-control" value="{{ old('contactFirstName') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid company name.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="mb-2">
                            <label class="form-label" for="contactLastName">Contact Last Name</label>
                            <input type="text" name="contactLastName" id="contactLastName" class="form-control" value="{{ old('contactLastName') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid company name.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-2">
                            <label class="form-label" for="jobTitle">Job Title</label>
                            <input type="text" name="jobTitle" id="jobTitle" class="form-control" value="{{ old('jobTitle') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid company name.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="mb-2">
                            <label class="form-label" for="directPhoneNumber">Direct Phone Number</label>
                            <input type="text" name="directPhoneNumber" id="directPhoneNumber" class="form-control" value="{{ old('directPhoneNumber') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid company name.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-2">
                            <label class="form-label" for="dialExtension">Dial Extension</label>
                            <input type="text" name="dialExtension" id="dialExtension" class="form-control" value="{{ old('dialExtension') }}" maxlength="255">
                            <div class="invalid-feedback">
                                Invalid company name.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-2">
                            <label class="form-label" for="mobilePhone">Mobile Phone</label>
                            <input type="text" name="mobilePhone" id="mobilePhone" class="form-control" value="{{ old('mobilePhone') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid company name.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-2">
                            <label class="form-label" for="emailAddress">Email Address</label>
                            <input type="text" name="emailAddress" id="emailAddress" class="form-control" value="{{ old('emailAddress') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid company name.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-2">
                            <label class="form-label" for="zoominfoCompanyProfileURL">Zoominfo Contact Profile URL</label>
                            <input type="text" name="zoominfoCompanyProfileURL" id="zoominfoCompanyProfileURL" class="form-control" value="{{ old('zoominfoCompanyProfileURL') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid company name.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-2">
                            <label class="form-label" for="linkedinCompanyProfileURL">Linkedin Contact Profile URL</label>
                            <input type="text" name="linkedinCompanyProfileURL" id="linkedinCompanyProfileURL" class="form-control" value="{{ old('linkedinCompanyProfileURL') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Invalid company name.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mt-2 text-center">
                            <button type="button" id="store_new_contact_btn" data-company-id="" class="btn btn-primary waves-effect waves-light me-1">
                                Add Contact
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Emd: Add new Contact Model -->

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © Nazox.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                </div>
            </div>
        </div>
    </div>
</footer>

</div>
@stop

@section('js_scripts')
    <script>
       var urls = {
           getCompany: '{{ route("admin.company.fetchOne", ":id") }}',
           getContact: '{{ route("admin.contact.fetchOne") }}',
           miniUpdateContact: '{{ route("admin.contact.miniUpdate", ":id") }}',
           miniUpdateCompany: '{{ route("admin.company.miniUpdate", ":id") }}',
           miniUpdateContactNote: '{{ route("admin.contact.miniUpdateNote") }}',
           campaignCompanyStatusesFetchAll: '{{ route("admin.campaignCompanyStatuses.fetchAll") }}',
           campaignUpdateStatus: '{{ route("admin.campaign.updateStatus") }}',
           storeContactMini: '{{ route("admin.contact.storeMini") }}',
           requestDeleteContact: '{{ route("admin.contact.destroy", ":id") }}',
       }
    </script>
    <script src="{{ asset('custom_js/services/ajaxService.js') }}"></script>
    <script src="{{ asset('custom_js/services/helpersService.js') }}"></script>
    <script src="{{ asset('custom_js/campaign/campaign_accordion.js') }}"></script>
@stop

