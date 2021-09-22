@extends('layouts.app_main')

@section('title', 'Companies Accordion View')

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
								<li class="breadcrumb-item active">Accordion View</li>
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
                            <div class="mb-2" style="float: right">
                                <a class="btn btn-outline-dark btn-sm page-title-right" href="{{ route('admin.company.create') }}">Add New Company</a>
                            </div>

                                <h4 class="card-title">Accordion example</h4>
                                <p class="card-title-desc">Extend the default collapse behavior to see the contact is a company.</p>


                                <div id="accordion" class="custom-accordion">
                                    @foreach ($companies as $company)
                                        <div class="card mb-1 shadow-none">
                                            <a href="#collapse{{ $company->id }}" class="text-dark collapsed" data-bs-toggle="collapse"
                                                            aria-expanded="true"
                                                            aria-controls="collapseOne">
                                                <div class="card-header" id="headingOne">
                                                    <h6 class="m-0">
                                                        {{ $company->name }}
                                                        <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                                    </h6>
                                                </div>
                                            </a>

                                            <div id="collapse{{ $company->id }}" class="collapse"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordion">
                                                <div class="card-body">

                                                <p class="text-center text-white font-weight-bold">{{ $company->name . " Contacts" }}</p>
                                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Street Address</th>
                                                        <th>City</th>
                                                        <th>State</th>
                                                        <th>Country</th>
                                                        <th>Zip Code</th>
                                                        <th>Created At</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($company->contacts as $contact)
                                                            <tr>
                                                                <td>{{ $contact->name() }}</td>
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
                                                    <!-- <tr>
                                                        <td>{{ $company->name }}</td>
                                                        <td>{{ $company->contacts()->count() }}</td>
                                                        <td>{{ $company->street_address }}</td>
                                                        <td>{{ $company->city }}</td>
                                                        <td>{{ $company->state }}</td>
                                                        <td>{{ $company->country }}</td>
                                                        <td>{{ $company->zip }}</td>
                                                        <td>{{ $company->created_at }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.company.edit', ['company' => $company->id]) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit Company">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('admin.company.destroy', ['company' => $company->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-outline-secondary btn-sm edit" type="submit" title="Delete Company">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr> -->
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                    <!-- <div class="card mb-1 shadow-none">
                                        <a href="#collapseTwo" class="text-dark collapsed" data-bs-toggle="collapse"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTwo">
                                            <div class="card-header" id="headingTwo">
                                                <h6 class="m-0">
                                                    Collapsible Group Item #2
                                                    <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                                </h6>
                                            </div>
                                        </a>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                data-bs-parent="#accordion">
                                            <div class="card-body">
                                                sunt aliqua put a bird on it squid single-origin coffee
                                                nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                helvetica, craft beer labore wes anderson cred nesciunt
                                                Leggings occaecat craft beer farm-to-table, raw denim
                                                accusamus labore sustainable VHS.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-0 shadow-none">
                                        <a href="#collapseThree" class="text-dark collapsed" data-bs-toggle="collapse"
                                                        aria-expanded="false"
                                                        aria-controls="collapseThree">
                                            <div class="card-header" id="headingThree">
                                                <h6 class="m-0">
                                                    Collapsible Group Item #3
                                                    <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                                </h6>
                                            </div>
                                        </a>
                                        <div id="collapseThree" class="collapse"
                                                aria-labelledby="headingThree" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                accusamus terry richardson ad squid. 3 wolf moon officia
                                                aute, non cupidatat skateboard dolor brunch. Food truck
                                                sunt aliqua put a bird on it squid single-origin coffee
                                                nulla assumenda anderson cred nesciunt
                                            </div>
                                        </div>
                                    </div> -->
                                </div>







                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

		</div>
	</div>
</div>
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
