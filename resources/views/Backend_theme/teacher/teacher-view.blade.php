@extends('Backend_theme.master')
@section('teacher')
    open
@endsection
@section('view_teacher')
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
    .view-photo {
        width: 96px;
        height: 96px;
        border-radius: 50%;
        background-size: cover;
        background-position: center;
        background-color: var(--bg, #f1f1f1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        font-size: 32px;
        color: var(--text-secondary, #6c757d);
    }
</style>
@section('body')
    <main class="page">
        <div class="breadcrumb">
            <a href="{{ route('teacher') }}">Teachers</a><i class="fa-solid fa-chevron-right"></i><span class="current">View Teacher</span>
        </div>

        <div class="page-header">
            <div>
                <h1>View Teacher</h1>
                <p>Details for {{ $teacher->full_name }} {{ $teacher->last_name }}.</p>
            </div>
            <div class="page-header-actions">
                <a class="btn btn-secondary" href="{{ route('teacher') }}">Back</a>
                <a class="btn btn-primary" href="{{ route('teacher_edit', $teacher->id) }}">
                    <i class="fa-solid fa-pen-to-square"></i> Edit Teacher
                </a>
            </div>
        </div>

        <div class="card">
            <div class="section-row">

                <div class="view-photo" style="{{ $teacher->profile_img ? 'background-image:url(' . asset('storage/' . $teacher->profile_img) . ')' : '' }}">
                    @unless($teacher->profile_img)
                        <i class="fa-solid fa-user"></i>
                    @endunless
                </div>

                <div class="view-field">
                    <label>Full Name</label>
                    <div class="value">{{ $teacher->full_name }} {{ $teacher->last_name }}</div>
                </div>

                <div class="view-field">
                    <label>Email Address</label>
                    <div class="value">{{ $teacher->email }}</div>
                </div>

                <div class="view-field">
                    <label>Contact Number</label>
                    <div class="value">{{ $teacher->contact_number }}</div>
                </div>

                <div class="view-field">
                    <label>Gender</label>
                    <div class="value">{{ ucfirst($teacher->gender) }}</div>
                </div>

                <div class="view-field">
                    <label>CNIC</label>
                    <div class="value">{{ $teacher->cnic }}</div>
                </div>

                <div class="view-field">
                    <label>Salary</label>
                    <div class="value">{{ $teacher->salary }}</div>
                </div>

                <div class="view-field mb-0">
                    <label>Home Address</label>
                    <div class="value">{{ $teacher->address ?? '—' }}</div>
                </div>

            </div>

            <div class="section-row"
                style="border-top:1px solid var(--border);background:var(--bg);border-radius:0 0 var(--radius-lg) var(--radius-lg);grid-template-columns:1fr;">
                <div class="d-flex align-items-center justify-content-end flex-wrap gap-2">
                    <a class="btn btn-secondary" href="{{ route('teacher') }}">Back to Teachers</a>
                    <a class="btn btn-primary" href="{{ route('teacher_edit', $teacher->id) }}">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Teacher
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
