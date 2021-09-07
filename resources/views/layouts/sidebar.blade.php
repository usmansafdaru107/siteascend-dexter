<div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Side menu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li class="mm-active">
                                <a href="{{ route('home') }}" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="menu-title">Pages</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-user-line"></i>
                                    <span>User</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.user.index') }}">User List</a></li>
                                    <li><a href="{{ route('admin.user.create') }}">Create New</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-volume-vibrate-fill"></i>
                                    <span>Campaign</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.campaign.index') }}">Campaign List</a></li>
                                    <li><a href="{{ route('admin.campaign.create') }}">Create New</a></li>
                                    <li><a href="{{ route('admin.campaign.tag.index') }}">Tag List</a></li>
                                    <li><a href="{{ route('admin.campaign.tag.create') }}">Create New Tag</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-building-2-fill"></i>
                                    <span>Company</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.company.accordview') }}">Company Accordion View</a></li>
                                    <li><a href="{{ route('admin.company.index') }}">Company List</a></li>
                                    <li><a href="{{ route('admin.company.create') }}">Create New</a></li>
                                    <li><a href="{{ route('admin.company.bulkUpload') }}">Bulk Upload</a></li>
                                    <li><a href="{{ route('admin.company.tag.index') }}">Tag List</a></li>
                                    <li><a href="{{ route('admin.company.tag.create') }}">Create New Tag</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-contacts-book-2-fill"></i>
                                    <span>Contact</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.contact.index') }}">Contact List</a></li>
                                    <li><a href="{{ route('admin.contact.create') }}">Create New</a></li>
                                    <li><a href="{{ route('admin.contact.bulkUpload') }}">Bulk Upload</a></li>
                                    <li><a href="{{ route('admin.contact.tag.index') }}">Tag List</a></li>
                                    <li><a href="{{ route('admin.contact.tag.create') }}">Create New Tag</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>