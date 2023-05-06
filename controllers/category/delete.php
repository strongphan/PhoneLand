<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    include_once("../../models/CategoryModel.php");
    $category = new CategoryModel();
    $category->id = isset($_GET['id']) ? $_GET['id'] : die();

    if($category->delete($category->id)){
            echo json_encode(array(
                "status" => "success",
                'message'=>'Xóa thông tin danh mục thành công'));
    
    }else{
        echo json_encode(array(
            "status" => "success",
            'message'=>'Xóa thông tin danh mục thất bại'));
    }
