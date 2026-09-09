@extends('Frontend_theme.master')

@section('body')

@section('classwork')
active
@endsection

@if(Auth::check() && Auth::user()->role === 'user')

<main class="flex-grow-1 stream-main index-main">

    <div class="class-tabbar">
        <div class="tab-links">
            <a href="{{ route('steam') }}" class="stream-tab active">Stream</a>
            <a href="{{ route('classwork') }}" class="stream-tab">Classwork</a>
            <a href="{{ route('people') }}" class="stream-tab">People</a>
        </div>

        <div class="tab-spacer"></div>

        <div class="tab-icons">
            {{-- Your existing buttons --}}
        </div>
    </div>

    <div class="stream-body">

        <div class="stream-banner">
            <div class="stream-banner-title">Batch AI_2508T5</div>
            <div class="stream-banner-sub">AI</div>

            <button class="stream-banner-info">
                {{-- Your existing SVG --}}
            </button>
        </div>

        <div class="stream-layout-grid">

            <div class="side-col">
                <div class="upcoming-panel">
                    <h4>Upcoming</h4>
                    <div class="empty-msg">
                        Woohoo, no work due soon!
                    </div>
                    <a href="grades.php" class="view-all">
                        View all
                    </a>
                </div>
            </div>

            <div class="feed-col">

                <button class="new-announcement-btn" id="newAnnouncementBtn">
                    <i class="fa-solid fa-pencil"></i>
                    New announcement
                </button>

                {{-- Announcement modal --}}
                <div class="announce-overlay" id="announceOverlay">
                    <div class="announce-modal">

                        <div class="announce-modal-head">
                            Post
                        </div>

                        <div class="announce-modal-body">
                            <div class="announce-textbox">

                                <div class="announce-placeholder" id="announcePlaceholder">
                                    Announce something to your class
                                </div>

                                <div class="announce-editable"
                                     id="announceEditable"
                                     contenteditable="true">
                                </div>

                                <div class="announce-toolbar">
                                    <button type="button" title="Bold">
                                        <i class="fa-solid fa-bold"></i>
                                    </button>

                                    <button type="button" title="Italic">
                                        <i class="fa-solid fa-italic"></i>
                                    </button>

                                    <button type="button" title="Underline">
                                        <i class="fa-solid fa-underline"></i>
                                    </button>

                                    <button type="button" title="Bullet list">
                                        <i class="fa-solid fa-list-ul"></i>
                                    </button>

                                    <button type="button" title="Clear formatting">
                                        <i class="fa-solid fa-text-slash"></i>
                                    </button>
                                </div>

                            </div>
                        </div>

                        <div class="announce-modal-footer">

                            <div class="announce-attach-icons">
                                <button type="button" title="Google Drive">
                                    <i class="fa-brands fa-google-drive"></i>
                                </button>

                                <button type="button" title="YouTube">
                                    <i class="fa-brands fa-youtube"></i>
                                </button>

                                <button type="button" title="Upload">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                </button>

                                <button type="button" title="Add link">
                                    <i class="fa-solid fa-link"></i>
                                </button>
                            </div>

                            <div class="announce-action-btns">
                                <button type="button"
                                        class="announce-cancel-btn"
                                        id="announceCancelBtn">
                                    Cancel
                                </button>

                                <button type="button"
                                        class="announce-post-btn"
                                        id="announcePostBtn"
                                        disabled>
                                    Post
                                </button>
                            </div>

                        </div>

                    </div>
                </div>

                {{-- Existing posts --}}
                <a href="classwork-detail.php" class="stream-post">
                    <div class="stream-post-ic">
                        <i class="fa-regular fa-clipboard"></i>
                    </div>

                    <div class="stream-post-text">
                        <div class="stream-post-title">
                            Despicable Dev posted a new assignment:
                            PHP Image CRUD with Foreign Key
                            (Category &amp; Product Management)
                        </div>

                        <div class="stream-post-date">
                            Jun 28
                        </div>
                    </div>

                    <button class="stream-post-menu">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                </a>

                <a href="classwork-detail.php" class="stream-post">
                    <div class="stream-post-ic">
                        <i class="fa-regular fa-clipboard"></i>
                    </div>

                    <div class="stream-post-text">
                        <div class="stream-post-title">
                            Despicable Dev posted a new assignment:
                            Implement (AddToCart) functionality
                            in Ecommerce Site
                        </div>

                        <div class="stream-post-date">
                            May 18 (Edited May 19)
                        </div>
                    </div>

                    <button class="stream-post-menu">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                </a>

            </div>

        </div>

    </div>

    <button class="help-fab">
        <i class="fa-regular fa-circle-question"></i>
    </button>

</main>

@else

<main class="flex-grow-1 d-flex align-items-center justify-content-center p-4">

    <div class="text-center">

        <div class="mb-3">
            <i class="fa-solid fa-graduation-cap"
               style="font-size:55px; color:#0F9D58;">
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


<script>
const newAnnouncementBtn = document.getElementById('newAnnouncementBtn');
const announceOverlay = document.getElementById('announceOverlay');
const announceCancelBtn = document.getElementById('announceCancelBtn');
const announceEditable = document.getElementById('announceEditable');
const announcePlaceholder = document.getElementById('announcePlaceholder');
const announcePostBtn = document.getElementById('announcePostBtn');

if (newAnnouncementBtn) {

    function openAnnounceModal() {
        announceOverlay.classList.add('open');

        setTimeout(() => {
            announceEditable.focus();
        }, 50);
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

    announceOverlay.addEventListener('click', function(e) {
        if (e.target === announceOverlay) {
            closeAnnounceModal();
        }
    });

    announceEditable.addEventListener('input', function() {

        const hasText =
            announceEditable.textContent.trim().length > 0;

        announcePlaceholder.style.display =
            hasText ? 'none' : 'block';

        announcePostBtn.disabled = !hasText;

        announcePostBtn.classList.toggle(
            'active',
            hasText
        );
    });
}
</script>

@endsection