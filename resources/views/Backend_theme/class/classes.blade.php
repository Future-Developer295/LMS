@extends('Backend_theme.master')
@section('class')
    open
@endsection
@section('class')
    active
@endsection
@section('body')
    <main class="page">
        <div class="page-header">
            <div>
                <h1>Classes Overview</h1>
                <p>Manage current academic classes, assignments, and statuses.</p>
            </div>
            <div class="page-header-actions">
                <a class="btn btn-primary" href="class-add.html"><i class="fa-solid fa-plus"></i> New Class</a>
            </div>
        </div>

        <div class="card">
            <div class="filter-bar">
                <div class="filter-select-w">
                    <select class="select" id="gradeFilter">
                        <option value="">All Grades</option>
                        <option>Grade 9</option>
                        <option>Grade 10</option>
                        <option>Grade 11</option>
                        <option>Grade 12</option>
                    </select>
                </div>
                <div class="filter-select-w">
                    <select class="select" id="statusFilter">
                        <option value="">Status: All</option>
                        <option>Active</option>
                        <option>Upcoming</option>
                    </select>
                </div>
                <div class="filter-bar-spacer"></div>
                <button class="icon-btn"
                    style="border:1px solid var(--border);border-radius:var(--radius-sm);width:44px;height:44px;"
                    title="Grid view"><i class="fa-solid fa-table-cells-large"></i></button>
                <button class="icon-btn"
                    style="border:1px solid var(--border);border-radius:var(--radius-sm);width:44px;height:44px;"
                    id="exportClassesBtn" title="Export"><i class="fa-solid fa-download"></i></button>
            </div>

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Class Name</th>
                            <th>Grade</th>
                            <th>Teacher</th>
                            <th>Room</th>
                            <th>Status</th>
                            <th style="text-align:right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="classesBody">
                        <tr>
                            <td>dummy</td>
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
                <span class="pagination-info" id="classResultsCount">Showing 1 to 6 of 24 entries</span>
                <div class="pagination">
                    <button class="page-btn"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </main>
@endsection
