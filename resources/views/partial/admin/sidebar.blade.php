  <!-- ========== App Menu ========== -->
  <div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <h3 class="text-light m-2">VCT Admin Panel</h3>

            {{-- <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17">
            </span> --}}
        </a>
        <!-- Light Logo-->
        <a href="#" class="logo logo-light">
            <h3 class="text-light m-2">VCT Admin Panel</h3>
            {{-- <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="17">
            </span> --}}
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('admin.dashboard')}}">
                        <i class="ri-honour-line"></i> <span data-key="t-ecommerce">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link menu-link {{ Request::is('admin/user*') ? 'active' : '' }}" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarTables" data-bs-target="#sidebarTables">
                        <i class="ri-map-pin-user-line"></i> <span data-key="t-tables">Users Information</span>


                    </a>
                    <div class="collapse menu-dropdown {{ Request::is('admin/user*') ? 'show' : '' }}" id="sidebarTables">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.users') }}" class="nav-link {{ Request::is('admin/user-list') ? 'active' : '' }}" data-key="t-basic-tables">Users List</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.create') }}" class="nav-link {{ Request::is('admin/user-create') ? 'active' : '' }}" data-key="t-basic-tables">Add User</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.deletedUsersList') }}" class="nav-link {{ Request::is('admin/user-deleted-list') ? 'active' : '' }}" data-key="t-basic-tables">Deleted User List</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link  {{ Request::is('admin/education-list') ? 'active' : '' }}" href="{{route('admin.educations')}}">
                        <i class="ri-side-bar-line"></i> <span data-key="t-ecommerce">Educations</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('admin/profession-list') ? 'active' : '' }}" href="{{route('admin.professions')}}">
                        <i class="ri-group-2-line"></i> <span data-key="t-ecommerce">Professions</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('admin/occupation-list') ? 'active' : '' }}" href="{{route('admin.occupations')}}">
                        <i class="ri-user-5-line"></i> <span data-key="t-ecommerce">Occupations</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
