@extends("Backend_theme.master")
@section('student')
open
@endsection
@section('list_student')
active
@endsection
@section("body")
    <main class="page">
      <div class="page-header">
        <div>
          <h1>Students</h1>
          <p>Manage and view all enrolled student records.</p>
        </div>
        <div class="page-header-actions">
          <a class="btn btn-primary" href="{{ route('student_add') }}"><i class="fa-solid fa-plus"></i> Add Student</a>
        </div>
      </div>

      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="card">
        <form method="GET" action="{{ route('student') }}">
          <div class="filter-bar">
            <div class="input-icon-wrap left search-input-w">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="text" class="input" name="search" value="{{ request('search') }}" placeholder="Search name, CNIC, batch...">
            </div>
            <div class="filter-select-w">
              <select class="select" name="class_id" onchange="this.form.submit()">
                <option value="">All Classes</option>
                @foreach($classes as $class)
                  <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-secondary btn-sm"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
            @if(request('search') || request('class_id'))
              <a href="{{ route('student') }}" class="btn btn-secondary btn-sm">Clear</a>
            @endif
            <div class="filter-bar-spacer"></div>
            <button class="btn btn-secondary" id="exportStudentsBtn" type="button"><i class="fa-solid fa-download"></i> Export CSV</button>
          </div>
        </form>

        <div class="table-wrap">
          <table class="data-table">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Batch Code</th>
                <th>Class</th>
                <th>DOB</th>
                <th>Contact</th>
                <th style="text-align:right;">Actions</th>
              </tr>
            </thead>
            <tbody id="studentsBody">
              @forelse ($students as $student)
              <tr>
                            <td>{{ $student->full_name }} {{ $student->last_name }}</td>
                            <td>{{ $student->batch_code }}</td>
                            <td>{{ $student->class->class_name ?? '-' }}</td>
                            <td>{{ $student->dob }}</td>
                            <td>{{ $student->contact_number }}</td>
                            <td class="text-end">
                                <a href="{{ route('student_view', $student->id) }}" class="btn btn-sm btn-primary rounded-2 me-1" title="View">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="{{ route('student_edit', $student->id) }}" class="btn btn-sm btn-warning rounded-2 me-1" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <form action="{{ route('student_destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this student?');">
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
                <td colspan="6" class="text-center">No students found.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="pagination-bar">
          <span class="pagination-info" id="studentResultsCount">Showing {{ $students->count() }} of {{ $students->count() }} entries</span>
          <div class="pagination">
            <button class="page-btn"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn dots">...</button>
            <button class="page-btn">25</button>
            <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
          </div>
        </div>
      </div>
    </main>
 @endsection