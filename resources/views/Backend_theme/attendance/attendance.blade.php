@extends('Backend_theme.master')
@section('attendance')
    open
@endsection
@section('attendance_records')
    active
@endsection
@section('body')
    <main class="page">
        <div class="page-header">
            <div>
                <h1>Attendance</h1>
                <p>Pick a class to open its register and see every student's attendance.</p>
            </div>
            <div class="page-header-actions">
                <a class="btn btn-primary" href="{{ route('attendance_add') }}"><i class="fa-solid fa-plus"></i> Log
                    Attendance</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-3 mb-2">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-card-top"><span><i class="fa-solid fa-user-check"
                                style="color:var(--text-secondary);margin-right:6px;"></i>Average Attendance</span></div>
                    <div class="stat-value" style="font-size:28px;">{{ $averageAttendance }}%</div>
                    <span class="stat-caption">Overall present rate, all time</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-card-top"><span><i class="fa-regular fa-clock"
                                style="color:var(--text-secondary);margin-right:6px;"></i>Pending Today</span></div>
                    <div class="stat-value" style="font-size:28px;">
                        {{ $pendingLogs }}
                        @if ($pendingLogs > 0)
                            <span class="badge badge-orange">Action Required</span>
                        @endif
                    </div>
                    <span class="stat-caption">Batches not marked today</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-card-top"><span><i class="fa-regular fa-circle-check"
                                style="color:var(--text-secondary);margin-right:6px;"></i>Completed Today</span></div>
                    <div class="stat-value" style="font-size:28px;">{{ $completedLogs }}</div>
                    <span class="stat-caption">Batches marked today</span>
                </div>
            </div>
        </div>

        <div class="card">
            <form method="GET" action="{{ route('attendance') }}">
                <div class="filter-bar">
                    <div class="filter-bar-spacer"></div>
                    <div class="input-icon-wrap left search-input-w">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" class="input" name="search" value="{{ request('search') }}"
                            placeholder="Search class, batch or teacher...">
                    </div>
                </div>
            </form>

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Class / Batch</th>
                            <th>Teacher</th>
                            <th>Students</th>
                            <th>Sessions</th>
                            <th>Overall Attendance</th>
                            <th>Last Marked</th>
                            <th>Today</th>
                            <th style="text-align:right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($batches as $batch)
                            @php
                                $pct = $batch->percentage;
                                $pctClass = is_null($pct)
                                    ? 'badge-secondary'
                                    : ($pct >= 75
                                        ? 'badge-green'
                                        : ($pct >= 50
                                            ? 'badge-orange'
                                            : 'badge-red'));
                            @endphp
                            <tr>
                                <td>
                                    <span class="fw-semibold">{{ $batch->class_name }}</span>
                                    <div class="text-muted small">{{ $batch->batch_code }}</div>
                                </td>
                                <td>{{ $batch->teacher ?: '—' }}</td>
                                <td>{{ $batch->students }}</td>
                                <td>{{ $batch->sessions }}</td>
                                <td>
                                    <span
                                        class="badge {{ $pctClass }}">{{ is_null($pct) ? 'No data' : $pct . '%' }}</span>
                                </td>
                                <td>{{ $batch->last_marked ? $batch->last_marked->format('d M Y') : 'Never' }}</td>
                                <td>
                                    @if ($batch->marked_today)
                                        <span class="badge badge-green">Marked</span>
                                    @else
                                        <span class="badge badge-orange">Pending</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('attendance_register', $batch->batch_code) }}"
                                        class="btn btn-sm btn-primary rounded-2 me-1" title="Open register">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('attendance_add', ['batch_code' => $batch->batch_code]) }}"
                                        class="btn btn-sm btn-warning rounded-2" title="Mark / edit today">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">No classes found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-bar">
                <span class="pagination-info">Showing {{ $batches->count() }}
                    {{ \Illuminate\Support\Str::plural('batch', $batches->count()) }}</span>
            </div>
        </div>
    </main>
@endsection
