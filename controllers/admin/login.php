<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");

include_once("../../config/config.php");
include_once("../../models/AdminModel.php");

$admin = new AdminModel();

$data = json_decode(file_get_contents("php://input"));

$admin -> adminname = $data -> adminname;
$admin -> password = $data -> password;

$stmt = $admin->getPassword($admin -> adminname);

$data = $stmt -> fetch(PDO::FETCH_ASSOC);

$password = $admin -> password;

$hashed_password = $data['password'];

if (password_verify($password, $hashed_password)) {
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