@extends('Backend_theme.master')

@section('attendance')
    open
@endsection
@section('add_attendance')
    active
@endsection

@section('body')
    <main class="page">
        <div class="page-header">
            <div>
                <h1>Mark Attendance</h1>
                <p>Pick a class and a date, then load the students. If attendance was already saved for that day, it
                    is loaded so you can review or update it.</p>
            </div>
            <div class="page-header-actions">
                <a class="btn btn-secondary" href="{{ route('attendance') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong><i class="fa-solid fa-circle-exclamation me-2"></i>Please fix the following:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Step 1: choose class and date (plain GET, the page reloads with the students) --}}
        <form method="GET" action="{{ route('attendance_add') }}">
            <div class="row g-3 mb-3">
                <div class="col-md-5">
                    <div class="card card-pad">
                        <div class="field mb-0">
                            <label for="classSelect">Select Class / Batch</label>
                            <select class="select" id="classSelect" name="batch_code" required>
                                <option value="">Choose a batch...</option>
                                @foreach ($batches as $batch)
                                    <option value="{{ $batch->batch_code }}"
                                        {{ $selectedBatch == $batch->batch_code ? 'selected' : '' }}>
                                        {{ $batch->class?->class_name ?? 'Unknown Class' }} ({{ $batch->batch_code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card card-pad">
                        <div class="field mb-0">
                            <label for="attendanceDate">Select Date</label>
                            <input type="date" class="input" id="attendanceDate" name="mark_date"
                                value="{{ $selectedDate }}" max="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa-solid fa-magnifying-glass"></i> Load Students
                    </button>
                </div>
            </div>
        </form>

        @if ($selectedBatch)
            @if ($attendance)
                <div class="alert alert-warning">
                    <i class="fa-solid fa-circle-info me-2"></i>
                    Attendance for <strong>{{ $selectedBatch }}</strong> on
                    <strong>{{ \Carbon\Carbon::parse($selectedDate)->format('d M Y') }}</strong> is already recorded.
                    The saved statuses are shown below, and saving will update them.
                </div>
            @endif

            {{-- Step 2: mark and save --}}
            <form method="POST" action="{{ route('attendance_store') }}">
                @csrf
                <input type="hidden" name="batch_code" value="{{ $selectedBatch }}">
                <input type="hidden" name="mark_date" value="{{ $selectedDate }}">

                <div class="card">
                    <div class="table-wrap">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Student ID</th>
                                    <th style="text-align:right;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    @php
                                        $current = old(
                                            "statuses.{$loop->index}.mark_status",
                                            $saved[$student->id] ?? 'present',
                                        );
                                    @endphp
                                    <tr>
                                        <td>
                                            <span class="fw-semibold">{{ $student->full_name }}
                                                {{ $student->last_name }}</span>
                                        </td>
                                        <td>{{ $student->id }}</td>
                                        <td class="text-end">
                                            <select name="statuses[{{ $loop->index }}][mark_status]"
                                                class="select select-sm" required>
                                                @foreach (['present', 'absent', 'late', 'leave'] as $status)
                                                    <option value="{{ $status }}" @selected($current === $status)>
                                                        {{ ucfirst($status) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="statuses[{{ $loop->index }}][student_id]"
                                                value="{{ $student->id }}">
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-5">
                                            <div class="mb-2"><i class="fa-solid fa-user-slash"
                                                    style="font-size:40px;opacity:.4;"></i></div>
                                            <strong>No students found</strong>
                                            <div class="text-muted mt-1">This batch does not have any students.</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination-bar">
                        <span class="pagination-info">Total Students: <strong>{{ $students->count() }}</strong></span>
                        <div class="d-flex gap-2">
                            <a class="btn btn-secondary" href="{{ route('attendance') }}">
                                <i class="fa-solid fa-xmark"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary" @disabled($students->isEmpty())>
                                <i class="fa-solid fa-floppy-disk"></i>
                                {{ $attendance ? 'Update Attendance' : 'Save Attendance' }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        @else
            <div class="card">
                <div class="text-center py-5">
                    <div class="mb-2"><i class="fa-solid fa-users" style="font-size:40px;opacity:.4;"></i></div>
                    <strong>Select a class and date to load students</strong>
                    <div class="text-muted mt-1">Then press "Load Students".</div>
                </div>
            </div>
        @endif
    </main>
@endsection