<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
  // require("../Modules/loginModel.php");
  require("../Modules/Function.php");
?>
<div class = "container">
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
  echo "你輸入的值為："."<br/>Keyword: ".$keyword."<br/>label: ".$label."<br/>Family:".$family."<br/>Genus:".$genus;
  echo "<br/><hr/><h1>搜尋結果如下：</h1>";
  echo '<table class="table"><tr>';
    $results=searchEcology($keyword,$label,$family,$genus);
    $count = 0;
    foreach ($results as $key => $section) {
      if($count == 0) {
        foreach ($section as $name => $val) {
          echo "<td>$name</td>";
          $count ++;
        }
      } else if ($count > 0) {
        echo "</tr><tr>";
        foreach ($section as $name => $val) {
          echo "<td>$val</td>";
      }
    }
      echo "</tr>";
  }
  echo '</table>'
  ?>
</div>
<?php
  include 'footer.php'
?>