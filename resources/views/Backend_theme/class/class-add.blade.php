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
            <a href="classes.html">Classes</a><i class="fa-solid fa-chevron-right"></i><span class="current">Create New
                Class</span>
        </div>

        <div class="page-header">
            <div>
                <h1>Create New Class</h1>
                <p>Configure details, assign personnel, and set the schedule for a new academic class.</p>
            </div>
            <div class="page-header-actions">
                <a class="btn btn-secondary" href="classes.html">Cancel</a>
                <button class="btn btn-primary" id="saveClassBtn"><i class="fa-solid fa-floppy-disk"></i> Save Class</button>
            </div>
        </div>

        <div class="card">
            <div class="section-row">


                <div class="field">
                    <label for="classTitle">Class Title *</label>
                    <input type="text" class="input" id="classTitle" placeholder="e.g. Advanced Physics 101" required>
                </div>

                <div>
                    <div class="field mb-0">
                        <label for="assignedTeacher">Assigned Teacher *</label>
                        <select class="select" id="assignedTeacher">
                            <option value="">Search Teachers...</option>
                            <option>Dr. Reynolds</option>
                            <option>Ms. Simmons</option>
                            <option>Mr. Kim</option>
                            <option>Eleanor Shellstrop</option>
                            <option>Chidi Anagonye</option>
                        </select>
                    </div>


                </div>
                <div class="field-row mt-3">
                    <div class="field">
                        <label>Meeting Days *</label>
                        <div class="day-toggle-row" id="dayToggleRow">
                            <button type="button" class="day-toggle" data-day="M">M</button>
                            <button type="button" class="day-toggle" data-day="T">T</button>
                            <button type="button" class="day-toggle" data-day="W">W</button>
                            <button type="button" class="day-toggle" data-day="Th">Th</button>
                            <button type="button" class="day-toggle" data-day="F">F</button>
                        </div>
                    </div>
                    <div class="field mb-0">
                        <label for="startTime">Start Time *</label>
                        <input type="time" class="input" id="startTime" value="09:00">
                    </div>
                </div>
            </div>


            <div class="section-row"
                style="border-top:1px solid var(--border);background:var(--bg);border-radius:0 0 var(--radius-lg) var(--radius-lg);grid-template-columns:1fr;">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <span class="text-secondary" style="font-size:13px;">Fields marked with <span
                            style="color:var(--danger);">*</span> are required.</span>
                    <div class="d-flex gap-2">
                        <button class="btn btn-ghost" type="button" id="resetFormBtn">Reset Form</button>
                        <button class="btn btn-primary" type="button" id="createClassBtn">Create Class</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
