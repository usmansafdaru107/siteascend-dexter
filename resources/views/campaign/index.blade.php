@extends('layouts.app_main')

@section('title', 'Campaigns List')

@section('content')

<div class="main-content">
	<div class="page-content">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">Campaigns</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Campaigns</li>
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
                                                <span id="campaign_selected_count">0</span> Selected <i class="mdi mdi-chevron-down"></i>
                                            </a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" id="clear_all">Clear All</a>
                                            </div>

                                            <a href="#" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tag Campaigns <i class="mdi mdi-chevron-down"></i>
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
                                                <a class="btn btn-outline-dark btn-sm page-title-right" href="{{ route('admin.campaign.create') }}">Add New Campaign</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Tag</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Total Companies in Campaign</th>
                                    <th>Client Name</th>
                                    <th>Solution</th>
                                    <th>Solution URL</th>
                                    <th>Sales Rep</th>
                                    <th>Sales Rep Email</th>
                                    <th>Sales Rep Number</th>
                                    <th>Sales Rep Bridge</th>
                                    <th>Calendar Access</th>
                                    <th>Calendar Username</th>
                                    <th>Calendar Password</th>
                                    <th>Calendar Invite Admin</th>
                                    <th>Campaign Start Date</th>
                                    <th>Expected End Date</th>
                                    <th>Actual Finished Date</th>
                                </tr>
                                </thead>


                                <tbody>
                                    @foreach ($campaigns as $campaign)
                                        <tr>
                                            <td>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input campaign_checkbox" type="checkbox" id="checkbox_campaign_{{ $campaign->id }}" data-id="{{ $campaign->id }}">
                                                </div>
                                            </td>
                                            <td><a href="{{ route('admin.campaign.campaignAccordion', ['campaign' => $campaign->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to view Company Accordion in Campaign"><i class="ri-links-fill"></i> {{ $campaign->name }}</a></td>
                                            <td>
                                                <a href="{{ route('admin.campaign.edit', ['campaign' => $campaign->id]) }}" class="btn btn-outline-secondary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Campaign">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.campaign.destroy', ['campaign' => $campaign->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-secondary btn-sm edit" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Campaign">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $campaign->companies->count() }}</td>
                                            <td>{{ $campaign->clientName }}</td>
                                            <td>{{ $campaign->solution }}</td>
                                            <td>{{ $campaign->solutionURL }}</td>
                                            <td>{{ $campaign->salesRep }}</td>
                                            <td>{{ $campaign->salesRepEmail }}</td>
                                            <td>{{ $campaign->salesRepNumber }}</td>
                                            <td>{{ $campaign->salesRepBridge }}</td>
                                            <td>{{ $campaign->calendarAccess }}</td>
                                            <td>{{ $campaign->calendarUsername }}</td>
                                            <td>{{ $campaign->calendarPassword }}</td>
                                            <td>{{ $campaign->calendarInviteAdmin }}</td>
                                            <td>{{ $campaign->campaignStartDate }}</td>
                                            <td>{{ $campaign->expectedEndDate }}</td>
                                            <td>{{ $campaign->actualFinishedDate }}</td>

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
                checkbox_campaign_: "checkbox_campaign_",
                checkbox_tag_: "checkbox_tag_",
                campaign_selected_count: "campaign_selected_count",
                clear_all: "clear_all"
            };

            const classes = {
                campaign_checkbox: "campaign_checkbox",
                tag_checkbox: "tag_checkbox"
            }

            var totalCount = 0;
            updateSelectedCount(totalCount);

            function updateSelectedCount() {
                $("#" + ids.campaign_selected_count).text(totalCount);
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
                    var selectContactsCount = $('.'+classes.campaign_checkbox +":checked").length;
                    if(selectContactsCount <= 0) {
                        toastr["error"]("Please select campaign first.");
                    } else {
                        var campaignIds = [];
                        $('.'+classes.campaign_checkbox +":checked").each(function() {
                            campaignIds.push($(this).attr('data-id'));
                        });

                        // Ajax call
                        $.ajax({
                            type:'POST',
                            url:"{{ route('admin.campaign.tag.addStatusToCampaign') }}",
                            data:{tagId:tagId, campaignIds: campaignIds},
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
                uncheckAllWithClass(classes.campaign_checkbox);
                totalCount = 0;
                updateSelectedCount();
            });

            $("."+classes.campaign_checkbox).on('click', function() {
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
        margin-top: 0; // remove the gap so it doesn't close
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
