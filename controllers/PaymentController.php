<?php

include_once("../../models/OrderModel.php");
include_once("../../models/OrderDetail.php");
include_once("../../models/CustomerModel.php");

class PaymentController extends Controller
{
    public function index() {

        if (isset($_POST['submit'])){
            $method = $_POST['method'];

            $data = json_decode(file_get_contents("php://input"));
            $order = new OrderModel();
            $order->user_id = $data->user_id;
            $order->fullname = $data->fullname;
            $order->address = $data->address;
            $order->mobile = $data->mobile;
            $order->email = $data->email;
            $order->note = $data->note;
            $order->price_total = $data->price_total;
            $order->payment_status = $data->payment_status;
            $order->updated_at = $data->updated_at; 
            foreach ($_SESSION['cart'] as $cart_item){
                $order->price_total += $cart_item['price'] * $cart_item['quantity'];
            }
            $order_moder = new OrderModel();
            $order_id = $order_moder->create();
            foreach ($_SESSION['cart'] as $cart_item){
                $order_detail_model = new OrderDetail();
                $infos = [
                    'order_id' => $order_id,
                    'product_name' => $cart_item['name'],
                    'product_price' => $cart_item['price'],
                    'quantity' =>$cart_item['quantity']
                ];
                $is_insert = $order_detail_model->insertData($infos);
            }
            unset($_SESSION['cart']);
            if ($method == 0){
                // về trang thanh toán onl
            } else {
                // về trang cảm ơn
            }
        }
        if (isset($_SESSION['user']['id'])) {
            $id = $_SESSION['user']['id'];
            $user_model = new CustomerModel();
            $user = $user_model->getById($id);
        }

    }
}