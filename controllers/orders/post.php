<?php
    include_once("../../models/OrderModel.php");
    $order = new OrderModel();
    $data = json_decode(file_get_contents("php://input"));

    $order->user_id = $data->user_id;
    $order->fullname = $data->fullname;
    $order->address = $data->address;
    $order->mobile = $data->mobile;
    $order->email = $data->email;
    $order->note = $data->note;
    $order->price_total = $data->price_total;
    $products = $data->products;

    if(empty($data->fullname) || empty($data->email) || empty($data->mobile) || empty($data->address)){
        $order_info = [
            "status" => "fail",
            "message" => "Không được để trống tên, email, SĐT, địa chỉ"
        ];
    } else if(!filter_var($data->email, FILTER_VALIDATE_EMAIL)){
        $order_info = [
            "status" => "fail",
            "message" => "Email không đúng định dạng"
        ];
    } else {
        // Thực hiện thêm order và lấy id của order vừa được tạo
        if($order->create()){
            $order_id = $order->id;
            // Duyệt qua từng sản phẩm trong mảng product và thêm vào bảng order_detail
            foreach($products as $product){

                $prod = $product-> product;
                $product_id = $prod -> id;
                $price = $prod -> price;
                $quantity = $product->quantity;
                // Thực hiện thêm sản phẩm vào bảng order_detail
                if(!$order->createOrderDetail($order_id, $product_id, $price, $quantity)){
                    $order_info = [
                        "status" => "fail",
                        "message" => "Thêm order detail thất bại"
                    ];
                    echo json_encode($order_info);
                    exit;
                }
            }
            $order_info = [
                "status" => "success",
                "message" => "Thêm order thành công"
            ];
        } else {
            $order_info = [
                "status" => "fail",
                "message" => "Thêm order thất bại"
            ];
        }
    }
    echo json_encode($order_info);
?>