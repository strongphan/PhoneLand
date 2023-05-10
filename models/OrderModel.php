<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Phoneland/models/Model.php");
class OrderModel extends Model{
    public $id;
    public $user_id;
    public $fullname;
    public $address;
    public $mobile;
    public $email;
    public $note;
    public $price_total;
    public $payment_status;
    public $created_at;
    public $updated_at;
    public function __construct(){
        parent::__construct();
    }
    public function getAll(){
        $query = "SELECT * FROM orders";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getByID($id){
        $query = "SELECT * FROM orders WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function getByUserID($id){
        $query = "SELECT * FROM orders WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function create(){
        $query = "INSERT INTO orders SET
            user_id = :user_id,
            fullname = :fullname, 
            address = :address,
            mobile = :mobile,
            email = :email,
            note = :note,
            price_total = :price_total,
            payment_status = :payment_status,
            updated_at = :updated_at
        ";
        $stmt = $this->conn->prepare($query);

        $this->user_id =  htmlspecialchars(strip_tags($this->user_id));
        $this->fullname =  htmlspecialchars(strip_tags($this->fullname));
        $this->address =  htmlspecialchars(strip_tags($this->address));
        $this->mobile =  htmlspecialchars(strip_tags($this->mobile));
        $this->email =  htmlspecialchars(strip_tags($this->email));
        $this->note =  htmlspecialchars(strip_tags($this->note));
        $this->price_total =  htmlspecialchars(strip_tags($this->price_total));
        $this->payment_status =  htmlspecialchars(strip_tags($this->payment_status));
        $this->updated_at =  htmlspecialchars(strip_tags($this->updated_at));

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':fullname', $this->fullname);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':mobile', $this->mobile);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':note', $this->note);
        $stmt->bindParam(':price_total', $this->price_total);
        $stmt->bindParam(':payment_status', $this->payment_status);
        $stmt->bindParam(':updated_at', $this->updated_at);
        
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function update($id){
        $query = "UPDATE orders SET
            user_id = :user_id,
            fullname = :fullname, 
            address = :address,
            mobile = :mobile,
            email = :email,
            note = :note,
            price_total = :price_total,
            payment_status = :payment_status,
            updated_at = :updated_at
            where id = :id
        ";
        $stmt = $this->conn->prepare($query);

        $this->user_id =  htmlspecialchars(strip_tags($this->user_id));
        $this->fullname =  htmlspecialchars(strip_tags($this->fullname));
        $this->address =  htmlspecialchars(strip_tags($this->address));
        $this->mobile =  htmlspecialchars(strip_tags($this->mobile));
        $this->email =  htmlspecialchars(strip_tags($this->email));
        $this->note =  htmlspecialchars(strip_tags($this->note));
        $this->price_total =  htmlspecialchars(strip_tags($this->price_total));
        $this->payment_status =  htmlspecialchars(strip_tags($this->payment_status));
        $this->updated_at =  htmlspecialchars(strip_tags($this->updated_at));

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':fullname', $this->fullname);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':mobile', $this->mobile);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':note', $this->note);
        $stmt->bindParam(':price_total', $this->price_total);
        $stmt->bindParam(':payment_status', $this->payment_status);
        $stmt->bindParam(':updated_at', $this->updated_at);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function delete($id){
        $query = "DELETE FROM orders WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function search($query, $limit)
    {
        $sql = "SELECT * FROM orders WHERE id LIKE :query LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':query', "%$query%", PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

}