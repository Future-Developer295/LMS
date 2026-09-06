@extends("Backend_theme.master")

@section('assignment')
    open active
@endsection

@section("body")

<main class="page">

    <div class="breadcrumb">
        <a href="{{ route('assignment') }}">
            Assignments
        </a>
        <i class="fa-solid fa-chevron-right"></i>
        <span class="current">View</span>
    </div>

    <div class="page-header">
        <div>
            <h1>Assignment Details</h1>
        </div>

        <div class="page-header-actions">
            <a class="btn btn-secondary"
               href="{{ route('assignment') }}">
                Back
            </a>

            <a class="btn btn-primary"
               href="{{ route('assignment.edit', $assignment->id) }}">
                <i class="fa-solid fa-pen-to-square"></i>
                Edit
            </a>
        </div>
    </div>

    <div class="card">

        <div class="field">
            <label>Assignment Title</label>
            <div class="input">
                {{ $assignment->assignment_title }}
            </div>
        </div>

        <div class="field">
            <label>Assignment Instructions</label>
            <div class="input">
                {{ $assignment->assignment_instruction ?: 'No instructions provided.' }}
            </div>
        </div>

        <div class="field">
            <label>Class</label>
            <div class="input">
                Class ID: {{ $assignment->class_timing_id }}
            </div>
        </div>

        <div class="field">
            <label>Points / Max Marks</label>
            <div class="input">
                {{ $assignment->assignment_marks }}
            </div>
        </div>

        <div class="field">
            <label>Due Date</label>
            <div class="input">
                {{ optional($assignment->assignment_due_date)->format('d M Y') }}
            </div>
        </div>

        <div class="field">
            <label>Status</label>
            <div class="input">
                {{ ucfirst($assignment->assignment_status) }}
            </div>
        </div>

        <div class="field">
            <label>Submissions</label>
            <div class="input">
                {{ $assignment->submissions_count }}
            </div>
        </div>

    </div>

</main>

@endsection