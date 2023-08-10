<header>
    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="d-flex justify-content-between align-items-center">
            <a href="#" class="d-flex align-items-center">
                <img src="{{asset('resources/LOGO 2 PNG.png')}}" alt="logo" width="125" height="125" />
            </a>

            <div class="dropdown text-end">

                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item active" href="{{route('lecturer-dashboard')}}"><img src="{{asset('resources/dashboard.png')}}" alt="Dashboard" width="25" height="25" class="mx-2" />Dashboard</a></li>
                    <li><a class="dropdown-item " href="{{ route('show.qr') }}"><img src="{{asset('resources/qr-code.png')}}" alt="Generate QR" width="25" height="25" class="mx-2" />Generate QR</a></li>
                    <li><a class="dropdown-item" href="#"><img src="{{asset('resources/calendar.png')}}" alt="View Attendance" width="25" height="25" class="mx-2" />View Attendance</a></li>
                    <li><a class="dropdown-item" href="{{ route('lec',[Auth::user()->first_name]) }}"><img src="{{asset('resources/calendar.png')}}" alt="View Attendance" width="25" height="25" class="mx-2" />View Timetable</a></li>
                    <li><a class="dropdown-item" href="{{ route('edit.lecturer') }}"><img src="{{asset('resources/user (2).png')}}" alt="Edit Profile" width="25" height="25" class="mx-2" />Edit Profile</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <form method="POST" action="{{ route('logout.lecturer') }}">
                        @csrf
                        <li><a class="dropdown-item" href="{{ route('logout.lecturer') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><img src="{{asset('resources/signout.png')}}" alt="Sign Out" width="25" height="25" class="mx-2" />Sign out</a></li>
                    </form>
                </ul>
                <a href="#" class="d-block dropdown-toggle link-dark text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <label class="p-2">{{ Auth::user()->first_name }}</label>
                    <img src="{{asset('resources/profile.png')}}" alt="mdo" width="40" height="40" class="rounded-circle" />
                </a>
            </div>
        </div>
    </div>
</header>