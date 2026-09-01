@extends("Backend_theme.master")
@section('attendance')
open
@endsection
@section('attendance')
active
@endsection
   @section("body")
    <main class="page">
      <div class="page-header">
        <div>
          <h1>Attendance Records</h1>
          <p>Manage and review daily attendance logs across all classes.</p>
        </div>
        <div class="page-header-actions">
          <button class="btn btn-secondary" id="exportAttendanceBtn"><i class="fa-solid fa-download"></i> Export Report</button>
          <a class="btn btn-primary" href="attendance-mark.html"><i class="fa-solid fa-plus"></i> Log Attendance</a>
        </div>
      </div>

      <div class="row g-3 mb-2">
        <div class="col-md-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span><i class="fa-solid fa-user-check" style="color:var(--text-secondary);margin-right:6px;"></i>Average Attendance</span>
            </div>
            <div class="stat-value" style="font-size:28px;">94.2% <span class="stat-trend up" style="font-size:12px;"><i class="fa-solid fa-arrow-trend-up"></i> 1.2%</span></div>
            <span class="stat-caption">Overall this week</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span><i class="fa-regular fa-clock" style="color:var(--text-secondary);margin-right:6px;"></i>Pending Logs</span>
            </div>
            <div class="stat-value" style="font-size:28px;">12 <span class="badge badge-orange">Action Required</span></div>
            <span class="stat-caption">Classes missing data today</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span><i class="fa-regular fa-circle-check" style="color:var(--text-secondary);margin-right:6px;"></i>Completed Logs</span>
            </div>
            <div class="stat-value" style="font-size:28px;">148</div>
            <span class="stat-caption">Successfully recorded today</span>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="filter-bar">
          <div class="filter-select-w">
            <select class="select" id="dateFilter">
              <option>Today</option>
              <option>Yesterday</option>
              <option>This Week</option>
            </select>
          </div>
          <div class="filter-select-w">
            <select class="select" id="classFilter">
              <option value="">All Classes</option>
              <option>Advanced Physics 401</option>
              <option>World History II</option>
              <option>Intro to Computer Science</option>
              <option>Advanced Calculus</option>
            </select>
          </div>
          <div class="filter-select-w">
            <select class="select" id="statusFilter">
              <option value="">All Status</option>
              <option>Completed</option>
              <option>Pending</option>
            </select>
          </div>
          <div class="filter-bar-spacer"></div>
          <div class="input-icon-wrap left search-input-w">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="input" id="attendanceSearch" placeholder="Search teacher or class...">
          </div>
        </div>

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
               <tr>
                            <td>dummy</td>
                            <td>dummy</td>
                            <td>dummy</td>
                            <td>dummy</td>
                            <td>dummy</td>
                            <td class="text-end">
                                <a href="" class="btn btn-sm btn-primary rounded-2 me-1" title="View">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="" class="btn btn-sm btn-warning rounded-2 me-1" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <a href="" class="btn btn-sm btn-danger rounded-2" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
            </tbody>
          </table>
        </div>

        <div class="pagination-bar">
          <span class="pagination-info" id="attendanceResultsCount">Showing 1 to 4 of 160 records</span>
          <div class="pagination">
            <button class="page-btn"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn dots">...</button>
            <button class="page-btn">16</button>
            <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
          </div>
        </div>
      </div>
    </main>
 @endsection