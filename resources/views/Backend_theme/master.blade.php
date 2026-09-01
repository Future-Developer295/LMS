<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview - EduAdmin Pro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Backend_theme/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend_theme/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend_theme/css/variables.css') }}">
</head>

<body data-page="teachers-add" data-search-placeholder="Search..." data-user-name="Admin User">
    <div class="app-shell">
        <aside class="sidebar">
            <div class="sidebar-brand">
                <div class="sidebar-brand-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <div class="sidebar-brand-text">
                    <div class="name">EduAdmin</div>
                    <div class="tagline">Management Portal</div>
                </div>
                <button class="sidebar-close-btn" id="sidebarCloseBtn" type="button"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>

            <nav class="sidebar-nav">
                <a class="sidebar-nav-item @yield('dashboard')" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-grip"></i><span>Dashboard</span>
                </a>

                <div class="sidebar-nav-group @yield('teacher')" data-group="teachers">
                    <button class="sidebar-nav-item group-toggle " type="button">
                        <i class="fa-solid fa-chalkboard-user"></i><span>Teachers</span>
                        <i class="fa-solid fa-chevron-down chevron"></i>
                    </button>
                    <div class="sidebar-submenu">
                        <a class="sidebar-submenu-item @yield('list_teacher')" href="{{ route('teacher') }}">
                            <i class="fa-solid fa-list"></i><span>List Teachers</span>
                        </a>
                        <a class="sidebar-submenu-item @yield('add_teacher')" href="{{ route('teacher_add') }}">
                            <i class="fa-solid fa-plus"></i><span>Add Teacher</span>
                        </a>
                    </div>
                </div>

                <div class="sidebar-nav-group @yield('student')" data-group="students">
                    <button class="sidebar-nav-item group-toggle" type="button">
                        <i class="fa-solid fa-user-graduate"></i><span>Students</span>
                        <i class="fa-solid fa-chevron-down chevron"></i>
                    </button>
                    <div class="sidebar-submenu">
                        <a class="sidebar-submenu-item @yield('list_student')" href="{{ route('student') }}">
                            <i class="fa-solid fa-list"></i><span>List Students</span>
                        </a>
                        <a class="sidebar-submenu-item @yield('add_student')" href="{{ route('student_add') }}">
                            <i class="fa-solid fa-plus"></i><span>Add Student</span>
                        </a>
                    </div>
                </div>

                <div class="sidebar-nav-group @yield('class')" data-group="classes">
                    <button class="sidebar-nav-item group-toggle " type="button">
                        <i class="fa-solid fa-book-bookmark"></i><span>Classes</span>
                        <i class="fa-solid fa-chevron-down chevron"></i>
                    </button>
                    <div class="sidebar-submenu">
                        <a class="sidebar-submenu-item @yield('class')" href="{{ route('class') }}">
                            <i class="fa-solid fa-list"></i><span>List Classes</span>
                        </a>
                        <a class="sidebar-submenu-item @yield('add_class')" href="{{ route('class_add') }}">
                            <i class="fa-solid fa-plus"></i><span>Create Class</span>
                        </a>
                    </div>
                </div>

                <div class="sidebar-nav-group @yield('attendance')" data-group="attendance">
                    <button class="sidebar-nav-item group-toggle " type="button">
                        <i class="fa-solid fa-calendar-check"></i><span>Attendance</span>
                        <i class="fa-solid fa-chevron-down chevron"></i>
                    </button>
                    <div class="sidebar-submenu">
                        <a class="sidebar-submenu-item @yield('attendance')" href="{{ route('attendance') }}">
                            <i class="fa-solid fa-list"></i><span>Attendance Records</span>
                        </a>
                        <a class="sidebar-submenu-item @yield('add_attendance')" href="{{ route('attendance_add') }}">
                            <i class="fa-solid fa-plus"></i><span>Mark Attendance</span>
                        </a>

                    </div>
                </div>

                <div class="sidebar-nav-group @yield('assignment')" data-group="assignments">
                    <button class="sidebar-nav-item group-toggle " type="button">
                        <i class="fa-solid fa-clipboard-list"></i><span>Assignments</span>
                        <i class="fa-solid fa-chevron-down chevron"></i>
                    </button>
                    <div class="sidebar-submenu">
                        <a class="sidebar-submenu-item @yield('assignment')" href="{{ route('assignment') }}">
                            <i class="fa-solid fa-list"></i><span>List Assignments</span>
                        </a>
                        <a class="sidebar-submenu-item @yield('add_assignment')" href="{{ route('assignment_add') }}">
                            <i class="fa-solid fa-plus"></i><span>New Assignment</span>
                        </a>
                    </div>
                </div>

                <div class="sidebar-nav-group  @yield('submissions')" data-group="submissions">
                    <button class="sidebar-nav-item group-toggle " type="button">
                        <i class="fa-solid fa-square-check"></i><span>Submissions</span>
                        <i class="fa-solid fa-chevron-down chevron"></i>
                    </button>
                    <div class="sidebar-submenu">
                        <a class="sidebar-submenu-item @yield('submission')" href="{{ route('submission') }}">
                            <i class="fa-solid fa-list"></i><span>All Submissions</span>
                        </a>
                    </div>
                </div>
            </nav>

            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                    @csrf

                    <button type="submit" class="sidebar-nav-item"
                        style="border: none; background: none; cursor: pointer;">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

        <div class="main-content">
            <header class="topbar">
                <button class="sidebar-toggle-btn" id="sidebarToggleBtn" type="button"><i
                        class="fa-solid fa-bars"></i></button>

                <div class="topbar-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search across portal..." aria-label="Search">
                </div>

                <div class="topbar-spacer"></div>

                <div class="topbar-actions">
                    <button class="icon-btn" type="button" aria-label="Notifications">
                        <i class="fa-regular fa-bell"></i><span class="dot"></span>
                    </button>

                    <div style="position:relative;">
                        <button class="topbar-profile" id="profileMenuBtn" type="button">
                            <div class="avatar-initials">
                                {{ Str::upper(Str::substr(auth()->user()->name ?? 'Admin User', 0, 1)) }}</div>
                            <span class="topbar-profile-name">{{ auth()->user()->name ?? 'Admin User' }}</span>
                            <i class="fa-solid fa-chevron-down" style="font-size:11px;color:var(--text-muted);"></i>
                        </button>
                        <div class="profile-dropdown" id="profileDropdown">
                            <form action="{{ route('logout') }}" method="post">
                                 @csrf
                                <button type="submit" class="danger"><i
                                        class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            @yield('body')



        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Backend_theme/js/main.js') }}"></script>
    <script src="{{ asset('Backend_theme/js/layout.js') }}"></script>
</body>

</html>
