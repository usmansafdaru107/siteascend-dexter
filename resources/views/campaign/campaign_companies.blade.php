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


                                <tbody id="campaign_companies_table_body">
                                    @foreach ($companies as $company)
                                        @php
                                            $status = ($company->pivot->status_id) ? App\Models\CampaignCompanyStatus::find($company->pivot->status_id)->status_name : "";
                                        @endphp
                                        <tr data-status="{{  $status }}">
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $campaign->name }}</td>
                                            <td>{{ $company->street_address }}</td>
                                            <td>{{ $company->city }}</td>
                                            <td>{{ $company->state }}</td>
                                            <td>{{ $company->country }}</td>
                                            <td>{{ $company->zip }}</td>
                                            <td>
                                                <a href="#" class="change-status" id="{{ $company->id }}" data-company-id="{{ $company->id }}" data-campaign-id="{{ $campaign->id }}" data-status-id="{{ $company->pivot->status_id }}">
                                                    {{ Str::replace('-', ' ', Str::upper($status))}}
                                                </a>
                                            </td>
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
    var statusesObjectArrayOrignal = [];
    var statusesObjectArray = [];
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
                    statusesObjectArray[element.status_name] = [];
                    statusesObjectArrayOrignal[element.status_name] = [];
                    statusesObject[element.id] = element.status_name.toUpperCase().replaceAll("-", " ");
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

            console.log("companyId",companyId);
            console.log("campaignId", campaignId);
            console.log("statusId",statusId);

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
                            data:{campaignId: campaignId, companyId: companyId, status: value},
                            success:function(data) {
                                if(data.success) {
                                    $(that).parent().parent().attr("data-status", statusesObject[value].toLowerCase().replaceAll(" ", "-"))
                                    $(that).text(statusesObject[value].toUpperCase().replace("-", " "));
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
                    toastr["success"](`Status Updated successfully!`);
                    setTimeout(() => {
                        window.location.href = "{{ route('admin.campaign.company', $campaign->id) }}";
                    }, 1000);
                    // Swal.fire({
                    //     icon: 'success',
                    //     html: 'Status updated successfully!'
                    // });
                }
            });

        });

        // function sortTable() {
        //     //get the parent table for convenience
        //     let tableBody = document.getElementById("campaign_companies_table_body");

        //     //1. get all rows
        //     let rowsCollection = tableBody.querySelectorAll("tr");
        //     // console.log(rowsCollection);

        //     //2. convert to array
        //     let rows = Array.from(rowsCollection);

        //     // console.log(rows);
        //     //3. shuffle
        //     shuffleArray(rows);

        //     //4. add back to the DOM
        //     for (const row of rows) {
        //         tableBody.appendChild(row);
        //     }
        // }


        // /**
        //  * Randomize array element order in-place.
        //  * Using Durstenfeld shuffle algorithm.
        //  * from: https://stackoverflow.com/questions/2450954/how-to-randomize-shuffle-a-javascript-array/12646864#12646864
        //  */
        // async function shuffleArray(array) {

        //     statusesObjectArray = statusesObjectArrayOrignal
        //     console.log(statusesObjectArray);

        //     for (var i = array.length - 1; i >= 0; i--) {
        //         var status = $(array[i]).attr("data-status");
        //         statusesObjectArray[status].push(array[i]);
        //         // console.log(i);
        //         // console.log(array[i]);
        //         // console.log($(array[i]).attr("data-status"));
        //         // var j = Math.floor(Math.random() * (i + 1));
        //         // var temp = array[i];
        //         // array[i] = array[j];
        //         // array[j] = temp;
        //     }
        //     console.log(statusesObjectArray);
        // }

    });
</script>
@stop

