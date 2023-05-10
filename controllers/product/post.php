<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");


    include_once("../../models/ProductModel.php");
    $product = new ProductModel();
    $data = json_decode(file_get_contents("php://input"));

    $product->admin_id = $data->admin_id;
    $product->category_id = $data->category_id;
    $product->title = $data->title;
    $product->avatar = $data->avatar;
    $product->color = $data->color;
    $product->price = $data->price;
    $product->amount = $data->amount;
    $product->summary = $data->summary;
    $product->content = $data->content;
    $product->status = $data->status;
    $product->updated_at = $data->updated_at; 

    if(empty($data->name)){
        $product_info = [
            "status" => "success",
            "message" => "Không được để trống tên"
        ];
    }else{
        if($product->create()){
            $product_info = [
                "status" => "success",
                "message" => "Thêm product thành công"
            ];
        } else {
            $product_info = [
                "status" => "fail",
                "message" => "Thêm product thất bại"
            ];
        }
    }
    echo json_encode($product_info);
?>