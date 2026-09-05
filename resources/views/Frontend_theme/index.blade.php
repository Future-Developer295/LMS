@extends("Frontend_theme.master")
@section('index')
active
@endsection
@section("body")

  <main class="flex-grow-1 p-3 p-md-4 index-main">
    <div class="row g-4">
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="gc-card">
          <a href="{{ route('steam') }}" class="text-decoration-none text-reset">
            <div class="gc-banner" style="background-image: url({{ asset('Frontend_theme/images/Aptech-banner.png') }});">
              <div class="gc-corner-fold"></div>
              <div class="gc-banner-title">Batch AI_2508T5</div>
              <div class="gc-banner-sub">AI</div>
              <div class="gc-banner-teacher">Despicable Dev</div>
            </div>
          </a>
          <div class="gc-card-avatar"><img src="{{ asset('Frontend_theme/images/teacher.png') }}" alt=""></div>
          <div class="gc-card-body"></div>
          <div class="gc-card-footer">
            <a href="{{ route('frontend_class') }}" class="btn-icon" title="Your work"><i class="fa-regular fa-address-card"></i></a>
            <button class="btn-icon" title="Open folder"><i class="fa-regular fa-folder"></i></button>
            <button class="btn-icon" title="More"><i class="fa-solid fa-ellipsis-vertical"></i></button>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<button class="gc-fab"><i class="fa-solid fa-plus"></i></button>

@endsection
