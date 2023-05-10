<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    include_once("../../models/AdminModel.php");
    $admin = new AdminModel();
    $admin->id = isset($_GET['id']) ? $_GET['id'] : die();

    if($admin->delete($admin->id)){
        $admin_info = [
            "status" => "success",
            "message" => "Đăng nhập thành công"
        ];
    } else {
        $admin_info = [
            "status" => "fail",
            "message" => "Tài khoản hoặc mật khẩu không chính xác"
        ];
    }
    echo json_encode($admin_info);