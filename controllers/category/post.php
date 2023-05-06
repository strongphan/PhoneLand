<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");


include_once("../../models/CategoryModel.php");
$category = new CategoryModel();
$data = json_decode(file_get_contents("php://input"));
$category->admin_id = $data->admin_id;
if($data->name == ""){
    echo json_encode(array('message','Thêm category thất bại'));
    die();
}
$category->name = $data->name;
$category->type = $data->type; 
$category->des = $data->des;
$category->avatar = $data->avatar;
$category->status = $data->status;
$category->updated_at = $data->updated_at; 
if($category->create()){
    echo json_encode(array(
        "status" => "success",
        'message'=>'Thêm category thành công'));
}else{
    echo json_encode(array('message','Thêm category thất bại'));
}