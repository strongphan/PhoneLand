<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");


    include_once("../../models/ProductModel.php");
    $product = new ProductModel();
    $data = json_decode(file_get_contents("php://input"));
    
    $product->id = $data->id;
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

    if(empty($data->title) || empty($data->category_id)){
        $admin_info = [
            "status" => "success",
            "message" => "Không được để trống category ID, tên sản phẩm"
        ];
    }else{
        if($product->update($product->id)){
            $admin_info = [
                'status'=>'success',
                'message'=>'Sửa product thành công'
            ];

                
        }else{
            $admin_info = [
                'status'=>'success',
                'message'=>'Sửa product thất bại'
            ];
        }
    }
    echo json_encode($admin_info);
