@extends('layouts.app_main')

@section('title', 'Edit Company')

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
						<h4 class="mb-sm-0">Edit Company</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Company</li>
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
                            <h4 class="card-title mb-4 text-center">Edit Company</h4>
                            <form action="{{ route('admin.company.update', $company->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="campaignName">Company Name</label>
                                            <input type="text" name="companyName" id="companyName" class="form-control" value="{{ old('companyName', $company->name) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="website">Website (www.example.com)</label>
                                            <input type="text" name="website" id="website" class="form-control" value="{{ old('website', $company->website) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="streetAddress">Street Address</label>
                                            <input type="text" name="streetAddress" id="streetAddress" class="form-control" value="{{ old('streetAddress', $company->street_address) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="city">City</label>
                                            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $company->city) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="state">State</label>
                                            <input type="text" name="state" id="state" class="form-control" value="{{ old('state', $company->state) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="zip">Zip</label>
                                            <input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip', $company->zip) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="country">Country</label>
                                            <input type="text" name="country" id="country" class="form-control" value="{{ old('country', $company->country) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="hq_phone">Company HQ Phone</label>
                                            <input type="text" name="hq_phone" id="hq_phone" class="form-control" value="{{ old('hq_phone', $company->hq_phone) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="ticker">Ticker</label>
                                            <input type="text" name="ticker" id="ticker" class="form-control" value="{{ old('ticker', $company->ticker) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="revenue">Revenue in (000s)</label>
                                            <input type="text" name="revenue" id="revenue" class="form-control" value="{{ old('revenue', $company->revenue) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="revenueRange">Revenue Range</label>
                                            <input type="text" name="revenueRange" id="revenueRange" class="form-control" value="{{ old('revenueRange', $company->revenue_range) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="estMarketingDeptBudget">Est Marketing Dept Budget</label>
                                            <input type="text" name="estMarketingDeptBudget" id="estMarketingDeptBudget" class="form-control" value="{{ old('estMarketingDeptBudget', $company->marketing_dept_budget) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="estFinanceDeptBudget">Est Finance Dept Budget</label>
                                            <input type="text" name="estFinanceDeptBudget" id="estFinanceDeptBudget" class="form-control" value="{{ old('estFinanceDeptBudget', $company->finance_dept_budget) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="estItDeptBudget">Est IT Dept Budget</label>
                                            <input type="text" name="estItDeptBudget" id="estItDeptBudget" class="form-control" value="{{ old('estItDeptBudget', $company->it_dept_budget) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="estHrDeptBudget">Est HR Dept Budget</label>
                                            <input type="text" name="estHrDeptBudget" id="estHrDeptBudget" class="form-control" value="{{ old('estHrDeptBudget', $company->hr_dept_budget) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="employees">Employees</label>
                                            <input type="text" name="employees" id="employees" class="form-control" value="{{ old('employees', $company->employees) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="employeeRange">Employee Range</label>
                                            <input type="text" name="employeeRange" id="employeeRange" class="form-control" value="{{ old('employeeRange', $company->employees_range) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="primaryIndustry">Primary Industry</label>
                                            <input type="text" name="primaryIndustry" id="primaryIndustry" class="form-control" value="{{ old('primaryIndustry', $company->primary_industry) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="primarySubIndustry">Primary Sub-Industry</label>
                                            <input type="text" name="primarySubIndustry" id="primarySubIndustry" class="form-control" value="{{ old('primarySubIndustry', $company->primary_sub_industry) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="allIndustry">All Industry</label>
                                            <input type="text" name="allIndustry" id="allIndustry" class="form-control" value="{{ old('allIndustry', $company->all_industries) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="allSubIndustry">All Sub-Industry</label>
                                            <input type="text" name="allSubIndustry" id="allSubIndustry" class="form-control" value="{{ old('allSubIndustry', $company->all_sub_industries) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="zoominfoCompanyProfileURL">Zoominfo Company Profile URL</label>
                                            <input type="text" name="zoominfoCompanyProfileURL" id="zoominfoCompanyProfileURL" class="form-control" value="{{ old('zoominfoCompanyProfileURL', $company->zoominfo_company_profile_url) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="linkedinCompanyProfileURL">Linkedin Company Profile URL</label>
                                            <input type="text" name="linkedinCompanyProfileURL" id="linkedinCompanyProfileURL" class="form-control" value="{{ old('linkedinCompanyProfileURL', $company->linkedin_company_profile_url) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="ownershipType">Ownership Type</label>
                                            <input type="text" name="ownershipType" id="ownershipType" class="form-control" value="{{ old('ownershipType', $company->ownership_type) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="businessModel">Business Model</label>
                                            <input type="text" name="businessModel" id="businessModel" class="form-control" value="{{ old('businessModel', $company->business_model) }}" required maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="password">Select Multiple Contact</label>
                                            <select class="select2 form-control select2-multiple" multiple="multiple" name="contacts[]" data-placeholder="Choose contacts for company">
                                                @foreach ($contacts as $contact)
                                                    <option value="{{ $contact->id }}" {{ ($contact->company_id == $company->id)? "selected": "" }}>{{ $contact->name() }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="toDialExtension">To Dial Extension</label>
                                            <input type="text" name="toDialExtension" id="toDialExtension" class="form-control" value="{{ old('toDialExtension', $company->to_dial_extension) }}" maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="toDialDirectory">To Dial Directory</label>
                                            <input type="text" name="toDialDirectory" id="toDialDirectory" class="form-control" value="{{ old('toDialDirectory', $company->to_dial_directory) }}" maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="toDialOperator">To Dial Operator</label>
                                            <input type="text" name="toDialOperator" id="toDialOperator" class="form-control" value="{{ old('toDialOperator', $company->to_dial_operator) }}" maxlength="255">
                                            <div class="invalid-feedback">
                                                Invalid company name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-0 text-center">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Edit
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

