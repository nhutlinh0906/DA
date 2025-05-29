<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/user.php');

$db = new database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$user = new user ($conn);
$read = $user->read();

$num = $read->rowCount();

if ($num > 0) 
{
    $user_aray = []; // Khởi tạo mảng trống để chứa dữ liệu
    while ($row = $read->fetch(PDO::FETCH_ASSOC))
     {
        extract($row);

        $user_item = array(
            'id_user ' => $id_user ,
            'phone_user' => $phone_user,
            'name_user' => $name_user,
            'password_user' => $password_user,
            'email_user' => $email_user,
            'avata_user' => $avata_user,
            'address_user' => $address_user,
            'hobbi_user ' => $hobbi_user ,
            'gender_user' => $gender_user,
            'status_user' => $status_user,
            'data_create_user' => $data_create_user,
            'data_update_user' => $data_update_user,
            
        );
        array_push($user_aray, $user_item); // Thêm pet_item vào mảng
    }
    echo json_encode($user_aray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>
