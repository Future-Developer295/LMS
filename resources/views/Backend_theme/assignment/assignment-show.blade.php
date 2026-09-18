@extends("Backend_theme.master")

@section('assignment')
    open active
@endsection

@section("body")

<style>
    .assignment-view-input {
        width: 100%;
        min-height: 44px;
        padding: 11px 14px;
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        background: var(--surface);
        color: var(--text-primary);
        font-size: 14px;
        line-height: 20px;
        display: flex;
        align-items: center;
    }

    .assignment-view-input.instructions {
        min-height: 110px;
        align-items: flex-start;
        padding: 12px 14px;
        line-height: 22px;
        white-space: pre-line;
    }

    .assignment-view-input i {
        margin-right: 7px;
        color: var(--text-secondary);
    }

    .assignment-view-input .badge {
        margin: 0;
    }
</style>


<main class="page">

    <div class="breadcrumb">

        <a href="{{ route('assignment') }}">
            Assignments
        </a>

        <i class="fa-solid fa-chevron-right"></i>

        <span class="current">
            View
        </span>

    </div>


    <div class="page-header">

        <div>

            <h1>
                Assignment Details
            </h1>

            <p>
                View complete information about this assignment.
            </p>

        </div>


        <div class="page-header-actions">

            <a class="btn btn-secondary"
               href="{{ route('assignment') }}">

                <i class="fa-solid fa-arrow-left"></i>

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

        <div class="card-header">

            <div>

                <h2>
                    Assignment Information
                </h2>

                <p class="card-section-desc">
                    Complete details of this assignment.
                </p>

            </div>

        </div>


        <div class="card-pad">


            <div class="field-row">

                <div class="field">

                    <label>
                        Assignment Title
                    </label>

                    <div class="assignment-view-input">
                        {{ $assignment->assignment_title }}
                    </div>

                </div>


                <div class="field">

                    <label>
                        Class
                    </label>

                    <div class="assignment-view-input">
                        Class ID: {{ $assignment->class_timing_id }}
                    </div>

                </div>

            </div>


            <div class="field">

                <label>
                    Assignment Instructions
                </label>

                <div class="assignment-view-input instructions">
                    {{ $assignment->assignment_instruction ?: 'No instructions provided.' }}
                </div>

            </div>


            <div class="field-row">

                <div class="field">

                    <label>
                        Points / Max Marks
                    </label>

                    <div class="assignment-view-input">
                        {{ $assignment->assignment_marks }} Marks
                    </div>

                </div>


                <div class="field">

                    <label>
                        Due Date
                    </label>

                    <div class="assignment-view-input">

                        @if($assignment->assignment_due_date)

                            <i class="fa-regular fa-calendar"></i>

                            {{ optional($assignment->assignment_due_date)->format('d M Y') }}

                        @else

                            No due date

                        @endif

                    </div>

                </div>

            </div>


            <div class="field-row">

                <div class="field">

                    <label>
                        Status
                    </label>

                    <div class="assignment-view-input">

                        @if($assignment->assignment_status === 'active')

                            <span class="badge badge-green">
                                <i class="fa-solid fa-circle"></i>
                                Active
                            </span>

                        @elseif($assignment->assignment_status === 'inactive')

                            <span class="badge badge-red">
                                <i class="fa-solid fa-circle"></i>
                                Inactive
                            </span>

                        @else

                            <span class="badge badge-gray">
                                {{ ucfirst($assignment->assignment_status) }}
                            </span>

                        @endif

                    </div>

                </div>


                <div class="field">

                    <label>
                        Submissions
                    </label>

                    <div class="assignment-view-input">

                        <i class="fa-solid fa-file-arrow-up"></i>

                        {{ $assignment->submissions_count }}

                        Submissions

                    </div>

                </div>

            </div>


        </div>

    </div>

</main>

@endsection