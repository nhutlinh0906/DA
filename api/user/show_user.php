<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/user.php');

$db = new Database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$user = new user ($conn);

$user->id_user = isset($_GET['id']) ? $_GET['id']: die();
//nếu có $_GET['id'] lấy, không có die

$user->show();


$user_item = array(
            'id_user ' => $user->id_user ,
            'phone_user' => $user->phone_user,
            'name_user' => $user->name_user,
            'password_user' => $user->password_user,
            'email_user' => $user->email_user,
            'avata_user' => $user->avata_user,
            'address_user ' => $user->address_user ,
            'hobbi_user' => $user->hobbi_user,
            'gender_user' => $user->gender_user,
            'status_user' => $user->status_user,
            'data_create_user' => $user->data_create_user,
            'data_update_user' => $user->data_update_user,
        );
 print_r(json_encode($user_item))

 

 


?>