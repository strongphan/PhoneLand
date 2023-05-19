<?php
header("Access-Control-Allow-Origin: *");
    include_once("../../models/ProductModel.php");

    $product = new ProductModel();
    $stmt = $product->getAll();
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

