@extends("Backend_theme.master")
@section('attendance')
open
@endsection
@section('edit_attendance')
active
@endsection
@section('body')
    <main class="page">
      <div class="page-header">
        <div>
          <h1>Edit Attendance</h1>
          <p>Update the recorded attendance log for this session.</p>
        </div>
        <div class="page-header-actions">
          <button class="btn btn-danger" id="deleteLogBtn"><i class="fa-solid fa-trash-can"></i> Delete Log</button>
        </div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-md-6">
          <div class="card card-pad">
            <div class="field mb-0">
              <label for="classSelect">Select Class</label>
              <select class="select" id="classSelect">
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
              <input type="date" class="input" id="attendanceDate" value="2023-10-24">
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
            <button class="btn btn-primary" id="updateAttendanceBtn"><i class="fa-solid fa-floppy-disk"></i> Update Attendance</button>
          </div>
        </div>
      </div>
    </main>
 @endsection