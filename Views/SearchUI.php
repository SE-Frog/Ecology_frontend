<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
?>

<head>
  <meta charset="UTF-8" />
  <title>查詢清單</title>
</head>
<body>
  <div class="container mt-3">
    <h1 class="mb-3">查詢資料</h1>
    <form action="SearchResult.php" method="post">
      <div class="form-group row">
        <label for="keyword" class="col-md-2 col-form-label">關鍵字</label>
        <div class="col-md-10">
          <input type="text" name="keyword" class="form-control" id="keyword" placeholder="請輸入關鍵字">
        </div>
      </div>
      <div class="form-group row">
        <label for="label" class="col-md-2 col-form-label">物種</label>
        <div class="col-md-10">
          <select class="form-control" name="label" id="label">
            <option value="frog" selected>青蛙</option>
            <option value="lepidoptera">蝴蝶</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="family" class="col-md-2 col-form-label">科別</label>
        <div class="col-md-10">
          <input type="text" name="family" class="form-control" id="family" placeholder="請輸入科別">
        </div>
      </div>
      <div class="form-group row">
        <label for="genus" class="col-md-2 col-form-label">屬</label>
        <div class="col-md-10">
          <input type="text" name="genus" class="form-control" id="genus" placeholder="請輸入屬">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-12">
          <button type="submit" class="btn btn-primary">查詢</button>
        </div>
      </div>
    </form>
  </div>



<?php
  include 'footer.php';
?>
