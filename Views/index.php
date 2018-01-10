<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
?>
<div class="container">
  <h1>登入成功頁面(視需求放公告欄或留言板)</h1>
</div>
<?php
  include 'footer.php';
?>

