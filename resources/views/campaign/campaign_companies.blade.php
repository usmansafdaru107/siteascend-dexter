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
                                            <td><a href="#" class="change-status" id="{{ $company->id }}" data-company-id="{{ $company->id }}" data-campaign-id="{{ $campaign->id }}">{{ Str::upper(Str::replace('-', ' ', $company->campaigns->find($campaign->id)->pivot->status))}}</a></td>
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
        
        var changeStatus = $(".change-status");
        changeStatus.on('click', function(e) {
            e.preventDefault();
            var companyId = $(this).attr('data-company-id');
            var campaignId = $(this).attr('data-campaign-id');
            var that = this;

            Swal.fire({
            title: 'Add Status to Company in a Campaign',
            input: 'select',
            inputOptions: {
                'active': 'Active',
                'inactive': 'Inactive',
                'meeting-set': 'Meeting Set',
                'hot': 'Hot',
                'priority': 'Priority',
            },
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
                                    $(that).text(value.toUpperCase());
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
                        html: 'Status updated to: ' + result.value.toUpperCase()
                    });
                }
            });

        });
    });
        
        // Swal.fire({title:"Any fool can use a computer",confirmButtonColor:"#5664d2"});
    // $("#ajax-alert").click(function(){Swal.fire({title:"Submit email to run ajax request",input:"email",showCancelButton:!0,confirmButtonText:"Submit",showLoaderOnConfirm:!0,confirmButtonColor:"#5664d2",cancelButtonColor:"#ff3d60",preConfirm:function(n){return new Promise(function(t,e){setTimeout(function(){"taken@example.com"===n?e("This email is already taken."):t()},2e3)})},allowOutsideClick:!1}).then(function(t){Swal.fire({icon:"success",title:"Ajax request finished!",confirmButtonColor:"#5664d2",html:"Submitted email: "+t})})})
</script>
@stop