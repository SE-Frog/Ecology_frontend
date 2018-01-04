<?php
  // 啟動Session 並回收uID
  session_start();
  unset($_SESSION['uID']);
  // 避免Session 重複使用, 回收後關閉Session
  session_destroy();
  // 在header裡面會重新開啟
  // include 'header.php';
?>
<!DOCTYPE html>
<html>
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
    .myclass {
      background-image: url(frogs.png),url(house.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      min-height: 100vh;
    }
    form {
      width: 400px;
      margin-top: 100px;
    }
    .form-group {
      margin: 50px auto;
    }
  </style>
</head>
<body class="myclass">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center d-flex justify-content-center">
        <form method="post" action="../Control/loginControl.php" class="rounded" style="background-color: rgba(0,0,0,0.3);">
          <input type="hidden" name="act" value="login">
          <div class="form-group">
            <span style="color:white;font-weight:bold;">UserName</span>
            <input type="text" name="id" class="form-control" id="exampleInputUserName" placeholder="Enter UserName">
          </div>
          <div class="form-group">
            <span style="color:white;font-weight:bold;">Password</span>
            <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-success" value="登入" >Login</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
