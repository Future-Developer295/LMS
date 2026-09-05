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

    <!-- Assignment Title -->
    <div class="field">
        <label for="assignmentTitle">Assignment Title *</label>

        <input
            type="text"
            class="input"
            id="assignmentTitle"
            name="assignment_title"
            value="{{ old('assignment_title', $assignment->assignment_title) }}"
            required
        >
    </div>

    <!-- Instructions -->
    <div class="field">
        <label for="instructionsBody">Assignment Instructions</label>

        <textarea
            class="input"
            id="instructionsBody"
            name="assignment_instruction"
            rows="8"
        >{{ old('assignment_instruction', $assignment->assignment_instruction) }}</textarea>
    </div>

    <!-- Class -->
    <div class="field">
        <label for="assignClass">Assign To</label>

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

    <!-- Marks -->
    <div class="field">
        <label for="points">Points / Max Marks</label>

        <input
            type="number"
            class="input"
            id="points"
            name="assignment_marks"
            value="{{ old('assignment_marks', $assignment->assignment_marks) }}"
            required
        >
    </div>

    <!-- Due Date -->
    <div class="field">
        <label for="dueDate">Due Date</label>

        <input
            type="date"
            class="input"
            id="dueDate"
            name="assignment_due_date"
            value="{{ old('assignment_due_date', optional($assignment->assignment_due_date)->format('Y-m-d')) }}"
            required
        >
    </div>

    <!-- Status -->
    <div class="field">
        <label for="status">Status</label>

        <select
            class="select"
            id="status"
            name="assignment_status"
            required
        >
            <option value="pending" {{ $assignment->assignment_status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="active" {{ $assignment->assignment_status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="completed" {{ $assignment->assignment_status == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="closed" {{ $assignment->assignment_status == 'closed' ? 'selected' : '' }}>Closed</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fa-solid fa-floppy-disk"></i>
        Update
    </button>

</form>

</main>

@endsection