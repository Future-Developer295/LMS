<?php

if (!isset($pageTitle))  { $pageTitle = 'Classroom'; }
if (!isset($activeNav))  { $activeNav = 'home'; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($pageTitle); ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="Assets/css/style.css">
</head>
<body>

<header class="gc-header d-flex align-items-center px-3 gap-2">
  <button class="btn-icon" id="menuToggle"><i class="fa-solid fa-bars"></i></button>

  <span class="d-flex align-items-center gap-2">
    <svg width="30" height="30" viewBox="0 0 108 108" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M96.75 11.25h-85.5c-3.73 0-6.75 3.02-6.75 6.75v72c0 3.729 3.02 6.75 6.75 6.75h85.5c3.729 0 6.75-3.021 6.75-6.75V18c0-3.73-3.021-6.75-6.75-6.75z" fill="#F4B400"/>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5 20.25h81v67.5h-81v-67.5z" fill="#0F9D58"/>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M36 56.25a5.063 5.063 0 100-10.126 5.063 5.063 0 000 10.126zm41.063-5.063a5.063 5.063 0 11-10.126 0 5.063 5.063 0 0110.126 0zM60.75 66.055c0-3.555 5.828-6.429 11.25-6.429s11.25 2.874 11.25 6.43v3.695h-22.5v-3.696zm-36 0c0-3.555 5.828-6.429 11.25-6.429 5.423 0 11.25 2.874 11.25 6.43v3.695h-22.5v-3.696z" fill="#57BB8A"/>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M60.75 45.001c0 3.73-3.02 6.75-6.744 6.75a6.753 6.753 0 01-6.756-6.75 6.756 6.756 0 016.756-6.75c3.723 0 6.744 3.026 6.744 6.75zm-22.5 20.25c0-4.973 8.156-9 15.75-9 7.594 0 15.75 4.027 15.75 9v4.5h-31.5v-4.5z" fill="#F7F7F7"/>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M63 83.251h20.25v4.5H63v-4.5z" fill="#F1F1F1"/>
    </svg>
    <span class="brand-text">Classroom</span>
  </span>

  <div class="flex-grow-1"></div>

  <div class="add-class-wrap">
  <button class="btn-icon" id="addClassBtn"><i class="fa-solid fa-plus"></i></button>

  <div class="add-class-menu" id="addClassMenu">
    <a href="#" class="add-class-item" id="joinClassLink">Join class</a>
    <a href="#" class="add-class-item">Create class</a>
  </div>
</div>
  <button class="btn-icon"><svg class="gb_H" aria-hidden="true" focusable="false" fill='#444746' viewBox="0 0 24 24"><path d="M6,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM16,6c0,1.1 0.9,2 2,2s2,-0.9 2,-2 -0.9,-2 -2,-2 -2,0.9 -2,2zM12,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2z"></path><image src="https://ssl.gstatic.com/gb/images/bar/al-icon.png" alt="" height="24" width="24" style="border:none;display:none \9"></image></svg></button>
  <div class="avatar-circle">DD</div>
</header>

<div class="gc-backdrop" id="backdrop"></div>

<div class="d-flex app-body">
  <nav class="gc-sidebar collapsed" id="sidebar">
    <a href="index.php" class="gc-nav-link <?php echo $activeNav === 'home' ? 'active' : ''; ?>">
      <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'><path d="M12 3L4 9v12h16V9l-8-6zm6 16h-3v-6H9v6H6v-9l6-4.5 6 4.5v9z"></path></svg><span class="nav-label">Home</span>
    </a>
    <a href="calendar.php" class="gc-nav-link <?php echo $activeNav === 'calendar' ? 'active' : ''; ?>">
      <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"></path></svg> <span class="nav-label">Calendar</span>
    </a>
    <a href="#" class="gc-nav-link <?php echo $activeNav === 'enrolled' ? 'active' : ''; ?>">
     <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" fill='#444746'><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"></path></svg> <span class="nav-label">Enrolled</span>
      <i class="fa-solid fa-chevron-down chev"></i>
    </a>
    <a href="archived.php" class="gc-nav-link <?php echo $activeNav === 'archived' ? 'active' : ''; ?>">
     <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'><path d="M20.54 5.23l-1.39-1.68C18.88 3.21 18.47 3 18 3H6c-.47 0-.88.21-1.16.55L3.46 5.23C3.17 5.57 3 6.02 3 6.5V19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6.5c0-.48-.17-.93-.46-1.27zM6.24 5h11.52l.83 1H5.42l.82-1zM5 19V8h14v11H5zm11-5.5l-4 4-4-4 1.41-1.41L11 13.67V10h2v3.67l1.59-1.59L16 13.5z"></path></svg><span class="nav-label">Archived classes</span>
    </a>
    <a href="#" class="gc-nav-link <?php echo $activeNav === 'settings' ? 'active' : ''; ?>">
      <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'><path d="M13.85 22.25h-3.7c-.74 0-1.36-.54-1.45-1.27l-.27-1.89c-.27-.14-.53-.29-.79-.46l-1.8.72c-.7.26-1.47-.03-1.81-.65L2.2 15.53c-.35-.66-.2-1.44.36-1.88l1.53-1.19c-.01-.15-.02-.3-.02-.46 0-.15.01-.31.02-.46l-1.52-1.19c-.59-.45-.74-1.26-.37-1.88l1.85-3.19c.34-.62 1.11-.9 1.79-.63l1.81.73c.26-.17.52-.32.78-.46l.27-1.91c.09-.7.71-1.25 1.44-1.25h3.7c.74 0 1.36.54 1.45 1.27l.27 1.89c.27.14.53.29.79.46l1.8-.72c.71-.26 1.48.03 1.82.65l1.84 3.18c.36.66.2 1.44-.36 1.88l-1.52 1.19c.01.15.02.3.02.46s-.01.31-.02.46l1.52 1.19c.56.45.72 1.23.37 1.86l-1.86 3.22c-.34.62-1.11.9-1.8.63l-1.8-.72c-.26.17-.52.32-.78.46l-.27 1.91c-.1.68-.72 1.22-1.46 1.22zm-3.23-2h2.76l.37-2.55.53-.22c.44-.18.88-.44 1.34-.78l.45-.34 2.38.96 1.38-2.4-2.03-1.58.07-.56c.03-.26.06-.51.06-.78s-.03-.53-.06-.78l-.07-.56 2.03-1.58-1.39-2.4-2.39.96-.45-.35c-.42-.32-.87-.58-1.33-.77l-.52-.22-.37-2.55h-2.76l-.37 2.55-.53.21c-.44.19-.88.44-1.34.79l-.45.33-2.38-.95-1.39 2.39 2.03 1.58-.07.56a7 7 0 0 0-.06.79c0 .26.02.53.06.78l.07.56-2.03 1.58 1.38 2.4 2.39-.96.45.35c.43.33.86.58 1.33.77l.53.22.38 2.55z"></path><circle cx="12" cy="12" r="3.5"></circle></svg> <span class="nav-label">Settings</span>
    </a>
  </nav>
<div class="join-class-overlay" id="joinClassOverlay">
  <div class="join-class-modal">
    <div class="join-class-head">Join class</div>

    <div class="join-class-body">
      <div class="join-class-account-box">
        <div class="join-class-signedin-label">You're currently signed in as</div>
        <div class="join-class-account-row">
          <img src="Assets/images/avatar.jpg" alt="" class="join-class-avatar" onerror="this.style.display='none'">
          <div>
            <div class="join-class-name">Asim Khan</div>
            <div class="join-class-email">ak3952009@gmail.com</div>
          </div>
        </div>
        <button class="join-class-switch-btn">Switch account</button>
      </div>

      <div class="join-class-code-box">
        <div class="join-class-code-label">Class code</div>
        <div class="join-class-code-sub">Ask your teacher for the class code, then enter it here.</div>
        <input type="text" class="join-class-code-input" placeholder="Class code" id="joinClassCodeInput">
      </div>

      <div class="join-class-help-box">
        <div class="join-class-help-title">To sign in with a class code</div>
        <ul>
          <li>Use an authorized account</li>
          <li>Use a class code with 5-8 letters or numbers, and no spaces or symbols</li>
        </ul>
        <div class="join-class-help-footer">If you have trouble joining the class, go to the <a href="#">Help Center article</a></div>
      </div>
    </div>

    <div class="join-class-footer">
      <button class="join-class-cancel-btn" id="joinClassCancelBtn">Cancel</button>
      <button class="join-class-join-btn" id="joinClassJoinBtn" disabled>Join</button>
    </div>
  </div>
</div>
<script>
  const joinClassLink       = document.getElementById('joinClassLink');
  const joinClassOverlay    = document.getElementById('joinClassOverlay');
  const joinClassCancelBtn  = document.getElementById('joinClassCancelBtn');
  const joinClassCodeInput  = document.getElementById('joinClassCodeInput');
  const joinClassJoinBtn    = document.getElementById('joinClassJoinBtn');
  const addClassMenu2       = document.getElementById('addClassMenu');

  joinClassLink.addEventListener('click', function (e) {
    e.preventDefault();
    addClassMenu2.classList.remove('open');
    joinClassOverlay.classList.add('open');
  });

  joinClassCancelBtn.addEventListener('click', closeJoinClassModal);
  joinClassOverlay.addEventListener('click', function (e) {
    if (e.target === joinClassOverlay) closeJoinClassModal();
  });

  function closeJoinClassModal() {
    joinClassOverlay.classList.remove('open');
    joinClassCodeInput.value = '';
    joinClassJoinBtn.disabled = true;
    joinClassJoinBtn.classList.remove('active');
  }

  joinClassCodeInput.addEventListener('input', function () {
    const hasCode = joinClassCodeInput.value.trim().length > 0;
    joinClassJoinBtn.disabled = !hasCode;
    joinClassJoinBtn.classList.toggle('active', hasCode);
  });

  const addClassBtn  = document.getElementById('addClassBtn');
  const addClassMenu = document.getElementById('addClassMenu');

  addClassBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    addClassMenu.classList.toggle('open');
  });

  document.addEventListener('click', function (e) {
    if (!addClassMenu.contains(e.target) && e.target !== addClassBtn) {
      addClassMenu.classList.remove('open');
    }
  });
</script>