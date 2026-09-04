@extends('Backend_theme.master')
@section('class')
    open
@endsection
@section('view_class')
    active
@endsection
<style>
    .section-row {
        padding: 25px
    }
    .view-field {
        margin-bottom: 18px;
    }
    .view-field label {
        display: block;
        font-size: 13px;
        color: var(--text-secondary, #6c757d);
        margin-bottom: 4px;
    }
    .view-field .value {
        font-size: 15px;
        font-weight: 500;
    }
</style>
@section('body')
    <main class="page">
        <div class="breadcrumb">
            <a href="{{ route('class') }}">Classes</a><i class="fa-solid fa-chevron-right"></i><span class="current">View Class</span>
        </div>

        <div class="page-header">
            <div>
                <h1>View Class</h1>
                <p>Details for {{ $class->class_name }}.</p>
            </div>
            <div class="page-header-actions">
                <a class="btn btn-secondary" href="{{ route('class') }}">Back</a>
                <a class="btn btn-primary" href="{{ route('class_edit', $class->id) }}">
                    <i class="fa-solid fa-pen-to-square"></i> Edit Class
                </a>
            </div>
        </div>

        <div class="card">
            <div class="section-row">

                <div class="view-field">
                    <label>Course Name</label>
                    <div class="value">{{ $class->class_name }}</div>
                </div>

                <div class="view-field">
    <label>Assigned Teacher</label>
    <div class="value">
        {{ $class->teacher?->full_name ?? '—' }}
    </div>
</div>

               <div class="view-field">
    <label>Class Days</label>
    <div class="value">
        {{ $class->day?->class_days ?? '—' }}
    </div>
</div>
                 <div class="view-field mb-0">
    <label>Class Timing</label>
    <div class="value">
        {{ $class->timing?->class_timing ?? '—' }}
    </div>
</div>

            </div>

            <div class="section-row"
                style="border-top:1px solid var(--border);background:var(--bg);border-radius:0 0 var(--radius-lg) var(--radius-lg);grid-template-columns:1fr;">
                <div class="d-flex align-items-center justify-content-end flex-wrap gap-2">
                    <a class="btn btn-secondary" href="{{ route('class') }}">Back to Classes</a>
                    <a class="btn btn-primary" href="{{ route('class_edit', $class->id) }}">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Class
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection