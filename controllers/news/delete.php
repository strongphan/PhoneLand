<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    include_once("../../models/NewsModel.php");
    $news = new NewsModel();
    $news->id = isset($_GET['id']) ? $_GET['id'] : die();

    if($news->delete($news->id)){
            echo json_encode(array(
                "status" => "success",
                'message'=>'Xóa bài viết thành công'));
    
    }else{
        echo json_encode(array(
            "status" => "success",
            'message'=>'Xóa bài viết thất bại'));
    }
