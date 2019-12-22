<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark bg-white-1">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header" style="background:#ffffff;">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('/dist/images/owl-foresight.png') }}" width="50" class="dark-logo" />
                    <!-- Light Logo icon -->
                    {{-- <img src="{{ asset('/dist/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" /> --}}
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse" style="background:#ffffff;">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="fa fa-times"></i></a>
                    </form>
                </li>
            </ul>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if ($user == null)
                    @else
                        <span class="blue font-weight-bold text-capitalize">
                            {{ $user->profile->first_name.' '.$user->profile->last_name }}
                        </span>
                    @endif
                    <i class="fa fa-user-cog blue"></i>
                </a>
                <div class="dropdown-menu" style="min-width: 9rem;">
                    <a class="dropdown-item text-center" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
