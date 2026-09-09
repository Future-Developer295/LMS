@extends("Frontend_theme.master")

@section("body")

@if(Auth::check() && Auth::user()->role === 'user')

<main class="flex-grow-1 stream-main index-main">

    {{-- YAHAN TUMHARA PURA EXISTING CLASSWORK CODE HOGA --}}

    <div class="class-tabbar">
        <div class="tab-links">
            <a href="{{ route('steam') }}" class="stream-tab">Stream</a>
            <a href="{{ route('classwork') }}" class="stream-tab active">Classwork</a>
            <a href="{{ route('people') }}" class="stream-tab">People</a>
        </div>
    </div>

    {{-- BAKI TUMHARA PURA CLASSWORK CODE --}}
    
</main>

@else

<main class="flex-grow-1 d-flex align-items-center justify-content-center p-4">

    <div class="text-center">

        <div class="mb-3">
            <i class="fa-solid fa-graduation-cap"
               style="font-size: 60px; color: #0F9D58;"></i>
        </div>

        <h4 class="fw-semibold mb-2">
            Welcome to Classroom
        </h4>

        <p class="text-muted mb-4">
            Please login or create an account to view your classwork.
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
