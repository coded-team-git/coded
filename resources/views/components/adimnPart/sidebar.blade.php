<div data-simplebar class="h-100">
    <div class="user-details">
        <div class="d-flex">
            <div class="me-2">
                <img src="{{ asset('adminassets/images/users/avatar-4.jpg') }}" alt=""
                    class="avatar-md rounded-circle">
            </div>
            <div class="user-info w-100">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Donald Johnson
                        <i class="mdi mdi-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)" class="dropdown-item"><i
                                    class="mdi mdi-account-circle text-muted me-2"></i>
                                Profile<div class="ripple-wrapper me-2"></div>
                            </a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i
                                    class="mdi mdi-cog text-muted me-2"></i>
                                Settings</a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i
                                    class="mdi mdi-lock-open-outline text-muted me-2"></i>
                                Lock screen</a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i
                                    class="mdi mdi-power text-muted me-2"></i>
                                Logout</a></li>
                    </ul>
                </div>

                <p class="text-white-50 m-0">Administrator</p>
            </div>
        </div>
    </div>


    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title text-capitalize font-size-13">{{ Auth::user()->name }}</li>

            {{--<li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-account-multiple"></i>
                    <span>Employees</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('employees.index') }}">Users</a></li>
                    <li><a href="{{ route('employees.create') }}">Add New user</a></li>
                </ul>
            </li>--}}

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-label-multiple"></i>
                    <span>Services</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('services.index') }}">Services</a></li>
                    <li><a href="{{ route('services.create') }}">Add New service</a></li>
                </ul>
            </li>


            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-package"></i>
                    <span>Projects</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('projects.index') }}">Projects</a></li>
                    <li><a href="{{ route('projects.create') }}">Add New Project</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-newspaper-variant-multiple"></i>
                    <span>Pages</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('pages.index') }}">Pages</a></li>
                    <li><a href="{{ route('pages.create') }}">Add New Page</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-newspaper-variant-multiple"></i>
                    <span>Sections</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('sections.index') }}">Sections</a></li>
                    <li><a href="{{ route('sections.create') }}">Add New Section</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-newspaper"></i>
                    <span>Contents</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('contents.index') }}">Contents</a></li>
                    <li><a href="{{ route('contents.create') }}">Create New Content</a></li>
                </ul>
            </li>


            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-message"></i>
                    <span>Messages {{-- <b class="text-info">{{ $count }}</b> --}}</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('messages.index') }}">Messages</a></li>
                </ul>
            </li>

            {{-- -------------------------------------------------------- Done --}}

            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-contain"></i>
                    <span>Rows</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('Data.index') }}">Rows</a></li>
                    <li><a href="{{ route('Data.create') }}">Add New Category</a></li>
                </ul>
            </li> --}}

        </ul>
    </div>
    <!-- Sidebar -->
</div>
