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

<head>
  <meta charset="UTF-8" />
  <title>新增資料</title>
</head>
<body>
  <div class="container mt-3">
    <h2 class="mb-3">Add Ecology</h2>
    <form method="post" action="../Control/Control.php?act=createEcology">
      <div class="form-group row">
        <label for="organismname" class="col-md-2 col-form-label">生物名稱</label>
        <div class="col-md-10">
          <input type="text" name="organismname" class="form-control" id="organismname"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="label" class="col-md-2 col-form-label">物種</label>
        <div class="col-md-10">
          <input type="text" name="label" class="form-control" id="label"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="family" class="col-md-2 col-form-label">科</label>
        <div class="col-md-10">
          <input type="text" name="family" class="form-control" id="family"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="genus" class="col-md-2 col-form-label">屬</label>
        <div class="col-md-10">
          <input type="text" name="genus" class="form-control" id="genus"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="food" class="col-md-2 col-form-label">食物</label>
        <div class="col-md-10">
          <input type="text" name="food" class="form-control" id="food"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="season" class="col-md-2 col-form-label">季節</label>
        <div class="col-md-10">
          <input type="text" name="season" class="form-control" id="season"/>
        </div>
      </div>
      <div class="form-group row">
        <label for="status" class="col-md-2 col-form-label">外觀</label>
        <div class="col-md-10">
          <textarea name="status" class="form-control" rows="3" id="status"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="habitat" class="col-md-2 col-form-label">習性</label>
        <div class="col-md-10">
          <textarea name="habitat" class="form-control" rows="3" id="habitat"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="note" class="col-md-2 col-form-label">註記</label>
        <div class="col-md-10">
          <input type="text" name="note" class="form-control" id="note"/>
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
