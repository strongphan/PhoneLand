<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");


    include_once("../../models/CategoryModel.php");
    $category = new CategoryModel();
    $data = json_decode(file_get_contents("php://input"));
    
    $category->id = $data->id;
    $category->name = $data->name;
    $category->type = $data->type;
    $category->des = $data->des;
    $category->avatar = $data->avatar;
    $category->status = $data->status;
    $category->updated_at = $data->updated_at; 

    if(empty($data->name)){
        $admin_info = [
            "status" => "success",
            "message" => "Không được để trống tên"
        ];
    }else{
        if($category->update($category->id)){
            $admin_info = [
                'status'=>'success',
                'message'=>'Sửa category thành công'
            ];

                
        }else{
            $admin_info = [
                'status'=>'success',
                'message'=>'Sửa category thất bại'
            ];
        }
    }
    echo json_encode($admin_info);
