<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");

<<<<<<< HEAD
include_once("../../models/AdminModel.php");
$admin = new AdminModel();
$data = json_decode(file_get_contents("php://input"));
print_r ($admin);
=======

include_once("../../models/AdminModel.php");
$admin = new AdminModel();
$data = json_decode(file_get_contents("php://input"));

>>>>>>> 9abddbe71a54e1c6bc5ed6ed0f4023fd6cb630c0
$admin->adminname = $data->adminname;
$admin->role = $data->role;
$admin->password = $data->password;
$admin->first_name = $data->first_name;
$admin->last_name = $data->last_name;
$admin->phone = $data->phone;
$admin->address = $data->address;
$admin->email = $data->email;
$admin->avatar = $data->avatar;
$admin->last_login =$data->last_login;
$admin->status = $data->status;
$admin->updated_at = $data->updated_at; 
if($admin->create()){
    $admin_info = [
        "status" => "success",
        "message" => "Thêm admin thành công"
    ];
} else {
    $admin_info = [
        "status" => "fail",
        "message" => "Thêm admin thất bại"
    ];
}
echo json_encode($admin_info);