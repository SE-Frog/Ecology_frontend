<?php
include 'header.php';
if (!isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
}
// require("../Modules/loginModel.php");
require "../Modules/Function.php";
?>
<div class="container mt-3">
<?php
// 搜尋的方式, 變數依序為 關鍵字（查詢名字、外觀、習性）、標籤、科別、屬別
// 如果不拘則不需要傳入變數, 但若是針對後面變數進行篩選, 請在前面變數填 "%"
// 例如下列範例為: 只要搜尋label(標籤)符合frog的資料, 但是前面還有一個變數"關鍵字"
// 故需填入"%", 而後面變數沒有使用到則無需填入
//$result = searchEcology("%", "frog");

// 資料太多需要分頁的話請用下方函式, 每頁顯示10筆, 並讀取第一頁
//$result = getPaginationList(10, 1);

$keyword = $_REQUEST['keyword'];
$label = $_REQUEST['label'];
$family = $_REQUEST['family'];
$genus = $_REQUEST['genus'];
// echo "你輸入的值為："."<br/>Keyword: ".$keyword."<br/>label: ".$label."<br/>Family:".$family."<br/>Genus:".$genus;
echo "<h1>搜尋結果如下：</h1>";
echo '<div class="row mt-3">';
$results = searchEcology($keyword, $label, $family, $genus);
while ($row = mysqli_fetch_array($results)) {
  echo '<div class="col-12">
          <div class="row border rounded mb-2 p-2">
            <!-- 如果有對應圖片可以加上 -->
            <!-- <div class="col-md-3 mb-2 mb-md-0">
                <img width="150px" class="border rounded img-fluid" src="https://sdl-stickershop.line.naver.jp/products/0/0/1//1035020/LINEStorePC/main.png" alt="photo in data">
            </div> -->
            <div class="col-md-12">
              <h4>',$row["organismname"],'</h4>
              <span class="badge badge-secondary"><small>',$row["family"],'</small></span>
              <span class="badge badge-secondary"><small>',$row["genus"],'</small></span>
              <h6 class="mt-2">外觀:</h6>
              <p>',$row["status"],'</p>
              <h6>習性:</h6>
              <p>',$row["habitat"],'</p>
              <h6>食物:</h6>
              <p>',$row["food"],'</p>
              <h6>季節:</h6>
              <p>',$row["season"],'</p>
              <h6>註記:</h6>
              <p>',$row["note"],'</p>
            </div>
          </div>
        </div>';
}
echo "</div>"
// echo '<table class="table"><tr>';
// $results=searchEcology($keyword,$label,$family,$genus);
// $count = 0;
// foreach ($results as $key => $section) {
//   if($count == 0) {
//     foreach ($section as $name => $val) {
//       echo "<td>$name</td>";
//       $count ++;
//     }
//   } else if ($count > 0) {
//     echo "</tr><tr>";
//     foreach ($section as $name => $val) {
//       echo "<td>$val</td>";
//     }
//   }
//   echo "</tr>";
// }
// echo '</table>';
?>
</div>
<?php
include 'footer.php';
?>