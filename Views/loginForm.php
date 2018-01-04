<?php
  // 啟動Session 並回收uID
  session_start();
  unset($_SESSION['uID']);
  // 避免Session 重複使用, 回收後關閉Session
  session_destroy();
  // 在header裡面會重新開啟
  include 'header.php';
?>
<style>
.myclass {
  background-image   : url(frogs.png),
                       url(house.jpg);
                       
  background-repeat  : no-repeat,
                       no-repeat;

  background-size: cover,
                   cover; 
  background-position:    
}
form {position absolute; width:400px;}
.form-group{margin: 50px auto;text-align:center}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<body class="myclass"> 

<div class="container">
  <div class="row">
    <div class="col">
      
    </div>
    <div class="col-6">
      
    </div>
    <div class="col">
      
    </div>
  </div>

<div size="30" style="position:relative;left:100px;top:15vw;">
<form  method="post" action="../Control/loginControl.php" class="rounded" style=" background-color:rgba(0,0,0,0.3);">
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
</body>

<?php
  include 'footer.php';
?>
