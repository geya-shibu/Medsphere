<?php
require 'external.cont.cls.php';
// $sessObj = new SessionManageCls();
// if ($sessObj->isLogged() == true) 
// {
    if (isset($_POST['action'])) 
    {
        if ($_POST['action'] == 1) {
            $symtopms = $_POST['symptom'];
            // $obj  = new ExternalContrlCls();
            header("Location: external.cont.cls.php");
            getApiData($symtopms);
        }
    }
// else 
// {
//     echo json_encode(['status' => 404, 'msg' => 'Unauthorized Request']);
// }
?>
