@extends("Frontend_theme.master")
@section('classwork')
active
@endsection
@section("body")

<main class="flex-grow-1 stream-main index-main ">

    <div class="class-tabbar">
        <div class="tab-links">
            <a href="{{ route("steam") }}" class="stream-tab active">Stream</a>
            <a href="{{ route("classwork") }}" class="stream-tab">Classwork</a>
            <a href="{{ route("people") }}" class="stream-tab">People</a>
        </div>
        <div class="tab-spacer"></div>
        <div class="tab-icons">
            <button class="btn-icon" title="Calendar"><svg focusable="false" width="24" height="24" viewBox="0 0 24 24" fill='#444746'>
                    <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"></path>
                </svg></button>
            <button class="btn-icon" title="Class settings"><svg enable-background="new 0 0 24 24" focusable="false" height="24" viewBox="0 0 24 24" width="24" fill='#444746'>
                    <rect fill="none" height="24" width="24"></rect>
                    <path d="M14.35,2.5h-4.7c-0.71,0-1.37,0.38-1.73,0.99L1.58,14.4c-0.36,0.62-0.36,1.38-0.01,2l2.35,4.09c0.36,0.62,1.02,1,1.73,1 h12.68c0.72,0,1.38-0.38,1.73-1l2.35-4.09c0.36-0.62,0.35-1.38-0.01-2L16.08,3.49C15.72,2.88,15.06,2.5,14.35,2.5z M18.34,19.5H5.66 l-2.35-4.09L9.65,4.5h4.7l6.34,10.91L18.34,19.5z M12.9,7.75h-1.8l-4.58,7.98L7.25,17h9.5l0.73-1.27L12.9,7.75z M9.25,15L12,10.2 l2.75,4.8H9.25z"></path>
                </svg></button>
        </div>
    </div>

    <div class="stream-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if($classes->count() > 0)
        <div class="mb-4">
            <h5 class="fw-bold">My Classes</h5>

            @foreach($classes as $class)
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="fw-bold mb-1">
                        {{ $class->class_name }}
                    </h5>

                    <p class="text-muted mb-1">
                        Class Code: {{ $class->class_code }}
                    </p>

                    @if($class->teacher)
                    <p class="text-muted mb-0">
                        Teacher: {{ $class->teacher->full_name }}
                    </p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="classwork-toolbar">

            <div class="task-filter-wrap">
                <p>Task filter</p>
                <fieldset class="task-filter-fieldset">

                    <select id="taskFilter">
                        <option value="all">All</option>
                        <option value="assigned">Assigned</option>
                        <option value="turned_in">Turned in</option>
                        <option value="graded">Graded</option>
                        <option value="missing">Missing</option>
                    </select>
                </fieldset>
            </div>

            <div class="toolbar-right">
                <a href="{{ route('class') }}" class="view-work-btn">
                    <i class="fa-regular fa-address-card"></i>
                    View your work
                </a>
                <button class="expand-all-link " id="expandAllBtn">
                    <i class="fa-solid fa-angles-up-down" id="expandAllIcon"></i> <span id="expandAllText"><svg focusable="false" height="20" viewBox="0 0 24 24" width="20" fill='#0b57d0'>
                            <path d="M16.59 9.41L18 8l-6-6-6 6 1.41 1.41L12 4.83l4.59 4.58zM12 19.17l-4.59-4.58L6 16l6 6 6-6-1.41-1.41L12 19.17z"></path>
                            <path d="M24 0v24H0V0h24z" fill="none"></path>
                        </svg>Collapse all</span>
                </button>
            </div>
        </div>

        @if($assignments->count() > 0)

        @foreach($assignments as $assignment)

        <div class="topic-group open"
            data-status="{{ $assignment->submissions->count() > 0 ? 'turned_in' : ($assignment->assignment_due_date && $assignment->assignment_due_date->isPast() ? 'missing' : 'assigned') }}">

            <div class="topic-row expanded" data-topic-toggle>
                <div class="topic-row-title">
                    {{ $assignment->assignment_title }}
                </div>

                <div class="topic-row-actions">
                    <button class="btn-icon chevron">
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>

                    <button class="btn-icon">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                </div>
            </div>

            <div class="topic-items">

                <div class="topic-item" data-item-toggle>

                    <div class="topic-item-ic">
                        <i class="fa-regular fa-file-lines"></i>
                    </div>

                    <div class="topic-item-title">
                        {{ $assignment->assignment_title }}
                    </div>

                    <div class="topic-item-due">
                        Due {{ $assignment->assignment_due_date->format('M d, Y') }}
                    </div>

                    <button class="topic-item-menu" data-stop-toggle>
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>

                </div>

                <div class="assignment-detail">

                    <div class="assignment-detail-head">

                        <span class="posted">
                            Assignment
                        </span>

                        <span class="status">
                            {{ $assignment->submissions->count() > 0 ? 'Turned in' : ucfirst($assignment->assignment_status) }}
                        </span>

                    </div>

                    <div class="assignment-detail-body">

                        <p>
                            {{ $assignment->assignment_instruction }}
                        </p>

                        <p>
                            <strong>Marks:</strong>
                            {{ $assignment->assignment_marks }}
                        </p>

                        @if($assignment->submissions->count() > 0)

                        <div class="alert alert-success mt-3">
                            Assignment already submitted.
                        </div>

                        @else

                        <form method="POST" action="{{ route('student.assignment.submit') }}" class="mt-3">
                            @csrf

                            <input type="hidden"
                                name="assignment_id"
                                value="{{ $assignment->id }}">

                            <div class="mb-3">
                                <label class="form-label">Submission</label>

                                <textarea name="assignment_file"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Write your assignment here..."
                                    required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Remark</label>

                                <textarea name="assignment_remark"
                                    class="form-control"
                                    rows="2"
                                    placeholder="Optional remark"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Turn in
                            </button>

                        </form>

                        @endif

                    </div>

                    <div class="assignment-detail-footer">

                        <a href="{{ route('classwork') }}"
                            class="view-instructions-link">
                            View instructions
                        </a>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

        @else

        <div class="text-center p-5">
            <h5>No assignments available</h5>
            <p class="text-muted">
                There are no assignments for your classes yet.
            </p>
        </div>

        @endif

    </div>

