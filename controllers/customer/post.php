<?php
    include_once("../../models/CustomerModel.php");
$customer = new CustomerModel();
$data = json_decode(file_get_contents("php://input"));

$customer->username = $data->username;
$customer->password = password_hash($data->password, PASSWORD_DEFAULT); // sử dụng hàm password_hash để hash password
$customer->first_name = $data->first_name;
$customer->last_name = $data->last_name;
$customer->phone = $data->phone;
$customer->email = $data->email;
$customer->status = 1;
if(empty($data->username) || empty($data->password)){
    $customer_info = [
        "status" => "fail",
        "message" => "Không được để trống tên TK và mật khẩu"
    ];
}else if(!empty($data->email) && !filter_var($data->email, FILTER_VALIDATE_EMAIL)){
    $customer_info = [
        "status" => "fail",
        "message" => "Email không đúng định dạng"
    ];
}
else{
    if($customer->create()){
        $customer_info = [
            "status" => "success",
            "message" => "Thêm customer thành công"
        ];
    } else {
        $customer_info = [
            "status" => "fail",
            "message" => "Thêm customer thất bại"
        ];
    }
}

echo json_encode($customer_info);

?>