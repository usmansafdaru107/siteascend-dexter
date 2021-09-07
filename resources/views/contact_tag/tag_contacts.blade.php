@extends('layouts.app_main')

@section('title', $tag->tag_name . " | Contacts ")

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
								<li class="breadcrumb-item">Contacts</li>
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
                                <a class="btn btn-outline-dark btn-sm page-title-right" href="{{ route('admin.contact.tag.index') }}"><i class="ri-arrow-go-back-line"></i> Back</a>
                            </div>

                            <table id="datatable" class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Management Level</th>
                                    <th>Department</th>
                                    <th>Job Function</th>
                                    <th>Job Title</th>
                                    <th>Direct Phone Number</th>
                                    <th>Email Address</th>
                                    <th>Visit Zoominfo Profile</th>
                                    <th>Visit Linkedin Profile</th>
                                    <th>Street Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Zip Code</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name() }}</td>
                                            <td>{{ $contact->company->name ?? "" }}</td>
                                            <td>{{ $contact->management_level }}</td>
                                            <td>{{ $contact->department }}</td>
                                            <td>{{ $contact->job_function }}</td>
                                            <td>{{ $contact->job_title }}</td>
                                            <td>{{ $contact->direct_phone_number }}</td>
                                            <td>{{ $contact->email_address }}</td>
                                            <td><a href="{{ $contact->zoominfo_contact_profile_url ?? '#' }}" target="_blank"><i class="ri-external-link-line"></i></a></td>
                                            <td><a href="{{ $contact->linkedin_contact_profile_url ?? '#' }}" target="_blank"><i class="ri-external-link-line"></i></a></td>
                                            <td>{{ $contact->street }}</td>
                                            <td>{{ $contact->city }}</td>
                                            <td>{{ $contact->state }}</td>
                                            <td>{{ $contact->country }}</td>
                                            <td>{{ $contact->zip }}</td>
                                            <td>{{ $contact->created_at }}</td>
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