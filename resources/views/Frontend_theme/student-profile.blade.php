@extends("Frontend_theme.master")

@section("body")


<main class="flex-grow-1 p-3 p-md-4 index-main">


    <div class="container-fluid">


        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Student Profile</h2>
                <p class="text-muted mb-0">
                    View your account information
                </p>
            </div>

            <a href="{{ route('index') }}" class="btn btn-outline-secondary">
                <i class="fa-solid fa-house me-2"></i>
                Home
            </a>
        </div>

        <div class="row g-4">


            <div class="col-12 col-lg-8">

                <div class="card border-0 shadow-sm overflow-hidden">


                    <div class="banner"
                        style="
                        height: 150px;
                        background-image: url('{{ asset('Frontend_theme/images/Aptech-banner.png') }}');
                        background-size: cover;
                        background-position: center;
                    ">
                    </div>


                    <div class="card-body px-4 pb-4">

                        <div class="d-flex align-items-end"
                            style="margin-top:-55px;">

                            <div
                                class="rounded-circle bg-white shadow d-flex align-items-center justify-content-center"
                                style="
                                width:110px;
                                height:110px;
                                font-size:36px;
                                font-weight:700;
                                color:#3f51b5;
                            ">
                                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                            </div>

                        </div>

                        <div class="mt-3">

                            <h3 class="fw-bold mb-1">
                                {{ auth()->user()->name }}
                            </h3>

                            <p class="text-muted mb-3">
                                {{ auth()->user()->email }}
                            </p>

                            <span class="badge rounded-pill bg-primary px-3 py-2">
                                <i class="fa-solid fa-graduation-cap me-1"></i>
                                Student
                            </span>
                       <div class="mt-3">
    <a href="{{ route('student.profile.complete') }}" class="btn btn-primary">
        <i class="fa-solid fa-pen me-2"></i>
        Complete Profile
    </a>
</div>


                        </div>

                        <hr class="my-4">


                        <h5 class="fw-bold mb-3">
                            Account Information
                        </h5>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <small class="text-muted d-block mb-1">
                                        Full Name
                                    </small>

                                    <span class="fw-semibold">
                                        {{ auth()->user()->name }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <small class="text-muted d-block mb-1">
                                        Email Address
                                    </small>

                                    <span class="fw-semibold">
                                        {{ auth()->user()->email }}
                                    </span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>


            <div class="col-12 col-lg-4">

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">
                            Student Portal
                        </h5>

                        <p class="text-muted">
                            From here you can manage your classes,
                            assignments and attendance.
                        </p>

                        <div class="d-grid gap-2">

                            <a href="{{ route('classwork') }}"
                                class="btn btn-primary">
                                <i class="fa-solid fa-book-open me-2"></i>
                                My Classes
                            </a>

                            <a href="{{ route('calendar') }}"
                                class="btn btn-outline-secondary">
                                <i class="fa-regular fa-calendar me-2"></i>
                                Calendar
                            </a>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>


</main>

@endsection