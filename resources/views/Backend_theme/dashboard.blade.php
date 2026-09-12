@extends("Backend_theme.master")
@section('dashboard')
active
@endsection

   @section("body")
 <main class="page">
      <div class="page-header">
        <div>
          <h1>Overview</h1>
          <p>Platform statistics and recent activities across the institution.</p>
        </div>
        <div class="page-header-actions">
          <button class="btn btn-primary" id="exportReportBtn"><i class="fa-solid fa-download"></i> Export Report</button>
        </div>
      </div>

      <div class="row g-3 mb-2">
        <div class="col-md-6 col-lg-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span>Teachers</span>
              <div class="stat-icon blue"><i class="fa-solid fa-chalkboard-user"></i></div>
            </div>
            <div class="stat-value">{{ number_format($teachersCount) }}</div>
            <span class="stat-trend flat">Total on record</span>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span>Students</span>
              <div class="stat-icon orange"><i class="fa-solid fa-user-graduate"></i></div>
            </div>
            <div class="stat-value">{{ number_format($studentsCount) }}</div>
            <span class="stat-trend flat">Total on record</span>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span>Classes</span>
              <div class="stat-icon gray"><i class="fa-solid fa-book-bookmark"></i></div>
            </div>
            <div class="stat-value">{{ number_format($classesCount) }}</div>
            <span class="stat-trend flat">Currently running</span>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span>Assignments</span>
              <div class="stat-icon blue"><i class="fa-solid fa-clipboard-list"></i></div>
            </div>
            <div class="stat-value">{{ number_format($assignmentsCount) }}</div>
            <span class="stat-trend flat">Total on record</span>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span>Attendance Rate</span>
              <div class="stat-icon gray"><i class="fa-solid fa-calendar-check"></i></div>
            </div>
            <div class="stat-value">{{ $attendanceRate }}%</div>
            @if($attendanceTrend === null)
              <span class="stat-trend flat"><i class="fa-solid fa-minus"></i> No prior data</span>
            @elseif($attendanceTrend > 0)
              <span class="stat-trend up"><i class="fa-solid fa-arrow-trend-up"></i> +{{ $attendanceTrend }}% vs last week</span>
            @elseif($attendanceTrend < 0)
              <span class="stat-trend down"><i class="fa-solid fa-arrow-trend-down"></i> {{ $attendanceTrend }}% vs last week</span>
            @else
              <span class="stat-trend flat"><i class="fa-solid fa-minus"></i> No change vs last week</span>
            @endif
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span>Submissions</span>
              <div class="stat-icon green"><i class="fa-solid fa-square-check"></i></div>
            </div>
            <div class="stat-value">{{ number_format($submissionsCount) }}</div>
            @if($submissionsTrend === null)
              <span class="stat-trend flat"><i class="fa-solid fa-minus"></i> No prior data</span>
            @elseif($submissionsTrend > 0)
              <span class="stat-trend up"><i class="fa-solid fa-arrow-trend-up"></i> +{{ $submissionsTrend }}% vs last week</span>
            @elseif($submissionsTrend < 0)
              <span class="stat-trend down"><i class="fa-solid fa-arrow-trend-down"></i> {{ $submissionsTrend }}% vs last week</span>
            @else
              <span class="stat-trend flat"><i class="fa-solid fa-minus"></i> No change vs last week</span>
            @endif
          </div>
        </div>
      </div>

      <div class="row g-3 mt-1">
        <div class="col-lg-8">
          <div class="card h-100">
            <div class="card-header">
              <h2>Recent Assignments</h2>
              <a class="link" href="{{ route('assignment') }}">View All</a>
            </div>
            <div class="table-wrap">
              <table class="data-table">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Class Timing</th>
                    <th>Due Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($recentAssignments as $assignment)
                  <tr>
                    <td>
                      <div class="cell-name"><div><div class="primary">{{ $assignment->assignment_title }}</div></div></div>
                    </td>
                    <td class="cell-muted">{{ $assignment->classTiming->class_timing ?? '—' }}</td>
                    <td class="cell-muted">{{ $assignment->assignment_due_date?->format('d M Y') ?? 'N/A' }}</td>
                    <td>
                      @if($assignment->assignment_status == 'active')
                        <span class="badge badge-green">Active</span>
                      @elseif($assignment->assignment_status == 'pending')
                        <span class="badge badge-orange">Pending</span>
                      @elseif($assignment->assignment_status == 'completed')
                        <span class="badge badge-blue">Completed</span>
                      @else
                        <span class="badge badge-gray">{{ ucfirst($assignment->assignment_status) }}</span>
                      @endif
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="4" class="text-center">No assignments found.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-header">
              <h2>Activity Timeline</h2>
            </div>
            <ul class="timeline">
              @forelse($activityTimeline as $activity)
              <li class="timeline-item">
                <div class="timeline-dot {{ $activity['color'] }}"></div>
                <div class="timeline-content">
                  <div class="title">{{ $activity['title'] }}</div>
                  <div class="time">{{ \Illuminate\Support\Carbon::parse($activity['time'])->diffForHumans() }}</div>
                </div>
              </li>
              @empty
              <li class="timeline-item">
                <div class="timeline-content">
                  <div class="title">No recent activity yet.</div>
                </div>
              </li>
              @endforelse
            </ul>
          </div>
        </div>
      </div>
    </main>

   @endsection
 