<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once("../../config/config.php");
    include_once("../../models/CategoryModel.php");

    $q = isset($_GET['q']) ? $_GET['q'] : "null";
    $l = isset($_GET['l']) ? $_GET['l'] : "null";
    if($q == null) {
    	$categorys = [
            "status" => "fail",
            "message" => "No admin found."
        ];
    }
    else {
	    $model = new CategoryModel();
	    $stmt = $model->search($q, $l);
	    $num = $stmt -> rowCount();
	    if ($num > 0) {
	        $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
	        $categorys = [
	            "status" => "success",
	            "data" => $data
	        ];
	    } else {
	        $categorys = [
	            "status" => "fail",
	            "message" => "No admin found."
	        ];
	    }
    }
    echo json_encode($categorys);

?>