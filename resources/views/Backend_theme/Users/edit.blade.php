@extends('Backend_theme.master')

@section('student')
    open
@endsection

@section('edit_student')
    active
@endsection

@section('body')

<main class="page">

    <div class="page-header">
        <div>
            <h1>Update User</h1>
            <p>Update the user's details and role.</p>
        </div>

        <div class="page-header-actions">
            <a class="btn btn-secondary" href="{{ route('user') }}">
                Cancel
            </a>

            <button class="btn btn-primary" type="submit" form="studentAddForm">
                <i class="fa-solid fa-floppy-disk"></i>
                Update User
            </button>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        id="studentAddForm"
        action="{{ route('user_update', $user->id) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div class="card card-pad mt-3">

            <div class="card-section-title mb-md">
                User Details
            </div>

            <div class="field-row">

                <div class="field">
                    <label for="name">Full Name</label>

                    <input
                        type="text"
                        class="input"
                        id="name"
                        name="name"
                        placeholder="Full Name"
                        value="{{ old('name', $user->name) }}"
                        required
                    >

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="field">
                    <label for="email">Email</label>

                    <input
                        type="email"
                        class="input"
                        id="email"
                        name="email"
                        placeholder="example@gmail.com"
                        value="{{ old('email', $user->email) }}"
                        required
                    >

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="field-row">

                <div class="field">
                    <label for="role">Role</label>

                    <select
                        class="input"
                        id="role"
                        name="role"
                        required
                    >
                        <option value="">Select Role</option>

                        @foreach ($roles as $role)
                            <option
                                value="{{ $role->name }}"
                                {{ old('role', $user->roles->first()?->name) == $role->name ? 'selected' : '' }}
                            >
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach

                    </select>

                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">
                        New Password
                    </label>

                    <input
                        type="password"
                        class="input"
                        id="password"
                        name="password"
                        placeholder="Leave blank to keep current password"
                    >

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>



            <div class="form-actions-bar">

                <a href="{{ route('user') }}" class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Update User
                </button>

            </div>

        </div>

    </form>

</main>

@endsection