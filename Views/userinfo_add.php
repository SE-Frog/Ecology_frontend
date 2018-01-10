<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
?>
<div class="container">
  <h1>新增管理者</h1><hr />
  <form method="post" action="../Control/userControl.php">
    <input type="hidden" name="act" value="addUser">
    管理者帳號: <input type="username" name="username"><br />
    管理者密碼: <input type="password" name="password"><br />
    <input type="submit">
  </form>
</div>

<?php
  include 'footer.php';
?>
