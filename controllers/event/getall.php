<?php

    include_once("../../config/config.php");
    include_once("../../models/EventModel.php");

    $event = new EventModel();
    $stmt = $event->getAll();
    $num = $stmt -> rowCount();
    if ($num > 0) {
        $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $event_info = [
            "status" => "success",
            "data" => $data
        ];
    } else {
        $event_info = [
            "status" => "fail",
            "message" => "No user found."
        ];
    }

    echo json_encode($event_info);
?>

