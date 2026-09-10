@extends('Frontend_theme.master')

@section('body')

@if(Auth::check() && Auth::user()->role === 'user')

<main class="flex-grow-1 stream-main index-main">

    <div class="class-tabbar">
        <div class="tab-links">
            <a href="{{ route('steam') }}" class="stream-tab">Stream</a>
            <a href="{{ route('classwork') }}" class="stream-tab">Classwork</a>
            <a href="{{ route('people') }}" class="stream-tab active">People</a>
        </div>

        <div class="tab-spacer"></div>

        <div class="tab-icons">
            <button class="btn-icon" title="Calendar">
                <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" fill="#444746">
                    <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"></path>
                </svg>
            </button>

            <button class="btn-icon" title="Class settings">
                <svg focusable="false" height="24" viewBox="0 0 24 24" width="24" fill="#444746">
                    <path d="M14.35,2.5h-4.7c-0.71,0-1.37,0.38-1.73,0.99L1.58,14.4c-0.36,0.62-0.36,1.38-0.01,2l2.35,4.09c0.36,0.62,1.02,1,1.73,1h12.68c0.72,0,1.38-0.38,1.73-1l2.35-4.09c0.36-0.62,0.35-1.38-0.01-2L16.08,3.49C15.72,2.88,15.06,2.5,14.35,2.5z"></path>
                </svg>
            </button>
        </div>
    </div>


    <div class="stream-body">

        {{-- Teachers --}}
        <div class="people-section">

            <div class="people-section-head">
                <h2>Teachers</h2>
            </div>

            <div class="people-row">
                <div class="people-avatar"
                    style="background:linear-gradient(135deg,#e04b3f,#8e2a2a);">
                    DD
                </div>

                <div class="people-name">
                    Despicable Dev
                </div>
            </div>

        </div>


        {{-- Classmates --}}
        <div class="people-section">

            <div class="people-section-head">
                <h2>Classmates</h2>
                <div class="count">12 students</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#8d6e63;">H</div>
                <div class="people-name">hana fahad</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#5c6bc0;">A</div>
                <div class="people-name">ABSAR HASHIM</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#1e7d4f;">A</div>
                <div class="people-name">Abdul Hadi Khan</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#4a90d9;">K</div>
                <div class="people-name">Khadija Asim Khan</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#e2a53f;">A</div>
                <div class="people-name">Asim Khan</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#8e44ad;">B</div>
                <div class="people-name">Bilal Ahmed</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#26a69a;">F</div>
                <div class="people-name">Fatima Noor</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#c0392b;">H</div>
                <div class="people-name">Hamza Tariq</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#2980b9;">M</div>
                <div class="people-name">Mahnoor Fatima</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#7f8c8d;">S</div>
                <div class="people-name">Sara Malik</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#d35400;">U</div>
                <div class="people-name">Usman Ali</div>
            </div>

            <div class="people-row">
                <div class="people-avatar" style="background:#16a085;">Z</div>
                <div class="people-name">Zainab Iqbal</div>
            </div>

        </div>

    </div>

</main>


{{-- Login Nahi Hai --}}
@else

<main class="flex-grow-1 d-flex align-items-center justify-content-center p-4">

    <div class="text-center">

        <div class="mb-3">
            <i class="fa-solid fa-users"
               style="font-size: 60px; color: #0F9D58;"></i>
        </div>

        <h4 class="fw-semibold mb-2">
            Welcome to Classroom
        </h4>

        <p class="text-muted mb-4">
            Please login or create an account to view teachers and classmates.
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


<button class="help-fab">
    <i class="fa-regular fa-circle-question"></i>
</button>


<script>

document.querySelectorAll('.class-tabbar .stream-tab').forEach(function (tab) {

    tab.addEventListener('click', function () {

        document.querySelectorAll('.class-tabbar .stream-tab').forEach(function (t) {
            t.classList.remove('active');
        });

        this.classList.add('active');

    });

});

</script>

@endsection