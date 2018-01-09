<?php
  include 'header.php';
  require("../Modules/photoFunction.php");
  //set the login mark to empty
  if ( ! isset($_SESSION['uID'])) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
  $photoid = (int)$_REQUEST['id'];
  $result=getPhotoID($photoid);
  if ($rs=mysqli_fetch_assoc($result)) {
    $id = $rs['id'];
    $directory = $rs['directory'];
    $path = $rs['path'];
    $name = $rs['name'];
    $longitude = $rs['longitude'];
    $latitude = $rs['latitude'];
    $shootdatetime = $rs['shootdatetime'];
  } else {
    echo "Your id is wrong!!";
    exit(0);
  }
?>

<div class="container">
<?php
  echo "<div class=\"row mt-3\" id=\"wrapper\">";
  echo "<div class=\"col-12 text-center\">";
  echo " <div id=\"image\">";
  echo " <div id=\"backder\">";
  echo " <a href=".$rs['path']." target='_blank'><img class=\"img-fluid\" src=\"".$rs['path']."\" id=\"img\" exif=\"true\" width=".(300);
  echo " title=\"信息:\r文件名:".$rs['name']."\r上傳時間:".$rs['createtime']."\" border='0'></a>";
  echo " </div>";
  echo " </div>";
  echo " </div>";
  echo "<div class=\"col-12\">";
  echo " <div id=\"imageMeta\">";
  echo " <div class=\"exif-data\">";
  echo "<form class=\"mb-3\" method=\"post\" action=\"../Control/photoControl.php\">";
  echo "<input type=\"hidden\" name=\"act\" value=\"updateExif\">";
?>
    [<a href='../Views/photoview.php' class="mb-2">返回</a>]
    <br>
    <input class="form-control" type="hidden" name='photoid' id='photoid' value="<?php echo $photoid;?>"/><br>
    <!-- <input class="form-control mb-2" name="name" type="hidden" id="name" value="<?php echo $name;?>" readonly='readonly'/> -->
    <!-- <input class="form-control mb-2" name="path" type="hidden" id="path" value="<?php echo $path;?>" readonly='readonly'/> -->
    <b>物種: </b><input class="form-control mb-2" name="directory" type="text" id="directory" value="<?php echo $directory;?>" readonly='readonly'/>
    <b>經度: </b><input class="form-control mb-2" name="longitude" type="text" id="longitude" value="<?php echo $longitude;?>" />
    <b>緯度: </b><input class="form-control mb-2" name="latitude" type="text" id="latitude" value="<?php echo $latitude;?>" />
    <b>拍攝日期: </b><input class="form-control mb-2" name="shootdatetime" type="text" id="shootdatetime" value="<?php echo $shootdatetime;?>" />
    <input type="submit" name="Submit" value="送出" />
<?php
  echo "</form>";
  echo " </div>";
  echo " </div>";
  echo " </div>";
  echo "</div>";
?>
</div>

<?php
  include 'footer.php';
?>