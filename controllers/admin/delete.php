<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    include_once("../../models/AdminModel.php");
    $admin = new AdminModel();
    $admin->id = isset($_GET['id']) ? $_GET['id'] : die();

    if($admin->delete($admin->id)){
        echo json_encode(array('message','Xóa thông tin admin thành công'));
    
    }else{
        echo json_encode(array('message','Xóa thông tin admin thất bại'));
    }
