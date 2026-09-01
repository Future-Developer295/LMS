@extends("Frontend_theme.master")

@section("body")


<main class="flex-grow-1 p-3 p-md-4 detail-main">

  <div class="stream-layout-grid assignment-layout">

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
        <p><strong>Dashboard Theme Downloaded from</strong>
          <a href="https://themewagon.com" target="_blank">https://themewagon.com</a>
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

      <div class="class-comments">
        <div class="class-comments-head">
          <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" fill='#444746' aria-hidden="true"><path d="M15 8c0-1.42-.5-2.73-1.33-3.76.42-.14.86-.24 1.33-.24 2.21 0 4 1.79 4 4s-1.79 4-4 4c-.43 0-.84-.09-1.23-.21-.03-.01-.06-.02-.1-.03A5.98 5.98 0 0 0 15 8zm1.66 5.13C18.03 14.06 19 15.32 19 17v3h4v-3c0-2.18-3.58-3.47-6.34-3.87zM9 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2m0 9c-2.7 0-5.8 1.29-6 2.01V18h12v-1c-.2-.71-3.3-2-6-2M9 4c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zm0 9c2.67 0 8 1.34 8 4v3H1v-3c0-2.66 5.33-4 8-4z"></path></svg>
          <span>Class comments</span>
        </div>

        <a href="#" class="add-comment-link" id="addCommentLink" onclick="toggleCommentBox(event)">
          <svg focusable="false" width="20" height="20" viewBox="0 0 24 24" fill="#0b57d0"><path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM4 16V4h16v12H4z"></path><path d="M6 12h12v2H6zm0-3h12v2H6zm0-3h12v2H6z"></path></svg> Add comment
        </a>

        <div class="comment-input-wrap" id="commentInputWrap">
          <img src="{{ asset('Frontend_theme/images/my.png') }}" alt="" class="comment-avatar">
          <div class="comment-input-box">
            <textarea placeholder="Add class comment..." rows="1" id="commentTextarea" oninput="toggleSendBtn()"></textarea>
            <div class="comment-toolbar">
              <div class="comment-toolbar-icons">
                <i class="fa-solid fa-bold"></i>
                <i class="fa-solid fa-italic"></i>
                <i class="fa-solid fa-underline"></i>
                <i class="fa-solid fa-list-ul"></i>
                <i class="fa-solid fa-text-slash"></i>
              </div>
              <button class="comment-send-btn" id="commentSendBtn">
                <i class="fa-solid fa-paper-plane"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div>

      <div class="upcoming-panel work-panel">
        <div class="work-panel-head">
          <h4>Your work</h4>
          <span class="work-status">Turned in</span>
        </div>

        <div class="topic-item work-file-item">
          
          <div class="topic-item-title work-file-title">
            <a href="#" class="work-file-link">AsimKhan-1686356.zip</a>
            <div class="work-file-sub">Compressed archive</div>
          </div>
          <div class="topic-item-ic work-file-ic">
           <img src="Assets/images/google-drive.png" alt="">
          </div>
        </div>

        <button class="new-announcement-bt unsubmit-btn" disabled>
          Unsubmit
        </button>
        <div class="unsubmit-note">
          Work cannot be turned in after the due date
        </div>
      </div>

      <div class="upcoming-panel">
        <div class="comments-panel-head">
          <i class="bi bi-person"></i>
          <h4>Private comments</h4>
        </div>
        <a href="#" class="view-all comments-link">
          <svg focusable="false" width="20" height="20" viewBox="0 0 24 24" fill="#0b57d0"><path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM4 16V4h16v12H4z"></path><path d="M6 12h12v2H6zm0-3h12v2H6zm0-3h12v2H6z"></path></svg> Add comment to Despicable D...
        </a>
      </div>

    </div>

  </div>

</main>

<script>
function toggleCommentBox(e) {
  e.preventDefault();
  document.getElementById('addCommentLink').style.display = 'none';
  document.getElementById('commentInputWrap').classList.add('open');
  document.getElementById('commentTextarea').focus();
}

function toggleSendBtn() {
  const text = document.getElementById('commentTextarea').value.trim();
  const btn = document.getElementById('commentSendBtn');
  btn.classList.toggle('active', text.length > 0);
}
</script>
@endsection

