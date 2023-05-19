<?php
    header("Access-Control-Allow-Origin: *");
    include_once("../../models/OrderModel.php");

    $order = new OrderModel();
    $order->id = isset($_GET['id']) ? $_GET['id'] : "null";
    $stmt = $order->getById($order->id);

    $num = $stmt -> rowCount();

    if ($num > 0) {
        $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $order_info = [
            "status" => "success",
            "data" => $data
        ];
    } else {
        $order_info = [
            "status" => "fail",
            "message" => "No order found."
        ];
    }

    echo json_encode($order_info);
?>

