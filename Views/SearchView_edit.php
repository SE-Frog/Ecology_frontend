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

<head>
  <meta charset="UTF-8" />
  <title>修改資料</title>
</head>
<body>
  <div class="container mt-3">
    <h2 class="mb-3">Edit ecology of&nbsp;<?php echo $edit_id;?></h1>
    <form method="post" action="../Control/Control.php?act=updateEcology">
      <input type="hidden" name='dataid' name='dataid' value="<?php echo $edit_id;?>">
      <div class="form-group row">
        <label for="organismname" class="col-md-2 col-form-label">生物名稱</label>
        <div class="col-md-10">
          <input type="text" name="organismname" class="form-control" id="organismname" value="<?php echo $Organ;?>"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="label" class="col-md-2 col-form-label">物種</label>
        <div class="col-md-10">
          <input type="text" name="label" class="form-control" id="label" value="<?php echo $Label;?>"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="family" class="col-md-2 col-form-label">科</label>
        <div class="col-md-10">
          <input type="text" name="family" class="form-control" id="family" value="<?php echo $Family;?>"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="genus" class="col-md-2 col-form-label">屬</label>
        <div class="col-md-10">
          <input type="text" name="genus" class="form-control" id="genus" value="<?php echo $Genus;?>"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="food" class="col-md-2 col-form-label">食物</label>
        <div class="col-md-10">
          <input type="text" name="food" class="form-control" id="food" value="<?php echo $Food;?>"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="season" class="col-md-2 col-form-label">季節</label>
        <div class="col-md-10">
          <input type="text" name="season" class="form-control" id="season" value="<?php echo $Season;?>"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="status" class="col-md-2 col-form-label">外觀</label>
        <div class="col-md-10">
          <textarea name="status" class="form-control" rows="3" id="status"><?php echo $Status;?></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="habitat" class="col-md-2 col-form-label">習性</label>
        <div class="col-md-10">
          <textarea name="habitat" class="form-control" rows="3" id="habitat"><?php echo $Habitat;?></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="note" class="col-md-2 col-form-label">註記</label>
        <div class="col-md-10">
          <input type="text" name="note" class="form-control" id="note" value="<?php echo $Note;?>"/>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-12">
          <input type="submit" name="Submit" class="btn btn-primary" value="送出" />
          <input type="button" value="返回" class="btn btn-primary" onclick="location.href='../Views/SearchView.php'">
        </div>
      </div>
    </form>
  </div>
</body>
<?php
  include 'footer.php';
?>
