@extends('layouts.app_main')

@section('title', 'Edit Campaign')

@section('css_styles')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
@stop


@section('content')

<div class="main-content">
	<div class="page-content">
        <div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">Edit Campaign</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
								<li class="breadcrumb-item">Campaign</li>
								<li class="breadcrumb-item active">Edit</li>
							</ol>
						</div>

					</div>
				</div>
			</div>
			<!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 text-center">Edit Campaign</h4>
                            <form action="{{ route('admin.campaign.update', $campaign->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- First Row -->
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="clientName">Client Name</label>
                                            <input type="text" name="clientName" id="clientName" class="form-control @error('clientName') is-invalid @enderror" value="{{ old('clientName', $campaign->clientName) }}" required maxlength="255">
                                            @error('clientName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="campaignName">Campaign Name</label>
                                            <input type="text" name="campaignName" id="campaignName" class="form-control @error('campaignName') is-invalid @enderror" value="{{ old('campaignName', $campaign->name) }}" required maxlength="255">
                                            @error('campaignName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="solution">Solution</label>
                                            <input type="text" name="solution" id="solution" class="form-control @error('solution') is-invalid @enderror" value="{{ old('solution', $campaign->solution) }}" required maxlength="255">
                                            @error('solution')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="solutionURL">Solution URL</label>
                                            <input type="text" name="solutionURL" id="solutionURL" class="form-control @error('solutionURL') is-invalid @enderror" value="{{ old('solutionURL', $campaign->solutionURL) }}" required maxlength="255">
                                            @error('solutionURL')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- end: First Row -->

                                <!-- Second Row -->
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="salesRep">Sales Rep</label>
                                            <input type="text" name="salesRep" id="salesRep" class="form-control @error('salesRep') is-invalid @enderror" value="{{ old('salesRep', $campaign->salesRep) }}" required maxlength="255">
                                            @error('salesRep')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="salesRepEmail">Sales Rep Email</label>
                                            <input type="email" name="salesRepEmail" id="salesRepEmail" class="form-control @error('salesRepEmail') is-invalid @enderror" value="{{ old('salesRepEmail', $campaign->salesRepEmail) }}" required maxlength="255">
                                            @error('salesRepEmail')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="salesRepNumber">Sales Rep Number</label>
                                            <input type="text" name="salesRepNumber" id="salesRepNumber" class="form-control @error('salesRepNumber') is-invalid @enderror" value="{{ old('salesRepNumber', $campaign->salesRepNumber) }}" required maxlength="255">
                                            @error('salesRepNumber')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="salesRepBridge">Sales Rep Bridge</label>
                                            <input type="text" name="salesRepBridge" id="salesRepBridge" class="form-control @error('salesRepBridge') is-invalid @enderror" value="{{ old('salesRepBridge', $campaign->salesRepBridge) }}" required maxlength="255">
                                            @error('salesRepBridge')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Second Row -->

                                <!-- Third Row -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="calendarAccess">Calendar Access</label>
                                            <input type="text" name="calendarAccess" id="calendarAccess" class="form-control @error('calendarAccess') is-invalid @enderror" value="{{ old('calendarAccess', $campaign->calendarAccess) }}" required maxlength="255">
                                            @error('calendarAccess')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="calendarUsername">Calendar Username</label>
                                            <input type="text" name="calendarUsername" id="calendarUsername" class="form-control @error('calendarUsername') is-invalid @enderror" value="{{ old('calendarUsername', $campaign->calendarUsername) }}" required maxlength="255">
                                            @error('calendarUsername')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="calendarPassword">Calendar Password</label>
                                            <input type="text" name="calendarPassword" id="calendarPassword" class="form-control @error('calendarPassword') is-invalid @enderror" value="{{ old('calendarPassword', $campaign->calendarPassword) }}" required maxlength="255">
                                            @error('calendarPassword')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Third Row -->

                                <!-- Fourth Row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="calendarInviteAdmin">Calendar Invite Admin</label>
                                            <input type="text" name="calendarInviteAdmin" id="calendarInviteAdmin" class="form-control @error('calendarInviteAdmin') is-invalid @enderror" value="{{ old('calendarInviteAdmin', $campaign->calendarInviteAdmin) }}" required maxlength="255">
                                            @error('calendarInviteAdmin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Fourth Row -->

                                 <!-- Fifth Row -->
                                 <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="cre">CRE - Client Relations Executive</label>
                                            <select class="select2 form-control" name="cre" required>
                                                @foreach ($cres as $cre)
                                                    <option value="{{ $cre->id }}" {{ ($campaign->users->contains($cre->id))? "selected" : "" }}>{{ $cre->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('cre')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="dsr">DSR - Delivery Services Manager</label>
                                            <select class="select2 form-control" name="dsr" required>
                                                @foreach ($dsrs as $dsr)
                                                    <option value="{{ $dsr->id }}" {{ ($campaign->users->contains($dsr->id))? "selected" : "" }}>{{ $dsr->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('dsr')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Fifth Row -->

                                <!-- Sixth Row -->
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="mb-4">
                                            <label class="form-label" for="dgr">DGR - Demand Generation Representative</label>
                                            <select class="select2 form-control select2-multiple" name="dgr[]" multiple="multiple" required data-placeholder="Choose DGRs for campaign">
                                                @foreach ($dgrs as $dgr)
                                                    <option value="{{ $dgr->id }}" {{ ($campaign->users->contains($dgr->id))? "selected" : "" }}>{{ $dgr->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('dgr')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="DGRAlias">DGR Alias</label>
                                            <input type="text" name="DGRAlias" id="DGRAlias" class="form-control @error('DGRAlias') is-invalid @enderror" value="{{ old('DGRAlias', $campaign->DGRAlias) }}" required maxlength="255">
                                            @error('DGRAlias')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Sixth Row -->
                                
                                 <!-- Seventh Row -->
                                 <div class="row">
                                    <div class="col-lg-8">
                                        <div class="mb-4">
                                            <label class="form-label" for="csr">CSR - Client Support Representative</label>
                                            <select class="select2 form-control" name="csr" required>
                                                @foreach ($csrs as $csr)
                                                    <option value="{{ $csr->id }}" {{ ($campaign->users->contains($csr->id))? "selected" : "" }}>{{ $csr->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('csr')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="CSRAlias">CSR Alias</label>
                                            <input type="text" name="CSRAlias" id="CSRAlias" class="form-control @error('CSRAlias') is-invalid @enderror" value="{{ old('CSRAlias', $campaign->CSRAlias) }}" required maxlength="255">
                                            @error('CSRAlias')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Seventh Row -->

                                <!-- Eighth Row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="campaignTag">Campaign Tag</label>
                                            <select class="select2 form-control select2-multiple" name="campaignTag[]" multiple="multiple" required data-placeholder="Choose Multiple Campaign Tag for campaign">
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}" {{ ($campaign->tags->contains($tag->id))? "selected" : "" }}>{{ $tag->tag_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('campaignTag')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Eighth Row -->

                                <!-- Ninth Row -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="campaignStartDate">Campaign Start Date</label>
                                            <input type="date" name="campaignStartDate" id="campaignStartDate" class="form-control @error('campaignStartDate') is-invalid @enderror" value="{{ old('campaignStartDate', $campaign->getActualAttribute('campaignStartDate')) }}" required>
                                            @error('campaignStartDate')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="expectedEndDate">Expected End Date</label>
                                            <input type="date" name="expectedEndDate" id="expectedEndDate" class="form-control @error('expectedEndDate') is-invalid @enderror" value="{{ old('expectedEndDate', $campaign->getActualAttribute('expectedEndDate')) }}" required>
                                            @error('expectedEndDate')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="actualFinishedDate">Actual Finished Date</label>
                                            <input type="date" name="actualFinishedDate" id="actualFinishedDate" class="form-control @error('actualFinishedDate') is-invalid @enderror" value="{{ old('actualFinishedDate', $campaign->getActualAttribute('actualFinishedDate')) }}">
                                            @error('actualFinishedDate')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Ninth Row -->

                                <!-- Tenth Row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="campaignGoal">Campaign Goal</label>
                                            <textarea name="campaignGoal" id="campaignGoal"  class="form-control" rows="2">{{ old('campaignGoal', $campaign->campaignGoal) }}</textarea>
                                            @error('campaignGoal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Tenth Row -->

                                <!-- Eleventh Row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="companies">Select Multiple Companies (You can type to search in companies)</label>
                                            <select class="select2 form-control select2-multiple" name="companies[]" multiple="multiple" required data-placeholder="Choose company for campaign">
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}" {{ ($campaign->companies->contains($company->id))? "selected" : "" }}>{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-0 text-center">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Eleventh Row -->

                            </form>
                        </div>
                    </div>
                </div>
            </div>

		</div>
	</div>
</div>
@stop

@section('js_scripts')
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
@stop