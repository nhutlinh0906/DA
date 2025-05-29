<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/notification.php');

    $database = new database();
    $conn = $database->Connect(); // Lấy kết nối PDO

   // Khởi tạo lớp Pet với kết nối PDO
   $notification = new notification ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    $notification->id_notification= $data->id_notification;
   
    // Gọi hàm thêm mới bình luận đánh giá
    if ($notification->delete()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data deleted'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not deleted'));
    }




?>