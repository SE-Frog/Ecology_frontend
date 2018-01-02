<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
  require("../Modules/loginModel.php");
  require("../Modules/Function.php");
/* 先針對post進來的id，再以id與資料庫比對，存取資料庫的值到變數中 */
  $id = (int)$_REQUEST['id'];

// 針對id從資料庫撈那一筆id的所有資料，以利編輯，若查無此id，則告知ID錯誤
  $result=getListID($id);
  if ($rs=mysqli_fetch_assoc($result)) {
    $Organ=$rs['organismname'];
    $Label=$rs['label'];
    $Family=$rs['family'];
    $Genus=$rs['genus'];
    $Food=$rs['food'];
    $Season=$rs['season'];
    $Status=$rs['status'];
    $Habitat=$rs['habitat'];
    $Note=$rs['note'];
    $edit_id = $rs['id'];
  } else {
    echo "Your id is wrong!!";
    exit(0);
  }
?>

<div class="container">
  <b>Edit ecology of&nbsp;<?php echo $edit_id;?></b>
  <hr/>
  <form method="post" action="../Control/Control.php?act=updateEcology">
    <b>ID:</b><?php echo $edit_id;?><br/>
    <b>生物名稱:</b><input type="text" name="organismname" id="organismname" value="<?php echo $Organ;?>"/><br/>
    <b>物種:</b><input type="text" name="label" id="label" value="<?php echo $Label;?>"/><br/>
    <b>科:</b><input type="text" name="family" id="family" value="<?php echo $Family;?>"/><br/>
    <b>屬:</b><input type="text" name="genus" id="genus" value="<?php echo $Genus;?>"/><br/>
    <b>食物:</b><input type="text" name="food" id="food" value="<?php echo $Food;?>"/><br/>
    <b>季節:</b><input type="text" name="season" id="season" value="<?php echo $Season;?>"/><br/>
    <b>外觀:</b>
    <textarea name="status" type="text" id="status" cols="50" rows="5" style="vertical-align:top"><?php echo $Status;?></textarea><br/>
    <b>習性:</b>
    <textarea name="habitat" type="text" id="habitat" cols="50" rows="5" style="vertical-align:top"><?php echo $Habitat;?></textarea><br/>
    <b>註記:</b><input type="text" name="note" id="note" value="<?php echo $Note;?>"/><br/>
    <input type="submit" name="Submit" value="送出" />[<a href='../Views/SearchView.php'>返回</a>]
  </form>
</div>
<?php
  include 'footer.php';
?>
