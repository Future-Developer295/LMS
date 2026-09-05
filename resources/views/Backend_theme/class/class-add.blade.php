@extends('Backend_theme.master')
@section('class')
    open
@endsection
@section('add_class')
    active
@endsection
<style>
    .section-row {
        padding: 25px
    }
</style>
@section('body')
    <main class="page">
        <div class="breadcrumb">
            <a href="{{ route('class') }}">Classes</a><i class="fa-solid fa-chevron-right"></i><span class="current">Create New Class</span>
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

        <form action="{{ route('class_store') }}" method="POST" id="classForm">
            @csrf

            <div class="page-header">
                <div>
                    <h1>Create New Class</h1>
                    <p>Configure details, assign personnel, and set the schedule for a new academic class.</p>
                </div>
                <div class="page-header-actions">
                    <a class="btn btn-secondary" href="{{ route('class') }}">Cancel</a>
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save Class</button>
                </div>
            </div>

            <div class="card">
                <div class="section-row">

            
<div class="field">
    <label for="class_name">Course Name *</label>
    <input type="text" class="input" name="class_name" id="class_name" placeholder="e.g. Grade 10 - Mathematics" value="{{ old('class_name') }}">
</div>

                    <div class="field">
                        <label for="teacher_id">Assigned Teacher *</label>
                        <select class="select" id="teacher_id" name="teacher_id">
                            <option value="">Select Teacher...</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->full_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field-row mt-3">
                        <div class="field">
                            <label for="class_days">Class Days *</label>
                            <select class="select" id="class_days" name="class_days">
                                <option value="">Select Days...</option>
                                @foreach($classDays as $day)
                                    <option value="{{ $day->id }}" {{ old('class_days') == $day->id ? 'selected' : '' }}>
                                        {{ $day->class_days }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                       <div class="field mb-0">
    <label for="class_timing">Class Timing *</label>
    <select class="select" id="class_timing" name="class_timing">
        <option value="">Select Timing...</option>
        @foreach($classTimings as $timing)
            <option value="{{ $timing->id }}" {{ old('class_timing') == $timing->id ? 'selected' : '' }}>
                {{ $timing->class_timing }}
            </option>
        @endforeach
    </select>
</div>
                    </div>
                </div>

                <div class="section-row"
                    style="border-top:1px solid var(--border);background:var(--bg);border-radius:0 0 var(--radius-lg) var(--radius-lg);grid-template-columns:1fr;">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <span class="text-secondary" style="font-size:13px;">Fields marked with <span style="color:var(--danger);">*</span> are required.</span>
                        <div class="d-flex gap-2">
                            <button class="btn btn-ghost" type="reset">Reset Form</button>
                            <button class="btn btn-primary" type="submit">Create Class</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection