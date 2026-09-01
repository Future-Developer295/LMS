@extends("Backend_theme.master")
@section('assignment')
open
@endsection
@section('assignment')
active
@endsection
   @section("body")

    <main class="page">
      <div class="page-header">
        <div>
          <h1>Assignments</h1>
          <p>Manage and track all academic assignments across classes.</p>
        </div>
        <div class="page-header-actions">
          <button class="btn btn-secondary"><i class="fa-solid fa-filter"></i> Filter</button>
          <a class="btn btn-primary" href="assignment-add.html"><i class="fa-solid fa-plus"></i> New Assignment</a>
        </div>
      </div>

      <div class="row g-3 mb-2">
        <div class="col-md-4">
          <div class="stat-card">
            <div class="stat-card-top"><span>Active Assignments</span><div class="stat-icon blue"><i class="fa-solid fa-clipboard-list"></i></div></div>
            <div class="stat-value" style="font-size:30px;">124</div>
            <span class="stat-caption">+12 this week</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-card">
            <div class="stat-card-top"><span>Needs Grading</span><div class="stat-icon orange"><i class="fa-solid fa-hourglass-half"></i></div></div>
            <div class="stat-value" style="font-size:30px;">45</div>
            <span class="stat-caption">Across 8 classes</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-card">
            <div class="stat-card-top"><span>Avg Completion Rate</span><div class="stat-icon green"><i class="fa-solid fa-chart-simple"></i></div></div>
            <div class="stat-value" style="font-size:30px;">87%</div>
            <span class="stat-caption">+2% from last month</span>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h2>Recent Assignments</h2>
          <div class="input-icon-wrap left" style="width:260px;">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="input" id="assignmentSearch" placeholder="Filter list...">
          </div>
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
                <th style="text-align:right;">Actions</th>
              </tr>
            </thead>
            <tbody id="assignmentsBody">
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
          <span class="pagination-info" id="assignmentResultsCount">Showing 1 to 4 of 124 results</span>
          <div class="pagination">
            <button class="page-btn"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn dots">...</button>
            <button class="page-btn">12</button>
            <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
          </div>
        </div>
      </div>
    </main>
 @endsection