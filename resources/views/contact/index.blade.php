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
                        <div class="card-body" style="overflow-x: scroll;">

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

                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                                        <div class="dropdown mt-4 mt-sm-0">

                                            <a href="#" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span id="contact_selected_count">0</span> Selected <i class="mdi mdi-chevron-down"></i>
                                            </a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" id="clear_all">Clear All</a>
                                            </div>

                                            <a href="#" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tag Contacts <i class="mdi mdi-chevron-down"></i>
                                            </a>

                                            <div class="dropdown-menu">
                                                @foreach($tags as $tag)
                                                    <a class="dropdown-item" href="#">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input tag_checkbox" type="checkbox" id="checkbox_tag_{{ $tag->id }}" data-id="{{ $tag->id }}" data-name="{{ $tag->tag_name }}">
                                                            <label class="form-check-label" for="checkbox_tag_{{ $tag->id }}">
                                                                {{ $tag->tag_name }}
                                                            </label>
                                                        </div>

                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="page-title-right">
                                            <div class="mb-1">
                                                <a class="btn btn-outline-dark btn-sm page-title-right" href="{{ route('admin.contact.create') }}">Add New Contact</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <table id="datatable" class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>Tag</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
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
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input contact_checkbox" type="checkbox" id="checkbox_contact_{{ $contact->id }}" data-id="{{ $contact->id }}">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.contact.edit', ['contact' => $contact->id]) }}" class="btn btn-outline-secondary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Contact">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.contact.force.destroy', ['contact' => $contact->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-secondary btn-sm edit" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Contact">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
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

@section('js_scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const ids = {
                checkbox_contact_: "checkbox_contact_",
                checkbox_tag_: "checkbox_tag_",
                contact_selected_count: "contact_selected_count",
                clear_all: "clear_all"
            };

            const classes = {
                contact_checkbox: "contact_checkbox",
                tag_checkbox: "tag_checkbox"
            }

            var totalCount = 0;
            updateSelectedCount(totalCount);

            function updateSelectedCount() {
                $("#" + ids.contact_selected_count).text(totalCount);
            }

            function uncheckAllWithClass(className) {
                $('.' + className).each(function() { this.checked = false; });
            }

            // Uncheck all tags on click
            $('.dropdown-toggle').click(function() {
                // Clear all check in dropdown
                uncheckAllWithClass(classes.tag_checkbox);
            });

            $("." + classes.tag_checkbox).on('click', function() {

                if($(this).prop("checked") == true) {

                    var tagId = $(this).attr("data-id");
                    var tagName = $(this).attr("data-name");
                    var selectContactsCount = $('.'+classes.contact_checkbox +":checked").length;
                    if(selectContactsCount <= 0) {
                        toastr["error"]("Please select contacts first.");
                    } else {
                        var contactIds = [];
                        $('.'+classes.contact_checkbox +":checked").each(function() {
                            contactIds.push($(this).attr('data-id'));
                        });

                        // Ajax call
                        $.ajax({
                            type:'POST',
                            url:"{{ route('admin.contact.tag.addStatusToContact') }}",
                            data:{tagId:tagId, contactIds: contactIds},
                            success:function(data) {
                                // console.log(data);
                                if(data.status == "success") {
                                    toastr["success"](`<b>${tagName}</b> Tag added to ${totalCount} record(s).`);
                                } else {
                                    toastr["error"]("Something unexpected happened on server, please refresh page and try again!.");
                                }
                            },
                            error: function(err) {
                                toastr["error"]("Something unexpected happened on server, please refresh page and try again!.");
                            }
                        });

                    }
                }
            });

            $("#"+ids.clear_all).on('click', function() {
                uncheckAllWithClass(classes.contact_checkbox);
                totalCount = 0;
                updateSelectedCount();
            });

            $("."+classes.contact_checkbox).on('click', function() {
                if($(this).prop("checked") == true) {
                    totalCount++;
                    updateSelectedCount();
                } else if($(this).prop("checked") == false){
                    totalCount--;
                    updateSelectedCount();
                }
            });
        });
    </script>
@stop

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
@stop
