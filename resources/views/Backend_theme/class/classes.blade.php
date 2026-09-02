@extends('Backend_theme.master')
@section('class')
    open
@endsection
@section('class')
    active
@endsection
@section('body')
    <main class="page">
        <div class="page-header">
            <div>
                <h1>Classes Overview</h1>
                <p>Manage current academic classes, assignments, and statuses.</p>
            </div>
            <div class="page-header-actions">
                <a class="btn btn-primary" href="{{ route('class_add') }}"><i class="fa-solid fa-plus"></i> New Class</a>
            </div>
        </div>

        <div class="card">
            <div class="filter-bar">
       
<div class="filter-select-w">
    <select class="select" id="dayFilter"
        onchange="window.location.href='{{ route('class') }}?day=' + this.value + '&teacher_id=' + document.getElementById('teacherFilter').value">
        <option value="">Select Days...</option>
        @foreach($classDays as $day)
            <option value="{{ $day->id }}" {{ request('day') == $day->id ? 'selected' : '' }}>
                {{ $day->class_days }}
            </option>
        @endforeach
    </select>
</div>

<div class="filter-select-w">
    <select class="select" id="teacherFilter"
        onchange="window.location.href='{{ route('class') }}?teacher_id=' + this.value + '&day=' + document.getElementById('dayFilter').value">
        <option value="">All Teachers</option>
        @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}" {{ request('teacher_id') == $teacher->id ? 'selected' : '' }}>
                {{ $teacher->full_name }}
            </option>
        @endforeach
    </select>
</div>


                <div class="filter-bar-spacer"></div>
 
                <button class="icon-btn"
                    style="border:1px solid var(--border);border-radius:var(--radius-sm);width:44px;height:44px;"
                    id="exportClassesBtn" title="Export"><i class="fa-solid fa-download"></i></button>
            </div>

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Class Name</th>
                            <th>Teacher</th>
                            <th>Class Timing</th>
                            <th>Class Days</th>
                            <th style="text-align:right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="classesBody">
                        @forelse($classes as $class)
                            <tr>
                                <td>{{ $class->class_name }}</td>
                                <td>{{ $class->teacher_name ?? '—' }}</td>
                             <td>{{ $class->timing_name }}</td>
<td>{{ $class->day_name }}</td>
                               <td class="text-end">
<a href="{{ route('class_view', $class->id) }}" class="btn btn-sm btn-primary rounded-2 me-1" title="View">
    <i class="fa-solid fa-eye"></i>
</a>

    <a href="{{ route('class_edit', $class->id) }}" class="btn btn-sm btn-warning rounded-2 me-1" title="Edit">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>

    <form action="{{ route('class_destroy', $class->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this class?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger rounded-2" title="Delete">
            <i class="fa-solid fa-trash"></i>
        </button>
    </form>
</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No classes found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>

      
        </div>
    </main>
@endsection