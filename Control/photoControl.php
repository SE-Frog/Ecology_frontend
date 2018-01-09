<?php
    /**
     * 表單接收頁面
     */

    // 網頁編碼宣告（防止產生亂碼）
    header('content-type:text/html;charset=utf-8');
    // 封裝好的單一及多檔案上傳 class
    include_once '../Modules/Upload.php';
    // 單純更新EXIF
    if(isset($_REQUEST['act']) && $_REQUEST['act'] == 'updateExif'){
        require_once '../Modules/photoFunction.php';
        updateOnlyEXIF($_REQUEST['photoid'], $_REQUEST['longitude'], $_REQUEST['latitude'], $_REQUEST['shootdatetime']);
        header('Location: ../Views/photoview.php');
        exit(0);
    }else if(isset($_REQUEST['act']) && $_REQUEST['act'] == 'delphoto'){
        require_once '../Modules/photoFunction.php';
        deletePhotoData($_REQUEST['id']);
        header('Location: ../Views/photoview.php');
        exit(0);
    }
    $directory = $_REQUEST['directory'];
    $id = $_REQUEST['photoid'];
    // 更新檔案請改為 Upload($directory, true, $id); 更新時只能用單一張照片
    // $upload = new Upload($directory, true, $id);
    // $upload->callUploadFile();
    // $upload = new Upload($directory);
    // $upload->callUploadFile();

    echo $upload->getDestination();  // 取得實際儲存檔名路徑

?>