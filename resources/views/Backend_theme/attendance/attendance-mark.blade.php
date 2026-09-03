@extends('Backend_theme.master')

@section('attendance') open @endsection
@section('add_attendance') active @endsection

@section('body')
<main class="page">
    <div class="page-header">
        <div>
            <h1>Mark Attendance</h1>
            <p>Record daily attendance for scheduled classes.</p>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong><i class="fa-solid fa-circle-exclamation me-2"></i>Please fix the following:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form id="markAttendanceForm" method="POST" action="{{ route('attendance_store') }}">
        @csrf

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="card card-pad">
                    <div class="field mb-0">
                        <label for="classSelect">Select Class / Batch</label>
                        <select class="select" id="classSelect" name="batch_code" required>
                            <option value="">Choose a batch...</option>
                            @foreach($batches as $batch)
                                <option value="{{ $batch->batch_code }}" {{ old('batch_code') == $batch->batch_code ? 'selected' : '' }}>
                                    {{ $batch->class?->class_name ?? 'Unknown Class' }} ({{ $batch->batch_code }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-pad">
                    <div class="field mb-0">
                        <label for="attendanceDate">Select Date</label>
                        <input type="date" class="input" id="attendanceDate" name="mark_date"
                               value="{{ old('mark_date', date('Y-m-d')) }}" max="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
            </div>
        </div>

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
                    <tbody id="markBody">
                        <tr>
                            <td colspan="3" class="text-center py-5">
                                <div class="mb-2"><i class="fa-solid fa-users" style="font-size:40px;opacity:.4;"></i></div>
                                <strong>Select a class to load students</strong>
                                <div class="text-muted mt-1">Students from the selected batch will appear here.</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="pagination-bar">
                <span class="pagination-info">Total Students: <strong id="totalStudents">0</strong></span>
                <div class="d-flex gap-2">
                    <a class="btn btn-secondary" href="{{ route('attendance') }}"><i class="fa-solid fa-xmark"></i> Cancel</a>
                    <button type="submit" class="btn btn-primary" id="saveAttendanceBtn" disabled>
                        <i class="fa-solid fa-floppy-disk"></i> Save Attendance
                    </button>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const classSelect = document.getElementById('classSelect');
    const attendanceDate = document.getElementById('attendanceDate');
    const markBody = document.getElementById('markBody');
    const totalStudents = document.getElementById('totalStudents');
    const saveButton = document.getElementById('saveAttendanceBtn');

    const states = {
        empty: `<tr><td colspan="3" class="text-center py-5">
                    <div class="mb-2"><i class="fa-solid fa-users" style="font-size:40px;opacity:.4;"></i></div>
                    <strong>Select a class to load students</strong>
                    <div class="text-muted mt-1">Students from the selected batch will appear here.</div>
                </td></tr>`,
        loading: `<tr><td colspan="3" class="text-center py-5">
                    <div class="spinner-border mb-3"></div><div>Loading students...</div>
                </td></tr>`,
        noStudents: `<tr><td colspan="3" class="text-center py-5">
                    <div class="mb-2"><i class="fa-solid fa-user-slash" style="font-size:40px;opacity:.4;"></i></div>
                    <strong>No students found</strong>
                    <div class="text-muted mt-1">This batch does not have any students.</div>
                </td></tr>`,
        error: `<tr><td colspan="3" class="text-center py-5 text-danger">
                    <i class="fa-solid fa-triangle-exclamation mb-2" style="font-size:35px;"></i>
                    <div>Failed to load students.</div><small>Please try selecting the batch again.</small>
                </td></tr>`,
    };

    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = value;
        return div.innerHTML;
    }

    function reset(state) {
        markBody.innerHTML = state;
        totalStudents.textContent = '0';
        saveButton.disabled = true;
    }

    classSelect.addEventListener('change', function () {
        const batchCode = this.value;
        if (!batchCode) return reset(states.empty);

        reset(states.loading);

        fetch("{{ route('attendance_students', ':batch') }}".replace(':batch', encodeURIComponent(batchCode)))
            .then(res => { if (!res.ok) throw new Error('Unable to load students.'); return res.json(); })
            .then(students => {
                if (!students.length) return reset(states.noStudents);

                totalStudents.textContent = students.length;
                markBody.innerHTML = '';

                students.forEach((student, index) => {
                    const fullName = `${student.full_name ?? ''} ${student.last_name ?? ''}`.trim();
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td><span class="fw-semibold">${escapeHtml(fullName)}</span></td>
                        <td>${student.id}</td>
                        <td class="text-end">
                            <select name="statuses[${index}][mark_status]" class="select select-sm attendance-status" required>
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                                <option value="late">Late</option>
                                <option value="leave">Leave</option>
                            </select>
                            <input type="hidden" name="statuses[${index}][student_id]" value="${student.id}">
                        </td>`;
                    markBody.appendChild(row);
                });

                saveButton.disabled = false;
            })
            .catch(err => { console.error(err); reset(states.error); });
    });

    document.getElementById('markAttendanceForm').addEventListener('submit', function (event) {
        if (!classSelect.value) {
            event.preventDefault();
            alert('Please select a class/batch.');
            return classSelect.focus();
        }
        if (!attendanceDate.value) {
            event.preventDefault();
            alert('Please select an attendance date.');
            return attendanceDate.focus();
        }
        if (!document.querySelectorAll('.attendance-status').length) {
            event.preventDefault();
            return alert('Please select a batch with students before saving attendance.');
        }
        saveButton.disabled = true;
        saveButton.innerHTML = `<span class="spinner-border spinner-border-sm me-1"></span> Saving...`;
    });
});
</script>
@endsection