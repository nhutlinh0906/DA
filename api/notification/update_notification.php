<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/notification.php');

    $database = new Database();
    $conn = $database->Connect(); // Lấy kết nối PDO

   // Khởi tạo lớp Pet với kết nối PDO
   $notification = new notification ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    $notification->id_notification =$data->id_notification ;   
    $notification->id_user =$data->id_user ;
    $notification->title_notification =$data->title_notification;
    $notification->content_notification =$data->content_notification;
    $notification->type_notification =$data->type_notification;
    $notification->id_object_notification =$data->id_object_notification;
    $notification->link_notification =$data->link_notification;
    $notification->read_notification =$data->read_notification;
    $notification->date_notification =$data->date_notification;
    
    // Gọi hàm thêm mới bình luận đánh giá
    if ($notification->update()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data updated'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not updated'));
    }




?>