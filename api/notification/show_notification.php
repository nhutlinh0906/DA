<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/notification.php');

$db = new Database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$notification = new notification($conn);

$notification->id_notification = isset($_GET['id']) ? $_GET['id']: die();
//nếu có $_GET['id'] lấy, không có die

$notification->show();

$notification_item = array(
            'id_notification '=> $notification->id_notification   ,
            'id_user'=> $notification->id_user ,
            'title_notification'=> $notification->title_notification,
            'content_notification'=> $notification->content_notification,
            'type_notification'=> $notification->type_notification,
            'id_object_notification'=> $notification->id_object_notification ,
            'link_notification'=> $notification->link_notification,
            'read_notification'=> $notification->read_notification,
            'date_notification'=> $notification->date_notification,
            

        );
 print_r(json_encode($notification_item))

?>
