<?php
<<<<<<< HEAD
include_once '../../config/config.php';
=======
include_once("../../config/config.php");
>>>>>>> 9abddbe71a54e1c6bc5ed6ed0f4023fd6cb630c0
class Model{
    public $conn;
    public function __construct(){
        $db = new db();
        $this->conn = $db->connect();
    }
}