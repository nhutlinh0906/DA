<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/message.php');

$db = new Database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$message = new message($conn);

$message->id_message  = isset($_GET['id']) ? $_GET['id']: die();
//nếu có $_GET['id'] lấy, không có die

$message->show();

$message_item = array(
            'id_message'=> $message->id_message  ,
            'id_user'=> $message->id_user ,
            'support_message'=> $message->support_message,
            'content_message'=> $message->content_message,
            'type_message'=> $message->type_message,
            'file_message'=> $message->file_message ,
            'read_message'=> $message->read_message,
            'date_message'=> $message->date_message,
            

        );
 print_r(json_encode($message_item))

?>
