<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Phoneland/models/Model.php");

class CategoryModel extends Model{
    public $id;
    public $admin_id;
    public $name;
    public $type;
    public $avatar;
    public $des;
    public $status;
    public $created_at;
    public $updated_at;
    public function __construct(){
        parent::__construct();
    }
    public function getAll(){
        $query = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }    
    public function getById($id){
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function create(){
        $query = "INSERT INTO categories(admin_id, name, type, avatar, description, status, updated_at)
VALUES(:admin_id, :name, :type, :avatar, :description, :status, :updated_at)";
        $stmt = $this->conn->prepare($query);
        $this->admin_id = htmlspecialchars(strip_tags($this->admin_id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->des = htmlspecialchars(strip_tags($this->des));
        $this->avatar = htmlspecialchars(strip_tags($this->avatar));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->updated_at =  htmlspecialchars(strip_tags($this->updated_at));

        $stmt->bindParam(':admin_id', $this->admin_id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':avatar', $this->avatar);
        $stmt->bindParam(':description', $this->des);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':updated_at', $this->updated_at);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function update($id){
        $query = "UPDATE categories SET
                name = :name,  
                type = :type, 
                avatar = :avatar, 
                description = :description, 
                status = :status, 
                updated_at = :updated_at
                Where id=:id";

        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->des = htmlspecialchars(strip_tags($this->des));
        $this->avatar = htmlspecialchars(strip_tags($this->avatar));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->updated_at =  htmlspecialchars(strip_tags($this->updated_at));

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':avatar', $this->avatar);
        $stmt->bindParam(':description', $this->des);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':updated_at', $this->updated_at);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function delete($id){
        $query = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function search($query, $limit)
    {
        $sql = "SELECT * FROM categories WHERE name LIKE :query LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':query', "%$query%", PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
}