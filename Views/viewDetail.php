<?php
include 'header.php';
if (!isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
}
require "../Modules/loginModel.php";
require "../Modules/Function.php";
/* 先針對post進來的id，再以id與資料庫比對，存取資料庫的值到變數中 */
$id = (int) $_REQUEST['id'];

// 針對id從資料庫撈那一筆id的所有資料，以利編輯，若查無此id，則告知ID錯誤
$result = getListID($id);
if ($rs = mysqli_fetch_assoc($result)) {
    $Organ = $rs['organismname'];
    $Label = $rs['label'];
    $Family = $rs['family'];
    $Genus = $rs['genus'];
    $Food = $rs['food'];
    $Season = $rs['season'];
    $Status = $rs['status'];
    $Habitat = $rs['habitat'];
    $Note = $rs['note'];
    $edit_id = $rs['id'];
} else {
    echo "Your id is wrong!!";
    exit(0);
}
?>
<div class="container mt-3">
<?php
echo '<div class="row mt-3">
        <div class="col-12">
            <div class="row border rounded mb-2 p-2">
            <!-- 如果有對應圖片可以加上 -->
            <!-- <div class="col-md-3 mb-2 mb-md-0">
                <img width="150px" class="border rounded img-fluid" src="https://sdl-stickershop.line.naver.jp/products/0/0/1//1035020/LINEStorePC/main.png" alt="photo in data">
            </div> -->
            <div class="col-md-12">
                <a href="../Views/SearchView.php">回上一頁</a>
                <h4 class="mt-2">', $Organ, '</h4>
                <span class="badge badge-secondary"><small>', $Family, '</small></span>
                <span class="badge badge-secondary"><small>', $Genus, '</small></span>
                <h6 class="mt-2">外觀:</h6>
                <p>', $Status, '</p>
                <h6>習性:</h6>
                <p>', $Habitat, '</p>
                <h6>食物:</h6>
                <p>', $Food, '</p>
                <h6>季節:</h6>
                <p>', $Season, '</p>
                <h6>註記:</h6>
                <p>', $Note, '</p>
            </div>
        </div>
    </div></div>';
?>
</div>
<?php
include 'footer.php';
?>