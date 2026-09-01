@extends("Frontend_theme.master")
@section("body")

<main class="flex-grow-1 stream-main index-main">

  <div class="class-tabbar">
    <div class="tab-links">
      <a href="{{ route("steam") }}" class="stream-tab active">Stream</a>
      <a href="{{ route("classwork") }}" class="stream-tab">Classwork</a>
      <a href="{{ route("people") }}" class="stream-tab">People</a>
    </div>
    <div class="tab-spacer"></div>
    <div class="tab-icons">
      <button class="btn-icon" title="Calendar"><svg focusable="false" width="24" height="24" viewBox="0 0 24 24"
          fill='#444746'>
          <path
            d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z">
          </path>
        </svg></button>
      <button class="btn-icon" title="Class settings"><svg enable-background="new 0 0 24 24" focusable="false"
          height="24" viewBox="0 0 24 24" width="24" fill='#444746'>
          <rect fill="none" height="24" width="24"></rect>
          <path
            d="M14.35,2.5h-4.7c-0.71,0-1.37,0.38-1.73,0.99L1.58,14.4c-0.36,0.62-0.36,1.38-0.01,2l2.35,4.09c0.36,0.62,1.02,1,1.73,1 h12.68c0.72,0,1.38-0.38,1.73-1l2.35-4.09c0.36-0.62,0.35-1.38-0.01-2L16.08,3.49C15.72,2.88,15.06,2.5,14.35,2.5z M18.34,19.5H5.66 l-2.35-4.09L9.65,4.5h4.7l6.34,10.91L18.34,19.5z M12.9,7.75h-1.8l-4.58,7.98L7.25,17h9.5l0.73-1.27L12.9,7.75z M9.25,15L12,10.2 l2.75,4.8H9.25z">
          </path>
        </svg></button>
    </div>
  </div>

  <div class="stream-body">

    <div class="stream-banner">
      <div class="stream-banner-title">Batch AI_2508T5</div>
      <div class="stream-banner-sub">AI</div>
      <button class="stream-banner-info"><svg focusable="false" width="24" height="24" fill="#fff" viewBox="0 0 24 24"
          class="YGy4X NMm5M">
          <path
            d="M11 17h2v-6h-2v6zm1-15C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 9h2V7h-2v2z">
          </path>
        </svg></i></button>
    </div>

    <div class="stream-layout-grid">

      <div class="side-col">
        <div class="upcoming-panel">
          <h4>Upcoming</h4>
          <div class="empty-msg">Woohoo, no work due soon!</div>
          <a href="grades.php" class="view-all">View all</a>
        </div>
      </div>

      <div class="feed-col">
        <button class="new-announcement-btn" id="newAnnouncementBtn">
          <i class="fa-solid fa-pencil"></i> New announcement
        </button>

        <div class="announce-overlay" id="announceOverlay">
          <div class="announce-modal">
            <div class="announce-modal-head">Post</div>

            <div class="announce-modal-body">
              <div class="announce-textbox">
                <div class="announce-placeholder" id="announcePlaceholder">Announce something to your class</div>
                <div class="announce-editable" id="announceEditable" contenteditable="true"></div>

                <div class="announce-toolbar">
                  <button type="button" title="Bold"><i class="fa-solid fa-bold"></i></button>
                  <button type="button" title="Italic"><i class="fa-solid fa-italic"></i></button>
                  <button type="button" title="Underline"><i class="fa-solid fa-underline"></i></button>
                  <button type="button" title="Bullet list"><i class="fa-solid fa-list-ul"></i></button>
                  <button type="button" title="Clear formatting"><i class="fa-solid fa-text-slash"></i></button>
                </div>
              </div>
            </div>

            <div class="announce-modal-footer">
              <div class="announce-attach-icons">
                <button type="button" title="Google Drive"><i class="fa-brands fa-google-drive"></i></button>
                <button type="button" title="YouTube"><i class="fa-brands fa-youtube"></i></button>
                <button type="button" title="Upload"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                <button type="button" title="Add link"><i class="fa-solid fa-link"></i></button>
              </div>
              <div class="announce-action-btns">
                <button type="button" class="announce-cancel-btn" id="announceCancelBtn">Cancel</button>
                <button type="button" class="announce-post-btn" id="announcePostBtn" disabled>Post</button>
              </div>
            </div>
          </div>
        </div>

        <a href="{{ route("detail") }}" class="stream-post">
          <div class="stream-post-ic"><i class="fa-regular fa-clipboard"></i></div>
          <div class="stream-post-text">
            <div class="stream-post-title">Despicable Dev posted a new assignment: PHP Image CRUD with Foreign Key
              (Category &amp; Product Management)</div>
            <div class="stream-post-date">Jun 28</div>
          </div>
          <button class="stream-post-menu"><i class="fa-solid fa-ellipsis-vertical"></i></button>
        </a>

        <a href="{{ route("detail") }}" class="stream-post">
          <div class="stream-post-ic"><i class="fa-regular fa-clipboard"></i></div>
          <div class="stream-post-text">
            <div class="stream-post-title">Despicable Dev posted a new assignment: Implement (AddToCart) functionality
              in Ecommerce Site</div>
            <div class="stream-post-date">May 18 (Edited May 19)</div>
          </div>
          <button class="stream-post-menu"><i class="fa-solid fa-ellipsis-vertical"></i></button>
        </a>

      </div>

    </div>

  </div>

</main>
</div>

<button class="help-fab"><i class="fa-regular fa-circle-question"></i></button>

<script>
  // Give instant visual feedback on the clicked tab before the page navigates
  document.querySelectorAll('.class-tabbar .stream-tab').forEach(function (tab) {
    tab.addEventListener('click', function () {
      document.querySelectorAll('.class-tabbar .stream-tab').forEach(function (t) {
        t.classList.remove('active');
      });
      this.classList.add('active');
    });
  });
</script>
<script>
  const newAnnouncementBtn = document.getElementById('newAnnouncementBtn');
  const announceOverlay = document.getElementById('announceOverlay');
  const announceCancelBtn = document.getElementById('announceCancelBtn');
  const announceEditable = document.getElementById('announceEditable');
  const announcePlaceholder = document.getElementById('announcePlaceholder');
  const announcePostBtn = document.getElementById('announcePostBtn');

  function openAnnounceModal() {
    announceOverlay.classList.add('open');
    setTimeout(() => announceEditable.focus(), 50);
  }
  function closeAnnounceModal() {
    announceOverlay.classList.remove('open');
    announceEditable.innerHTML = '';
    announcePlaceholder.style.display = 'block';
    announcePostBtn.disabled = true;
    announcePostBtn.classList.remove('active');
  }

  newAnnouncementBtn.addEventListener('click', openAnnounceModal);
  announceCancelBtn.addEventListener('click', closeAnnounceModal);
  announceOverlay.addEventListener('click', function (e) {
    if (e.target === announceOverlay) closeAnnounceModal();
  });

  announceEditable.addEventListener('input', function () {
    const hasText = announceEditable.textContent.trim().length > 0;
    announcePlaceholder.style.display = hasText ? 'none' : 'block';
    announcePostBtn.disabled = !hasText;
    announcePostBtn.classList.toggle('active', hasText);
  });
</script>
@endsection