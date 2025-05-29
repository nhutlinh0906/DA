<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/message.php');

    $database = new Database();
    $conn = $database->Connect(); // Lấy kết nối PDO

   // Khởi tạo lớp Pet với kết nối PDO
   $message = new message ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    $message->id_message = $data->id_message;
    $message->id_user = $data->id_user;
    $message->support_message = $data->support_message;
    $message->content_message = $data->content_message;
    $message->type_message = $data->type_message   ;
    $message->file_message = $data->file_message;
    $message->read_message = $data->read_message ;
    $message->date_message = $data->date_message;

    // Gọi hàm thêm mới bình luận đánh giá
    if ($message->update()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data updated'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not updated'));
    }




?>