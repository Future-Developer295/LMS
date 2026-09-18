@extends("Backend_theme.master")

@section('assignment')
    open active
@endsection

@section('edit_assignment')
    active
@endsection

@section("body")

<main class="page">

    {{-- Breadcrumb --}}
    <div class="breadcrumb">

        <a href="{{ route('assignment') }}">
            Assignments
        </a>

        <i class="fa-solid fa-chevron-right"></i>

        <span class="current">
            Edit
        </span>

    </div>


    {{-- Page Header --}}
    <div class="page-header">

        <div>
            <h1>Edit Assignment</h1>
        </div>

        <div class="page-header-actions">

            <a class="btn btn-secondary"
               href="{{ route('assignment') }}">
                Discard
            </a>

            <button class="btn btn-primary"
                    type="submit"
                    form="editAssignmentForm">

                <i class="fa-solid fa-floppy-disk"></i>
                Update

            </button>

        </div>

    </div>


    <form id="editAssignmentForm"
          action="{{ route('assignment.update', $assignment->id) }}"
          method="POST">

        @csrf
        @method('PUT')


  
    {{-- Topic --}}
    <div class="field">
        <label for="topic">Topic *</label>

        <select
            class="select"
            id="topic"
            name="topic_id"
            required
        >
            <option value="{{ $assignment->topic_id }}" selected>
                Topic ID: {{ $assignment->topic_id }}
            </option>
        </select>
    </div>


        {{-- Assignment Title --}}
        <div class="field">

            <label for="assignmentTitle">
                Assignment Title *
            </label>

            <input
                type="text"
                class="input"
                id="assignmentTitle"
                name="assignment_title"
                value="{{ old('assignment_title', $assignment->assignment_title) }}"
                required
            >

        </div>


        {{-- Assignment Instructions --}}
        <div class="field">

            <label for="instructionsBody">
                Assignment Instructions
            </label>

            <textarea
                class="input"
                id="instructionsBody"
                name="assignment_instruction"
                rows="8"
            >{{ old('assignment_instruction', $assignment->assignment_instruction) }}</textarea>

        </div>


        {{-- Assign To --}}
        <div class="field">

            <label for="assignClass">
                Assign To
            </label>

            <select
                class="select"
                id="assignClass"
                name="class_timing_id"
                required
            >

                <option value="{{ $assignment->class_timing_id }}" selected>
                    Class ID: {{ $assignment->class_timing_id }}
                </option>

            </select>

        </div>


        {{-- Points --}}
        <div class="field">

            <label for="points">
                Points / Max Marks
            </label>

            <input
                type="number"
                class="input"
                id="points"
                name="assignment_marks"
                value="{{ old('assignment_marks', $assignment->assignment_marks) }}"
                min="0"
                required
            >

        </div>


        {{-- Due Date --}}
        <div class="field">

            <label for="dueDate">
                Due Date
            </label>

            <input
                type="date"
                class="input"
                id="dueDate"
                value="{{ old('assignment_due_date', optional($assignment->assignment_due_date)->format('Y-m-d')) }}"
                required
            >

        </div>


        {{-- Due Time --}}
        <div class="field">

            <label for="dueTime">
                Due Time
            </label>

            <input
                type="time"
                class="input"
                id="dueTime"
                value="{{ optional($assignment->assignment_due_date)->format('H:i') }}"
                required
            >

        </div>


        {{-- Combined Date + Time --}}
        <input
            type="hidden"
            name="assignment_due_date"
            id="assignmentDueDate"
        >


        {{-- Status --}}
        <div class="field">

            <label for="status">
                Status
            </label>

            <select
                class="select"
                id="status"
                name="assignment_status"
                required
            >

                <option value="pending"
                    {{ old('assignment_status', $assignment->assignment_status) == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="active"
                    {{ old('assignment_status', $assignment->assignment_status) == 'active' ? 'selected' : '' }}>
                    Active
                </option>

                <option value="completed"
                    {{ old('assignment_status', $assignment->assignment_status) == 'completed' ? 'selected' : '' }}>
                    Completed
                </option>

                <option value="closed"
                    {{ old('assignment_status', $assignment->assignment_status) == 'closed' ? 'selected' : '' }}>
                    Closed
                </option>

            </select>

        </div>


        {{-- Bottom Update Button --}}
        <button
            type="submit"
            class="btn btn-primary"
        >

            <i class="fa-solid fa-floppy-disk"></i>
            Update

        </button>

    </form>

</main>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const dueDate = document.getElementById('dueDate');
    const dueTime = document.getElementById('dueTime');
    const assignmentDueDate = document.getElementById('assignmentDueDate');
    const form = document.getElementById('editAssignmentForm');


    function combineDueDateTime() {

        if (dueDate.value && dueTime.value) {

            assignmentDueDate.value =
                dueDate.value + ' ' + dueTime.value + ':00';

        }

    }


    dueDate.addEventListener('change', combineDueDateTime);

    dueTime.addEventListener('change', combineDueDateTime);


    form.addEventListener('submit', function () {

        combineDueDateTime();

    });


    // Page load par existing date + time hidden field mein set karo
    combineDueDateTime();

});

</script>

@endsection