@extends('layouts.app_main')

@section('title', 'Advanced Filter')

@section('content')

<div class="main-content">

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
            <!-- Select Filters Area -->
            <div class="col-xl-3 col-lg-4">
                <!-- Card - Select Filters Area -->
                <div class="card">
                    <div class="card-header bg-transparent border-bottom">
                        <h5 class="mb-0">Filters</h5>
                    </div>

                    <div class="custom-accordion" style="height: 70vh; overflow: hidden scroll;">

                        <!-- Contacts Filters - Select Filters Area -->
                        <div class="card-body border-top">
                            <div>
                                <h5 class="font-size-14 mb-0"><a href="#collapseContacts" class="collapsed text-dark d-block" data-bs-toggle="collapse" >Contacts <i class="mdi mdi-minus float-end accor-plus-icon"></i></a></h5>

                                <div class="collapse" id="collapseContacts">

                                    <div class="mt-4">
                                        <div class="accordion ecommerce" id="accordionContact">
                                            <!-- Contact: Name or Email -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button collapsed text-muted" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Contact Name or Email
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionContact">
                                                    <div class="accordion-body p-2">
                                                        <div class="input-group input-group-sm my-2">
                                                            <input type="text" class="form-control" id="contact__name_or_email" placeholder="Contact Name or Email">
                                                            <div class="input-group-append">
                                                                <button class="input-group-text" id="inputGroup-sizing-sm" style="cursor: pointer;">Go</button>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="my-2">
                                                            <input type="text" id="contact__name_or_email" class="form-control form-control-sm" placeholder="Enter Contact Name or Email">
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End: Contact: Name or Email -->

                                            <!-- Contact: Job Title -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed text-muted" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                        Job Titles
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionContact">
                                                    <div class="accordion-body p-2">
                                                        <!-- Job Title Search -->
                                                        <div class="input-group input-group-sm my-2">
                                                            <input type="text" class="form-control" id="contact__job_title" placeholder="Search for a job title">
                                                            <div class="input-group-append">
                                                                <button class="input-group-text" id="inputGroup-sizing-sm" style="cursor: pointer;">Go</button>
                                                            </div>
                                                        </div>
                                                        <!-- End: Job Title Search -->
                                                        <hr>
                                                        <!-- Job Title Management Level -->
                                                        <p class="font-weight-bold">Management Level</p>
                                                        <ul class="list-unstyled categories-list mb-0">
                                                            <li>
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="checkbox" id="formCheck1">
                                                                    <label class="form-check-label" for="formCheck1">All</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="checkbox" id="formCheck1">
                                                                    <label class="form-check-label" for="formCheck1">C-Level</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="checkbox" id="formCheck1">
                                                                    <label class="form-check-label" for="formCheck1">VP-Level</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="checkbox" id="formCheck1">
                                                                    <label class="form-check-label" for="formCheck1">Director</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="checkbox" id="formCheck1">
                                                                    <label class="form-check-label" for="formCheck1">Manager</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="checkbox" id="formCheck1">
                                                                    <label class="form-check-label" for="formCheck1">Non-Manager</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <!-- End: Job Title Management Level -->
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End: Contact: Job Title -->

                                            <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <i class="mdi mdi-pinwheel-outline font-size-16 align-middle me-2"></i> Baby & Kids
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionContact">
                                                <div class="accordion-body">
                                                    <ul class="list-unstyled categories-list mb-0">
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Clothing</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Footwear</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Toys</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Baby care</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="accordion-item mb-3">
                                                <h2 class="accordion-header" id="headingFour">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    <i class="mdi mdi-dumbbell font-size-16 align-middle me-2"></i> Fitness
                                                </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionContact">
                                                <div class="accordion-body">
                                                    <ul class="list-unstyled categories-list mb-0">
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Gym equipment</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Yoga mat</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Dumbbells</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Protein supplements</a></li>
                                                    </ul>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End: Contacts Filters - Select Filters Area -->

                        <!-- Companies Filters - Select Filters Area -->
                        <div class="card-body border-top">
                            <div>
                                <h5 class="font-size-14 mb-0"><a href="#collapseExample2" class="collapsed text-dark d-block" data-bs-toggle="collapse">Companies <i class="mdi mdi-minus float-end accor-plus-icon"></i></a></h5>

                                <div class="collapse" id="collapseExample2">

                                    <div class="mt-4">
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productsizeRadio1" name="productsizeRadio" class="form-check-input">
                                            <label class="form-check-label" for="productsizeRadio1">X-Large</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productsizeRadio2" name="productsizeRadio" class="form-check-input">
                                            <label class="form-check-label" for="productsizeRadio2">Large</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productsizeRadio3" name="productsizeRadio" class="form-check-input">
                                            <label class="form-check-label" for="productsizeRadio3">Medium</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productsizeRadio4" name="productsizeRadio" class="form-check-input">
                                            <label class="form-check-label" for="productsizeRadio4">Small</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End: Companies Filters - Select Filters Area -->

                        <!-- Location Filters - Select Filters Area -->
                        <div class="card-body border-top">
                            <div>
                                <h5 class="font-size-14 mb-0"><a href="#collapseExample3" class="collapsed text-dark d-block" data-bs-toggle="collapse">Locations <i class="mdi mdi-minus float-end accor-plus-icon"></i></a></h5>

                                <div class="collapse" id="collapseExample3">

                                    <div class="mt-4">
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productratingRadio1" name="productratingRadio1" class="form-check-input">
                                            <label class="form-check-label" for="productratingRadio1">4 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productratingRadio2" name="productratingRadio1" class="form-check-input">
                                            <label class="form-check-label" for="productratingRadio2">3 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productratingRadio3" name="productratingRadio1" class="form-check-input">
                                            <label class="form-check-label" for="productratingRadio3">2 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productratingRadio4" name="productratingRadio1" class="form-check-input">
                                            <label class="form-check-label" for="productratingRadio4">1 <i class="mdi mdi-star text-warning"></i></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End: Location Filters - Select Filters Area -->

                        <!-- Tags Filters - Select Filters Area -->
                        <div class="card-body border-top">
                            <div>
                                <h5 class="font-size-14 mb-0"><a href="#collapseExample4" class="collapsed text-dark d-block" data-bs-toggle="collapse">Tags <i class="mdi mdi-minus float-end accor-plus-icon"></i></a></h5>

                                <div class="collapse" id="collapseExample4">

                                    <div class="mt-4">
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productratingRadio1" name="productratingRadio1" class="form-check-input">
                                            <label class="form-check-label" for="productratingRadio1">4 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productratingRadio2" name="productratingRadio1" class="form-check-input">
                                            <label class="form-check-label" for="productratingRadio2">3 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productratingRadio3" name="productratingRadio1" class="form-check-input">
                                            <label class="form-check-label" for="productratingRadio3">2 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input type="radio" id="productratingRadio4" name="productratingRadio1" class="form-check-input">
                                            <label class="form-check-label" for="productratingRadio4">1 <i class="mdi mdi-star text-warning"></i></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End: Tags Filters - Select Filters Area -->

                    </div>
                </div>
                <!-- End: Card - Select Filters Area -->
            </div>
            <!-- End: Select Filters Area -->

            <!-- Search Results Area -->
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">

                        <!-- Nav tabs - Search Results Area -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#contactsTab" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Contacts</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#companiesTab" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Companies</span>
                                </a>
                            </li>
                        </ul>
                        <!-- End: Nav tabs - Search Results Area -->

                        <!-- Tab panes - Search Results Area -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="companiesTab" role="tabpanel">
                                <p class="mb-0 text-center">
                                   No filters applied yet.
                                </p>
                            </div>
                            <div class="tab-pane" id="contactsTab" role="tabpanel">
                                <p class="mb-0 text-center">
                                    No filters applied yet.
                                </p>
                            </div>
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

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © Nazox.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                </div>
            </div>
        </div>
    </div>
</footer>

</div>

@stop

@section('js_scripts')
    <script>
        $(document).ready(function() {

            $('body').addClass("sidebar-enable vertical-collpsed");

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

        });
    </script>
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
