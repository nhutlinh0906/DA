<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/message.php');

$db = new database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$message = new message ($conn);
$read = $message->read();

$num = $read->rowCount();

if ($num > 0) 
{
    $message_aray = []; // Khởi tạo mảng trống để chứa dữ liệu
    while ($row = $read->fetch(PDO::FETCH_ASSOC))
     {
        extract($row);

        $message_item = array(
            'id_message '=> $id_message,
            'id_user '=> $id_user ,
            'support_message'=> $support_message,
            'content_message'=> $content_message,
            'type_message'=> $type_message,
            'file_message'=> $file_message,
            'read_message'=> $read_message,
            'date_message'=> $date_message ,
            
            
        );
        array_push($message_aray, $message_item); // Thêm pet_item vào mảng
    }
    echo json_encode($message_aray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>
