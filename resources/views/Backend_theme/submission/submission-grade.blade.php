@extends("Backend_theme.master")
@section('submissions')
open
@endsection
@section('grade_submission')
active
@endsection
   @section("body")
    <main class="page">
      <div class="breadcrumb">
        <a href="assignments.html">Assignments</a><i class="fa-solid fa-chevron-right"></i>
        <a href="submissions.html">Submissions</a><i class="fa-solid fa-chevron-right"></i>
        <span class="current">Grade Submission</span>
      </div>

      <div class="page-header">
        <div>
          <h1>Emma Smith</h1>
          <p>Submission for Advanced Physics Midterm &middot; MATH-301</p>
        </div>
        <div class="page-header-actions">
          <a class="btn btn-secondary" href="submissions.html">Back to Submissions</a>
          <button class="btn btn-primary" id="saveGradeBtn"><i class="fa-solid fa-floppy-disk"></i> Save Grade</button>
        </div>
      </div>

      <div class="grid-2">
        <div class="stack">
          <div class="card card-pad">
            <div class="card-section-title mb-md">Submitted File</div>
            <div class="d-flex align-items-center gap-3 p-3" style="background:var(--bg);border-radius:var(--radius-md);border:1px solid var(--border);">
              <div class="stat-icon blue"><i class="fa-solid fa-file-pdf"></i></div>
              <div class="flex-grow-1">
                <div class="primary" style="font-weight:600;">midterm_smith_e.pdf</div>
                <div class="secondary" style="font-size:12px;">Submitted Oct 24, 2023 - 09:41 AM</div>
              </div>
              <a href="#" class="btn btn-secondary btn-sm" onclick="return false;"><i class="fa-solid fa-download"></i> Download</a>
            </div>
          </div>

          <div class="card card-pad">
            <div class="card-section-title mb-md">Student Answer Preview</div>
            <p class="text-secondary" style="line-height:22px;">
              This assignment addresses the primary causes of Newtonian mechanics failure at relativistic speeds, referencing
              the Michelson-Morley experiment and subsequent implications for classical physics frameworks discussed in class.
            </p>
          </div>
        </div>

        <div class="stack">
          <div class="card card-pad">
            <div class="card-section-title mb-md">Grade & Feedback</div>
            <div class="field">
              <label for="gradeInput">Grade (out of 100)</label>
              <input type="number" class="input" id="gradeInput" placeholder="--" min="0" max="100">
            </div>
            <div class="field">
              <label for="remarks">Remarks</label>
              <textarea class="textarea" id="remarks" rows="3" placeholder="Summary feedback for the student"></textarea>
            </div>
            <div class="field mb-0">
              <label for="comments">Additional Comments</label>
              <textarea class="textarea" id="comments" rows="3" placeholder="Private notes, follow-up items, or rubric detail"></textarea>
            </div>
          </div>
        </div>
      </div>
    </main>
 @endsection