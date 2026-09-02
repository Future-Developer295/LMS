@extends("Frontend_theme.master")

@section("body")

<main class="flex-grow-1 p-3 p-md-4 index-main">

    <div class="container-fluid">

        <div class="mb-4">
            <h2 class="fw-bold mb-1">Complete Student Profile</h2>
            <p class="text-muted mb-0">
                Please complete your student information.
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <h5 class="fw-bold mb-3">Student Information</h5>

                <form method="POST" action="{{ route('student.profile.complete.store') }}">
                    @csrf
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text"
                                   name="full_name"
                                   class="form-control"
                                   value="{{ $student->full_name ?? auth()->user()->name }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text"
                                   name="last_name"
                                   class="form-control"
                                   value="{{ $student->last_name ?? '' }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">CNIC</label>
                            <input type="text"
                                   name="cnic"
                                   class="form-control"
                                   value="{{ $student->cnic ?? '' }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ ($student->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ ($student->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ ($student->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Date of Birth</label>
                            <input type="date"
                                   name="dob"
                                   class="form-control"
                                   value="{{ $student && $student->dob ? $student->dob->format('Y-m-d') : '' }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="text"
                                   name="contact_number"
                                   class="form-control"
                                   value="{{ $student->contact_number ?? '' }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Father Name</label>
                            <input type="text"
                                   name="father_name"
                                   class="form-control"
                                   value="{{ $student->father_name ?? '' }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Batch Code</label>
                            <input type="text"
                                   name="batch_code"
                                   class="form-control"
                                   value="{{ $student->batch_code ?? '' }}"
                                   required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea name="address"
                                      class="form-control"
                                      rows="3">{{ $student->address ?? '' }}</textarea>
                        </div>

                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            Save Profile
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</main>

@endsection