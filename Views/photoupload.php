<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
  require("../Modules/loginModel.php");
  require("../Modules/Function.php");
?>
<title>上傳圖片</title>
<body>
  <div class="container">
		<h1 class="mt-3">上傳圖片</h1>
		<div class="row">
			<div class="col-12">
				<form class="mt-3" action="../Control/photoControl.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input class="form-control mb-3" type="text" name="directory" placeholder="請輸入物種名稱 ex:虎皮蛙" required>
						<!-- 使用 html 5 實現單一上傳框可多選檔案方式，須新增 multiple 元素 -->
						<input class="form-control-file mb-3" type="file" name="myFile[]" id="" accept="image/jpeg,image/jpg,image/gif,image/png" multiple>
						<input class="btn btn-success" type="submit" value="上傳檔案">
					</div>
				</form>
			</div>
		</div>
  </div>
</body>
</html>