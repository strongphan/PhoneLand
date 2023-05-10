<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");


include_once("../../models/NewsModel.php");
$news = new NewsModel();
$data = json_decode(file_get_contents("php://input"));

$news->admin_id = $data->admin_id;
$news->category_id = $data->category_id;
$news->name = $data->name;
$news->summary = $data->summary;
$news->avatar = $data->avatar;
$news->content = $data->content;
$news->status = $data->status;
$news->avatar = $data->avatar;
$news->seo_title = $data->seo_title;
$news->seo_description =$data->seo_description;
$news->seo_keywords =$data->seo_keywordscebook;
$news->updated_at = $data->updated_at; 
if(empty($data->admin_id) || empty($data->category_id) || empty($data->name)){
    $news_info = [
        "status" => "fail",
        "message" => "Không được để trống ID admin, ID category và tên bài"
    ];
}
else{
    if($news->create()){
        $news_info = [
            "status" => "success",
            "message" => "Thêm news thành công"
        ];
    } else {
        $news_info = [
            "status" => "fail",
            "message" => "Thêm news thất bại"
        ];
    }
}

echo json_encode($news_info);