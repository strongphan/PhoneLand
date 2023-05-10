<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");


include_once("../../models/EventModel.php");
$event = new EventModel();
$data = json_decode(file_get_contents("php://input"));

$event->admin_id = $data->admin_id;
$event->category_id = $data->category_id;
$event->image_event = $data->image_event;
$event->description = $data->description;
if(empty($data->admin_id) || empty($data->category_id)){
    $event_info = [
        "status" => "fail",
        "message" => "Không được để trống admin ID  và category ID"
    ];
}
else{
    if($event->create()){
        $event_info = [
            "status" => "success",
            "message" => "Thêm event thành công"
        ];
    } else {
        $event_info = [
            "status" => "fail",
            "message" => "Thêm event thất bại"
        ];
    }
}

echo json_encode($event_info);