<style>
    .logoutForm {
        margin: 0 !important;
    }
</style>


<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">

            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

            <div class="navbar-brand mt-4">

                <a href="index.html">
                    <b class="logo-icon">
                        <img src="/resources/LOGO 2 PNG.png" alt="user" class=" logo-icon " width="110px">
                    </b>

                </a>
            </div>

            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>

        <div class="navbar-collapse collapse d-flex flex-row-reverse" id="navbarSupportedContent">

            <ul class="navbar-nav float-right">
                <!-- User profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/resources/profile.png" alt="user" class="rounded-circle logo-icon" width="40px">
                        <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">{{ Auth::user()->first_name }}</span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item menu mt-2" href="{{route('admin.edit')}}"><i data-feather="user" class="svg-icon"></i>
                            <span class="mx-3">
                                My Profile
                            </span> </a>
                        <div class="dropdown-divider"></div>
                        <form class="logoutForm" method="POST" action="{{ route('logout.admin') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout.admin') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i data-feather="log-out" class="feather-icon"></i>
                                <span class="mx-3">
                                    Sign out
                                </span></a>
                        </form>
                    </div>
                </li>
                <!-- User profile -->
            </ul>

        </div>
    </nav>
</header>
<!-- End Topbar header -->