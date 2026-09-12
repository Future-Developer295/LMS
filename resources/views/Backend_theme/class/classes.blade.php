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
            <form method="GET" action="{{ route('class') }}">
                <div class="filter-bar">

                    <div class="input-icon-wrap left search-input-w">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" class="input" name="search" value="{{ request('search') }}" placeholder="Search class or teacher...">
                    </div>

                    <div class="filter-select-w">
                        <select class="select" id="dayFilter" name="day" onchange="this.form.submit()">
                            <option value="">Select Days...</option>
                            @foreach ($classDays as $day)
                                <option value="{{ $day->id }}" {{ request('day') == $day->id ? 'selected' : '' }}>
                                    {{ $day->class_days }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-select-w">
                        <select class="select" id="teacherFilter" name="teacher_id" onchange="this.form.submit()">
                            <option value="">All Teachers</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"
                                    {{ request('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->full_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-secondary btn-sm"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                    @if(request('search') || request('day') || request('teacher_id'))
                        <a href="{{ route('class') }}" class="btn btn-secondary btn-sm">Clear</a>
                    @endif

                    <div class="filter-bar-spacer"></div>

                    <button class="icon-btn"
                        style="border:1px solid var(--border);border-radius:var(--radius-sm);width:44px;height:44px;"
                        id="exportClassesBtn" type="button" title="Export"><i class="fa-solid fa-download"></i></button>
                </div>
            </form>

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
    @forelse ($classes as $class)

        <tr>

            <td>
                {{ $class->class_name }}
            </td>


            <td>
                {{ $class->teacher?->full_name ?? '—' }}
            </td>

 
            <td>
                {{ $class->timing?->class_timing ?? '—' }}
            </td>

            <td>
                {{ $class->day?->class_days ?? '—' }}
            </td>

            <td class="text-end">

                <a href="{{ route('class_view', $class->id) }}"
                   class="btn btn-sm btn-primary rounded-2 me-1"
                   title="View">
                    <i class="fa-solid fa-eye"></i>
                </a>

                <a href="{{ route('class_edit', $class->id) }}"
                   class="btn btn-sm btn-warning rounded-2 me-1"
                   title="Edit">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <form action="{{ route('class_destroy', $class->id) }}"
                      method="POST"
                      class="d-inline"
                      onsubmit="return confirm('Are you sure you want to delete this class?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-sm btn-danger rounded-2"
                            title="Delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>

                </form>

            </td>
        </tr>

    @empty

        <tr>
            <td colspan="5" class="text-center">
                No classes found.
            </td>
        </tr>

    @endforelse
</tbody>

                </table>

            </div>


        </div>
    </main>
@endsection
