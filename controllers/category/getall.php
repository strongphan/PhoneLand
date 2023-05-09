<?php

    include_once("../../config/config.php");
    include_once("../../models/CategoryModel.php");

    $category = new CategoryModel();
    $stmt = $category->getAll();
    $num = $stmt -> rowCount();
    if ($num > 0) {
        $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $category_info = [
            "status" => "success",
            "data" => $data
        ];
    } else {
        $category_info = [
            "status" => "fail",
            "message" => "Không có danh mục."
        ];
    }

    echo json_encode($category_info);
?>

