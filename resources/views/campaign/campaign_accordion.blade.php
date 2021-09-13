@extends('layouts.app_main_without_sidebar')

@section('title', 'Company Accordion View in Campaign')

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
            <div class="col-lg-6">
                <div class="card" style="max-height: 250px; overflow-y: auto;">
                    <div class="card-body">
                        <div class="table-responsive">
                        @if(!$companies || count($companies) <= 0)
                            <div class="text-center">
                                <p>No Companies available in this campaign.</p>
                            </div>
                        @else
                            <table class="table table-centered table-bordered table-hover dt-responsive nowrap" data-bs-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;">#</th>
                                        <th>Company Name</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr class="company_table_row" id="{{$company->id}}" style="cursor: pointer;">
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input company_checkbox" id="company_checkbox_{{$company->id}}">
                                                    <label class="form-check-label mb-0" for="company_checkbox_{{$company->id}}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{$company->name}}</td>
                                            <td>{{$company->city}}</td>
                                            <td>{{$company->state}}</td>
                                            <td>{{ Str::replace('-', ' ', Str::upper(App\Models\CampaignCompanyStatus::find($company->pivot->status_id)->status_name)) }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-xl-12 col-md-12">
                                <div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-14 m-0" id="company_details_hq"></h5>
                                        <p class="text-muted mb-0 text-truncate">HQ :</p>
                                        <h5 class="float-end font-size-14 m-0" id="company_details_hq_switch_board_options"></h5>
                                        <p class="text-muted mb-0 text-truncate">HQ Switch Board Options :</p>
                                        <h5 class="float-end font-size-14 m-0" id="company_details_to_dial_extension"></h5>
                                        <p class="text-muted mb-0 text-truncate">To Dial Extension :</p>
                                        <h5 class="float-end font-size-14 m-0" id="company_details_to_dial_directory"></h5>
                                        <p class="text-muted mb-0 text-truncate">To Dial Directory :</p>
                                        <h5 class="float-end font-size-14 m-0" id="company_details_to_dial_operator"></h5>
                                        <p class="text-muted mb-0 text-truncate">To Dial Operator :</p>
                                        <h5 class="float-end font-size-14 m-0" id="company_details_company_url"></h5>
                                        <p class="text-muted mb-0 text-truncate">Company URL :</p>
                                        <h5 class="float-end font-size-14 m-0" id="company_details_linkedin_profile"></h5>
                                        <p class="text-muted mb-0 text-truncate">Company LinkedIn Profile :</p>
                                        <h5 class="float-end font-size-14 m-0" id="company_details_zoominfo_profile"></h5>
                                        <p class="text-muted mb-0 text-truncate">Company ZoomInfo Profile :</p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-6 col-md-6">
                                <div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-14 m-0">Gigaheap</h5>
                                        <p class="text-muted mb-0 text-truncate">Company URL :</p>
                                        <h5 class="float-end font-size-14 m-0">Solution</h5>
                                        <p class="text-muted mb-0 text-truncate">Company LinkedIn Profile :</p>
                                        <h5 class="float-end font-size-14 m-0">Solution url</h5>
                                        <p class="text-muted mb-0 text-truncate">Company ZoomInfo Profile :</p>
                                        
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="max-height: 250px; overflow-y: auto;">
                    <div class="card-body">
                        <div class="text-center" id="no_contacts_div">
                            <p>No contacts</p>
                        </div>
                        <div class="table-responsive" id="contacts_table_div">
                            <table id="contacts_table" class="table table-bordered table-centered table-hover dt-responsive nowrap" data-bs-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;">#</th>
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
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input contact_checkbox" id="contact_checkbox_:id">
                                                <label class="form-check-label mb-0" for="contact_checkbox_:id">&nbsp;</label>
                                            </div>
                                        </td>
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
                            <div class="col-xl-6 col-md-6">
                                <div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-14 m-0 w-50" id="">
                                            <input type="text" name="" id="contact_details_prospect_name" class="form-control form-control-sm">
                                        </h5>
                                        <p class="text-muted mb-0 text-truncate">Prospect Name :</p>
                                    </div>
                                    <div class="clearfix py-2">

                                        <h5 class="float-end font-size-14 m-0 w-50" id="">
                                            <input type="text" name="" id="contact_details_title" class="form-control form-control-sm" maxlength="255">
                                        </h5>
                                        <p class="text-muted mb-0 text-truncate">Title :</p>
                                    </div>
                                    <div class="clearfix py-2">

                                        <h5 class="float-end font-size-14 m-0 w-50" id="">
                                            <input type="text" name="" id="contact_details_email" class="form-control form-control-sm" maxlength="255">
                                        </h5>
                                        <p class="text-muted mb-0 text-truncate">Email :</p>
                                    </div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-14 m-0 w-50" id="">
                                            <input type="text" name="" id="contact_details_aa_email" class="form-control form-control-sm" maxlength="255">
                                        </h5>
                                        <p class="text-muted mb-0 text-truncate">AA Email :</p>
                                    </div>
                                    <div class="clearfix py-2">

                                        <h5 class="float-end font-size-14 m-0 w-50" id="">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" id="contact_details_linkedin_profile" maxlength="255">
                                                <div class="input-group-prepend input-group-sm">
                                                    <span class="input-group-text" id="contact_details_linkedin_profile_url"><i class="ri-links-line" id=""></i></span>
                                                </div>
                                            </div>
                                        </h5>
                                        <p class="text-muted mb-0 text-truncate">LinkedIn Profile :</p>
                                    </div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-14 m-0 w-50" id="">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" id="contact_details_zoominfo_profile" maxlength="255">
                                                <div class="input-group-prepend input-group-sm">
                                                    <span class="input-group-text" id="contact_details_zoominfo_profile_url"><i class="ri-links-line" id=""></i></span>
                                                </div>
                                            </div>
                                        </h5>
                                        <p class="text-muted mb-0 text-truncate">ZoomInfo Profile :</p>
                                    </div>
                                    <div class="clearfix py-2">

                                        <h5 class="float-end font-size-14 m-0 w-50" id="">
                                            <input type="text" name="" id="contact_details_direct_dial" class="form-control form-control-sm" maxlength="255">
                                        </h5>
                                        <p class="text-muted mb-0 text-truncate">Direct Dial:</p>
                                    </div>
                                    <div class="clearfix py-2">

                                        <h5 class="float-end font-size-14 m-0 w-50" id="">
                                            <input type="text" name="" id="contact_details_ext" class="form-control form-control-sm" maxlength="255">
                                        </h5>
                                        <p class="text-muted mb-0 text-truncate">Ext. :</p>
                                    </div>
                                    <div class="clearfix py-2">

                                        <h5 class="float-end font-size-14 m-0 w-50" id="">
                                            <input type="text" name="" id="contact_details_mobile" class="form-control form-control-sm" maxlength="255">
                                        </h5>
                                        <p class="text-muted mb-0 text-truncate">Mobile :</p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-outline-dark btn-sm" id="update_contact_btn" data-contact-id="">Update</button>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div>
                                    <textarea name="notes" id="notes" class="form-control" cols="10" rows="10" placeholder="Notes:"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    
</div>
<!-- End Page-content -->

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
           getContact: '{{ route("admin.contact.fetchOne", ":id") }}',
           miniUpdateContact: '{{ route("admin.contact.miniUpdate", ":id") }}',
       }
    </script>
    <script src="{{ asset('custom_js/ajaxService.js') }}"></script>
    <script src="{{ asset('custom_js/campaign/campaign_accordion.js') }}"></script>
@stop