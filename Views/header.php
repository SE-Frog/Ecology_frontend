<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Latest compiled and minified JavaScript -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <style>
    .share {
      position: fixed;
      bottom: 45px;
      right: 10px;
      z-index: 9999;
      list-style: none;
      padding: 0 !important;
    }
    .Gotop {
      cursor: pointer;
      display: none;
      padding: 0px;
      margin: 0px;
      text-align: center;
    }
    .Gotop:hover {
      opacity: 0.7;
    }
    .rfa {
      display: inline-block;
      text-align: center !important;
      text-decoration: none !important;
      /* margin: 5px 2px !important; */
      border-radius: 50% !important;
      background: #0077ff;
    }
  </style>
</head>

<nav class="sticky-top navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../Views/index.php">
    <img src="../img/frog.png" alt="forg_icon" width="32px">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../Views/SearchView.php">查看資料庫</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Views/SearchUI.php">查詢清單</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Views/userinfo.php">使用者管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Views/photoupload.php">上傳圖片</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Views/photoview.php">瀏覽圖庫</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href='loginForm.php'>
          <?php
            session_start();
            if (isset($_SESSION['uID']) && $_SESSION['uID'] === true) {
              echo "登出";
            } else {
              echo "登錄";
            }
          ?>
        </a>
      </li>
    </ul>
  </div>
</nav>
<body>
