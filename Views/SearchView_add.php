<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
  require("../Modules/loginModel.php");
  require("../Modules/Function.php");
/* 先針對post進來的id，再以id與資料庫比對，存取資料庫的值到變數中 */
?>

<div class="container">
  <b>Add Ecology</b>
  <hr/>
  <form method="post" action="../Control/Control.php?act=createEcology">
    <b>生物名稱:</b><input type="text" name="organismname" id="organismname" /><br/>
    <b>物種:</b><input type="text" name="label" id="label" /><br/>
    <b>科:</b><input type="text" name="family" id="family" /><br/>
    <b>屬:</b><input type="text" name="genus" id="genus" /><br/>
    <b>食物:</b><input type="text" name="food" id="food" /><br/>
    <b>季節:</b><input type="text" name="season" id="season" /><br/>
    <b>外觀:</b>
    <textarea name="status" type="text" id="status" cols="50" rows="5" style="vertical-align:top"></textarea><br/>
    <b>習性:</b>
    <textarea name="habitat" type="text" id="habitat" cols="50" rows="5" style="vertical-align:top"></textarea><br/>
    <b>註記:</b><input type="text" name="note" id="note" /><br/>
    <input type="submit" name="Submit" value="送出" />[<a href='../Views/SearchView.php'>返回</a>]
  </form>
</div>
<?php
  include 'footer.php';
?>
