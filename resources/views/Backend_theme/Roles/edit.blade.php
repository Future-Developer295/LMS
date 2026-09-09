@extends('Backend_theme.master')
@section('role')
    open
@endsection
@section('add_role')
    active
@endsection
@section('body')
    <div class="page">


        <div class="breadcrumb">
            <span><a href="{{ route('dashboard') }}">Dashboard</a></span>
            <i class="bi bi-chevron-right"></i>
            <a href="{{ route('permissions.index') }}" style="color:var(--text-secondary);">Role</a>
            <i class="bi bi-chevron-right"></i>
            <span class="current">Update Role</span>
        </div>

        <div class="page-header">
            <div>
                <h1>Create Role</h1>
                <p>Define a role and choose which permissions it grants across the LMS</p>
            </div>
            <div class="page-header-actions">
                <a href="{{ route('roles.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back to
                    Roles</a>
            </div>
        </div>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-sidebar-grid">

                <div class="card mb-lg">

                    <div class="card-pad" style="padding-bottom:0;">
                        <div class="card-section-title">Permissions</div>

                        <p class="card-section-desc mb-md">
                            Select the modules and actions this role is allowed to perform
                        </p>
                    </div>

                    <div style="padding: 0 var(--space-lg) var(--space-lg);">

                        @foreach ($permissions as $module => $modulePermissions)
                            <div class="permission-group">

                                <div class="permission-group-header">

                                    <div class="permission-group-title">
                                        <div>
                                            <span class="name">
                                                {{ $module }}
                                            </span>

                                            <span class="count">
                                                {{ $modulePermissions->count() }} permissions
                                            </span>
                                        </div>
                                    </div>

                                    <label class="select-all-label">

                                        <input type="checkbox" id="selectAll{{ $loop->iteration }}"
                                            onclick="toggleGroup({{ $loop->iteration }})">

                                        Select All

                                    </label>

                                </div>


                                <div class="permission-grid">

                                    @foreach ($modulePermissions as $permission)
                                        <label class="permission-check">

                                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                                class="perm-{{ $loop->parent->iteration }}"
                                                {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>

                                            <span>
                                                {{ $permission->name }}
                                            </span>

                                        </label>
                                    @endforeach

                                </div>

                            </div>
                        @endforeach

                    </div>


                    <div class="form-actions-bar">

                        <a href="{{ route('roles.index') }}" class="btn btn-ghost">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i>
                            Update Role
                        </button>

                    </div>

                </div>


                <div class="role-details-sticky">

                    <div class="card card-pad mb-lg">

                        <div class="card-section-title">
                            Role Details
                        </div>

                        <p class="card-section-desc mb-md">
                            Basic information about this role
                        </p>

                        <div class="field">

                            <label>Role Name *</label>

                            <input type="text" name="name" class="input" placeholder="e.g. Content Reviewer"
                                value="{{ old('name', $role->name) }}">

                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                    </div>


                    <div class="card card-pad">

                        <div style="display:flex;align-items:flex-start;gap:10px;">

                            <i class="bi bi-info-circle-fill"
                                style="color:var(--primary);font-size:16px;margin-top:2px;"></i>

                            <p class="cell-muted" style="font-size:12.5px;margin:0;">
                                Permissions are grouped by module. Use
                                "Select All" to quickly grant every action
                                within a module.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </form>
    </div>

    <script>
        function toggleGroup(id) {
            const master = document.getElementById('selectAll' + id);
            document.querySelectorAll('.perm-' + id).forEach(cb => cb.checked = master.checked);
        }

        document.querySelectorAll('[id^="selectAll"]').forEach(master => {
            const id = master.id.replace('selectAll', '');
            const boxes = document.querySelectorAll('.perm-' + id);

            function syncMaster() {
                master.checked = Array.from(boxes).every(b => b.checked);
            }
            boxes.forEach(b => b.addEventListener('change', syncMaster));
            syncMaster();
        });
    </script>
@endsection
