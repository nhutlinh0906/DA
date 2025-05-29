<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/statistical.php');

    $database = new Database();
    $conn = $database->Connect(); // Lấy kết nối PDO

   // Khởi tạo lớp Pet với kết nối PDO
   $statistical = new statistical ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    $statistical->id_statistical =$data->id_statistical;   
    $statistical->number_user_statistical =$data->number_user_statistical;
    $statistical->number_locationn_statistical =$data->number_locationn_statistical;
    $statistical->number_review_statistical =$data->number_review_statistical;
    $statistical->email_number_responses_statisticaluser =$data->number_responses_statistical;
    $statistical->time_statistical =$data->time_statistical;
    $statistical->index_statistical =$data->index_statistical;
    $statistical->popular_statistical =$data->popular_statistical;
    $statistical->activity_statistical =$data->activity_statistical;
    $statistical->date_statistical =$data->date_statistical;
    // Gọi hàm thêm mới bình luận đánh giá
    if ($statistical->update()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data updated'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not updated'));
    }




?>