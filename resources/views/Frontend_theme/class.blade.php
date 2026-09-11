@extends('Frontend_theme.master')

@section('body')

@if(Auth::check() && Auth::user()->role === 'user')

<main class="flex-grow-1 p-3 p-md-4 index-main grades-main">

  <div class="grade-header">

    <div class="grade-student">

      <div class="grade-avatar">
    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
</div>

      <div class="grade-student-name">
        {{ Auth::user()->name }}
      </div>

    </div>


    <div class="grade-overall">

      <div class="label">
        Overall grade
      </div>

      <div class="pct">
        {{ $overallGrade }}%
      </div>


      <a href="#"
         class="view-link"
         data-bs-toggle="modal"
         data-bs-target="#gradeDetailsModal">
        View details
      </a>


      
      <div class="modal fade"
           id="gradeDetailsModal"
           tabindex="-1">

        <div class="modal-dialog modal-dialog-centered modal-lg custom-grade-modal">

          <div class="modal-content">

            <div class="modal-body">

              <h5 class="modal-title">
                Grade calculation
              </h5>

              <p class="modal-desc">
                The overall grade for this class is calculated using total points earned by the student.
              </p>

              <hr class="modal-divider">


              <div class="grade-row">

                <span class="label">
                  Overall grade
                </span>

                <span class="grad">
                  {{ $overallGrade }}%
                </span>

              </div>


              <div class="modal-actions">

                <button type="button"
                        class="btn-close-text"
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

    <p>
      Task filter
    </p>

    <fieldset class="task-filter-fieldset">

      <select id="taskFilter">

        <option value="all">
          All
        </option>

        <option value="assigned">
          Assigned
        </option>

        <option value="turned-in">
          Turned in
        </option>

        <option value="graded">
          Graded
        </option>

        <option value="missing">
          Missing
        </option>

      </select>

    </fieldset>

  </div>


  
  <div class="grade-list">

    @forelse($assignments as $assignment)

      @php

        $submission = $assignment->submissions->first();

        if ($submission && $submission->grade !== null) {

            $filterStatus = 'graded';

        } elseif ($submission) {

            $filterStatus = 'turned-in';

        } elseif (
            $assignment->assignment_due_date &&
            $assignment->assignment_due_date->isPast()
        ) {

            $filterStatus = 'missing';

        } else {

            $filterStatus = 'assigned';

        }

      @endphp


      <div class="grade-row assignment-row"
           data-status="{{ $filterStatus }}">


        
        <div>

          <strong>
            {{ $assignment->assignment_title }}
          </strong>

          <div class="text-muted small">

            Due:

            {{ $assignment->assignment_due_date?->format('d M Y') ?? 'N/A' }}

          </div>

        </div>


        
        <div>

          @if($submission && $submission->grade !== null)

            <strong>
              {{ $submission->grade }}/{{ $assignment->assignment_marks }}
            </strong>

            <div class="text-success small">
              Graded
            </div>


          @elseif($submission)

            <div class="text-warning small">
              Turned in
            </div>


          @else

            <div class="text-danger small">
              Missing
            </div>

          @endif

        </div>


      </div>


    @empty
    <div class="text-center py-4">
        <p class="text-muted">
            No assignments found.
        </p>
    </div>

@endforelse

<div id="noRecords" class="text-center py-4" style="display: none;">
    <p class="text-muted">
        No records found.
    </p>
</div>
      

    

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



<!-- Task Filter -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const filter = document.getElementById('taskFilter');
    const rows = document.querySelectorAll('.assignment-row');
    const noRecords = document.getElementById('noRecords');

    if (!filter || !noRecords) {
        return;
    }

    filter.addEventListener('change', function () {

        const selectedStatus = this.value;
        let visibleRows = 0;

        rows.forEach(function (row) {

            if (
                selectedStatus === 'all' ||
                row.dataset.status === selectedStatus
            ) {

                row.style.display = '';
                visibleRows++;

            } else {

                row.style.display = 'none';

            }
        });

        if (visibleRows === 0) {

            noRecords.style.display = 'block';

        } else {

            noRecords.style.display = 'none';

        }

    });

});
</script>

@endsection

