@extends('Backend_theme.master')
@section('student')
    open
@endsection
@section('view_student')
    active
@endsection
<style>
    .section-row {
        padding: 25px
    }
    .view-field {
        margin-bottom: 18px;
    }
    .view-field label {
        display: block;
        font-size: 13px;
        color: var(--text-secondary, #6c757d);
        margin-bottom: 4px;
    }
    .view-field .value {
        font-size: 15px;
        font-weight: 500;
    }
</style>
@section('body')
    <main class="page">
        <div class="breadcrumb">
            <a href="{{ route('student') }}">Students</a><i class="fa-solid fa-chevron-right"></i><span class="current">View Student</span>
        </div>

        <div class="page-header">
            <div>
                <h1>View Student</h1>
                <p>Details for {{ $student->full_name }} {{ $student->last_name }}.</p>
            </div>
            <div class="page-header-actions">
                <a class="btn btn-secondary" href="{{ route('student') }}">Back</a>
                <a class="btn btn-primary" href="{{ route('student_edit', $student->id) }}">
                    <i class="fa-solid fa-pen-to-square"></i> Edit Student
                </a>
            </div>
        </div>

        <div class="card">
            <div class="section-row">

                <div class="view-field">
                    <label>Full Name</label>
                    <div class="value">{{ $student->full_name }} {{ $student->last_name }}</div>
                </div>

                <div class="view-field">
                    <label>Class</label>
                    <div class="value">{{ $student->class->class_name ?? '—' }}</div>
                </div>

                <div class="view-field">
                    <label>Batch Code</label>
                    <div class="value">{{ $student->batch_code }}</div>
                </div>

                <div class="view-field">
                    <label>Father Name</label>
                    <div class="value">{{ $student->father_name }}</div>
                </div>

                <div class="view-field">
                    <label>CNIC</label>
                    <div class="value">{{ $student->cnic }}</div>
                </div>

                <div class="view-field">
                    <label>Gender</label>
                    <div class="value">{{ ucfirst($student->gender) }}</div>
                </div>

                <div class="view-field">
                    <label>Date of Birth</label>
                    <div class="value">{{ $student->dob }}</div>
                </div>

                <div class="view-field">
                    <label>Contact Number</label>
                    <div class="value">{{ $student->contact_number }}</div>
                </div>

                <div class="view-field">
                    <label>Email Address</label>
                    <div class="value">{{ $student->email_address ?? '—' }}</div>
                </div>

                <div class="view-field">
                    <label>Emergency Contact</label>
                    <div class="value">{{ $student->emergency_contact }}</div>
                </div>

                <div class="view-field mb-0">
                    <label>Home Address</label>
                    <div class="value">{{ $student->address ?? '—' }}</div>
                </div>

            </div>

            <div class="section-row"
                style="border-top:1px solid var(--border);background:var(--bg);border-radius:0 0 var(--radius-lg) var(--radius-lg);grid-template-columns:1fr;">
                <div class="d-flex align-items-center justify-content-end flex-wrap gap-2">
                    <a class="btn btn-secondary" href="{{ route('student') }}">Back to Students</a>
                    <a class="btn btn-primary" href="{{ route('student_edit', $student->id) }}">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Student
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
