<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/notification.php');

$db = new database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$notification = new notification ($conn);
$read = $notification->read();

$num = $read->rowCount();

if ($num > 0) 
{
    $notification_aray = []; // Khởi tạo mảng trống để chứa dữ liệu
    while ($row = $read->fetch(PDO::FETCH_ASSOC))
     {
        extract($row);

        $notification_item = array(
            'id_notification'=> $id_notification,
            'id_user'=> $id_user  ,
            'title_notification'=> $title_notification,
            'content_notification'=> $content_notification,
            'type_notification'=> $type_notification,
            'id_object_notification'=> $id_object_notification,
            'link_notification'=> $link_notification,
            'read_notification'=> $read_notification ,
            'date_notification'=> $date_notification ,
            
            
        );
        array_push($notification_aray, $notification_item); // Thêm pet_item vào mảng
    }
    echo json_encode($notification_aray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>
