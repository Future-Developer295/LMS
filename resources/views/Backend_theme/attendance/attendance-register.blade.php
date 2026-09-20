@extends('Backend_theme.master')

@section('attendance') open @endsection
@section('attendance_records') active @endsection

@section('body')
@php
    $cellMap = [
        'present' => ['badge-green', 'P'],
        'absent'  => ['badge-red', 'A'],
        'late'    => ['badge-orange', 'L'],
        'leave'   => ['badge-blue', 'Lv'],
    ];
    $teacher = trim(($class?->teacher?->full_name ?? '') . ' ' . ($class?->teacher?->last_name ?? ''));
@endphp

<main class="page">
    <div class="page-header">
        <div>
            <h1>{{ $class->class_name ?? 'Class' }} <span class="text-muted" style="font-size:18px;">({{ $batch_code }})</span></h1>
            <p>Class register{{ $teacher ? ' · Teacher: ' . $teacher : '' }}</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('attendance') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <a href="{{ route('attendance_add', ['batch_code' => $batch_code]) }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i> {{ $todayLog ? 'Edit Today' : 'Mark Today' }}
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-3 mb-3">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-card-top"><span><i class="fa-solid fa-users me-2"></i>Students</span></div>
                <div class="stat-value" style="font-size:28px;">{{ $students->count() }}</div>
                <span class="stat-caption">Enrolled in this batch</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-card-top"><span><i class="fa-regular fa-calendar-check me-2"></i>Sessions</span></div>
                <div class="stat-value" style="font-size:28px;">{{ $totalSessions }}</div>
                <span class="stat-caption">Days marked, all time</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-card-top"><span><i class="fa-solid fa-chart-line me-2"></i>Overall Attendance</span></div>
                <div class="stat-value" style="font-size:28px;">{{ $overallPercentage }}%</div>
                <span class="stat-caption">Present rate, all time</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-card-top"><span><i class="fa-regular fa-clock me-2"></i>Today</span></div>
                <div class="stat-value" style="font-size:28px;">
                    {{ $todayLog ? 'Marked' : 'Pending' }}
                </div>
                <span class="stat-caption">{{ now()->format('d M Y') }}</span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="filter-bar">
            <div class="d-flex align-items-center gap-2">
                @if($range === 'month')
                    <a class="btn btn-secondary btn-sm"
                       href="{{ route('attendance_register', ['batch_code' => $batch_code, 'month' => $month->copy()->subMonth()->format('Y-m')]) }}"
                       title="Previous month">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>

                    <form method="GET" action="{{ route('attendance_register', $batch_code) }}" class="m-0">
                        <input type="month" class="input" name="month" value="{{ $month->format('Y-m') }}"
                               max="{{ now()->format('Y-m') }}" onchange="this.form.submit()">
                    </form>

                    <a class="btn btn-secondary btn-sm"
                       href="{{ route('attendance_register', ['batch_code' => $batch_code, 'month' => $month->copy()->addMonth()->format('Y-m')]) }}"
                       title="Next month">
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                @else
                    <strong>All time</strong>
                @endif
            </div>

            <div class="filter-bar-spacer"></div>

            <div class="d-flex gap-2">
                <a class="btn btn-sm {{ $range === 'month' ? 'btn-primary' : 'btn-secondary' }}"
                   href="{{ route('attendance_register', ['batch_code' => $batch_code, 'month' => $month->format('Y-m')]) }}">
                    Month
                </a>
                <a class="btn btn-sm {{ $range === 'all' ? 'btn-primary' : 'btn-secondary' }}"
                   href="{{ route('attendance_register', ['batch_code' => $batch_code, 'range' => 'all']) }}">
                    All time
                </a>
            </div>
        </div>

        <div class="table-wrap" style="overflow-x:auto;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="min-width:180px;">Student</th>

                        @forelse($logs as $log)
                            <th style="text-align:center;white-space:nowrap;">
                                <a href="{{ route('attendance_view', $log->id) }}" title="Open this day" style="text-decoration:none;color:inherit;">
                                    {{ $log->mark_date->format('d M') }}
                                    <div class="text-muted small">{{ $log->mark_date->format('D') }}</div>
                                </a>
                            </th>
                        @empty
                            <th class="text-muted" style="font-weight:normal;">No attendance logged in this period</th>
                        @endforelse

                        <th style="text-align:center;">Present</th>
                        <th style="text-align:center;">Absent</th>
                        <th style="text-align:center;">Late</th>
                        <th style="text-align:center;">Leave</th>
                        <th style="text-align:right;">All-time %</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($students as $student)
                        @php
                            $total = $student->total_count;
                            $pct = $total > 0 ? round(($student->present_count / $total) * 100, 1) : null;
                            $pctClass = is_null($pct) ? 'badge-secondary' : ($pct >= 75 ? 'badge-green' : ($pct >= 50 ? 'badge-orange' : 'badge-red'));
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <span class="fw-semibold">{{ $student->full_name }} {{ $student->last_name }}</span>
                                <div class="text-muted small">ID: {{ $student->id }}</div>
                            </td>

                            @forelse($logs as $log)
                                @php $status = $matrix[$student->id][$log->id] ?? null; @endphp
                                <td style="text-align:center;">
                                    @if($status && isset($cellMap[$status]))
                                        <span class="badge {{ $cellMap[$status][0] }}" title="{{ ucfirst($status) }}">{{ $cellMap[$status][1] }}</span>
                                    @else
                                        <span class="text-muted">–</span>
                                    @endif
                                </td>
                            @empty
                                <td></td>
                            @endforelse

                            <td style="text-align:center;">{{ $student->present_count }}</td>
                            <td style="text-align:center;">{{ $student->absent_count }}</td>
                            <td style="text-align:center;">{{ $student->late_count }}</td>
                            <td style="text-align:center;">{{ $student->leave_count }}</td>
                            <td class="text-end">
                                <span class="badge {{ $pctClass }}">{{ is_null($pct) ? 'No data' : $pct . '%' }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination-bar">
            <span class="pagination-info">
                <span class="badge badge-green">P</span> Present &nbsp;
                <span class="badge badge-red">A</span> Absent &nbsp;
                <span class="badge badge-orange">L</span> Late &nbsp;
                <span class="badge badge-blue">Lv</span> Leave &nbsp;|&nbsp;
                Showing {{ $logs->count() }} {{ \Illuminate\Support\Str::plural('day', $logs->count()) }}
                ({{ $range === 'all' ? 'all time' : $month->format('F Y') }})
            </span>
        </div>
    </div>
</main>
@endsection