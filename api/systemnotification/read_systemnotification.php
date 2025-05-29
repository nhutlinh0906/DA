<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/systemnotification.php');

$db = new database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$systemnotification = new systemnotification ($conn);
$read = $systemnotification->read();

$num = $read->rowCount();

if ($num > 0) 
{
    $systemnotification_aray = []; // Khởi tạo mảng trống để chứa dữ liệu
    while ($row = $read->fetch(PDO::FETCH_ASSOC))
     {
        extract($row);

        $systemnotification_item = array(

            'id_systemnotification '=> $id_systemnotification ,
            'title_systemnotification'=> $title_systemnotification  ,
            'content_systemnotification'=> $content_systemnotification,
            'type_systemnotification'=> $type_systemnotification,
            'id_user'=> $id_user ,
            'time_systemnotification'=> $time_systemnotification,
            'status_systemnotification'=> $status_systemnotification,
            'id_create_systemnotification'=> $id_create_systemnotification ,
            'date_systemnotification'=> $date_systemnotification ,       
            
        );
        array_push($systemnotification_aray, $systemnotification_item); // Thêm pet_item vào mảng
    }
    echo json_encode($systemnotification_aray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>
