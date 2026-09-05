@extends("Backend_theme.master")

@section('submissions')
open
@endsection

@section('grade_submission')
active
@endsection

@section("body")

<main class="page">

    <div class="breadcrumb">
        <a href="{{ route('submission') }}">Submissions</a>
        <i class="fa-solid fa-chevron-right"></i>
        <span class="current">Grade Submission</span>
    </div>

    <div class="page-header">

        <div>
            <h1>
                {{ $submission->student->full_name ?? 'N/A' }}
                {{ $submission->student->last_name ?? '' }}
            </h1>

            <p>
                Submission for
                {{ $submission->assignment->assignment_title ?? 'N/A' }}
            </p>
        </div>

        <div class="page-header-actions">

            <a
                class="btn btn-secondary"
                href="{{ route('submission') }}"
            >
                <i class="fa-solid fa-arrow-left"></i>
                Back to Submissions
            </a>

            

        </div>

    </div>

    <form
        id="gradeForm"
        method="POST"
        action="{{ route('submission.saveGrade', $submission->id) }}"
    >

        @csrf

        <div class="grid-2">

            <div class="stack">

                {{-- Submitted File --}}
                <div class="card card-pad">

                    <div class="card-section-title mb-md">
                        Submitted File
                    </div>

                    @if($submission->assignment_file)

                        <div
                            class="d-flex align-items-center gap-3 p-3"
                            style="background:var(--bg);border-radius:var(--radius-md);border:1px solid var(--border);"
                        >

                            <div class="stat-icon blue">
                                <i class="fa-solid fa-file"></i>
                            </div>

                            <div class="flex-grow-1">

                                <div
                                    class="primary"
                                    style="font-weight:600;"
                                >
                                    {{ basename($submission->assignment_file) }}
                                </div>

                                <div
                                    class="secondary"
                                    style="font-size:12px;"
                                >
                                    Submitted
                                    {{ $submission->created_at
                                        ? $submission->created_at->format('d M Y - h:i A')
                                        : 'Date not available'
                                    }}
                                </div>

                            </div>

                            <a
                                href="{{ asset('storage/' . $submission->assignment_file) }}"
                                target="_blank"
                                class="btn btn-secondary btn-sm"
                            >
                                <i class="fa-solid fa-download"></i>
                                View File
                            </a>

                        </div>

                    @else

                        <p class="text-secondary">
                            No file submitted.
                        </p>

                    @endif

                </div>


                {{-- Student Answer / Remark --}}
                <div class="card card-pad">

                    <div class="card-section-title mb-md">
                        Student Submission
                    </div>

                    <p
                        class="text-secondary"
                        style="line-height:22px;"
                    >
                        {{ $submission->assignment_remark ?? 'No answer or remark provided.' }}
                    </p>

                </div>

            </div>


            <div class="stack">

                {{-- Grade & Feedback --}}
                <div class="card card-pad">

                    <div class="card-section-title mb-md">
                        Grade & Feedback
                    </div>

                    @if($errors->any())

                        <div class="alert alert-danger">

                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach

                        </div>

                    @endif

                    <div class="field">

                        <label for="gradeInput">
                            Grade (out of 100)
                        </label>

                        <input
                            type="number"
                            class="input"
                            id="gradeInput"
                            name="grade"
                            placeholder="Enter grade"
                            min="0"
                            max="100"
                            step="0.01"
                            value="{{ old('grade', $submission->grade) }}"
                            required
                        >

                    </div>


                    <div class="field">

                        <label for="remarks">
                            Remarks
                        </label>

                        <textarea
                            class="textarea"
                            id="remarks"
                            name="assignment_remark"
                            rows="3"
                            placeholder="Summary feedback for the student"
                        >{{ old('assignment_remark', $submission->assignment_remark) }}</textarea>

                    </div>


                    <div class="field mb-0">

                        <label for="comments">
                            Additional Comments
                        </label>

                        <textarea
                            class="textarea"
                            id="comments"
                            name="assignment_remarks_comments"
                            rows="3"
                            placeholder="Private notes, follow-up items, or rubric detail"
                        >{{ old('assignment_remarks_comments', $submission->assignment_remarks_comments) }}</textarea>

                    </div>

                </div>

            </div>

        </div>
<button
                class="btn btn-primary"
                type="submit"
            
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Save Grade
            </button>
    </form>

</main>

@endsection