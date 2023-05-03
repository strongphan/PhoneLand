<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");

include_once("../../models/AdminModel.php");
$admin = new AdminModel();
$data = json_decode(file_get_contents("php://input"));
$admin->adminname = $data->adminname;
$admin->role = $data->role;
$admin->password = $data->password;
$admin->fist_name = $data->fist_name;
$admin->last_name = $data->last_name;
$admin->phone = $data->phone;
$admin->address = $data->address;
$admin->email = $data->email;
$admin->avatar = $data->avatar;
$admin->last_login =$data->last_login;
$admin->status = $data->status;
$admin->updated_at = $data->updated_at; 
if($admin->create()){
    echo json_encode(array('message','Thêm admin thành công'));
}else{
    echo json_encode(array('message','Thêm admin thất bại'));
}