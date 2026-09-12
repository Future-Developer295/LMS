@extends('Backend_theme.master')
@section('role')
    open
@endsection
@section('list_role')
active
@endsection
@section('body')
    <div class="page">

        <div class="breadcrumb">
            <span>Settings</span>
            <i class="bi bi-chevron-right"></i>
            <span class="current">Roles</span>
        </div>

        <div class="page-header">
            <div>
                <h1>Roles</h1>
                <p>Manage roles and their permissions</p>
            </div>
            <div class="page-header-actions">
                <a href="{{ route('roles.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Create Role
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h2>All Permissions</h2>
                <a href="#" class="link">View activity log</a>
            </div>
            <div class="filter-bar">
                <form method="GET" action="{{ route('roles.index') }}" style="display:flex; align-items:center; gap:12px; flex:1;">
                    <div class="input-icon-wrap left search-input-w">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" class="input" name="search" value="{{ request('search') }}" placeholder="Search roles...">
                    </div>
                    <button type="submit" class="btn btn-secondary btn-sm">Search</button>
                    @if(request('search'))
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">Clear</a>
                    @endif
                </form>
                <div class="filter-bar-spacer"></div>
                <span class="results-count">{{ $roles->total() }} roles</span>
            </div>
            <div class="card">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Permission</th>
                            <th>Permission Name</th>
                            <th>Created</th>
                            <th style="text-align:right;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td><span class="cell-name primary">{{ $role->name }}</span></td>
                                <td class="primary">
                                    @if ($role->permissions->count())
                                        <div style="display:flex;flex-wrap:wrap;gap:6px;">
                                            @foreach ($role->permissions->take(3) as $perm)
                                                <span class="primary"> {{ $perm->name }} </span>
                                                @endforeach @if ($role->permissions->count() > 3)
                                                    <span class="primary"> +{{ $role->permissions->count() - 3 }} more
                                                    </span>
                                                @endif
                                        </div>
                                    @else
                                        <span class="cell-muted"> No permissions assigned </span>
                                    @endif
                                </td>
                                <td class="cell-muted">{{ $role->created_at }}</td>
                                <td style="display:flex; justify-content:flex-end; align-items:center;">
                                      <a href="{{ route('roles.view', $role->id) }}" class="btn btn-sm btn-primary rounded-2 me-1" title="View">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                    <form action="{{ route('roles.edit', $role->id) }}" method="GET">
                                        @csrf
                                        <button href="" class="btn btn-sm btn-warning rounded-2 me-1" title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
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
        </div>

        {{ $roles->links() }}

    </div>
@endsection
