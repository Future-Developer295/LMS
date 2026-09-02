@extends('Frontend_theme.master')

@section('body')

<main class="flex-grow-1 p-3 p-md-4 index-main grades-main">

    <div class="grade-header">

        <div class="grade-student">

           
                            <div
                                class="rounded-circle bg-white shadow d-flex align-items-center justify-content-center"
                                style="
                                width:110px;
                                height:110px;
                                font-size:36px;
                                font-weight:700;
                                color:#3f51b5;
                            ">
                                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                            </div>

            <div class="grade-student-name">
                {{ auth()->user()->name }}
            </div>

        </div>

        <div class="grade-overall">

            <div class="label">
                Overall grade
            </div>

            <div class="pct">
                --
            </div>

            <a href="#" class="view-link">
                View details
            </a>

        </div>

    </div>


    <div class="grade-divider"></div>


    <div class="task-filter-wrap">

        <p>Task filter</p>

        <fieldset class="task-filter-fieldset">

            <select id="workFilter">

                <option value="all">All</option>
                <option value="turned_in">Turned in</option>
                <option value="missing">Missing</option>

            </select>

        </fieldset>

    </div>


    <div class="grade-list">

        @if($submissions->count() > 0)

            @foreach($submissions as $submission)

                <div class="grade-row work-row"
                     data-status="turned_in">

                    <div class="grade-row-main">

                        <div class="grade-row-title">

                            <span class="t-text">
                                {{ $submission->assignment->assignment_title }}
                            </span>

                        </div>

                        <div class="grade-row-due">

                            Due
                            {{ $submission->assignment->assignment_due_date
                                ? $submission->assignment->assignment_due_date->format('M d, Y')
                                : 'No due date'
                            }}

                        </div>

                    </div>


                    <div class="grade-row-score turned-in">

                        Turned in

                    </div>

                </div>

            @endforeach

        @else

            <div class="text-center p-5">

                <h5>No submitted assignments</h5>

                <p class="text-muted mb-0">
                    You have not submitted any assignment yet.
                </p>

            </div>

        @endif

    </div>

</main>


<button class="help-fab">
    <i class="fa-regular fa-circle-question"></i>
</button>


<script>

    const workFilter = document.getElementById('workFilter');

    workFilter.addEventListener('change', function () {

        const selectedStatus = this.value;

        document.querySelectorAll('.work-row').forEach(function (row) {

            const status = row.dataset.status;

            if (selectedStatus === 'all' || selectedStatus === status) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    });

</script>

@endsection