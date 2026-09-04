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

                        <input
                            type="text"
                            class="input"
                            id="assignmentTitle"
                            name="assignment_title"
                            placeholder="e.g., Chapter 4 Reading Reflection"
                            value="{{ old('assignment_title') }}"
                            required
                        >

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


                    
                    <textarea
                        class="input"
                        name="assignment_instruction"
                        rows="8"
                        placeholder="Provide clear instructions for the assignment here..."
                        style="width:100%; border:none; resize:vertical;"
                    >{{ old('assignment_instruction') }}</textarea>

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
                            Assign To
                        </label>

                       <select
    class="select"
    id="assignClass"
    name="class_timing_id"
    required
>
    <option value="">Select a Class</option>

    @foreach($classes as $class)
        <option
            value="{{ $class->class_timing }}"
            {{ old('class_timing_id') == $class->class_timing ? 'selected' : '' }}
        >
            {{ $class->class_name }}
           
        </option>
    @endforeach
</select>
                    </div>


                    
                    <div class="field">

                        <label>
                            Students
                        </label>

                        <label class="checkbox-row">

                            <input
                                type="checkbox"
                                id="allStudents"
                                checked
                            >

                            All Students in Class

                        </label>

                    </div>


                    
                    <div class="field">

                        <label for="points">

                            <i
                                class="fa-regular fa-star"
                                style="margin-right:4px;"
                            ></i>

                            Points / Max Marks

                        </label>

                        <input
                            type="number"
                            class="input"
                            id="points"
                            name="assignment_marks"
                            value="{{ old('assignment_marks', 100) }}"
                            min="0"
                            required
                        >

                    </div>


                    
                    <div class="field">

                        <label for="dueDate">

                            <i
                                class="fa-regular fa-calendar"
                                style="margin-right:4px;"
                            ></i>

                            Due Date

                        </label>

                        <input
                            type="date"
                            class="input"
                            id="dueDate"
                            name="assignment_due_date"
                            value="{{ old('assignment_due_date') }}"
                            required
                        >

                    </div>


                    
                    <input
                        type="hidden"
                        name="assignment_status"
                        value="active"
                    >

                </div>

            </div>

        </div>

    </form>
    

</main>

@endsection