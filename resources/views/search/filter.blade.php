@extends('layouts.search_app_main')

@section('title', 'Advanced Search')

@section('css_styles')
    <style>
        .overlay{
            display: none;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            background: rgba(255,255,255,0.8) url("{{ asset('assets/images/loader.gif') }}") center no-repeat;
        }
    </style>
@stop

@section('content')

<div class="main-content" style="margin-left: 300px;">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Advanced Search</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="ri-home-2-line"></i></a></li>
                            <li class="breadcrumb-item">Filter</li>
                            <li class="breadcrumb-item active">Advanced Search</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-md-12 hide" id="filters_section">
                <div class="card">
                    <div class="card-body" id="filters_area">
                        <!-- <div class="badge bg-dark p-2 mb-1 mx-1 text-truncate tag-width" data-bs-toggle="tooltip" data-bs-placement="top" title="Title"><i class="fa fa-times tag_close cursor-pointer" id="filters_tag_" data-tag-id="" data-tag-type=""></i> &nbsp; Company Tag: Send Email A B C D E F G H  AAAAAAAAAAAAAAAAAAA</div> -->
                    </div>
                </div>
            </div>

            <!-- Search Results Area -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                    <div class="overlay"></div>

                        <!-- Nav tabs - Search Results Area -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#contactsTab" role="tab">
                                    <span class="d-block d-sm-none"><i class="ri-contacts-book-2-fill"></i></span>
                                    <span class="d-none d-sm-block">Contacts</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#companiesTab" role="tab">
                                    <span class="d-block d-sm-none"><i class="ri-building-2-fill"></i></span>
                                    <span class="d-none d-sm-block">Companies</span>
                                </a>
                            </li>
                        </ul>
                        <!-- End: Nav tabs - Search Results Area -->

                        <!-- Tab panes - Search Results Area -->
                        <div class="tab-content p-3 text-muted">
                            <!-- Contacts Tab -->
                            <div class="tab-pane active" id="contactsTab" role="tabpanel" style="overflow-x: auto;">

                                <table id="contacts_table" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Contact Name</th>
                                        <th>Job Title</th>
                                        <th>Direct Phone</th>
                                        <th>Mobile Phone</th>
                                        <th>Business Email</th>
                                        <th>Supplemental Email</th>
                                        <th>Company Name</th>
                                        <th>Company Name</th>
                                        <th>Company Name</th>
                                        <th>Company Name</th>
                                        <th>Company Name</th>
                                        <th>Company Name</th>
                                    </tr>
                                    </thead>
                                    <!-- <tbody id="contacts_table_body">
                                        <tr>
                                            <td>A</td>
                                            <td>A</td>
                                            <td>A</td>
                                            <td>A</td>
                                            <td>A</td>
                                            <td>A</td>
                                            <td>A</td>
                                        </tr>
                                    </tbody> -->
                                </table>
                                <p class="mb-0 text-center hide" id="contact_tab_no_filter_p">
                                    No filters applied yet.
                                </p>
                            </div>
                            <!-- End: Contacts Tab -->

                            <!-- Company Tab -->
                            <div class="tab-pane" id="companiesTab" role="tabpanel">
                                <p class="mb-0 text-center">
                                   No filters applied yet.
                                </p>
                            </div>
                            <!-- End: Company Tab -->

                        </div>
                        <!-- End: Tab panes - Search Results Area -->

                    </div>
                </div>
            </div>
            <!-- End: Search Results Area -->

        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>

@stop

@section('js_scripts')
    <script>
        const ajaxURLS = {
            filter: '{{ route("admin.advanced.filter") }}',
            filters: '{{ route("admin.advanced.filters") }}'
        };

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $('#contacts_table').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     "scrollX": true,
            //     ajax: '{{ route("admin.advanced.filters") }}',
            //     columns: [
            //         {data: 'id', name: 'id'},
            //         {data: 'name', name: 'name'},
            //         {data: 'email', name: 'email'},
            //         {data: 'role_id', name: 'role_id'},
            //         {data: 'created_at', name: 'created_at'},
            //         {data: 'updated_at', name: 'updated_at'},
            //         {data: 'name', name: 'name'},
            //         {data: 'name', name: 'name'},
            //         {data: 'name', name: 'name'},
            //         {data: 'name', name: 'name'},
            //         {data: 'name', name: 'name'},
            //         {data: 'name', name: 'name'},

            //     ]
            // });
        });
    </script>
    <script src="{{ asset('custom_js/services/helpersService.js') }}"></script>
    <script src="{{ asset('custom_js/services/ajaxService.js') }}"></script>
    <script type="module" src="{{ asset('custom_js/filters/App.js') }}"></script>
@stop