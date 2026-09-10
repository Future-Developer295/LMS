@extends("Frontend_theme.master")

@section("body")

@if(Auth::check() && Auth::user()->role === 'user')

<main class="flex-grow-1 stream-main index-main">

    {{-- YAHAN TUMHARA PURA EXISTING CLASSWORK CODE HOGA --}}

    <div class="class-tabbar">
<<<<<<< HEAD
      <div class="tab-links">     
      <a href="{{route('steam')}}" class="stream-tab">Stream</a>
        <a href="{{route('classwork')}}" class="stream-tab active">Classwork</a>
        <a href="{{route('people')}}" class="stream-tab ">People</a>
      </div>
      <div class="tab-spacer"></div>
     <div class="tab-icons">
        <button class="btn-icon" title="Calendar"><svg focusable="false" width="24" height="24" viewBox="0 0 24 24" fill='#444746'><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"></path></svg></button>
        <button class="btn-icon" title="Class settings"><svg enable-background="new 0 0 24 24" focusable="false" height="24" viewBox="0 0 24 24" width="24" fill='#444746'><rect fill="none" height="24" width="24"></rect><path d="M14.35,2.5h-4.7c-0.71,0-1.37,0.38-1.73,0.99L1.58,14.4c-0.36,0.62-0.36,1.38-0.01,2l2.35,4.09c0.36,0.62,1.02,1,1.73,1 h12.68c0.72,0,1.38-0.38,1.73-1l2.35-4.09c0.36-0.62,0.35-1.38-0.01-2L16.08,3.49C15.72,2.88,15.06,2.5,14.35,2.5z M18.34,19.5H5.66 l-2.35-4.09L9.65,4.5h4.7l6.34,10.91L18.34,19.5z M12.9,7.75h-1.8l-4.58,7.98L7.25,17h9.5l0.73-1.27L12.9,7.75z M9.25,15L12,10.2 l2.75,4.8H9.25z"></path></svg></button>
      </div>
=======
        <div class="tab-links">
            <a href="{{ route('steam') }}" class="stream-tab">Stream</a>
            <a href="{{ route('classwork') }}" class="stream-tab active">Classwork</a>
            <a href="{{ route('people') }}" class="stream-tab">People</a>
        </div>
>>>>>>> 5a1470322f48b20c891b78ccbad360b47b23349e
    </div>

    {{-- BAKI TUMHARA PURA CLASSWORK CODE --}}
    
</main>

@else

<main class="flex-grow-1 d-flex align-items-center justify-content-center p-4">

    <div class="text-center">

        <div class="mb-3">
            <i class="fa-solid fa-graduation-cap"
               style="font-size: 60px; color: #0F9D58;"></i>
        </div>

        <h4 class="fw-semibold mb-2">
            Welcome to Classroom
        </h4>

        <p class="text-muted mb-4">
            Please login or create an account to view your classwork.
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
