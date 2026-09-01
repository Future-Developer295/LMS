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
            <div class="stat-value">142</div>
            <span class="stat-trend up"><i class="fa-solid fa-arrow-trend-up"></i> +2.4%</span>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span>Students</span>
              <div class="stat-icon orange"><i class="fa-solid fa-user-graduate"></i></div>
            </div>
            <div class="stat-value">3,204</div>
            <span class="stat-trend up"><i class="fa-solid fa-arrow-trend-up"></i> +5.1%</span>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span>Classes</span>
              <div class="stat-icon gray"><i class="fa-solid fa-book-bookmark"></i></div>
            </div>
            <div class="stat-value">218</div>
            <span class="stat-trend flat"><i class="fa-solid fa-minus"></i> 0%</span>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span>Assignments</span>
              <div class="stat-icon blue"><i class="fa-solid fa-clipboard-list"></i></div>
            </div>
            <div class="stat-value">1,490</div>
            <span class="stat-trend up"><i class="fa-solid fa-arrow-trend-up"></i> +12%</span>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span>Attendance Rate</span>
              <div class="stat-icon gray"><i class="fa-solid fa-calendar-check"></i></div>
            </div>
            <div class="stat-value">96.4%</div>
            <span class="stat-trend down"><i class="fa-solid fa-arrow-trend-down"></i> -0.2%</span>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat-card">
            <div class="stat-card-top">
              <span>Submissions</span>
              <div class="stat-icon green"><i class="fa-solid fa-square-check"></i></div>
            </div>
            <div class="stat-value">12.5k</div>
            <span class="stat-trend up"><i class="fa-solid fa-arrow-trend-up"></i> +8.7%</span>
          </div>
        </div>
      </div>

      <div class="row g-3 mt-1">
        <div class="col-lg-8">
          <div class="card h-100">
            <div class="card-header">
              <h2>Recent Assignments</h2>
              <a class="link" href="assignments.html">View All</a>
            </div>
            <div class="table-wrap">
              <table class="data-table">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Class</th>
                    <th>Due Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="cell-name"><div><div class="primary">Advanced Calculus Midterm</div><div class="secondary">Prof. Sarah Jenkins</div></div></div>
                    </td>
                    <td class="cell-muted">MATH-301</td>
                    <td class="cell-muted">Oct 24, 2023</td>
                    <td><span class="badge badge-orange">Pending</span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="cell-name"><div><div class="primary">European History Essay</div><div class="secondary">Dr. Robert Chen</div></div></div>
                    </td>
                    <td class="cell-muted">HIST-205</td>
                    <td class="cell-muted">Oct 22, 2023</td>
                    <td><span class="badge badge-green">Active</span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="cell-name"><div><div class="primary">Physics Lab Report 04</div><div class="secondary">Prof. Emily Stone</div></div></div>
                    </td>
                    <td class="cell-muted">PHYS-102</td>
                    <td class="cell-muted">Oct 20, 2023</td>
                    <td><span class="badge badge-gray">Closed</span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="cell-name"><div><div class="primary">Intro to Python Project</div><div class="secondary">Mr. David Kim</div></div></div>
                    </td>
                    <td class="cell-muted">CS-101</td>
                    <td class="cell-muted">Oct 28, 2023</td>
                    <td><span class="badge badge-green">Active</span></td>
                  </tr>
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
              <li class="timeline-item">
                <div class="timeline-dot blue"></div>
                <div class="timeline-content">
                  <div class="title">System Backup Completed</div>
                  <div class="time">10 mins ago</div>
                </div>
              </li>
              <li class="timeline-item">
                <div class="timeline-dot orange"></div>
                <div class="timeline-content">
                  <div class="title">New Teacher <strong>Elena Rostova</strong> added to directory.</div>
                  <div class="time">2 hours ago</div>
                </div>
              </li>
              <li class="timeline-item">
                <div class="timeline-dot gray"></div>
                <div class="timeline-content">
                  <div class="title">Mass attendance report generated for Q3.</div>
                  <div class="time">5 hours ago</div>
                </div>
              </li>
              <li class="timeline-item">
                <div class="timeline-dot red"></div>
                <div class="timeline-content">
                  <div class="title">Alert: 5 students flagged for consecutive absences.</div>
                  <div class="time">Yesterday, 14:30</div>
                </div>
              </li>
              <li class="timeline-item">
                <div class="timeline-dot gray"></div>
                <div class="timeline-content">
                  <div class="title">Weekly server maintenance scheduled.</div>
                  <div class="time">Yesterday, 09:00</div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </main>

   @endsection
 