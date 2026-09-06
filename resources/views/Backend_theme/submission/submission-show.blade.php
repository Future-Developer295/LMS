@extends("Backend_theme.master")

@section('submissions')
open
@endsection

@section('submission')
active
@endsection

@section("body")

<main class="page">

    <div class="page-header">

        <div>
            <h1 style="font-size:26px;">
                Submission Details
            </h1>

            <p>
                {{ $submission->student->full_name ?? 'N/A' }}
                {{ $submission->student->last_name ?? '' }}
            </p>
        </div>

        <div class="page-header-actions">

            <a
                href="{{ route('submission') }}"
                class="btn btn-secondary"
            >
                <i class="fa-solid fa-arrow-left"></i>
                Back to Submissions
            </a>

        </div>

    </div>

    <div class="grid-2">

        <div class="stack">

            <div class="card card-pad">

                <div class="card-section-title mb-md">
                    Student Information
                </div>

                <p>
                    <strong>Name:</strong>
                    {{ $submission->student->full_name ?? 'N/A' }}
                    {{ $submission->student->last_name ?? '' }}
                </p>

                <p>
                    <strong>Email:</strong>
                    {{ $submission->student->email_address ?? 'N/A' }}
                </p>

            </div>

            <div class="card card-pad">

                <div class="card-section-title mb-md">
                    Assignment
                </div>

                <p>
                    <strong>Title:</strong>
                    {{ $submission->assignment->assignment_title ?? 'N/A' }}
                </p>

                <p>
                    <strong>Marks:</strong>
                    {{ $submission->assignment->assignment_marks ?? 'N/A' }}
                </p>

            </div>

        </div>

        <div class="stack">

            <div class="card card-pad">

                <div class="card-section-title mb-md">
                    Submitted File
                </div>

                @if($submission->assignment_file)

                    <a
                        href="{{ asset('storage/' . $submission->assignment_file) }}"
                        target="_blank"
                        class="btn btn-primary"
                    >
                        <i class="fa-solid fa-file"></i>
                        View Submitted File
                    </a>

                @else

                    <p class="text-secondary">
                        No file submitted.
                    </p>

                @endif

            </div>

            <div class="card card-pad">

                <div class="card-section-title mb-md">
                    Submission Information
                </div>

                <p>
                    <strong>Submitted At:</strong>
                    {{ $submission->created_at
                        ? $submission->created_at->format('d M Y - h:i A')
                        : 'N/A'
                    }}
                </p>

                <p>
                    <strong>Remark:</strong>
                    {{ $submission->assignment_remark ?? 'No remark' }}
                </p>

                <p>
                    <strong>Comments:</strong>
                    {{ $submission->assignment_remarks_comments ?? 'No comments' }}
                </p>

            </div>

        </div>

    </div>

</main>

@endsection