@extends('Backend_theme.master')

@section('attendance')
    open
@endsection

@section('body')
    <main class="page">

        <div class="page-header">

            <div>

                <h1>Attendance Details</h1>

                <p>
                    View attendance records for this class.
                </p>

            </div>

            <div class="page-header-actions">

                <a href="{{ route('attendance') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back to Attendance
                </a>

            </div>

        </div>


        <div class="row g-3 mb-3">

         
            <div class="col-md-4">

                <div class="card card-pad">

                    <div class="field mb-0">

                        <label>Batch</label>

                        <div class="fw-semibold">
                            {{ $attendance->batch_code }}
                        </div>

                    </div>

                </div>

            </div>



            <div class="col-md-4">

                <div class="card card-pad">

                    <div class="field mb-0">

                        <label>Attendance Date</label>

                        <div class="fw-semibold">

                            {{ $attendance->mark_date->format('d M Y') }}

                        </div>

                    </div>

                </div>

            </div>



            <div class="col-md-4">

                <div class="card card-pad">

                    <div class="field mb-0">

                        <label>Total Students</label>

                        <div class="fw-semibold">

                            {{ $attendance->studentAttendance->count() }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @php

            $students = $attendance->studentAttendance;

            $total = $students->count();

            $present = $students->where('mark_status', 'present')->count();

            $absent = $students->where('mark_status', 'absent')->count();

            $late = $students->where('mark_status', 'late')->count();

            $leave = $students->where('mark_status', 'leave')->count();

            $percentage = $total > 0 ? round(($present / $total) * 100, 1) : 0;

        @endphp


        <div class="row g-3 mb-3">

    

            <div class="col-md-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <span>
                            <i class="fa-solid fa-user-check me-2"></i>
                            Present
                        </span>

                    </div>

                    <div class="stat-value" style="font-size:28px;">
                        {{ $present }}
                    </div>

                    <span class="stat-caption">
                        Students present
                    </span>

                </div>

            </div>


  

            <div class="col-md-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <span>
                            <i class="fa-solid fa-user-xmark me-2"></i>
                            Absent
                        </span>

                    </div>

                    <div class="stat-value" style="font-size:28px;">
                        {{ $absent }}
                    </div>

                    <span class="stat-caption">
                        Students absent
                    </span>

                </div>

            </div>


        

            <div class="col-md-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <span>
                            <i class="fa-regular fa-clock me-2"></i>
                            Late
                        </span>

                    </div>

                    <div class="stat-value" style="font-size:28px;">
                        {{ $late }}
                    </div>

                    <span class="stat-caption">
                        Students late
                    </span>

                </div>

            </div>


   

            <div class="col-md-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <span>
                            <i class="fa-solid fa-chart-line me-2"></i>
                            Attendance
                        </span>

                    </div>

                    <div class="stat-value" style="font-size:28px;">
                        {{ $percentage }}%
                    </div>

                    <span class="stat-caption">
                        Present percentage
                    </span>

                </div>

            </div>

        </div>



        <div class="card">

            <div class="card-pad">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h5 class="mb-1">
                            Student Attendance
                        </h5>

                        <p class="text-muted mb-0">
                            Attendance status for each student.
                        </p>

                    </div>

                    <span class="badge badge-green">

                        <i class="fa-solid fa-check me-1"></i>

                        Recorded

                    </span>

                </div>

            </div>


            <div class="table-wrap">

                <table class="data-table">

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                Student Name
                            </th>

                            <th>
                                Student ID
                            </th>

                            <th style="text-align:right;">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($students as $mark)
                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                <td>

                                    <span class="fw-semibold">

                                        {{ $mark->student->full_name ?? 'N/A' }}

                                        {{ $mark->student->last_name ?? '' }}

                                    </span>

                                </td>


                

                                <td>

                                    {{ $mark->student->id ?? 'N/A' }}

                                </td>



                                <td class="text-end">

                                    @if ($mark->mark_status === 'present')
                                        <span class="badge badge-green">

                                            <i class="fa-solid fa-check me-1"></i>

                                            Present

                                        </span>
                                    @elseif($mark->mark_status === 'absent')
                                        <span class="badge badge-red">

                                            <i class="fa-solid fa-xmark me-1"></i>

                                            Absent

                                        </span>
                                    @elseif($mark->mark_status === 'late')
                                        <span class="badge badge-orange">

                                            <i class="fa-regular fa-clock me-1"></i>

                                            Late

                                        </span>
                                    @elseif($mark->mark_status === 'leave')
                                        <span class="badge badge-blue">

                                            <i class="fa-solid fa-person-walking-arrow-right me-1"></i>

                                            Leave

                                        </span>
                                    @else
                                        <span class="badge badge-secondary">

                                            {{ ucfirst($mark->mark_status) }}

                                        </span>
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center py-5">

                                    <i class="fa-regular fa-calendar-xmark" style="font-size:40px;opacity:.5;"></i>

                                    <div class="mt-2">
                                        No student attendance records found.
                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>


  

            <div class="pagination-bar">

                <span class="pagination-info">

                    Total Students:
                    <strong>{{ $total }}</strong>

                    &nbsp; | &nbsp;

                    Present:
                    <strong>{{ $present }}</strong>

                    &nbsp; | &nbsp;

                    Absent:
                    <strong>{{ $absent }}</strong>

                </span>


                <a href="{{ route('attendance') }}" class="btn btn-secondary">

                    <i class="fa-solid fa-arrow-left"></i>

                    Back

                </a>

            </div>

        </div>

    </main>
@endsection
