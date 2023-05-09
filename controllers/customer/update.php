<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");


include_once("../../models/CustomerModel.php");
$customer = new CustomerModel();
$data = json_decode(file_get_contents("php://input"));
$customer->id = isset($_GET['id']) ? $_GET['id'] : die();  

$customer->password = $data->password;
$customer->first_name = $data->first_name;
$customer->last_name = $data->last_name;
$customer->phone = $data->phone;
$customer->address = $data->address;
$customer->email = $data->email;
$customer->avatar = $data->avatar;
$customer->jobs = $data->jobs;
$customer->last_login =$data->last_login;
$customer->facebook =$data->facebook;
$customer->status = $data->status;
$customer->updated_at = $data->updated_at; 
if(!filter_var($data->email, FILTER_VALIDATE_EMAIL)){
    $customer_info = [
        "status" => "fail",
        "message" => "Email không đúng định dạng"
    ];
}else{
    if($customer->update($customer->id)){
        $customer_info = [
            "status" => "success",
            "message" => "sửa thông tin customer thành công"
        ];
    } else {
        $customer_info = [
            "status" => "fail",
            "message" => "Sửa thông tin customer thất bại"
        ];
    }
}

echo json_encode($customer_info);