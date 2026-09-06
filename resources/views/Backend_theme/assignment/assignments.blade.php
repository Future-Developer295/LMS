
@extends("Backend_theme.master")

@section('assignment')
    open active
@endsection

@section("body")

<main class="page">

    {{-- Page Header --}}
    <div class="page-header">

        <div>
            <h1>Assignments</h1>
            <p>Manage and track all academic assignments across classes.</p>
        </div>

        <div class="page-header-actions">

            <button class="btn btn-secondary" type="button">
                <i class="fa-solid fa-filter"></i>
                Filter
            </button>

            <a class="btn btn-primary"
               href="{{ route('assignment_add') }}">
                <i class="fa-solid fa-plus"></i>
                New Assignment
            </a>

        </div>

    </div>


    {{-- Statistics --}}
    <div class="row g-3 mb-2">

        {{-- Active Assignments --}}
        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-card-top">

                    <span>Active Assignments</span>

                    <div class="stat-icon blue">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </div>

                </div>

                <div class="stat-value" style="font-size:30px;">
                    {{ $assignments->where('assignment_status', 'active')->count() }}
                </div>

                <span class="stat-caption">
                    Currently active
                </span>

            </div>

        </div>


        {{-- Total Submissions --}}
        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-card-top">

                    <span>Total Submissions</span>

                    <div class="stat-icon orange">
                        <i class="fa-solid fa-hourglass-half"></i>
                    </div>

                </div>

                <div class="stat-value" style="font-size:30px;">
                    {{ $assignments->sum('submissions_count') }}
                </div>

                <span class="stat-caption">
                    Total submissions
                </span>

            </div>

        </div>


        {{-- Total Assignments --}}
        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-card-top">

                    <span>Total Assignments</span>

                    <div class="stat-icon green">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>

                </div>

                <div class="stat-value" style="font-size:30px;">
                    {{ $assignments->count() }}
                </div>

                <span class="stat-caption">
                    All assignments
                </span>

            </div>

        </div>

    </div>


    {{-- Assignments Table --}}
<div class="card">

    <div class="card-header">
        <h2>Recent Assignments</h2>
    </div>

    <div class="table-wrap">

        <table class="data-table">

            <thead>
                <tr>
                    <th>Assignment Title</th>
                    <th>Class</th>
                    <th>Due Date</th>
                    <th>Submissions</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($assignments as $assignment)

                    <tr>

                        {{-- Assignment Title --}}
                        <td>
                            {{ $assignment->assignment_title }}
                        </td>

                        {{-- Class --}}
                        <td>
                            {{ $assignment->class_timing_id }}
                        </td>

                        {{-- Due Date --}}
                        <td>
                            {{ $assignment->assignment_due_date?->format('d M Y') ?? 'N/A' }}
                        </td>

                        {{-- Submissions --}}
                        <td>
                            {{ $assignment->submissions_count }}
                        </td>

                        {{-- Status --}}
                        <td>

                            @if($assignment->assignment_status == 'active')

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @elseif($assignment->assignment_status == 'pending')

                                <span class="badge bg-warning">
                                    Pending
                                </span>

                            @elseif($assignment->assignment_status == 'completed')

                                <span class="badge bg-primary">
                                    Completed
                                </span>

                            @elseif($assignment->assignment_status == 'closed')

                                <span class="badge bg-secondary">
                                    Closed
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    {{ ucfirst($assignment->assignment_status) }}
                                </span>

                            @endif

                        </td>

                        {{-- ACTION BUTTONS --}}
                        <td>

                            <div style="display: flex; gap: 8px; align-items: center;">

                                {{-- VIEW --}}
                                <a href="{{ route('assignment.show', $assignment->id) }}"
                                   class="btn btn-sm btn-secondary">

                                    <i class="fa-solid fa-eye"></i>
                                    View

                                </a>


                                {{-- EDIT --}}
                                <a href="{{ route('assignment.edit', $assignment->id) }}"
                                   class="btn btn-sm btn-primary">

                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit

                                </a>


                                {{-- DELETE --}}
                                <form action="{{ route('assignment.destroy', $assignment->id) }}"
                                      method="POST"
                                      style="margin: 0;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this assignment?')">

                                        <i class="fa-solid fa-trash"></i>
                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">
                            No assignments found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="pagination-bar">

        <span class="pagination-info">
            Showing {{ $assignments->count() }} assignments
        </span>

    </div>

</div>



</main>

@endsection

