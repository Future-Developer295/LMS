@extends("Frontend_theme.master")

@section('index')
active
@endsection

@section("body")

@if(Auth::check())
@php
    $joinedClass = null;

    $joinedClassCode = session('joined_class_code');

    if ($joinedClassCode) {
        $joinedClass = \App\Models\ClassModel::with('teacher')
            ->whereRaw('UPPER(TRIM(class_code)) = ?', [strtoupper(trim($joinedClassCode))])
            ->first();
    }
@endphp


    @if($joinedClass)

        <main class="flex-grow-1 p-3 p-md-4 index-main">
            <div class="row g-4">

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="gc-card">

                        <a href="{{ route('steam') }}" class="text-decoration-none text-reset">

                            <div class="gc-banner"
                                style="background-image: url({{ asset('Frontend_theme/images/Aptech-banner.png') }});">

                                <div class="gc-corner-fold"></div>

                                <div class="gc-banner-title">
                                    {{ $joinedClass->class_name }}
                                </div>

                                <div class="gc-banner-sub">
                                    {{ $joinedClass->class_code }}
                                </div>

                                <div class="gc-banner-teacher">
                                    {{ $joinedClass->teacher->name ?? 'Teacher' }}
                                </div>

                            </div>

                        </a>

                        <div class="gc-card-avatar">
                            <img src="{{ asset('Frontend_theme/images/teacher.png') }}" alt="">
                        </div>

                        <div class="gc-card-body"></div>

                        <div class="gc-card-footer">

                            <a href="{{ route('frontend_class') }}"
                               class="btn-icon"
                               title="Your work">
                                <i class="fa-regular fa-address-card"></i>
                            </a>

                            <button class="btn-icon" title="Open folder">
                                <i class="fa-regular fa-folder"></i>
                            </button>

                            <button class="btn-icon" title="More">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>

                        </div>

                    </div>
                </div>

            </div>
        </main>

        <button class="gc-fab">
            <i class="fa-solid fa-plus"></i>
        </button>

    @else

        <main class="flex-grow-1 d-flex align-items-center justify-content-center p-4">

            <div class="text-center">

                <div class="mb-3">
                    <i class="fa-solid fa-chalkboard-user"
                       style="font-size: 65px; color: #0F9D58;">
                    </i>
                </div>

                <h4 class="fw-semibold mb-2">
                    No classes yet
                </h4>

                <p class="text-muted mb-4">
                    You haven't joined any class yet.<br>
                    Enter your class code to join a class.
                </p>

                <button type="button"
                        class="btn btn-success"
                        id="openJoinClassBtn">

                    <i class="fa-solid fa-plus me-1"></i>
                    Join a class

                </button>

            </div>

        </main>

        <button class="gc-fab">
            <i class="fa-solid fa-plus"></i>
        </button>

    @endif

@else

    <main class="flex-grow-1 d-flex align-items-center justify-content-center p-4">

        <div class="text-center">

            <div class="mb-3">
                <i class="fa-solid fa-graduation-cap"
                   style="font-size: 55px; color: #0F9D58;">
                </i>
            </div>

            <h4 class="fw-semibold mb-2">
                Welcome to Classroom
            </h4>

            <p class="text-muted mb-4">
                Please login or create an account to view your classes.
            </p>

            <a href="{{ route('student.login') }}"
               class="btn btn-success me-2">

                <i class="fa-solid fa-right-to-bracket me-1"></i>
                Login

            </a>

            <a href="{{ route('student.register') }}"
               class="btn btn-warning">

                <i class="fa-solid fa-user-plus me-1"></i>
                Sign Up

            </a>

        </div>

    </main>

@endif

@endsection