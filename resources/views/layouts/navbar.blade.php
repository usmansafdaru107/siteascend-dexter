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
            
            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form>

            <button type="button" class="btn header-item waves-effect" >
                Advanced Search
            </button>
        </div>

        <div class="d-flex">

            <nav class="navbar navbar-dark navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav me-3">
                        <li class="nav-item me-2">
                            <a class="nav-link" href="#">Lists</a>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="users_nav" role="button">Users<i class="arrow-down"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="users_nav">
                                <a href="{{ route('admin.user.index') }}" class="dropdown-item">User List</a>
                                <a href="{{ route('admin.user.create') }}" class="dropdown-item">Create User</a>
                            </ul>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="campaign_nav" role="button">Campaigns<i class="arrow-down"></i></a>
                            <div class="dropdown-menu" aria-labelledby="campaign_nav">
                                <a href="{{ route('admin.campaign.index') }}" class="dropdown-item">Campaign List</a>
                                <a href="{{ route('admin.campaign.create') }}" class="dropdown-item">Create Campaign</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="data_nav" role="button">Data<i class="arrow-down"></i></a>
                            <div class="dropdown-menu" aria-labelledby="data_nav">
                                <a href="{{ route('admin.contact.delete.requests') }}" class="dropdown-item">Delete Request</a>
                                <a href="{{ route('admin.contact-request.index') }}" class="dropdown-item">Request Queue</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
                
            <div class="vertical-line"></div>
            
            <button type="button" class="btn header-item waves-effect ms-2" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="https://ui-avatars.com/api/?name={{ Auth::user()->firstName() }}" alt="Header Avatar">
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
    </div>
</header>