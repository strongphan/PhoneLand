<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");


include_once("../../models/EventModel.php");
$event = new EventModel();
$data = json_decode(file_get_contents("php://input"));
$event->id = $data->id;
$event->category_id = $data->category_id;
$event->image_event = $data->image_event;
$event->description = $data->description;

if( empty($data->category_id)){
    $customer_info = [
        "status" => "fail",
        "message" => "Không được để trống category ID"
    ];
}else{
    if($event->update($event->id)){
        $event_info = [
            "status" => "success",
            "message" => "sửa thông tin event thành công"
        ];
    } else {
        $event_info = [
            "status" => "fail",
            "message" => "Sửa thông tin event thất bại"
        ];
    }
}

echo json_encode($event_info);