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
            <h1 style="font-size:26px;">Submissions</h1>
        </div>
    </div>


    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    
    <div class="card">

        
        <div class="filter-bar">

            {{-- Search --}}
            <div class="input-icon-wrap left search-input-w">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    class="input"
                    id="submissionSearch"
                    placeholder="Search student..."
                >

            </div>


            
            <div class="filter-select-w">

                <select
                    class="select"
                    id="statusFilter"
                >

                    <option value="">All Statuses</option>

                    <option value="submitted">
                        Submitted
                    </option>

                    <option value="not submitted">
                        Not Submitted
                    </option>

                </select>

            </div>


            <div class="filter-bar-spacer"></div>


            
            <a
    href="{{ route('submission.export') }}"
    class="btn btn-secondary"
>
    <i class="fa-solid fa-download"></i>
    Export CSV
</a>


            <form
    action="{{ route('submission.publish') }}"
    method="POST"
    style="display:inline;"
>
    @csrf

    <button
        class="btn btn-primary"
        type="submit"
    >
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
        Publish Grades
    </button>
</form>

        </div>


        
        <div class="table-wrap">

            <table class="data-table">

                <thead>

                    <tr>

                        <th>Student Name</th>

                        <th>Assignment</th>

                        <th>Submission Date</th>

                        <th>File</th>

                        <th>Status</th>

                        <th>Grade</th>

                        <th>Remarks</th>

                        <th style="text-align:right;">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody id="submissionsBody">

                    @forelse($submissions as $submission)

                        <tr>

                            
                            <td>

                                {{ $submission->student->full_name ?? 'N/A' }}

                                {{ $submission->student->last_name ?? '' }}

                            </td>


                            
                            <td>

                                {{ $submission->assignment->assignment_title ?? 'N/A' }}

                            </td>


                            
                            <td>

                                @if($submission->created_at)

                                    {{ $submission->created_at->format('d M Y - h:i A') }}

                                @else

                                    <span class="text-secondary">
                                        N/A
                                    </span>

                                @endif

                            </td>


                            
                            <td>

                                @if($submission->assignment_file)

                                    <a
                                        href="{{ asset('storage/' . $submission->assignment_file) }}"
                                        target="_blank"
                                        class="cell-link"
                                    >

                                        <i class="fa-solid fa-file"></i>

                                        View File

                                    </a>

                                @else

                                    <span class="text-secondary">
                                        No File
                                    </span>

                                @endif

                            </td>


                            
                            <td>

                                @if($submission->assignment_file)

                                    <span
                                        class="badge badge-success text-dark"
                                        style="background:#d1fae5; color:#065f46 !important;"
                                    >
                                        Submitted
                                    </span>

                                @else

                                    <span
                                        class="badge badge-danger text-dark"
                                        style="background:#fee2e2; color:#991b1b !important;"
                                    >
                                        Not Submitted
                                    </span>

                                @endif

                            </td>


                            
                            <td>

                                @if(!is_null($submission->grade))

                                    {{ rtrim(rtrim(number_format($submission->grade, 2), '0'), '.') }}

                                @else

                                    <span class="text-secondary">
                                        --
                                    </span>

                                @endif

                            </td>


                            
                            <td>

                                @if($submission->assignment_remark)

                                    {{ $submission->assignment_remark }}

                                @else

                                    <span class="text-secondary">
                                        No Remarks
                                    </span>

                                @endif

                            </td>


                            
                            <td class="text-end">

                                <a
                                    href="{{ route('submission.grade', $submission->id) }}"
                                    class="btn btn-sm btn-primary rounded-2"
                                    title="Grade Submission"
                                >

                                    <i class="fa-solid fa-eye"></i>

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="8"
                                style="text-align:center;"
                            >

                                No submissions found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        
        <div class="pagination-bar">

            <span class="pagination-info">

                Showing {{ $submissions->count() }} submissions

            </span>

        </div>

    </div>

</main>

@endsection