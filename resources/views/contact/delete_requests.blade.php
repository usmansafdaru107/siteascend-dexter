@extends('layouts.app_main')

@section('title', 'Requests to Delete Contacts')

@section('content')

<div class="main-content">
	<div class="page-content">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">Request to Delete Contacts</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Contacts</li>
								<li class="breadcrumb-item">To Delete</li>
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
                                    <th>Abort Request</th>
                                    <th>Delete Permanently</th>
                                    <th>Requesting User Name</th>
                                    <th>Requesting User Email</th>
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
                                            <td>
                                                <form action="{{ route('admin.contact.restore', ['contact' => $contact->id]) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-outline-secondary btn-sm edit" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Abort Delete Contact Request">
                                                        <i class="ri-arrow-go-back-fill"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.contact.force.destroy', ['contact' => $contact->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-secondary btn-sm edit" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Contact Permanently">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            @php
                                                $user = \App\Models\User::where('id', '=', $contact->deleted_by)->get(["name", "email"]);
                                                if($user->isEmpty())
                                                    $user = ['name' => '', 'email' => ''];
                                                else
                                                    $user = $user[0];
                                            @endphp
                                            <td>{{ $user['name'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>{{ $contact->name() }}</td>
                                            <td>{{ $contact->company->name ?? "" }}</td>
                                            <td>{{ $contact->management_level }}</td>
                                            <td>{{ $contact->department }}</td>
                                            <td>{{ $contact->job_function }}</td>
                                            <td>{{ $contact->job_title }}</td>
                                            <td>{{ $contact->direct_phone_number }}</td>
                                            <td>{{ $contact->email_address }}</td>
                                            <td><a href="{{ $contact->zoominfo_contact_profile_url ?? '#' }}" target="_blank">{{$contact->zoominfo_contact_profile_url}}</a></td>
                                            <td><a href="{{ $contact->linkedin_contact_profile_url ?? '#' }}" target="_blank">{{$contact->linkedin_contact_profile_url}}</a></td>
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