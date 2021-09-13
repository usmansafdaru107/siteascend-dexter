<header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{route('home')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm-dark.png') }}" alt="logo-sm-dark" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-dark" height="20">
                                </span>
                            </a>

                            <a href="{{route('home')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm-light.png') }}" alt="logo-sm-light" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo-light" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="ri-search-line"></span>
                            </div>
                        </form>

                        <div class="dropdown dropdown-mega d-none d-lg-block ms-2">
                            <!-- <a href="{{ route('home') }}" type="button" class="header-item">
                                Home
                            </a> -->
                            <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                Menu
                                <i class="mdi mdi-chevron-down"></i> 
                            </button>
                            <div class="dropdown-menu dropdown-megamenu">
                                <div class="row">
                                    <div class="col-sm-8">
                
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5 class="font-size-14">User</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li>
                                                        <a href="{{ route('admin.user.index') }}">User List</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('admin.user.create') }}">Create New</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4">
                                                <h5 class="font-size-14">Campaign</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li><a href="{{ route('admin.campaign.index') }}">Campaign List</a></li>
                                                    <li><a href="{{ route('admin.campaign.create') }}">Create New</a></li>
                                                    <li><a href="{{ route('admin.campaign.tag.index') }}">Tag List</a></li>
                                                    <li><a href="{{ route('admin.campaign.tag.create') }}">Create New Tag</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4">
                                                <h5 class="font-size-14">Company</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li><a href="{{ route('admin.company.accordview') }}">Company Accordion View</a></li>
                                                    <li><a href="{{ route('admin.company.index') }}">Company List</a></li>
                                                    <li><a href="{{ route('admin.company.create') }}">Create New</a></li>
                                                    <li><a href="{{ route('admin.company.bulkUpload') }}">Bulk Upload</a></li>
                                                    <li><a href="{{ route('admin.company.tag.index') }}">Tag List</a></li>
                                                    <li><a href="{{ route('admin.company.tag.create') }}">Create New Tag</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="font-size-14">Contact</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li><a href="{{ route('admin.contact.index') }}">Contact List</a></li>
                                                    <li><a href="{{ route('admin.contact.create') }}">Create New</a></li>
                                                    <li><a href="{{ route('admin.contact.bulkUpload') }}">Bulk Upload</a></li>
                                                    <li><a href="{{ route('admin.contact.tag.index') }}">Tag List</a></li>
                                                    <li><a href="{{ route('admin.contact.tag.create') }}">Create New Tag</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-5">
                                                <div>
                                                    <img src="{{ asset('assets/images/megamenu-img.png') }}" alt="megamenu-img" class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="mb-3 m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="https://ui-avatars.com/api/?name={{ Auth::user()->firstName() }}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->firstName() }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</button>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>
            
                    </div>
                </div>
            </header>