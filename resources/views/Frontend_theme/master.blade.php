<?php

if (!isset($pageTitle)) {
    $pageTitle = 'Classroom';
}
if (!isset($activeNav)) {
    $activeNav = 'home';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Frontend_theme/css/style.css') }}">
</head>
<style>


    .profile-dropdown {
        position: relative;
        display: inline-flex;
    }


    /* Avatar */

    .profile-avatar {
        width: 42px;
        height: 42px;

        border-radius: 50%;
        border: 3px solid #ffffff;

        background: #5b5fc7;
        color: #ffffff;

        font-size: 15px;
        font-weight: 700;
        F display: flex;
        align-items: center;
        justify-content: center;

        cursor: pointer;

        box-shadow: 0 2px 8px rgba(0, 0, 0, .12);

        transition: .2s ease;
    }

    .profile-avatar:hover {
        transform: scale(1.04);
        box-shadow: 0 4px 14px rgba(0, 0, 0, .18);
    }


    /* Dropdown */

    .profile-menu {
        position: absolute;

        top: 52px;
        right: 0;

        width: 310px;

        background: #ffffff;

        border: 1px solid #e8e8ec;

        border-radius: 18px;

        padding: 8px;

        box-shadow:
            0 10px 30px rgba(0, 0, 0, .12),
            0 2px 8px rgba(0, 0, 0, .06);

        z-index: 99999;

        opacity: 0;
        visibility: hidden;

        transform: translateY(-8px);

        transition:
            opacity .18s ease,
            transform .18s ease,
            visibility .18s ease;
    }

    .profile-avatar {
        overflow: hidden;
        padding: 0;
    }

    .profile-avatar-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .profile-big-avatar {
        overflow: hidden;
    }

    .profile-big-avatar-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .profile-menu.show {
        opacity: 1;
        visibility: visible;

        transform: translateY(0);
    }


    /* Header */

    .profile-header {
        display: flex;
        align-items: center;

        gap: 13px;

        padding: 15px 13px;
    }


    /* Big Avatar */

    .profile-big-avatar {
        width: 48px;
        height: 48px;

        flex-shrink: 0;

        border-radius: 50%;

        background: #5b5fc7;
        color: #fff;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 18px;
        font-weight: 700;
    }


    /* User Info */

    .profile-user-info {
        min-width: 0;
    }

    .profile-user-name {
        font-size: 15px;
        font-weight: 650;

        color: #202124;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .profile-user-email {
        margin-top: 4px;

        font-size: 12.5px;

        color: #777b85;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }


    /* Divider */

    .profile-divider {
        height: 1px;

        background: #eeeeF2;

        margin: 3px 7px 7px;
    }


    /* Menu Item */

    .profile-item {
        width: 100%;
        min-height: 58px;

        padding: 8px 11px;

        border: 0;
        border-radius: 12px;

        background: transparent;

        display: flex;
        align-items: center;

        gap: 12px;

        text-decoration: none;

        text-align: left;

        cursor: pointer;

        color: #25262b;

        transition: background .18s ease;
    }


    /* Hover */

    .profile-item:hover {
        background: #f5f6fb;
    }


    /* Icon */

    .profile-item-icon {
        width: 36px;
        height: 36px;

        flex-shrink: 0;

        border-radius: 10px;

        background: #f0f1f8;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-item-icon svg {
        width: 19px;
        height: 19px;

        fill: #555b72;
    }


    /* Text */

    .profile-item strong {
        display: block;

        font-size: 13.5px;
        font-weight: 600;

        color: #292a2f;
    }

    .profile-item small {
        display: block;

        margin-top: 3px;

        font-size: 11.5px;

        color: #8a8d96;
    }


    /* Arrow */

    .profile-arrow {
        margin-left: auto;

        font-size: 22px;

        color: #a2a4ab;
    }


    /* Logout */

    .logout-item {
        font-family: inherit;
    }

    .logout-item:hover {
        background: #fff4f4;
    }

    .logout-item:hover .profile-item-icon {
        background: #ffe8e8;
    }

    .logout-item:hover .profile-item-icon svg {
        fill: #d93025;
    }

    .logout-item:hover strong {
        color: #d93025;
    }


    /* Mobile */

    @media (max-width: 600px) {

        .profile-menu {
            width: 285px;
            right: -5px;
        }

    }
</style>

<body>

    <header class="gc-header d-flex align-items-center px-3 gap-2">
        <button class="btn-icon" id="menuToggle"><i class="fa-solid fa-bars"></i></button>

        <span class="d-flex align-items-center gap-2">
            <svg width="30" height="30" viewBox="0 0 108 108" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M96.75 11.25h-85.5c-3.73 0-6.75 3.02-6.75 6.75v72c0 3.729 3.02 6.75 6.75 6.75h85.5c3.729 0 6.75-3.021 6.75-6.75V18c0-3.73-3.021-6.75-6.75-6.75z"
                    fill="#F4B400" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5 20.25h81v67.5h-81v-67.5z" fill="#0F9D58" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M36 56.25a5.063 5.063 0 100-10.126 5.063 5.063 0 000 10.126zm41.063-5.063a5.063 5.063 0 11-10.126 0 5.063 5.063 0 0110.126 0zM60.75 66.055c0-3.555 5.828-6.429 11.25-6.429s11.25 2.874 11.25 6.43v3.695h-22.5v-3.696zm-36 0c0-3.555 5.828-6.429 11.25-6.429 5.423 0 11.25 2.874 11.25 6.43v3.695h-22.5v-3.696z"
                    fill="#57BB8A" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M60.75 45.001c0 3.73-3.02 6.75-6.744 6.75a6.753 6.753 0 01-6.756-6.75 6.756 6.756 0 016.756-6.75c3.723 0 6.744 3.026 6.744 6.75zm-22.5 20.25c0-4.973 8.156-9 15.75-9 7.594 0 15.75 4.027 15.75 9v4.5h-31.5v-4.5z"
                    fill="#F7F7F7" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M63 83.251h20.25v4.5H63v-4.5z" fill="#F1F1F1" />
            </svg>
            <span class="brand-text">Classroom</span>
        </span>

        <div class="flex-grow-1"></div>

        <div class="add-class-wrap">
            <button class="btn-icon" id="addClassBtn"><i class="fa-solid fa-plus"></i></button>

            <div class="add-class-menu" id="addClassMenu">
                <a href="#" class="add-class-item" id="joinClassLink">Join class</a>
            </div>
        </div>
        <div class="profile-dropdown">

            <button type="button" class="profile-avatar" id="profileToggle" aria-label="Profile menu">

               
            </button>

            <div class="profile-menu" id="profileMenu">


                    <div class="profile-big-avatar">


                    </div>

                    <div class="profile-user-info">
                       
                    </div>

                </div>


                <div class="profile-divider"></div>



              

                

            </div>

        </div>
    </header>

    <div class="gc-backdrop" id="backdrop"></div>

    <div class="d-flex app-body">
        <nav class="gc-sidebar collapsed" id="sidebar">
            <a href="{{ route('index') }}" @yield('index') class="gc-nav-link ">
                <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'>
                    <path d="M12 3L4 9v12h16V9l-8-6zm6 16h-3v-6H9v6H6v-9l6-4.5 6 4.5v9z"></path>
                </svg><span class="nav-label">Home</span>
            </a>
            <a href="{{ route('calendar') }}" class="gc-nav-link @yield('calender')">
                <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'>
                    <path
                        d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z">
                    </path>
                </svg> <span class="nav-label">Calendar</span>
            </a>
            <a href="{{ route('classwork') }}" class="gc-nav-link @yield('classwork')">
                <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" fill='#444746'>
                    <path
                        d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z">
                    </path>
                </svg> <span class="nav-label">Enrolled</span>
                <i class="fa-solid fa-chevron-down chev"></i>
            </a>
            <a href="{{ route('archived') }}" class="gc-nav-link @yield('archived')">
                <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'>
                    <path
                        d="M20.54 5.23l-1.39-1.68C18.88 3.21 18.47 3 18 3H6c-.47 0-.88.21-1.16.55L3.46 5.23C3.17 5.57 3 6.02 3 6.5V19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6.5c0-.48-.17-.93-.46-1.27zM6.24 5h11.52l.83 1H5.42l.82-1zM5 19V8h14v11H5zm11-5.5l-4 4-4-4 1.41-1.41L11 13.67V10h2v3.67l1.59-1.59L16 13.5z">
                    </path>
                </svg><span class="nav-label">Archived classes</span>
            </a>
            <a href="#" class="gc-nav-link <?php echo $activeNav === 'settings' ? 'active' : ''; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'>
                    <path
                        d="M13.85 22.25h-3.7c-.74 0-1.36-.54-1.45-1.27l-.27-1.89c-.27-.14-.53-.29-.79-.46l-1.8.72c-.7.26-1.47-.03-1.81-.65L2.2 15.53c-.35-.66-.2-1.44.36-1.88l1.53-1.19c-.01-.15-.02-.3-.02-.46 0-.15.01-.31.02-.46l-1.52-1.19c-.59-.45-.74-1.26-.37-1.88l1.85-3.19c.34-.62 1.11-.9 1.79-.63l1.81.73c.26-.17.52-.32.78-.46l.27-1.91c.09-.7.71-1.25 1.44-1.25h3.7c.74 0 1.36.54 1.45 1.27l.27 1.89c.27.14.53.29.79.46l1.8-.72c.71-.26 1.48.03 1.82.65l1.84 3.18c.36.66.2 1.44-.36 1.88l-1.52 1.19c.01.15.02.3.02.46s-.01.31-.02.46l1.52 1.19c.56.45.72 1.23.37 1.86l-1.86 3.22c-.34.62-1.11.9-1.8.63l-1.8-.72c-.26.17-.52.32-.78.46l-.27 1.91c-.1.68-.72 1.22-1.46 1.22zm-3.23-2h2.76l.37-2.55.53-.22c.44-.18.88-.44 1.34-.78l.45-.34 2.38.96 1.38-2.4-2.03-1.58.07-.56c.03-.26.06-.51.06-.78s-.03-.53-.06-.78l-.07-.56 2.03-1.58-1.39-2.4-2.39.96-.45-.35c-.42-.32-.87-.58-1.33-.77l-.52-.22-.37-2.55h-2.76l-.37 2.55-.53.21c-.44.19-.88.44-1.34.79l-.45.33-2.38-.95-1.39 2.39 2.03 1.58-.07.56a7 7 0 0 0-.06.79c0 .26.02.53.06.78l.07.56-2.03 1.58 1.38 2.4 2.39-.96.45.35c.43.33.86.58 1.33.77l.53.22.38 2.55z">
                    </path>
                    <circle cx="12" cy="12" r="3.5"></circle>
                </svg> <span class="nav-label">Settings</span>
            </a>
        </nav>
        <div class="join-class-overlay" id="joinClassOverlay">
            <div class="join-class-modal">

                <div class="join-class-head">
                    Join class
                </div>

              

            </div>
        </div>
        @yield('body')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const toggle = document.getElementById('profileToggle');
                const menu = document.getElementById('profileMenu');

                if (!toggle || !menu) return;

                toggle.addEventListener('click', function(e) {

                    e.stopPropagation();

                    menu.classList.toggle('show');

                });


                menu.addEventListener('click', function(e) {

                    e.stopPropagation();

                });


                document.addEventListener('click', function() {

                    menu.classList.remove('show');

                });

            });
        </script>
        <script>
            const joinClassLink = document.getElementById('joinClassLink');
            const joinClassOverlay = document.getElementById('joinClassOverlay');
            const joinClassCancelBtn = document.getElementById('joinClassCancelBtn');
            const joinClassCodeInput = document.getElementById('joinClassCodeInput');
            const joinClassJoinBtn = document.getElementById('joinClassJoinBtn');
            const addClassMenu2 = document.getElementById('addClassMenu');

            joinClassLink.addEventListener('click', function(e) {
                e.preventDefault();
                addClassMenu2.classList.remove('open');
                joinClassOverlay.classList.add('open');
            });

            joinClassCancelBtn.addEventListener('click', closeJoinClassModal);
            joinClassOverlay.addEventListener('click', function(e) {
                if (e.target === joinClassOverlay) closeJoinClassModal();
            });

            function closeJoinClassModal() {
                joinClassOverlay.classList.remove('open');
                joinClassCodeInput.value = '';
                joinClassJoinBtn.disabled = true;
                joinClassJoinBtn.classList.remove('active');
            }

            joinClassCodeInput.addEventListener('input', function() {
                const hasCode = joinClassCodeInput.value.trim().length > 0;
                joinClassJoinBtn.disabled = !hasCode;
                joinClassJoinBtn.classList.toggle('active', hasCode);
            });

            const addClassBtn = document.getElementById('addClassBtn');
            const addClassMenu = document.getElementById('addClassMenu');

            addClassBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                addClassMenu.classList.toggle('open');
            });

            document.addEventListener('click', function(e) {
                if (!addClassMenu.contains(e.target) && e.target !== addClassBtn) {
                    addClassMenu.classList.remove('open');
                }
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('Frontend_theme/js/sidebar.js') }}"></script>
</body>

</html>
