@extends('Backend_theme.master')
@section('teacher')
    open
@endsection
@section('list_teacher')
    active
@endsection
@section('body')
    <main class="page">
        <div class="page-header">
            <div>
                <h1>Teachers Listing</h1>
                <p>Manage teaching staff, assignments, and status.</p>
            </div>
            <div class="page-header-actions">
                <a class="btn btn-primary" href="{{ route('teacher_add') }}"><i class="fa-solid fa-plus"></i> Add Teacher</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="filter-bar">
                <div class="input-icon-wrap left search-input-w">
                    <i class="fa-solid fa-filter"></i>
                    <input type="text" class="input" id="teacherSearch" placeholder="Filter teachers...">
                </div>
                <div class="filter-bar-spacer"></div>
                <span class="results-count" id="teacherResultsCount">Showing {{ $teachers->count() }} of {{ $teachers->count() }}</span>
                <button class="btn btn-secondary btn-sm" id="exportTeachersBtn"><i class="fa-solid fa-download"></i>
                    Export</button>
            </div>

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width:40px;"><input type="checkbox" id="selectAllTeachers"></th>
                            <th>Name</th>
                            <th>CNIC</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th style="text-align:right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="teachersBody">
                        @forelse ($teachers as $teacher)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>{{ $teacher->full_name }} {{ $teacher->last_name }}</td>
                            <td>{{ $teacher->cnic }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->contact_number }}</td>
                            <td class="text-end">
                                <a href="{{ route('teacher_view', $teacher->id) }}" class="btn btn-sm btn-primary rounded-2 me-1" title="View">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="{{ route('teacher_edit', $teacher->id) }}" class="btn btn-sm btn-warning rounded-2 me-1" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <form action="{{ route('teacher_destroy', $teacher->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this teacher?');">
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
                            <td colspan="6" class="text-center">No teachers found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-bar">
                <div class="d-flex align-items-center gap-2">
                    <span class="pagination-info">Rows per page:</span>
                    <select class="select" style="width:80px;height:36px;">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                </div>
                <div class="pagination">
                    <button class="page-btn"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn dots">...</button>
                    <button class="page-btn">5</button>
                    <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </main>
@endsection
