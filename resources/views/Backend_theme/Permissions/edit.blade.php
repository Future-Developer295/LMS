@extends('Backend_theme.master')
@section('permision')
    open
@endsection
@section('add_permision')
    active
@endsection
@section('body')
<div class="page">

  <div class="breadcrumb">
    <span><a href="{{route('dashboard')}}">Dashboard</a></span>
    <i class="bi bi-chevron-right"></i>
    <a href="{{route('permissions.index')}}" style="color:var(--text-secondary);">Permissions</a>
    <i class="bi bi-chevron-right"></i>
    <span class="current">Edit Permission</span>
  </div>

  <div class="page-header">
    <div>
      <h1>Edit Permission</h1>
      <p>Update permission details and manage its role assignment.</p>
    </div>
    <div class="page-header-actions">
      <a href="{{route('permissions.index')}}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back to Permissions</a>
    </div>
  </div>

  <div class="card-centered">
    <div class="card">
      <form action="{{route('permissions.update', $permission->id)}}" method="POST">
        <div class="card-pad" >
          <div class="card-section-title">Permission Details</div>
          <p class="card-section-desc mb-lg">This information determines how the permission appears when assigning it to roles</p>

          <div class="field">
            <label>Permission Name</label>
            <input type="text" value="{{$permission->name}}" name="name" class="input" placeholder="e.g. view students" >
          </div>

        </div>

        <div class="form-actions-bar">
          <a href="{{route('permissions.index')}}" class="btn btn-ghost">Cancel</a>
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Save Permission</button>
        </div>
      </form>
    </div>
  </div>

</div>
@endsection