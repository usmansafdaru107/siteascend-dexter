@extends('layouts.app_main')

@section('title', 'Campaign Tags List')

@section('content')

<div class="main-content">
	<div class="page-content top-padding">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">Campaign Tags List</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Campaign</li>
								<li class="breadcrumb-item">Tags</li>
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
                                <a class="btn btn-outline-dark btn-sm page-title-right" href="{{ route('admin.campaign.tag.create') }}">Add New Campaign Tag</a>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Campaigns Count</th>
                                    <th>Created At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td title="Click to view campaigns in that tag"><a href="{{ route('admin.tag.campaign', ['tag' => $tag->id]) }}"><i class="ri-links-fill"></i> {{ $tag->tag_name }}</a></td>
                                            <td>{{ $tag->campaigns->count() }}</td>
                                            <td>{{ $tag->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.campaign.tag.edit', ['tag' => $tag->id]) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit Campaign Tag">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.campaign.tag.destroy', ['tag' => $tag->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-secondary btn-sm edit" type="submit" title="Delete Tag">
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

