<?php
    header("Access-Control-Allow-Origin: *");

    include_once("../../config/config.php");
    include_once("../../models/ProductModel.php");

    $product = new ProductModel();
    $n = $_GET['n'] != '' ? $_GET['n'] : null;
    $l1 = $_GET['l1'] != '' ? $_GET['l1'] : null;
    $l2 = $_GET['l2'] != '' ? $_GET['l2'] : null;
    $s = $_GET['s'] != '' ? $_GET['s'] : null;

    $stmt = $product->Search($n, $l1, $l2, $s);
    $num = $stmt -> rowCount();
    if ($num > 0) {
        $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $product_info = [
            "status" => "success",
            "data" => $data
        ];
    } else {
        $product_info = [
            "status" => "fail",
            "message" => "Không có sản phẩm."
        ];
    }

    echo json_encode($product_info);
?>

