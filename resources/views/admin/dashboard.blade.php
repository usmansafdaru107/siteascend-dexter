@extends('layouts.app_main')

@section('title', 'Dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Dashboard</h3>					
				</div>
				<div class="right-title">
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				
				<div class="col-xl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="text-center py-30">
								<div class="icon mb-15">
									<i class="fa fa-bullhorn bg-success-light mr-0"></i>
								</div>
								<div>
									<h1 class="font-weight-400">{{ $stats['totalCampaigns'] }}</h1>
									<p class="text-fade mb-0">Total Campaigns</p>						
								</div>
							</div>
						</div>
					</div>					
				</div>
				<div class="col-xl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="text-center py-30">
								<div class="icon mb-15">
									<i class="fa fa-bullhorn bg-success-light mr-0"></i>
								</div>
								<div>
									<h1 class="font-weight-400">{{ $stats['totalCompanies'] }}</h1>
									<p class="text-fade mb-0">Total Companies</p>						
								</div>
							</div>
						</div>
					</div>					
				</div>
                <div class="col-xl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="text-center py-30">
								<div class="icon mb-15">
									<i class="fa fa-bullhorn bg-success-light mr-0"></i>
								</div>
								<div>
									<h1 class="font-weight-400">{{ $stats['totalAdmins'] }}</h1>
									<p class="text-fade mb-0">Total Admins</p>						
								</div>
							</div>
						</div>
					</div>					
				</div>
                <div class="col-xl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="text-center py-30">
								<div class="icon mb-15">
									<i class="fa fa-bullhorn bg-success-light mr-0"></i>
								</div>
								<div>
									<h1 class="font-weight-400">{{ $stats['totalDGRUsers'] }}</h1>
									<p class="text-fade mb-0">Total DGRs</p>						
								</div>
							</div>
						</div>
					</div>					
				</div>
				
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
@stop