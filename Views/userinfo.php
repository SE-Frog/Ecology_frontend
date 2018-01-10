<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
  require("../Modules/userModel.php");
?>
<title>使用者管理</title>
<div class = "container">
  <?php
    $results=getUserList();
    while (	$rs=mysqli_fetch_array($results)) {
      echo
      "<br/><b>管理者編號:</b>",$rs['id'],
      "<br/><b>管理者名單:</b>",$rs['username'],
      "<br/><b>管理者密碼(未加密):</b>",$rs['password'],
      "<br/><a href='../Control/userControl.php?act=deleteUser&id=",$rs['id'],"'>刪除</a>",
      "&nbsp;&nbsp;&nbsp;<a href='../Views/userinfo_edit.php?id=",$rs['id'],"'>編輯</a>",
      "&nbsp;&nbsp;&nbsp;<a href='../Views/userinfo_add.php?'>新增</a>",
      "<br/>";
    }
  ?>
</div>
<?php
  include 'footer.php'
?>