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
            <div class="stream-banner-title">{{ $joinedClass->class_name ?? 'No class joined' }}</div>
            <div class="stream-banner-sub">{{ $joinedClass->class_code ?? '' }}</div>

            <button class="stream-banner-info">
                {{-- Your existing SVG --}}
            </button>
        </div>

        <div class="stream-layout-grid">

            <div class="side-col">
                <div class="upcoming-panel">
                    <h4>Upcoming</h4>
                    @forelse($upcoming as $assignment)
                        <a href="{{ route('detail', $assignment->id) }}" class="cell-link" style="display:block; margin-bottom:10px;">
                            <div>{{ $assignment->assignment_title }}</div>
                            <div class="text-muted small">
                                Due {{ $assignment->assignment_due_date?->format('d M Y') ?? 'No due date' }}
                            </div>
                        </a>
                    @empty
                        <div class="empty-msg">
                            Woohoo, no work due soon!
                        </div>
                    @endforelse
                    <a href="{{ route('frontend_class') }}" class="view-all">
                        View all
                    </a>
                </div>
            </div>

            <div class="feed-col">

                <button class="new-announcement-btn" id="newAnnouncementBtn">
                    <i class="fa-solid fa-pencil"></i>
                    New announcement
                </button>

                @if ($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Announcement modal --}}
                <div class="announce-overlay" id="announceOverlay">
                    <form class="announce-modal" method="POST" action="{{ route('announcement.store') }}">
                        @csrf

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

                                <textarea name="content" id="announceContentInput" style="display:none;"></textarea>

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

                                <button type="submit"
                                        class="announce-post-btn"
                                        id="announcePostBtn"
                                        disabled>
                                    Post
                                </button>
                            </div>

                        </div>

                    </form>
                </div>

                @forelse($feed as $item)

                    @if($item['type'] === 'announcement')

                        <div class="stream-post">
                            <div class="stream-post-ic">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>

                            <div class="stream-post-text">
                                <div class="stream-post-title">
                                    {{ $item['data']->user->name ?? 'A classmate' }}:
                                    {{ $item['data']->content }}
                                </div>

                                <div class="stream-post-date">
                                    {{ $item['data']->created_at?->diffForHumans() }}
                                </div>
                            </div>

                            @if($item['data']->user_id === ($user->id ?? null))
                                <form action="{{ route('announcement.destroy', $item['data']->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this announcement?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="stream-post-menu" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </div>

                    @else

                        <a href="{{ route('detail', $item['data']->id) }}" class="stream-post">
                            <div class="stream-post-ic">
                                <i class="fa-regular fa-clipboard"></i>
                            </div>

                            <div class="stream-post-text">
                                <div class="stream-post-title">
                                    {{ $joinedClass->teacher->name ?? 'Your teacher' }} posted a new assignment:
                                    {{ $item['data']->assignment_title }}
                                </div>

                                <div class="stream-post-date">
                                    {{ $item['data']->assignment_due_date?->format('M j') ?? 'No due date' }}
                                </div>
                            </div>

                            <button class="stream-post-menu">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                        </a>

                    @endif

                @empty
                <div class="empty-msg">
                    No posts yet in this class.
                </div>
                @endforelse

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
const announceContentInput = document.getElementById('announceContentInput');
const announceForm = announceOverlay ? announceOverlay.querySelector('form') : null;

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

    if (announceForm) {
        announceForm.addEventListener('submit', function() {
            announceContentInput.value = announceEditable.innerText.trim();
        });
    }
}
</script>

@if(session('success') && str_contains(session('success'), 'Announcement posted'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    const overlay = document.getElementById('announceOverlay');
    if (overlay) {
        overlay.classList.remove('open');
    }
});
</script>
@endif

@endsection