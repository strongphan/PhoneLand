<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Phoneland/models/Model.php");
class CustomerModel extends Model{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $address;
    public $email;
    public $avatar;
    public $jobs;
    public $last_login;
    public $facebook;
    public $status;
    public $created_at;
    public $updated_at;

    public function __construct(){
        parent::__construct();
    }
    public function getById($id){
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function getAll(){
        $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }    
    public function countusername($name){
        $query = "SELECT count(*) as count FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $name, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    
    public function create(){
        $query = "INSERT INTO users(username, password,   first_name, last_name, phone, address, email, avatar, jobs, last_login, facebook, status, updated_at)
VALUES(:username, :password, :first_name, :last_name, :phone, :address, :email, :avatar, :jobs, :last_login, :facebook, :status, :updated_at)";
        $stmt = $this->conn->prepare($query);
        $this->username =  htmlspecialchars(strip_tags($this->username));
        $this->password =   htmlspecialchars(strip_tags($this->password));
        $this->first_name =  htmlspecialchars(strip_tags($this->first_name));
        $this->last_name =  htmlspecialchars(strip_tags($this->last_name));
        $this->phone =      htmlspecialchars(strip_tags($this->phone));
        $this->address =    htmlspecialchars(strip_tags($this->address));
        $this->email =      htmlspecialchars(strip_tags($this->email));
        $this->avatar =     htmlspecialchars(strip_tags($this->avatar));
        $this->jobs =     htmlspecialchars(strip_tags($this->jobs));
        $this->last_login = htmlspecialchars(strip_tags($this->last_login));
        $this->facebook = htmlspecialchars(strip_tags($this->facebook));
        $this->status =     htmlspecialchars(strip_tags($this->status));
        $this->updated_at =  htmlspecialchars(strip_tags($this->updated_at));

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':avatar', $this->avatar);
        $stmt->bindParam(':jobs', $this->jobs);
        $stmt->bindParam(':last_login', $this->last_login);
        $stmt->bindParam(':facebook', $this->facebook);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':updated_at', $this->updated_at);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function update($id){
        $query = "UPDATE users SET
                password = :password,
                first_name = :first_name, 
                last_name = :last_name, 
                phone = :phone, 
                address = :address, 
                email = :email, 
                avatar = :avatar, 
                jobs = :jobs, 
                last_login = :last_login, 
                facebook = :facebook, 
                status = :status, 
                updated_at = :updated_at
                Where id=:id";

        $stmt = $this->conn->prepare($query);

        $this->password =   htmlspecialchars(strip_tags($this->password));
        $this->first_name =  htmlspecialchars(strip_tags($this->first_name));
        $this->last_name =  htmlspecialchars(strip_tags($this->last_name));
        $this->phone =      htmlspecialchars(strip_tags($this->phone));
        $this->address =    htmlspecialchars(strip_tags($this->address));
        $this->email =      htmlspecialchars(strip_tags($this->email));
        $this->avatar =     htmlspecialchars(strip_tags($this->avatar));
        $this->jobs =     htmlspecialchars(strip_tags($this->jobs));
        $this->last_login = htmlspecialchars(strip_tags($this->last_login));
        $this->facebook = htmlspecialchars(strip_tags($this->facebook));
        $this->status =     htmlspecialchars(strip_tags($this->status));
        $this->updated_at =  htmlspecialchars(strip_tags($this->updated_at));

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':avatar', $this->avatar);
        $stmt->bindParam(':jobs', $this->jobs);
        $stmt->bindParam(':last_login', $this->last_login);
        $stmt->bindParam(':facebook', $this->facebook);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':updated_at', $this->updated_at);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function delete($id){
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function search($query, $limit)
    {
        $sql = "SELECT * FROM users WHERE first_name LIKE :query LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':query', "%$query%", PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function getPassword($username){
        $sql = "SELECT password FROM users WHERE username =:username";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt;
    }
}