@extends('layouts.app_main')

@section('title', 'Contact List')

@section('content')

<div class="main-content">
	<div class="page-content">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">Contacts</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
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
                        <div class="card-body"  style="overflow-x: scroll;">

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
                            <div class="mb-3" style="float: right">
                                <a class="btn btn-outline-dark btn-sm page-title-right" href="{{ route('admin.contact.create') }}">Add New Contact</a>
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
                                    <th>Edit</th>
                                    <th>Delete</th>
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
                                            <td><a href="{{ $contact->zoominfo_contact_profile_url ?? "#" }}" target="_blank"><i class="ri-external-link-line"></i></a></td>
                                            <td><a href="{{ $contact->linkedin_contact_profile_url ?? "#" }}" target="_blank"><i class="ri-external-link-line"></i></a></td>
                                            <td>{{ $contact->street }}</td>
                                            <td>{{ $contact->city }}</td>
                                            <td>{{ $contact->state }}</td>
                                            <td>{{ $contact->country }}</td>
                                            <td>{{ $contact->zip }}</td>
                                            <td>{{ $contact->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.contact.edit', ['contact' => $contact->id]) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit Company">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.contact.destroy', ['contact' => $contact->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-secondary btn-sm edit" type="submit" title="Delete Company">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
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