@extends("Frontend_theme.master")

@section("body")

@if(Auth::check() && Auth::user()->role === 'user')

<main class="flex-grow-1 p-3 p-md-4 detail-main">

  <div class="stream-layout-grid assignment-layout">

    {{-- LEFT SIDE --}}
    <div>

      <div class="assignment-head">
        <div class="topic-item-ic assignment-head-ic">
          <i class="fa-regular fa-clipboard"></i>
        </div>

        <div>
          <h1 class="assignment-title">
            PHP Image CRUD with Foreign Key (Category &amp; Product Management)
          </h1>
        </div>
      </div>

      <div class="assignment-meta">
        Despicable Dev &nbsp;•&nbsp; Jun 28
      </div>

      <div class="assignment-meta points">
        100 points &nbsp;|&nbsp; Due Jun 30, 5:00 AM
      </div>

      <div class="grade-divider"></div>

      <div class="assignment-detail-body">
        <p>
          <strong>Dashboard Theme Downloaded from</strong>
          <a href="https://themewagon.com" target="_blank">
            https://themewagon.com
          </a>
        </p>

        <p>Create a table with the following fields:</p>

        <ul>
          <li>ID (Primary Key)</li>
          <li>Category_Name</li>
        </ul>

        <p>Create a table with the following fields:</p>

        <ul>
          <li>ID (Primary Key)</li>
          <li>CategoryID_FK (Foreign Key)</li>
          <li>Product_Name</li>
          <li>Product_Code</li>
          <li>Product_Brand</li>
          <li>Product_Short_Desc</li>
          <li>Product_Long_Desc</li>
          <li>Product_Price</li>
          <li>Product_Discount (Percentage)</li>
          <li>Product_Quantity</li>
          <li>Product_Status (InStock,OutStock)</li>
        </ul>
      </div>

      {{-- COMMENTS --}}
      <div class="class-comments">

        <div class="class-comments-head">
          <i class="fa-regular fa-comments"></i>
          <span>Class comments</span>
        </div>

        <a href="#" class="add-comment-link" id="addCommentLink"
           onclick="toggleCommentBox(event)">
          <i class="fa-regular fa-comment"></i>
          Add comment
        </a>

        <div class="comment-input-wrap" id="commentInputWrap">

          <img src="{{ asset('Frontend_theme/images/my.png') }}"
               alt=""
               class="comment-avatar">

          <div class="comment-input-box">

            <textarea placeholder="Add class comment..."
                      rows="1"
                      id="commentTextarea"
                      oninput="toggleSendBtn()"></textarea>

            <div class="comment-toolbar">

              <div class="comment-toolbar-icons">
                <i class="fa-solid fa-bold"></i>
                <i class="fa-solid fa-italic"></i>
                <i class="fa-solid fa-underline"></i>
                <i class="fa-solid fa-list-ul"></i>
              </div>

              <button class="comment-send-btn"
                      id="commentSendBtn">
                <i class="fa-solid fa-paper-plane"></i>
              </button>

            </div>
          </div>

        </div>

      </div>

    </div>


    {{-- RIGHT SIDE --}}
    <div>

      <div class="upcoming-panel work-panel">

        <div class="work-panel-head">
          <h4>Your work</h4>
          <span class="work-status">Turned in</span>
        </div>

        <div class="topic-item work-file-item">

          <div class="topic-item-title work-file-title">
            <a href="#" class="work-file-link">
              AsimKhan-1686356.zip
            </a>

            <div class="work-file-sub">
              Compressed archive
            </div>
          </div>

        </div>

        <button class="new-announcement-bt unsubmit-btn"
                disabled>
          Unsubmit
        </button>

        <div class="unsubmit-note">
          Work cannot be turned in after the due date
        </div>

      </div>

    </div>

  </div>

</main>


@else

{{-- GUEST MESSAGE --}}

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
      Please login or create an account to view this assignment.
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

const addCommentLink = document.getElementById('addCommentLink');

if (addCommentLink) {

    function toggleCommentBox(e) {
        e.preventDefault();

        document.getElementById('addCommentLink').style.display = 'none';

        document.getElementById('commentInputWrap').classList.add('open');

        document.getElementById('commentTextarea').focus();
    }

    function toggleSendBtn() {

        const text =
            document.getElementById('commentTextarea').value.trim();

        const btn =
            document.getElementById('commentSendBtn');

        btn.classList.toggle('active', text.length > 0);
    }

}

</script>

@endsection