@extends('Backend_theme.master')
@section('teacher')
    open
@endsection
@section('list_teacher')
    active
@endsection
@section('body')
    <main class="page">
        <div class="page-header">
            <div>
                <h1>Teachers Listing</h1>
                <p>Manage teaching staff, assignments, and status.</p>
            </div>
            <div class="page-header-actions">
                <a class="btn btn-primary" href="teacher-add.html"><i class="fa-solid fa-plus"></i> Add Teacher</a>
            </div>
        </div>

        <div class="card">
            <div class="filter-bar">
                <div class="input-icon-wrap left search-input-w">
                    <i class="fa-solid fa-filter"></i>
                    <input type="text" class="input" id="teacherSearch" placeholder="Filter teachers...">
                </div>
                <div class="filter-bar-spacer"></div>
                <span class="results-count" id="teacherResultsCount">Showing 1-8 of 42</span>
                <button class="btn btn-secondary btn-sm" id="exportTeachersBtn"><i class="fa-solid fa-download"></i>
                    Export</button>
            </div>

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width:40px;"><input type="checkbox" id="selectAllTeachers"></th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th style="text-align:right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="teachersBody">
                        <tr>
                            <td></td>
                            <td>dummy</td>
                            <td>dummy</td>
                            <td>dummy</td>
                            <td>dummy</td>
                            <td class="text-end">
                                <a href="" class="btn btn-sm btn-primary rounded-2 me-1" title="View">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="" class="btn btn-sm btn-warning rounded-2 me-1" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <a href="" class="btn btn-sm btn-danger rounded-2" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td> 
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="pagination-bar">
                <div class="d-flex align-items-center gap-2">
                    <span class="pagination-info">Rows per page:</span>
                    <select class="select" style="width:80px;height:36px;">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                </div>
                <div class="pagination">
                    <button class="page-btn"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn dots">...</button>
                    <button class="page-btn">5</button>
                    <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </main>
@endsection
