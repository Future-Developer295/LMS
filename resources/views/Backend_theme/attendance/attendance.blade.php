@extends("Backend_theme.master")
@section('attendance') open @endsection
@section('attendance') active @endsection
@section("body")
<main class="page">
  <div class="page-header">
    <div>
      <h1>Attendance Records</h1>
      <p>Manage and review daily attendance logs across all classes.</p>
    </div>
    <div class="page-header-actions">
    
      <a class="btn btn-primary" href="{{ route('attendance_add') }}"><i class="fa-solid fa-plus"></i> Log Attendance</a>
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <div class="row g-3 mb-2">
    <div class="col-md-4">
      <div class="stat-card">
        <div class="stat-card-top"><span><i class="fa-solid fa-user-check" style="color:var(--text-secondary);margin-right:6px;"></i>Average Attendance</span></div>
        <div class="stat-value" style="font-size:28px;">{{ $averageAttendance }}%</div>
        <span class="stat-caption">Overall present rate</span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card">
        <div class="stat-card-top"><span><i class="fa-regular fa-clock" style="color:var(--text-secondary);margin-right:6px;"></i>Pending Logs</span></div>
        <div class="stat-value" style="font-size:28px;">
          {{ $pendingLogs }}
          @if($pendingLogs > 0)<span class="badge badge-orange">Action Required</span>@endif
        </div>
        <span class="stat-caption">Batches missing data today</span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card">
        <div class="stat-card-top"><span><i class="fa-regular fa-circle-check" style="color:var(--text-secondary);margin-right:6px;"></i>Completed Logs</span></div>
        <div class="stat-value" style="font-size:28px;">{{ $completedLogs }}</div>
        <span class="stat-caption">Successfully recorded today</span>
      </div>
    </div>
  </div>

  <div class="card">
    <form method="GET" action="{{ route('attendance') }}">
      <div class="filter-bar">
        <div class="filter-select-w">
          <select class="select" name="date_filter" onchange="this.form.submit()">
            <option value="">All Dates</option>
            <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>Today</option>
            <option value="yesterday" {{ request('date_filter') == 'yesterday' ? 'selected' : '' }}>Yesterday</option>
            <option value="week" {{ request('date_filter') == 'week' ? 'selected' : '' }}>This Week</option>
          </select>
        </div>
        <div class="filter-select-w">
          <select class="select" name="class_filter" onchange="this.form.submit()">
            <option value="">All Classes</option>
            @foreach($batches as $batch)
              <option value="{{ $batch }}" {{ request('class_filter') == $batch ? 'selected' : '' }}>{{ $batch }}</option>
            @endforeach
          </select>
        </div>
        <div class="filter-bar-spacer"></div>
        <div class="input-icon-wrap left search-input-w">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" class="input" name="search" value="{{ request('search') }}" placeholder="Search teacher or class...">
        </div>
      </div>
    </form>

    <div class="table-wrap">
      <table class="data-table">
        <thead>
          <tr>
            <th>Date & Time</th>
            <th>Class Details</th>
            <th>Teacher</th>
            <th>Attendance</th>
            <th>Status</th>
            <th style="text-align:right;">Actions</th>
          </tr>
        </thead>
        <tbody id="attendanceBody">
          @forelse($attendances as $attendance)
          @php
            $sample  = $attendance->studentAttendance->first();
            $class   = $sample?->student?->class;
            $present = $attendance->studentAttendance->where('mark_status', 'present')->count();
          @endphp
          <tr>
            <td>{{ $attendance->mark_date->format('d M Y') }}</td>
            <td>
              {{ $class->class_name ?? $attendance->batch_code }}
              <div class="text-muted small">{{ $attendance->batch_code }}</div>
            </td>
            <td>{{ $class?->teacher?->full_name }} {{ $class?->teacher?->last_name }}</td>
            <td>{{ $present }} / {{ $attendance->student_attendance_count }} Present</td>
            <td><span class="badge badge-green">Recorded</span></td>
            <td class="text-end">
                <a href="{{ route('attendance_view', $attendance->id) }}" class="btn btn-sm btn-primary rounded-2 me-1" title="View">
                    <i class="fa-solid fa-eye"></i>
                </a>
                <a href="{{ route('attendance_edit', $attendance->id) }}" class="btn btn-sm btn-warning rounded-2 me-1" title="Edit">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <form action="{{ route('attendance_destroy', $attendance->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this attendance log?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger rounded-2" title="Delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>
          </tr>
          @empty
          <tr><td colspan="6" class="text-center py-4">No attendance records found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="pagination-bar">
      <span class="pagination-info">
        Showing {{ $attendances->firstItem() ?? 0 }} to {{ $attendances->lastItem() ?? 0 }} of {{ $attendances->total() }} records
      </span>
      {{ $attendances->links() }}
    </div>
  </div>
</main>
@endsection