@extends('Frontend_theme.master')

@section('calender')
active
@endsection

@section('body')

<link rel="stylesheet" href="{{ asset('Assets/css/calendar.css') }}">

@if(Auth::check() && Auth::user()->role === 'user')

<main class="flex-grow-1 p-3 p-md-4 detail-main">

  <div class="calendar-toolbar">

    <button class="calendar-dropdown-btn">
      All classes
      <i class="fa-solid fa-chevron-down"></i>
    </button>

    <div class="calendar-nav">

      <button class="calendar-nav-btn">
        <i class="fa-solid fa-chevron-left"></i>
      </button>

      <div class="calendar-nav-date">
        Jul 12 - Jul 18, 2026
      </div>

      <button class="calendar-nav-btn">
        <i class="fa-solid fa-chevron-right"></i>
      </button>

    </div>

  </div>

  <div class="calendar-grid">

    <div class="calendar-day-col">
      <div class="calendar-day-head">
        <div class="calendar-day-name">Sun</div>
        <div class="calendar-day-num">12</div>
      </div>
      <div class="calendar-day-body"></div>
    </div>

    <div class="calendar-day-col today">
      <div class="calendar-day-head">
        <div class="calendar-day-name">Mon</div>
        <div class="calendar-day-num today">13</div>
      </div>
      <div class="calendar-day-body"></div>
    </div>

    <div class="calendar-day-col">
      <div class="calendar-day-head">
        <div class="calendar-day-name">Tue</div>
        <div class="calendar-day-num">14</div>
      </div>
      <div class="calendar-day-body"></div>
    </div>

    <div class="calendar-day-col">
      <div class="calendar-day-head">
        <div class="calendar-day-name">Wed</div>
        <div class="calendar-day-num">15</div>
      </div>
      <div class="calendar-day-body"></div>
    </div>

    <div class="calendar-day-col">
      <div class="calendar-day-head">
        <div class="calendar-day-name">Thu</div>
        <div class="calendar-day-num">16</div>
      </div>
      <div class="calendar-day-body"></div>
    </div>

    <div class="calendar-day-col">
      <div class="calendar-day-head">
        <div class="calendar-day-name">Fri</div>
        <div class="calendar-day-num">17</div>
      </div>
      <div class="calendar-day-body"></div>
    </div>

    <div class="calendar-day-col">
      <div class="calendar-day-head">
        <div class="calendar-day-name">Sat</div>
        <div class="calendar-day-num">18</div>
      </div>
      <div class="calendar-day-body"></div>
    </div>

  </div>

</main>

@else

<main class="flex-grow-1 d-flex align-items-center justify-content-center p-4">

  <div class="text-center">

    <div class="mb-3">
      <i class="fa-solid fa-graduation-cap"
         style="font-size: 55px; color: #0F9D58;">
      </i>
    </div>

    <h4 class="fw-semibold mb-2">
      Welcome to Classroom
    </h4>

    <p class="text-muted mb-4">
      Please login or create an account to view your classes.
    </p>

    <a href="{{ route('student.login') }}"
       class="btn btn-success me-2">
      <i class="fa-solid fa-right-to-bracket me-1"></i>
      Login
    </a>

    <a href="{{ route('student.register') }}"
       class="btn btn-warning">
      <i class="fa-solid fa-user-plus me-1"></i>
      Sign Up
    </a>

  </div>

</main>

@endif

@endsection