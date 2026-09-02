@extends("Backend_theme.master")

@section('attendance')
    open
@endsection

@section('attendance_active')
    active
@endsection

@section("body")

<main class="page">

    <div class="page-header">
        <div>
            <h1>Edit Attendance</h1>
            <p>Update attendance records.</p>
        </div>
    </div>

 
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('attendance_update', $attendance->id) }}">

        @csrf
        @method('PUT')

       
        <div class="row g-3 mb-3">

            <div class="col-md-6">
                <div class="card card-pad">
                    <div class="field">
                        <label>Batch</label>

                        <input type="text"
                               class="input"
                               value="{{ $attendance->batch_code }}"
                               readonly>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-pad">
                    <div class="field">
                        <label>Attendance Date</label>

                        <input type="date"
                               name="mark_date"
                               class="input"
                               value="{{ old('mark_date', $attendance->mark_date->format('Y-m-d')) }}"
                               required>
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

                    <tbody>

                        @foreach($attendance->studentAttendance as $mark)

                            <tr>

                                <td>
                                    {{ $mark->student->full_name }}
                                    {{ $mark->student->last_name }}
                                </td>

                                <td>
                                    {{ $mark->student->id }}
                                </td>

                                <td class="text-end">

                                    <select
                                        name="statuses[{{ $loop->index }}][mark_status]"
                                        class="select select-sm"
                                    >

                                        @foreach(['present','absent','late','leave'] as $status)

                                            <option
                                                value="{{ $status }}"
                                                @selected($mark->mark_status == $status)
                                            >
                                                {{ ucfirst($status) }}
                                            </option>

                                        @endforeach

                                    </select>

                                    <input type="hidden"
                                           name="statuses[{{ $loop->index }}][id]"
                                           value="{{ $mark->id }}">

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="pagination-bar">

                <span class="pagination-info">
                    Total Students:
                    <strong>
                        {{ $attendance->studentAttendance->count() }}
                    </strong>
                </span>

                <div class="d-flex gap-2">

                    <a href="{{ route('attendance') }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fa-solid fa-floppy-disk"></i>
                        Update Attendance

                    </button>

                </div>

            </div>

        </div>

    </form>

</main>

@endsection