<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Phoneland-manh/models/Model.php");
class AdminModel extends Model{
    public $id;
    public $adminname;
    public $role;
    public $password;
    public $fist_name;
    public $last_name;
    public $phone;
    public $address;
    public $email;
    public $avatar;
    public $last_login;
    public $status;
    public $create_at;
    public $update_at;
    public function __construct(){
        parent::__construct();
    }
    public function getById($id){
        $sql = "SELECT * FROM admins WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    
    public function create(){
        $query = "INSERT INTO admins(adminname, password, role,  first_name, last_name, phone, address, email, avatar, last_login, status, create_at, update_at)
VALUES(:adminname, :password, :role, :first_name, :last_name, :phone, :address, :email, :avatar, :last_login, :status, :create_at, :update_at)";
        $stmt = $this->conn->prepare($query);
        $this->adminname =  htmlspecialchars(strip_tags($this->adminname));
        $this->role =       htmlspecialchars(strip_tags($this->role));
        $this->password =   htmlspecialchars(strip_tags($this->password));
        $this->fist_name =  htmlspecialchars(strip_tags($this->fist_name));
        $this->last_name =  htmlspecialchars(strip_tags($this->last_name));
        $this->phone =      htmlspecialchars(strip_tags($this->phone));
        $this->address =    htmlspecialchars(strip_tags($this->address));
        $this->email =      htmlspecialchars(strip_tags($this->email));
        $this->avatar =     htmlspecialchars(strip_tags($this->avatar));
        $this->last_login = htmlspecialchars(strip_tags($this->last_login));
        $this->status =     htmlspecialchars(strip_tags($this->status));
        $this->create_at =  htmlspecialchars(strip_tags($this->create_at));
        $this->update_at =  htmlspecialchars(strip_tags($this->update_at));
        $stmt->bindParam(':adminname', $this->adminname);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':first_name', $this->fist_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':avatar', $this->avatar);
        $stmt->bindParam(':last_login', $this->last_login);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':create_at', $this->create_at);
        $stmt->bindParam(':update_at', $this->update_at);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}