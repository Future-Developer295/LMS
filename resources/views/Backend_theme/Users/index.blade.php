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
        <form method="GET" action="{{ route('user') }}">
          <div class="filter-bar">
            <div class="input-icon-wrap left search-input-w">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="text" class="input" name="search" value="{{ request('search') }}" placeholder="Search name or email...">
            </div>
            <div class="filter-select-w">
              <select class="select" name="role" onchange="this.form.submit()">
                <option value="">All Roles</option>
                @foreach($roles as $role)
                  <option value="{{ $role->name }}" {{ request('role') == $role->name ? 'selected' : '' }}>{{ ucfirst($role->name) }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-secondary btn-sm"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
            @if(request('search') || request('role'))
              <a href="{{ route('user') }}" class="btn btn-secondary btn-sm">Clear</a>
            @endif
            <div class="filter-bar-spacer"></div>
            <button class="btn btn-secondary" id="exportStudentsBtn" type="button"><i class="fa-solid fa-download"></i> Export CSV</button>
          </div>
        </form>

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
                            <td>{{ $user->roles->pluck('name')->map(fn($name) => ucfirst($name))->join(', ') ?: '—' }}</td>
                            <td>{{ $user->created_at?->format('d M Y') }}</td>
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
          <span class="pagination-info" id="studentResultsCount">Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} of {{ $users->total() }} entries</span>
          {{ $users->links() }}
        </div>
      </div>
    </main>
 @endsection