@extends("Backend_theme.master")
@section('user')
open
@endsection
@section('list_user')
active
@endsection
@section("body")
    <main class="page">
      <div class="page-header">
        <div>
          <h1>Users</h1>
          <p>Manage and view all enrolled Users records.</p>
        </div>
        <div class="page-header-actions">
          <a class="btn btn-primary" href="{{ route('user_add') }}"><i class="fa-solid fa-plus"></i> Add Student</a>
        </div>
      </div>

      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="card">
        <div class="filter-bar">
          <div class="filter-select-w">
            <select class="select" id="gradeFilter">
              <option value="">All Grades</option>
              <option>9th Grade</option>
              <option>10th Grade</option>
              <option>11th Grade</option>
              <option>12th Grade</option>
            </select>
          </div>
          <div class="filter-select-w">
            <select class="select" id="statusFilter">
              <option value="">All Statuses</option>
              <option>Active</option>
              <option>Inactive</option>
            </select>
          </div>
          <div class="filter-bar-spacer"></div>
          <button class="btn btn-secondary" id="exportStudentsBtn"><i class="fa-solid fa-download"></i> Export CSV</button>
        </div>

        <div class="table-wrap">
          <table class="data-table">
            <thead>
              <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>Role</th>
                <th>Created</th>
                <th style="text-align:right;">Actions</th>
              </tr>
            </thead>
            <tbody id="studentsBody">
              @forelse ($users as $user)
              <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td class="text-end">


                                <a href="{{ route('user_edit', $user->id) }}" class="btn btn-sm btn-warning rounded-2 me-1" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <form action="{{ route('user_destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this student?');">
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
          <span class="pagination-info" id="studentResultsCount">Showing 1 to 8 of 248 entries</span>
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