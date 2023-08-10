<!-- Left Sidebar - style you can find in sidebar.scss  -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin-dashboard" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="sidebar-item"> <a class="sidebar-link menu" href="javascript:void(0)" aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span class="hide-menu">Attendance
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link menu" href="{{ route('show.analytics') }}" aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span class="hide-menu">Analytics</span></a></li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false" data-toggle="collapse" data-target="#modules-dropdown">
                        <i data-feather="layers" class="feather-icon"></i>
                        <span class="hide-menu">Badge</span>
                    </a>
                    <ul id="modules-dropdown" class="collapse first-level base-level-line" aria-expanded="false">
                        <li class="sidebar-item"><a href="{{ route('Badge.add') }}" class="sidebar-link menu"><span class="hide-menu">Add Badge</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('badge.name') }}" class="sidebar-link menu"><span class="hide-menu">Manage Badge</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false" data-toggle="collapse" data-target="#modules-dropdown">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Module</span>
                    </a>
                    <ul id="modules-dropdown" class="collapse first-level base-level-line" aria-expanded="false">
                        <li class="sidebar-item"><a href="{{ route('Module.add') }}" class="sidebar-link menu"><span class="hide-menu">Add Module</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('module.name') }}" class="sidebar-link menu"><span class="hide-menu">Manage Module</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false" data-toggle="collapse" data-target="#modules-dropdown">
                        <i data-feather="grid" class="feather-icon"></i>
                        <span class="hide-menu">Department</span>
                    </a>
                    <ul id="modules-dropdown" class="collapse first-level base-level-line" aria-expanded="false">
                        <li class="sidebar-item"><a href="{{ route('Dept.add') }}" class="sidebar-link menu"><span class="hide-menu">Add Department</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('department.name') }}" class="sidebar-link menu"><span class="hide-menu">Manage Department</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false" data-toggle="collapse" data-target="#lecturers-dropdown">
                        <i data-feather="user-check" class="feather-icon"></i>
                        <span class="hide-menu">Lecturers</span>
                    </a>
                    <ul id="lecturers-dropdown" class="collapse first-level base-level-line" aria-expanded="false">
                        <li class="sidebar-item"><a href="{{ route('Lecturer.add') }}" class="sidebar-link menu"><span class="hide-menu">Add Lecturers</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('lecturer.name') }}" class="sidebar-link menu"><span class="hide-menu">Manage Lecturers</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false" data-toggle="collapse" data-target="#students-dropdown">
                        <i data-feather="users" class="feather-icon"></i>
                        <span class="hide-menu">Students</span>
                    </a>
                    <ul id="students-dropdown" class="collapse first-level base-level-line" aria-expanded="false">
                        <li class="sidebar-item"><a href="{{ route('Student.add') }}" class="sidebar-link menu"><span class="hide-menu">Add Students</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('student.name') }}" class="sidebar-link menu"><span class="hide-menu">Manage Students</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link menu" href="{{ route('connection.registration') }}" aria-expanded="false">
                        <i data-feather="link" class="feather-icon"></i>
                        <span class="hide-menu">Connections</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false" data-toggle="collapse" data-target="#timetables-dropdown">
                        <i data-feather="calendar" class="feather-icon"></i>
                        <span class="hide-menu">Timetables</span>
                    </a>
                    <ul id="timetables-dropdown" class="collapse first-level base-level-line" aria-expanded="false">
                        <li class="sidebar-item"><a href="{{ route('timetables.registration') }}" class="sidebar-link menu"><span class="hide-menu">Add Timetable</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('admin.calander') }}" class="sidebar-link menu"><span class="hide-menu">View Timetable</span></a></li>
                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link menu"><span class="hide-menu">Manage Timetable</span></a></li>
                    </ul>
                </li>

                <li class="list-divider"></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- End Left Sidebar - style you can find in sidebar.scss  -->