@extends("Backend_theme.master")
@section('assignment')
open
@endsection
@section('add_assignment')
active
@endsection
   @section("body")
    <main class="page">
      <div class="breadcrumb">
        <a href="assignments.html">Assignments</a><i class="fa-solid fa-chevron-right"></i><span class="current">Create New</span>
      </div>

      <div class="page-header">
        <div><h1>Assignment Details</h1></div>
        <div class="page-header-actions">
          <a class="btn btn-secondary" href="assignments.html">Discard</a>
          <button class="btn btn-primary" id="assignBtn"><i class="fa-solid fa-paper-plane"></i> Assign</button>
        </div>
      </div>

      <div class="form-grid" style="grid-template-columns: 1fr 360px;">
        <div class="stack">
          <div class="card card-pad">
            <div class="field mb-0">
              <label for="assignmentTitle"><i class="fa-solid fa-t" style="margin-right:6px;"></i>Assignment Title *</label>
              <input type="text" class="input" id="assignmentTitle" placeholder="e.g., Chapter 4 Reading Reflection">
            </div>
          </div>

          <div class="card">
            <div class="rte-toolbar">
              <button type="button" data-cmd="bold" title="Bold"><i class="fa-solid fa-bold"></i></button>
              <button type="button" data-cmd="italic" title="Italic"><i class="fa-solid fa-italic"></i></button>
              <button type="button" data-cmd="underline" title="Underline"><i class="fa-solid fa-underline"></i></button>
              <div class="divider"></div>
              <button type="button" data-cmd="insertUnorderedList" title="Bullet list"><i class="fa-solid fa-list-ul"></i></button>
              <button type="button" data-cmd="insertOrderedList" title="Numbered list"><i class="fa-solid fa-list-ol"></i></button>
              <div class="divider"></div>
              <button type="button" data-cmd="createLink" title="Insert link"><i class="fa-solid fa-link"></i></button>
            </div>
            <div class="rte-body" id="instructionsBody" contenteditable="true" data-placeholder="Provide clear instructions for the assignment here..."></div>
          </div>

          
        </div>

        <div class="stack">
          <div class="card card-pad">
            <div class="card-section-title mb-md"><i class="fa-solid fa-gear" style="margin-right:6px;"></i>Assignment Settings</div>

            <div class="field">
              <label for="assignClass">Assign To</label>
              <select class="select" id="assignClass">
                <option value="">Select a Class</option>
                <option>Advanced Physics - PHY-401</option>
                <option>World History II - HIS-202</option>
                <option>Intro to Computer Science - CS-101</option>
                <option>Advanced Calculus - MATH-301</option>
              </select>
            </div>

            <div class="field">
              <label>Students</label>
              <label class="checkbox-row"><input type="checkbox" id="allStudents" checked> All Students in Class</label>
            </div>

            <div class="field">
              <label for="points"><i class="fa-regular fa-star" style="margin-right:4px;"></i>Points / Max Marks</label>
              <input type="number" class="input" id="points" value="100">
            </div>

            <div class="field">
              <label for="dueDate"><i class="fa-regular fa-calendar" style="margin-right:4px;"></i>Due Date</label>
              <input type="date" class="input" id="dueDate">
            </div>


          </div>
        </div>
      </div>
    </main>
  @endsection