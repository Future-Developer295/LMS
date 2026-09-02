<?php
$pageTitle = 'People - Batch AI_2508T5 - Classroom';
$activeNav = 'enrolled';
include "Assets/includes/header.php";
?>

  <main class="flex-grow-1 stream-main index-main">

    <div class="class-tabbar">
      <div class="tab-links">
        <a href="class.php" class="stream-tab">Stream</a>
        <a href="classwork.php" class="stream-tab">Classwork</a>
        <a href="people.php" class="stream-tab active">People</a>
      </div>
      <div class="tab-spacer"></div>
      <div class="tab-icons">
        <button class="btn-icon" title="Calendar"><svg focusable="false" width="24" height="24" viewBox="0 0 24 24" fill='#444746'><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"></path></svg></button>
        <button class="btn-icon" title="Class settings"><svg enable-background="new 0 0 24 24" focusable="false" height="24" viewBox="0 0 24 24" width="24" fill='#444746'><rect fill="none" height="24" width="24"></rect><path d="M14.35,2.5h-4.7c-0.71,0-1.37,0.38-1.73,0.99L1.58,14.4c-0.36,0.62-0.36,1.38-0.01,2l2.35,4.09c0.36,0.62,1.02,1,1.73,1 h12.68c0.72,0,1.38-0.38,1.73-1l2.35-4.09c0.36-0.62,0.35-1.38-0.01-2L16.08,3.49C15.72,2.88,15.06,2.5,14.35,2.5z M18.34,19.5H5.66 l-2.35-4.09L9.65,4.5h4.7l6.34,10.91L18.34,19.5z M12.9,7.75h-1.8l-4.58,7.98L7.25,17h9.5l0.73-1.27L12.9,7.75z M9.25,15L12,10.2 l2.75,4.8H9.25z"></path></svg></button>
      </div>
    </div>

    <div class="stream-body">

      <div class="people-section">
        <div class="people-section-head">
          <h2>Teachers</h2>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:linear-gradient(135deg,#e04b3f,#8e2a2a); font-family:'Brush Script MT',cursive; font-style:italic;">DD</div>
          <div class="people-name">Despicable Dev</div>
        </div>
      </div>

      <div class="people-section">
        <div class="people-section-head">
          <h2>Classmates</h2>
          <div class="count">12 students</div>
        </div>

        <div class="people-row">
          <div class="people-avatar" style="background:#8d6e63;">h</div>
          <div class="people-name">hana fahad</div>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:#5c6bc0;">A</div>
          <div class="people-name">ABSAR HASHIM</div>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:#1e7d4f;">A</div>
          <div class="people-name">Abdul Hadi Khan</div>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:#4a90d9;">K</div>
          <div class="people-name">Khadija Asim Khan</div>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:#e2a53f;">A</div>
          <div class="people-name">Asim Khan</div>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:#8e44ad;">B</div>
          <div class="people-name">Bilal Ahmed</div>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:#26a69a;">F</div>
          <div class="people-name">Fatima Noor</div>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:#c0392b;">H</div>
          <div class="people-name">Hamza Tariq</div>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:#2980b9;">M</div>
          <div class="people-name">Mahnoor Fatima</div>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:#7f8c8d;">S</div>
          <div class="people-name">Sara Malik</div>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:#d35400;">U</div>
          <div class="people-name">Usman Ali</div>
        </div>
        <div class="people-row">
          <div class="people-avatar" style="background:#16a085;">Z</div>
          <div class="people-name">Zainab Iqbal</div>
        </div>
      </div>

    </div>

  </main>
</div>

<button class="help-fab"><i class="fa-regular fa-circle-question"></i></button>

<script>
  document.querySelectorAll('.class-tabbar .stream-tab').forEach(function (tab) {
    tab.addEventListener('click', function () {
      document.querySelectorAll('.class-tabbar .stream-tab').forEach(function (t) {
        t.classList.remove('active');
      });
      this.classList.add('active');
    });
  });
</script>

<?php
include "Assets/includes/footer.php";
?>