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

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-4">
                Student Information
            </h5>

            <form method="POST"
                  action="{{ route('student.profile.complete.store') }}">

                @csrf

                <div class="row g-3">

                    {{-- Full Name --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Full Name
                        </label>

                        <input type="text"
                               name="full_name"
                               class="form-control"
                               value="{{ old('full_name', $student->full_name ?? '') }}"
                               required>
                    </div>

                    {{-- Last Name --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Last Name
                        </label>

                        <input type="text"
                               name="last_name"
                               class="form-control"
                               value="{{ old('last_name', $student->last_name ?? '') }}"
                               required>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Email Address
                        </label>

                        <input type="email"
                               class="form-control"
                               value="{{ $student->email_address ?? auth()->user()->email_address ?? '' }}"
                               >
                    </div>

                    {{-- Father Name --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Father Name
                        </label>

                        <input type="text"
                               name="father_name"
                               class="form-control"
                               value="{{ old('father_name', $student->father_name ?? '') }}"
                               required>
                    </div>

                    {{-- CNIC --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            CNIC
                        </label>

                        <input type="text"
                               name="cnic"
                               class="form-control"
                               placeholder="XXXXX-XXXXXXX-X"
                               value="{{ old('cnic', $student->cnic ?? '') }}"
                               required>
                    </div>

                    {{-- Gender --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Gender
                        </label>

                        <select name="gender"
                                class="form-select"
                                required>

                            <option value="">
                                Select Gender
                            </option>

                            <option value="male"
                                {{ old('gender', $student->gender ?? '') == 'male' ? 'selected' : '' }}>
                                Male
                            </option>

                            <option value="female"
                                {{ old('gender', $student->gender ?? '') == 'female' ? 'selected' : '' }}>
                                Female
                            </option>

                            <option value="other"
                                {{ old('gender', $student->gender ?? '') == 'other' ? 'selected' : '' }}>
                                Other
                            </option>

                        </select>
                    </div>

                    {{-- Date of Birth --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Date of Birth
                        </label>

                        <input type="date"
                               name="dob"
                               class="form-control"
                               value="{{ old('dob', ($student && $student->dob) ? $student->dob->format('Y-m-d') : '') }}"
                               required>
                    </div>

                    {{-- Contact Number --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Contact Number
                        </label>

                        <input type="text"
                               name="contact_number"
                               class="form-control"
                               placeholder="03XXXXXXXXX"
                               value="{{ old('contact_number', $student->contact_number ?? '') }}"
                               required>
                    </div>

                    {{-- Batch Code --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Batch Code
                        </label>

                        <input type="text"
                               name="batch_code"
                               class="form-control"
                               value="{{ old('batch_code', $student->batch_code ?? '') }}"
                               required>
                    </div>

             

                    {{-- Address --}}
                    <div class="col-12">
                        <label class="form-label">
                            Address
                        </label>

                        <textarea name="address"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Enter your complete address">{{ old('address', $student->address ?? '') }}</textarea>
                    </div>

                </div>

                {{-- Buttons --}}
                <div class="mt-4 d-flex gap-2">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fa-solid fa-check me-2"></i>
                        Save Profile

                    </button>

                    <a href="{{ route('student.profile') }}"
                       class="btn btn-outline-secondary">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


</main>

@endsection
