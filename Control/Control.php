<?php
    session_start();
    require_once('../Modules/Function.php');
    $action =$_REQUEST['act'];

    switch ($action) {
        case 'searchEcology':
            // addslashes 防SQL注入
            searchEcology(addslashes($_REQUEST['keyword']), addslashes($_REQUEST['label']), addslashes($_REQUEST['family']), addslashes($_REQUEST['genus']));
            header('Location: ../Views/Result.php');
            break;
        case 'createEcology':
            //檢查是否存在且有值
            if(isset($_REQUEST['organismname']) && !empty($_REQUEST['organismname'])) {
                // htmlspecialchars 防XSS
                createEcology(htmlspecialchars($_REQUEST['organismname']), htmlspecialchars($_REQUEST['label']), htmlspecialchars($_REQUEST['family']), htmlspecialchars($_REQUEST['genus']), htmlspecialchars($_REQUEST['food']), htmlspecialchars($_REQUEST['season']), htmlspecialchars($_REQUEST['status']), htmlspecialchars($_REQUEST['habitat']), htmlspecialchars($_REQUEST['note']));
            } else {
                break;
            }
        case 'deleteEcology':
            $id = (int) $_REQUEST['id'];
            if ($id > 0) {
                // 做完登入頁面後記得檢查uID
                // if($id == $_SESSION['uID']){
                deleteEcology($id);
                header('Location: ../Views/SearchView.php');
            }
            break;
        case 'updateEcology':
            $id = (int) $_REQUEST['dataid'];
            if ($id > 0) {
                // htmlspecialchars 防XSS
                updateEcology($id, htmlspecialchars($_REQUEST['organismname']), htmlspecialchars($_REQUEST['label']), htmlspecialchars($_REQUEST['family']), htmlspecialchars($_REQUEST['genus']), htmlspecialchars($_REQUEST['food']), htmlspecialchars($_REQUEST['season']), htmlspecialchars($_REQUEST['status']), htmlspecialchars($_REQUEST['habitat']), htmlspecialchars($_REQUEST['note']));
                header('Location: ../Views/SearchView.php');
            }
            break;
    }
?>
<?php
    // header('Location: ../Views/SearchView.php');
 ?>