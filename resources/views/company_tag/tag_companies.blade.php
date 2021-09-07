@extends('layouts.app_main')

@section('title', $tag->tag_name . " | Companies ")

@section('content')

<div class="main-content">
	<div class="page-content">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">{{ $tag->tag_name }}</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Tag</li>
								<li class="breadcrumb-item">Companies</li>
								<li class="breadcrumb-item active">List</li>
							</ol>
						</div>

					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="overflow-x: scroll;">

                            <div class="mb-3">
                                <a class="btn btn-outline-dark btn-sm page-title-right" href="{{ route('admin.company.tag.index') }}"><i class="ri-arrow-go-back-line"></i> Back</a>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Website Link</th>
                                    <th>Employees Count</th>
                                    <th>Company HQ Phone</th>
                                    <th>Revenue (in 000s)</th>
                                    <th>Revenue Range</th>
                                    <th>Est. Marketing Department Budget (in 000s)</th>
                                    <th>Est. Finance Department Budget (in 000s)</th>
                                    <th>Est. IT Department Budget (in 000s)</th>
                                    <th>Est. HR Department Budget (in 000s)</th>
                                    <th>Employees</th>
                                    <th>Employee Range</th>
                                    <th>Primary Industry</th>
                                    <th>Primary Sub-Industry</th>
                                    <th>Visit Zoominfo Company Profile</th>
                                    <th>Visit Linkedin Company Profile</th>
                                    <th>Ownership Type</th>
                                    <th>Business Model</th>
                                    <th>Street Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>cCountry</th>
                                    <th>Zip</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ $company->name }}</td>
                                            <td><a href="{{ '//'.$company->website }}" target="_blank"><i class="ri-external-link-line"></i></a></td>
                                            <td>{{ $company->contacts()->count() }}</td>
                                            <td>{{ $company->hq_phone }}</td>
                                            <td>{{ $company->revenue }}</td>
                                            <td>{{ $company->revenue_range }}</td>
                                            <td>{{ $company->marketing_dept_budget }}</td>
                                            <td>{{ $company->finance_dept_budget }}</td>
                                            <td>{{ $company->it_dept_budget }}</td>
                                            <td>{{ $company->hr_dept_budget }}</td>
                                            <td>{{ $company->employees }}</td>
                                            <td>{{ $company->employees_range }}</td>
                                            <td>{{ $company->primary_industry }}</td>
                                            <td>{{ $company->primary_sub_industry }}</td>
                                            <td><a href="{{ $contact->zoominfo_company_profile_url ?? '#' }}" target="_blank"><i class="ri-external-link-line"></i></a></td>
                                            <td><a href="{{ $contact->linkedin_company_profile_url ?? '#' }}" target="_blank"><i class="ri-external-link-line"></i></a></td>
                                            <td>{{ $company->ownership_type }}</td>
                                            <td>{{ $company->business_model }}</td>
                                            <td>{{ $company->street_address }}</td>
                                            <td>{{ $company->city }}</td>
                                            <td>{{ $company->state }}</td>
                                            <td>{{ $company->country }}</td>
                                            <td>{{ $company->zip }}</td>
                                            <td>{{ $company->created_at }}</td>
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
@stop