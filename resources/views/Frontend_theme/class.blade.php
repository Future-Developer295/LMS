@extends('Frontend_theme.master')
@section('body')
<main class="flex-grow-1 p-3 p-md-4 index-main grades-main">

  <div class="grade-header">
    <div class="grade-student">
      <div class="grade-avatar"><img src="{{asset('Frontend_theme/images/my.png')}}" alt=""></div>
      <div class="grade-student-name">Asim Khan</div>
    </div>
    <div class="grade-overall">
      <div class="label">Overall grade</div>
      <div class="pct">90%</div>

      <a href="#" class="view-link" data-bs-toggle="modal" data-bs-target="#gradeDetailsModal">View details</a>
      <div class="modal fade" id="gradeDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg custom-grade-modal">

          <div class="modal-content">

            <div class="modal-body">
              <h5 class="modal-title">Grade calculation</h5>

              <p class="modal-desc">
                The overall grade for this class is calculated using total points earned by the student.
              </p>

              <hr class="modal-divider">

              <div class="grade-row">
                <span class="label">Overall grade</span>
                <span class="grad">90%</span>
              </div>

              <div class="modal-actions">
                <button type="button" class="btn-close-text" data-bs-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="grade-divider"></div>

  <div class="task-filter-wrap">
    <p>Task filter</p>
    <fieldset class="task-filter-fieldset">

      <select>
        <option>All</option>
        <option>Assigned</option>
        <option>Turned in</option>
        <option>Graded</option>
        <option>Missing</option>
      </select>
    </fieldset>
  </div>

  <div class="grade-list">

    <div class="grade-row">
      <div class="grade-row-main">
        <div class="grade-row-title">
          <span class="t-text">PHP Image CRUD with Foreign Key (Category & Product Management)</span>
          <span class="meta-ic"><i class="fa-solid fa-paperclip"></i> 1</span>
        </div>
        <div class="grade-row-due">Due Jun 30, 5:00 AM</div>
      </div>
      <div class="grade-row-score turned-in">Turned in</div>
    </div>

    <div class="grade-row">
      <div class="grade-row-main">
        <div class="grade-row-title">
          <span class="t-text">Implement (AddToCart) functionality in Ecommerce Site</span>
          <span class="meta-ic"><i class="fa-regular fa-comment"></i> 2</span>
          <span class="meta-ic"><i class="fa-solid fa-paperclip"></i> 1</span>
        </div>
        <div class="grade-row-due">Due May 26, 5:00 AM</div>
      </div>
      <div class="grade-row-score">100/100</div>
    </div>

    <div class="grade-row">
      <div class="grade-row-main">
        <div class="grade-row-title">
          <span class="t-text">Organizing a Picnic using OOP</span>
          <span class="meta-ic"><i class="fa-solid fa-paperclip"></i> 1</span>
        </div>
        <div class="grade-row-due">Due Apr 11, 9:00 AM</div>
      </div>
      <div class="grade-row-score">100/100</div>
    </div>

    <div class="grade-row">
      <div class="grade-row-main">
        <div class="grade-row-title">
          <span class="t-text">JavaScript Problem Solving Question</span>
          <span class="meta-ic"><i class="fa-solid fa-paperclip"></i> 1</span>
        </div>
        <div class="grade-row-due">Due Mar 15, 11:59 AM</div>
      </div>
      <div class="grade-row-score">100/100</div>
    </div>

    <div class="grade-row">
      <div class="grade-row-main">
        <div class="grade-row-title">
          <span class="t-text">Create a JSON Format for a University Management System and Insert Data</span>
          <span class="meta-ic"><i class="fa-solid fa-paperclip"></i> 1</span>
        </div>
        <div class="grade-row-due">Due Feb 14, 4:00 AM</div>
      </div>
      <div class="grade-row-score">100/100</div>
    </div>

  </div>

</main>
</div>

<button class="help-fab"><i class="fa-regular fa-circle-question"></i></button>

@endsection