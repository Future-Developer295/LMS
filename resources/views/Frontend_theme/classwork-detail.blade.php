@extends("Frontend_theme.master")

@section("body")

  <style>
    .comment-editor {
      width: 100%;
      min-height: 45px;
      padding: 8px 12px;

      border: none !important;
      outline: none !important;
      box-shadow: none !important;

      font-size: 16px;
      line-height: 24px;
      background: transparent;

      overflow-y: auto;
    }

    .comment-editor:focus {
      border: none !important;
      outline: none !important;
      box-shadow: none !important;
    }

    .comment-editor:empty:before {
      content: attr(data-placeholder);
      color: #777;
      pointer-events: none;
    }

    .comment-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      margin-top: 15px;
    }

    .comment-avatar {
      width: 40px;
      height: 40px;
      min-width: 40px;
      border-radius: 50%;
      background: #e8f0fe;
      color: #1a73e8;

      display: flex;
      align-items: center;
      justify-content: center;

      font-size: 16px;
      font-weight: 600;
    }

    .comment-content {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .comment-name {
      font-size: 16px;
      line-height: 20px;
    }

    .comment-text {
      margin: 4px 0 0;
      font-size: 16px;
      line-height: 22px;
    }

    .comment-time {
      margin-top: 12px;
      font-size: 14px;
    }

    .comment-delete-form {
      margin-top: 4px;
    }

    .comment-delete-btn {
      padding: 3px 9px;
    }
  </style>
  @if(Auth::check() && Auth::user()->role === 'user')

    <main class="flex-grow-1 p-3 p-md-4 detail-main">

      <div class="stream-layout-grid assignment-layout">

        <div>

          <div class="assignment-head">
            <div class="topic-item-ic assignment-head-ic">
              <i class="fa-regular fa-clipboard"></i>
            </div>

            <div>
              <h1 class="assignment-title">
                {{ $assignment->assignment_title }}
              </h1>
            </div>
          </div>

          <div class="assignment-meta">
            {{ $assignment->assignment_date }}
          </div>

          <div class="assignment-meta points">
            {{ $assignment->assignment_marks }} points
            &nbsp;|&nbsp;
            Due {{ \Carbon\Carbon::parse($assignment->assignment_due_date)->format('M d, g:i A') }}
          </div>

          <div class="grade-divider"></div>

          <div class="assignment-detail-body">
            {{ $assignment->assignment_instruction }}
          </div>










          <div class="class-comments">

            <div class="class-comments-head">
              <i class="fa-regular fa-comments"></i>
              <span>Class comments</span>
            </div>

            <a href="#" class="add-comment-link" id="addCommentLink" onclick="toggleCommentBox(event)">

              <i class="fa-regular fa-comment"></i>
              Add comment

            </a>

            <div class="comment-input-wrap" id="commentInputWrap">

              <div class="comment-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
              </div>
              <form action="{{ route('comment.store', $assignment->id) }}" method="POST" class="comment-input-box">

                @csrf

                <div class="comment-editor" id="commentEditor" contenteditable="true"
                  data-placeholder="Add class comment...">
                </div>

                <input type="hidden" name="content" id="commentContent">

                <div class="comment-toolbar">

                  <div class="comment-toolbar-icons">

                    <button type="button" onmousedown="event.preventDefault(); formatComment('bold')">
                      <i class="fa-solid fa-bold"></i>
                    </button>

                    <button type="button" onmousedown="event.preventDefault(); formatComment('italic')">
                      <i class="fa-solid fa-italic"></i>
                    </button>

                    <button type="button" onmousedown="event.preventDefault(); formatComment('underline')">
                      <i class="fa-solid fa-underline"></i>
                    </button>

                    <button type="button" onmousedown="event.preventDefault(); formatComment('insertUnorderedList')">
                      <i class="fa-solid fa-list-ul"></i>
                    </button>

                  </div>

                  <button type="submit" class="comment-send-btn" id="commentSendBtn">

                    <i class="fa-solid fa-paper-plane"></i>

                  </button>

                </div>

              </form>

            </div>




            <div class="comments-list">

              @foreach($comments as $comment)

                <div class="comment-item">


                  <div class="comment-avatar">
                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                  </div>


                  <div class="comment-content">

                    <strong class="comment-name">
                      {{ $comment->user->name }}
                    </strong>

                    <div class="comment-text">
                      {!! $comment->content !!}
                    </div>

                    <small class="comment-time">
                      {{ $comment->created_at->diffForHumans() }}
                    </small>

                    @if($comment->user_id == Auth::id())

                      <form action="{{ route('comment.delete', $comment->id) }}" method="POST" class="comment-delete-form">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="comment-delete-btn">
                          Delete
                        </button>

                      </form>

                    @endif

                  </div>

                </div>

              @endforeach

            </div>

          </div>

        </div>





        <div>
          <div class="upcoming-panel work-panel">

            <div class="work-panel-head">
              <h4>Your work</h4>

              @if($assignment->assignment_status === 'closed')

                <span class="work-status">
                  Closed
                </span>

              @elseif($submission)

                <span class="work-status">
                  Turned in
                </span>

              @else

                <span class="work-status">
                  Assigned
                </span>

              @endif
            </div>


            @if($assignment->assignment_status === 'closed')

              <div class="unsubmit-note">
                Assignment submission has been closed by the teacher.
              </div>



            @elseif($submission)


              <div class="topic-item work-file-item">

                <div class="topic-item-title work-file-title">

                  <a href="{{ asset($submission->assignment_file) }}" class="work-file-link" target="_blank">

                    {{ basename($submission->assignment_file) }}

                  </a>

                  <div class="work-file-sub">
                    Compressed archive
                  </div>

                </div>

              </div>



              @if(
                  !$assignment->assignment_due_date ||
                  now()->lt($assignment->assignment_due_date)
                )

                <form action="{{ route('assignment.unsubmit', $assignment->id) }}" method="POST">

                  @csrf
                  @method('DELETE')

                  <button type="submit" class="new-announcement-bt unsubmit-btn">

                    Unsubmit

                  </button>

                </form>

              @else

                <button class="new-announcement-bt unsubmit-btn" disabled>

                  Unsubmit

                </button>

                <div class="unsubmit-note">
                  Work cannot be turned in after the due date
                </div>

              @endif



            @else

              @if(
                  !$assignment->assignment_due_date ||
                  now()->lt($assignment->assignment_due_date)
                )

                <form action="{{ route('assignment.submit', $assignment->id) }}" method="POST" enctype="multipart/form-data">

                  @csrf

                  <div class="mb-3">

                    <input type="file" name="assignment_file" class="form-control" accept=".zip" required>

                  </div>

                  <button type="submit" class="new-announcement-bt" style="background:gray; border:none; color:white">

                    Turn in

                  </button>

                </form>

              @else

                <div class="unsubmit-note">
                  Assignment submission time has ended.
                </div>

              @endif

            @endif

          </div>
        </div>

      </div>

    </main>


  @else


    <div class="flex-grow-1 d-flex align-items-center justify-content-center p-4">

      <div class="text-center">

        <div class="mb-3">
          <i class="fa-solid fa-graduation-cap" style="font-size: 55px; color: #0F9D58;">
          </i>
        </div>

        <h4 class="fw-semibold mb-2">
          Welcome to Classroom
        </h4>

        <p class="text-muted mb-4">
          Please login or create an account to view this assignment.
        </p>

        <a href="{{ route('student.login') }}" class="btn btn-success me-2">
          <i class="fa-solid fa-right-to-bracket me-1"></i>
          Login
        </a>

        <a href="{{ route('student.register') }}" class="btn btn-warning">
          <i class="fa-solid fa-user-plus me-1"></i>
          Sign Up
        </a>

      </div>

    </div>

  @endif

  <script>



    function formatComment(command) {
      document.execCommand(command, false, null);
      document.getElementById('commentEditor').focus();
    }



    const commentForm = document.querySelector('.comment-input-box');
    const commentEditor = document.getElementById('commentEditor');
    const commentContent = document.getElementById('commentContent');
    const commentSendBtn = document.getElementById('commentSendBtn');




    if (commentForm) {

      commentForm.addEventListener('submit', function (e) {

        e.preventDefault();

        const content = commentEditor.innerHTML.trim();

        if (!commentEditor.innerText.trim()) {
          return;
        }

        commentContent.value = content;

        const formData = new FormData(commentForm);


        fetch(commentForm.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          }
        })
          .then(response => response.json())
          .then(data => {

            if (data.success) {


              location.reload();

            }

          })
          .catch(error => {
            console.error('Comment error:', error);
          });


      });




      commentEditor.addEventListener('input', function () {

        const text = commentEditor.innerText.trim();

        commentSendBtn.classList.toggle(
          'active',
          text.length > 0
        );

      });

    }




    const addCommentLink = document.getElementById('addCommentLink');

    if (addCommentLink) {

      function toggleCommentBox(e) {

        e.preventDefault();

        document.getElementById('addCommentLink').style.display = 'none';

        document.getElementById('commentInputWrap').classList.add('open');

        document.getElementById('commentEditor').focus();

      }


      function toggleSendBtn() {

        const text =
          document.getElementById('commentEditor').innerText.trim();

        const btn =
          document.getElementById('commentSendBtn');

        btn.classList.toggle(
          'active',
          text.length > 0
        );

      }

    }



    document.querySelectorAll('.comment-delete-form').forEach(function (form) {

      form.addEventListener('submit', function (e) {

        e.preventDefault();

        const formData = new FormData(form);

        fetch(form.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          }
        })
          .then(response => response.json())
          .then(data => {

            if (data.success) {

              location.reload();

            }

          })
          .catch(error => {
            console.error('Delete error:', error);
          });

      });

    });



    document.querySelectorAll('form[action*="/submit"], form[action*="/unsubmit"]').forEach(function (form) {

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch(form.action, {
            method: form.querySelector('input[name="_method"]')?.value || 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => {
            console.error('Assignment error:', error);
        });
    });

});
  </script>

@endsection