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
          <h1 style="font-size:26px;">Submissions for: <a href="assignment-edit.html" class="cell-link" style="font-size:26px;">Advanced Physics Midterm</a></h1>
        </div>
      </div>

      <div class="card">
        <div class="filter-bar">
          <div class="input-icon-wrap left search-input-w">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="input" id="submissionSearch" placeholder="Search student...">
          </div>
          <div class="filter-select-w">
            <select class="select" id="statusFilter">
              <option value="">All Statuses</option>
              <option>Graded</option>
              <option>Ungraded</option>
            </select>
          </div>
          <div class="filter-bar-spacer"></div>
          <button class="btn btn-secondary" id="exportSubmissionsBtn"><i class="fa-solid fa-download"></i> Export CSV</button>
          <button class="btn btn-primary" id="publishGradesBtn"><i class="fa-solid fa-arrow-up-from-bracket"></i> Publish Grades</button>
        </div>

        <div class="table-wrap">
          <table class="data-table">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Submission Date</th>
                <th>File</th>
                <th>Status</th>
                <th>Grade</th>
                <th style="text-align:right;">Actions</th>
              </tr>
            </thead>
            <tbody id="submissionsBody">
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
          <span class="pagination-info" id="submissionResultsCount">Showing 1 to 4 of 24 entries</span>
          <div class="pagination">
            <button class="page-btn"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn dots">...</button>
            <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
          </div>
        </div>
      </div>
    </main>
 @endsection