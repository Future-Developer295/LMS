@extends('Frontend_theme.master')

@section('body')

@if(Auth::check() && Auth::user()->role === 'user')

<main class="flex-grow-1 p-3 p-md-4 index-main grades-main">

  <div class="grade-header">
    <div class="grade-student">
      <div class="grade-avatar">
        <img src="{{ asset('Frontend_theme/images/my.png') }}" alt="">
      </div>

      <div class="grade-student-name">
        {{ Auth::user()->name }}
      </div>
    </div>

    <div class="grade-overall">
      <div class="label">Overall grade</div>
      <div class="pct">90%</div>

      <a href="#" class="view-link" data-bs-toggle="modal"
         data-bs-target="#gradeDetailsModal">
        View details
      </a>

      <div class="modal fade" id="gradeDetailsModal" tabindex="-1">
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
                <button type="button" class="btn-close-text"
                        data-bs-dismiss="modal">
                  Close
                </button>
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

    {{-- Tumhare existing Grade Rows yahan same rahenge --}}

  </div>

</main>

<button class="help-fab">
  <i class="fa-regular fa-circle-question"></i>
</button>

@else

<main class="flex-grow-1 d-flex align-items-center justify-content-center p-4">

  <div class="text-center">

    <div class="mb-3">
      <i class="fa-solid fa-graduation-cap"
         style="font-size: 55px; color: #0F9D58;">
      </i>
    </div>

    <h4 class="fw-semibold mb-2">
      Welcome to Classroom
    </h4>

    <p class="text-muted mb-4">
      Please login or create an account to view your grades.
    </p>

    <a href="{{ route('student.login') }}"
       class="btn btn-success me-2">
      <i class="fa-solid fa-right-to-bracket me-1"></i>
      Login
    </a>

    <a href="{{ route('student.register') }}"
       class="btn btn-warning">
      <i class="fa-solid fa-user-plus me-1"></i>
      Sign Up
    </a>

  </div>

</main>

@endif

@endsection