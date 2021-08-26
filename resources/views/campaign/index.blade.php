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
                        <div class="card-body">

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
                                <a class="btn btn-outline-dark btn-sm page-title-right" href="{{ route('admin.campaign.create') }}">Add New Campaign</a>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Total Companies in Campaign</th>
                                    <th>Start Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>


                                <tbody>
                                    @foreach ($campaigns as $campaign)
                                        <tr>
                                            <td title="Click to view companies in tha campaign"><a href="{{ route('admin.campaign.company', ["campaign" => $campaign->id]) }}"><i class="ri-links-fill"></i> {{ $campaign->name }}</a></td>
                                            <td>{{ $campaign->companies->count() }}</td>
                                            <td>{{ $campaign->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.campaign.edit', ['campaign' => $campaign->id]) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit Campaign">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.campaign.destroy', ['campaign' => $campaign->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-secondary btn-sm edit" type="submit" title="Delete Campaign">
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