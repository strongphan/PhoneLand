<?php
header("Access-Control-Allow-Origin: *");

    include_once("../../models/CustomerModel.php");

    $customer = new CustomerModel();
    $stmt = $customer->getAll();
    $num = $stmt -> rowCount();
    if ($num > 0) {
        $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $customer_info = [
            "status" => "success",
            "data" => $data
        ];
    } else {
        $customer_info = [
            "status" => "fail",
            "message" => "No user found."
        ];
    }

    echo json_encode($customer_info);
?>

