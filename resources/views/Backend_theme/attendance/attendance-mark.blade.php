@extends("Backend_theme.master")
@section('attendance')
open
@endsection
@section('add_attendance')
active
@endsection
   @section("body")
    <main class="page">
      <div class="page-header">
        <div>
          <h1>Mark Attendance</h1>
          <p>Record daily attendance for scheduled classes.</p>
        </div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-md-6">
          <div class="card card-pad">
            <div class="field mb-0">
              <label for="classSelect">Select Class</label>
              <select class="select" id="classSelect">
                <option value="">Choose a class...</option>
                <option>Advanced Physics 401</option>
                <option>World History II</option>
                <option>Intro to Computer Science</option>
                <option>Advanced Calculus</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-pad">
            <div class="field mb-0">
              <label for="attendanceDate">Select Date</label>
              <input type="date" class="input" id="attendanceDate">
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="table-wrap">
          <table class="data-table">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>ID</th>
                <th style="text-align:right;">Status</th>
              </tr>
            </thead>
            <tbody id="markBody"></tbody>
          </table>
        </div>

        <div class="pagination-bar">
          <span class="pagination-info">Total Students: <strong id="totalStudents">3</strong></span>
          <div class="d-flex gap-2">
            <a class="btn btn-secondary" href="attendance.html">Cancel</a>
            <button class="btn btn-primary" id="saveAttendanceBtn"><i class="fa-solid fa-floppy-disk"></i> Save Attendance</button>
          </div>
        </div>
      </div>
    </main>
 @endsection