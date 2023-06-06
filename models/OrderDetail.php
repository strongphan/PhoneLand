<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Phoneland/models/Model.php");
class OrderDetail extends Model {
    public function insertData($infos){
        $sql_insert = "insert into order_details(order_id, product_name, product_price, quantity)
        values(:order_id, :product_name, :product_price, :quantity) ";
        $obj_insert = $this->conn->prepare($sql_insert);
        $inserts = [
            ':order_id' => $infos['order_id'],
            ':product_name' => $infos['product_name'],
            ':product_price' => $infos['product_price'],
            ':quantity' => $infos['quantity']
        ];
        return $obj_insert->execute($inserts);
    }
}