@extends("Frontend_theme.master")
@section('attendance')
active
@endsection
@section("body")

<main class="flex-grow-1 p-3 p-md-4 index-main">

    <div class="container-fluid">

        <div class="mb-4">
            <h2 class="fw-bold mb-1">Attendance</h2>
            <p class="text-muted mb-0">
                View your attendance record
            </p>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <h5 class="fw-bold mb-3">My Attendance</h5>

                @if($attendance->count() > 0)

                    <div class="table-responsive">

                        <table class="table align-middle">

                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($attendance as $record)

                                    <tr>
                                        <td>
                                            {{ $record->attendance->mark_date->format('M d, Y') }}
                                        </td>

                                        <td>
                                            @if($record->mark_status === 'present')
                                                <span class="badge bg-success">
                                                    Present
                                                </span>
                                            @elseif($record->mark_status === 'absent')
                                                <span class="badge bg-danger">
                                                    Absent
                                                </span>
                                            @elseif($record->mark_status === 'late')
                                                <span class="badge bg-warning text-dark">
                                                    Late
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    Leave
                                                </span>
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="text-center p-4">
                        <h6 class="fw-bold">No attendance record found</h6>

                        <p class="text-muted mb-0">
                            Your attendance has not been marked yet.
                        </p>
                    </div>

                @endif

            </div>
        </div>

    </div>

</main>

@endsection