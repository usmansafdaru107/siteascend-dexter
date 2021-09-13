@extends('layouts.app_main')

@section('title', 'Companies List')

@section('content')

<div class="main-content">
	<div class="page-content">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">Companies</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
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
                                                <span id="company_selected_count">0</span> Selected <i class="mdi mdi-chevron-down"></i>
                                            </a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" id="clear_all">Clear All</a>
                                            </div>

                                            <a href="#" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tag Companies <i class="mdi mdi-chevron-down"></i>
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
                                                <a class="btn btn-outline-dark btn-sm page-title-right" href="{{ route('admin.company.create') }}">Add New Company</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Tag</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
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
                                    <th>Country</th>
                                    <th>Zip</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>


                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input company_checkbox" type="checkbox" id="checkbox_company_{{ $company->id }}" data-id="{{ $company->id }}">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.company.edit', ['company' => $company->id]) }}" class="btn btn-outline-secondary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Company">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.company.destroy', ['company' => $company->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-secondary btn-sm edit" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Company">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $company->name }}</td>
                                            <td><a href="{{ '//'.$company->website }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to open link in new tab">{{$company->website}}</a></td>
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
                                            <td><a href="{{ $company->zoominfo_company_profile_url ?? '#' }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to open link in new tab">{{$company->zoominfo_company_profile_url}}</a></td>
                                            <td><a href="{{ $company->linkedin_company_profile_url ?? '#' }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to open link in new tab">{{$company->linkedin_company_profile_url}}</a></td>
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


@section('js_scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            const ids = {
                checkbox_company_: "checkbox_company_",
                checkbox_tag_: "checkbox_tag_",
                company_selected_count: "company_selected_count",
                clear_all: "clear_all"
            };

            const classes = {
                company_checkbox: "company_checkbox",
                tag_checkbox: "tag_checkbox"
            }

            var totalCount = 0;
            updateSelectedCount(totalCount);

            function updateSelectedCount() {
                $("#" + ids.company_selected_count).text(totalCount);
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
                    var selectContactsCount = $('.'+classes.company_checkbox +":checked").length;
                    if(selectContactsCount <= 0) {
                        toastr["error"]("Please select companies first.");
                    } else {
                        var companyIds = [];
                        $('.'+classes.company_checkbox +":checked").each(function() {
                            companyIds.push($(this).attr('data-id'));
                        });

                        // Ajax call
                        $.ajax({
                            type:'POST',
                            url:"{{ route('admin.company.tag.addStatusToCompany') }}",
                            data:{tagId:tagId, companyIds: companyIds},
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
                uncheckAllWithClass(classes.company_checkbox);
                totalCount = 0;
                updateSelectedCount();
            });

            $("."+classes.company_checkbox).on('click', function() {
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