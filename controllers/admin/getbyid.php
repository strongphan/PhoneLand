<?php
include_once("../Controller.php");
include_once("../../models/AdminModel.php");
$admin = new AdminModel();
$admin->id = isset($_GET['id']) ? $_GET['id'] : die();
$admin->getById($_GET['id']);
$admin_info = array(

    'id' => $admin->id,
    'adminname' => $admin->adminname,
    'role' => $admin->role,
    'password' => $admin->password,
    'fist_name' => $admin->fist_name,
    'last_name' => $admin->last_name,
    'phone' => $admin->phone,
    'address' => $admin->address,
    'email' => $admin->email,
    'avatar' => $admin->avatar,
    'last_login' => $admin->last_login,
    'status' => $admin->status,
    'create_at' => $admin->created_at,
    'update_at' => $admin->updated_at

);