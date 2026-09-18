@extends('Backend_theme.master')

@section('assignment')
    open
@endsection

@section('add_assignment')
    active
@endsection

@section('body')

    <main class="page">

        <div class="breadcrumb">
            <a href="{{ route('assignment') }}">Assignments</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span class="current">Create New</span>
        </div>



        <form action="{{ route('assignment.store') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div style="background:#fee2e2; color:#991b1b; padding:15px; margin-bottom:20px; border-radius:8px;">
                    <strong>Please fix these errors:</strong>

                    <ul style="margin-top:8px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="page-header">

                <div>
                    <h1>Assignment Details</h1>
                </div>

                <div class="page-header-actions">

                    <a class="btn btn-secondary" href="{{ route('assignment') }}">
                        Discard
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-paper-plane"></i>
                        Assign
                    </button>

                </div>

            </div>


            <div class="form-grid" style="grid-template-columns: 1fr 360px;">


                <div class="stack">


                    <div class="card card-pad">

                        <div class="field mb-0">

                            <label for="assignmentTitle">
                                <i class="fa-solid fa-t" style="margin-right:6px;"></i>
                                Assignment Title *
                            </label>

                            <input type="text" class="input" id="assignmentTitle" name="assignment_title"
                                placeholder="e.g., Chapter 4 Reading Reflection" value="{{ old('assignment_title') }}"
                                required>

                        </div>

                    </div>



                    <div class="card">

                        <div class="rte-toolbar">

                            <button type="button" data-cmd="bold" title="Bold">
                                <i class="fa-solid fa-bold"></i>
                            </button>

                            <button type="button" data-cmd="italic" title="Italic">
                                <i class="fa-solid fa-italic"></i>
                            </button>

                            <button type="button" data-cmd="underline" title="Underline">
                                <i class="fa-solid fa-underline"></i>
                            </button>

                            <div class="divider"></div>

                            <button type="button" data-cmd="insertUnorderedList" title="Bullet list">
                                <i class="fa-solid fa-list-ul"></i>
                            </button>

                            <button type="button" data-cmd="insertOrderedList" title="Numbered list">
                                <i class="fa-solid fa-list-ol"></i>
                            </button>

                            <div class="divider"></div>

                            <button type="button" data-cmd="createLink" title="Insert link">
                                <i class="fa-solid fa-link"></i>
                            </button>

                        </div>



                        <textarea class="input" name="assignment_instruction" rows="8"
                            placeholder="Provide clear instructions for the assignment here..."
                            style="width:100%; border:none; resize:vertical;">{{ old('assignment_instruction') }}</textarea>

                    </div>

                </div>



                <div class="stack">

                    <div class="card card-pad">

                        <div class="card-section-title mb-md">

                            <i class="fa-solid fa-gear" style="margin-right:6px;"></i>

                            Assignment Settings

                        </div>



                        <div class="field">

                            <label for="assignClass">
                                Assign To (Class)
                            </label>

                            <select class="select" id="assignClass" required>
                                <option value="">Select a Class</option>

                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" data-timing="{{ $class->class_timing }}"
                                        {{ old('assign_class_id') == $class->id ? 'selected' : '' }}>
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach
                            </select>

                        
                            <input type="hidden" name="class_timing_id" id="classTimingHidden"
                                value="{{ old('class_timing_id') }}">
                        </div>

                        <div class="field">

                            <label for="topicSelect">
                                Topic
                            </label>

                            <select class="select" id="topicSelect" name="topic_id" required>
                                <option value="">Select class first</option>
                            </select>

                        </div>



                        <div class="field">

                            <label>
                                Students
                            </label>

                            <label class="checkbox-row">

                                <input type="checkbox" id="allStudents" checked>

                                All Students in Class

                            </label>

                        </div>



                        <div class="field">

                            <label for="points">

                                <i class="fa-regular fa-star" style="margin-right:4px;"></i>

                                Points / Max Marks

                            </label>

                            <input type="number" class="input" id="points" name="assignment_marks"
                                value="{{ old('assignment_marks', 100) }}" min="0" required>

                        </div>

<div class="field">
    <label for="assignmentStatus">
        <i class="fa-solid fa-circle-check" style="margin-right:4px;"></i>
        Assignment Status
    </label>

    <select class="input" id="assignmentStatus" name="assignment_status" required>
        <option value="">Select Status</option>

        <option value="pending" {{ old('assignment_status') == 'pending' ? 'selected' : '' }}>
            Pending
        </option>

        <option value="active" {{ old('assignment_status') == 'active' ? 'selected' : '' }}>
            Active
        </option>

        <option value="completed" {{ old('assignment_status') == 'completed' ? 'selected' : '' }}>
            Completed
        </option>

        <option value="closed" {{ old('assignment_status') == 'closed' ? 'selected' : '' }}>
            Closed
        </option>
    </select>
</div>

<div class="field">
    <label for="dueDate">
        <i class="fa-regular fa-calendar" style="margin-right:4px;"></i>
        Due Date
    </label>

    <input type="date"
           class="input"
           id="dueDate"
           name="assignment_due_date"
           required>
</div>

<div class="field">
    <label for="dueTime">
        <i class="fa-regular fa-clock" style="margin-right:4px;"></i>
        Due Time
    </label>

  <input type="time"
       class="input"
       id="dueTime"
       name="assignment_due_time"
       required>
</div>

                    </div>

                </div>

            </div>

        </form>


    </main>

@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    const classSelect = document.getElementById('assignClass');
    const timingHidden = document.getElementById('classTimingHidden');
    const topicSelect = document.getElementById('topicSelect');
    const dueDate = document.getElementById('dueDate');
    const dueTime = document.getElementById('dueTime');
    const assignmentDueDate = document.getElementById('assignmentDueDate');

    const form = document.querySelector('form');

    const oldTopicId = @json(old('topic_id'));
    
    function combineDueDateTime() {
        if (dueDate.value && dueTime.value) {
            assignmentDueDate.value =
                dueDate.value + ' ' + dueTime.value + ':00';
        }
    }

    dueDate.addEventListener('change', combineDueDateTime);
    dueTime.addEventListener('change', combineDueDateTime);

    // Form submit hone se pehle bhi combine kar dein
    form.addEventListener('submit', function () {
        combineDueDateTime();
    });


    function loadTopics(classId, preselect = null) {
        if (!classId) {
            topicSelect.innerHTML =
                '<option value="">Select class first</option>';
            return;
        }

        fetch(`/dashboard/assignment/topics/${classId}`)
            .then(res => res.json())
            .then(topics => {
                topicSelect.innerHTML =
                    '<option value="">Select a Topic</option>';

                topics.forEach(topic => {
                    const opt = document.createElement('option');
                    opt.value = topic.id;
                    opt.textContent = topic.topic_name;
                    if (preselect && topic.id == preselect) {
                        opt.selected = true;
                    }
                    topicSelect.appendChild(opt);
                });
            });
    }

    classSelect.addEventListener('change', function () {

        const selectedOption =
            this.options[this.selectedIndex];

        timingHidden.value =
            selectedOption.dataset.timing || '';

        loadTopics(this.value);
    });


    // Old values
    const oldClassId = @json(old('assign_class_id'));
    if (oldClassId) {
        classSelect.value = oldClassId;

        const selectedOption =
            classSelect.options[classSelect.selectedIndex];

        timingHidden.value =
            selectedOption ? selectedOption.dataset.timing : '';

        loadTopics(oldClassId, oldTopicId);
    }
});
</script>