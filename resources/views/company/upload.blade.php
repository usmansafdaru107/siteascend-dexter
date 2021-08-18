@extends('layouts.app_main')

@section('title', 'Company Bulk Upload')

@section('css_styles')
    <!-- <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css"> -->
@stop

@section('content')

<div class="main-content">
	<div class="page-content">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">Company Bulk Upload</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Companies</li>
								<li class="breadcrumb-item active">Bulk Upload</li>
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
        
                                        <div>
                                            <form action="{{ route('admin.company.upload') }}" class="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="fallback">
                                                    <input type="file" name="csv_file" required>
                                                </div>
                                                
                                                <div class="text-center mt-4">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                                                </div>
                                            </form>
                                        </div>
        
                                       
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
		</div>
	</div>
</div>
@stop

@section('js_scripts')
    <!-- <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script> -->
@stop