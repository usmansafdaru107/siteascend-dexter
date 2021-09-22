@extends('layouts.app_main')

@section('title', 'Dashboard')

@section('content')
	<div class="main-content">

		<div class="page-content top-padding">
			<div class="container-fluid">

				<!-- start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<h4 class="mb-sm-0">Dashboard</h4>

							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
									<li class="breadcrumb-item active">Dashboard</li>
								</ol>
							</div>

						</div>
					</div>
				</div>
				<!-- end page title -->

				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-md-3">
								<div class="card">
									<div class="card-body">
										<a href="{{ route('admin.campaign.index') }}" class="text-white">
											<div class="d-flex">
												<div class="flex-1 overflow-hidden">
													<p class="text-truncate font-size-14 mb-2">Total Campaigns</p>
													<h4 class="mb-0">{{ $stats['totalCampaigns'] }}</h4>
												</div>
												<div class="text-primary ms-auto">
													<i class="ri-stack-line font-size-24"></i>
												</div>
											</div>
										</a>
									</div>

									<!-- <div class="card-body border-top py-3">
										<div class="text-truncate">
											<span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
											<span class="text-muted ms-2">From previous period</span>
										</div>
									</div> -->
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-body">
										<a href="{{ route('admin.company.index') }}" class="text-white">
											<div class="d-flex">
												<div class="flex-1 overflow-hidden">
													<p class="text-truncate font-size-14 mb-2">Total Companies</p>
													<h4 class="mb-0">{{ $stats['totalCompanies'] }}</h4>
												</div>
												<div class="text-primary ms-auto">
													<i class="ri-building-2-line font-size-24"></i>
												</div>
											</div>
										</a>
									</div>

								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-body">
										<a href="{{ route('admin.contact.index') }}" class="text-white">
											<div class="d-flex">
												<div class="flex-1 overflow-hidden">
													<p class="text-truncate font-size-14 mb-2">Total Contacts</p>
													<h4 class="mb-0">{{ $stats['totalContacts'] }}</h4>

												</div>
												<div class="text-primary ms-auto">
													<i class="ri-admin-fill font-size-24"></i>
												</div>
											</div>
										</a>
									</div>

								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-body">
										<a href="{{ route('admin.user.index') }}" class="text-white">
											<div class="d-flex">
												<div class="flex-1 overflow-hidden">
													<p class="text-truncate font-size-14 mb-2">System DGR Users</p>
													<h4 class="mb-0">{{ $stats['totalDGRUsers'] }}</h4>
												</div>
												<div class="text-primary ms-auto">
													<i class="ri-user-fill font-size-24"></i>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
						<!-- end row -->

					</div>

				</div>
				<!-- end row -->

			</div>

		</div>
		<!-- End Page-content -->



	</div>
@stop
