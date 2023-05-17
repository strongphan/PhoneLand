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
$admin->first_name = $data->first_name;
$admin->last_name = $data->last_name;
$admin->phone = $data->phone;

$stmt = $admin -> countAdminname($admin->adminname);

$data = $stmt -> fetch(PDO::FETCH_ASSOC);

if( isset($admin->adminname) && 
    isset($admin->role) && 
    isset($admin->password) && 
    isset($admin->first_name) &&
    isset($admin->last_name) &&
    isset($admin->phone)
) {
    if($data['count'] == 0) {
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
    }else {
        $admin_info = [
                "status" => "fail",
                "message" => "Username đã tồn tại"
            ];
    }
}




echo json_encode($admin_info);