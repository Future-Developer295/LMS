@extends('Backend_theme.master')
@section('permision')
    open
@endsection
@section('list_permision')
    active
@endsection
@section('body')
    <div class="page">

        <div class="breadcrumb">
            <span>Dashboard</span>
            <i class="bi bi-chevron-right"></i>
            <span class="current">Permissions</span>
        </div>

        <div class="page-header">
            <div>
                <h1>Permissions</h1>
                <p>Manage individual permissions available in the LMS</p>
            </div>
            <div class="page-header-actions">
                <button class="btn btn-secondary"><i class="bi bi-download"></i> Export</button>
                <a href="{{route('permissions.create')}}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Create Permission</a>
            </div>
        </div>



        <div class="card">
            <div class="card-header">
                <h2>All Permissions</h2>
                <a href="#" class="link">View activity log</a>
            </div>

            <div class="filter-bar">
                <div class="input-icon-wrap left search-input-w">
                    <i class="bi bi-search"></i>
                    <input type="text" class="input" placeholder="Search permissions...">
                </div>
                <select class="select filter-select-w">
                    <option>All modules</option>
                    <option>Dashboard</option>
                    <option>Users</option>
                    <option>Students</option>
                    <option>Teachers</option>
                    <option>Classes</option>
                    <option>Assignments</option>
                    <option>Courses</option>
                    <option>Reports</option>
                    <option>Settings</option>
                </select>
                <div class="filter-bar-spacer"></div>
                <span class="results-count">34 permissions</span>
            </div>

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Permission</th>
                            <th>Guard Name</th>
                            <th>Created</th>
                            <th style="text-align:right;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td><span class="cell-name primary">{{ $permission->name }}</span></td>
                                <td><span class="badge badge-blue">{{ $permission->guard_name }}</span></td>
                                <td class="cell-muted">{{ $permission->created_at }}</td>
                                <td style="display:flex; justify-content:flex-end; align-items:center;">
                                    <form action="{{ route('permissions.edit', $permission->id) }}" method="GET">
                                        @csrf
                                            <button href="" class="btn btn-sm btn-warning rounded-2 me-1" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                         </form>
                                   
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded-2" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

            <div class="pagination-bar">
                <span class="pagination-info">Showing 1–8 of 34 permissions</span>
                <div class="pagination">
                    <button class="page-btn" disabled><i class="bi bi-chevron-left"></i></button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn">4</button>
                    <button class="page-btn"><i class="bi bi-chevron-right"></i></button>
                </div>
            </div>
        </div>



    </div>
@endsection
