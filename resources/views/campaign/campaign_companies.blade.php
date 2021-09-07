@extends('layouts.app_main')

@section('title', $campaign->name . " | Companies ")

@section('content')

<div class="main-content">
	<div class="page-content">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">{{$campaign->name}}</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Campaign</li>
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
                        <div class="card-body">

                            <div class="mb-3">
                                <a class="btn btn-outline-dark btn-sm page-title-right" href="{{ route('admin.campaign.index') }}"><i class="ri-arrow-go-back-line"></i> Back</a>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Campaign Name</th>
                                    <th>Street Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Zip</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>


                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $campaign->name }}</td>
                                            <td>{{ $company->street_address }}</td>
                                            <td>{{ $company->city }}</td>
                                            <td>{{ $company->state }}</td>
                                            <td>{{ $company->country }}</td>
                                            <td>{{ $company->zip }}</td>
                                            @php
                                                // $statusId = $company->campaigns->find($campaign->id)->pivot->status_id;
                                                // $statusId = $company->pivot->status_id;
                                                $status = ($company->pivot->status_id) ? App\Models\CampaignCompanyStatus::find($company->pivot->status_id)->status_name : "";
                                            @endphp
                                            <td><a href="#" class="change-status" id="{{ $company->id }}" data-company-id="{{ $company->id }}" data-campaign-id="{{ $campaign->id }}" data-status-id="{{ $company->pivot->status_id }}">{{ Str::upper($status)}}</a></td>
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
    var statusesObject = {};
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Get Statuses
        $.ajax({
            type:'GET',
            url:"{{ route('admin.campaignCompanyStatuses.fetchAll') }}",
            success:function(data) {
                data.forEach(element => {
                    statusesObject[element.id] = element.status_name.toUpperCase()
                });
            }
        });
        
        var changeStatus = $(".change-status");
        changeStatus.on('click', function(e) {
            e.preventDefault();
            var companyId = $(this).attr('data-company-id');
            var campaignId = $(this).attr('data-campaign-id');
            var statusId = $(this).attr('data-status-id');
            var that = this;

            Swal.fire({
            title: 'Add Status to Company in a Campaign',
            input: 'select',
            inputOptions: statusesObject,
            inputPlaceholder: 'Please Select a Status',
            showCancelButton: true,
            inputValidator: function (value) {
                return new Promise(function (resolve, reject) {
                    if (value !== '') {
                        $.ajax({
                            type:'POST',
                            url:"{{ route('admin.campaign.updateStatus') }}",
                            data:{campaignId:campaignId, companyId: companyId, status: value},
                            success:function(data) {
                                if(data.success) {
                                    $(that).text(statusesObject[value].toUpperCase());
                                    resolve();
                                } else {
                                    resolve('Something unexpected happened on server, please refresh and try again.');
                                }
                            }
                        });
                    } else {
                        resolve('You need to select one option.');
                    }
                });
            }
            }).then(function (result) {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        html: 'Status updated successfully!'
                    });
                }
            });

        });
    });
</script>
@stop