</main>
</div>

<button class="help-fab"><i class="fa-regular fa-circle-question"></i></button>

<script>
    document.querySelectorAll('[data-topic-toggle]').forEach(row => {
        row.addEventListener('click', () => {
            const group = row.closest('.topic-group');
            group.classList.toggle('open');
            row.classList.toggle('expanded');
        });
    });

    let allExpanded = true;
    const expandAllBtn = document.getElementById('expandAllBtn');
    const expandAllText = document.getElementById('expandAllText');

    expandAllBtn.addEventListener('click', () => {
        allExpanded = !allExpanded;
        document.querySelectorAll('.topic-group').forEach(group => {
            group.classList.toggle('open', allExpanded);
            group.querySelector('.topic-row').classList.toggle('expanded', allExpanded);
        });
        expandAllText.textContent = allExpanded ? 'Collapse all' : 'Expand all';
    });

    document.querySelectorAll('[data-item-toggle]').forEach(item => {
        item.addEventListener('click', function(e) {
            if (e.target.closest('[data-stop-toggle]')) return;

            const detail = this.nextElementSibling;
            if (detail && detail.classList.contains('assignment-detail')) {
                detail.classList.toggle('open');
            }
        });
    });
    const taskFilter = document.getElementById('taskFilter');

    taskFilter.addEventListener('change', function() {

        const selectedStatus = this.value;

        document.querySelectorAll('.topic-group').forEach(function(group) {

            const status = group.dataset.status;

            if (selectedStatus === 'all') {
                group.style.display = '';
            } else if (selectedStatus === status) {
                group.style.display = '';
            } else {
                group.style.display = 'none';
            }

        });

    });
</script>


@endsection