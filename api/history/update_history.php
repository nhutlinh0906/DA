<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/history.php');

    $database = new Database();
    $conn = $database->Connect(); // Lấy kết nối PDO

   // Khởi tạo lớp Pet với kết nối PDO
   $history = new history ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    $history->id_history = $data->id_history  ;
    $history->id_user = $data->id_user ;
    $history->id_locationn = $data->id_locationn;
    $history->date_history = $data->date_history;
    $history->time_history = $data->time_history;
    $history->note_history = $data->note_history;
    $history->evaluate_history = $data->evaluate_history ;
    $history->image_history = $data->image_history;
    $history->creat_history = $data->creat_history;
    
    // Gọi hàm thêm mới bình luận đánh giá
    if ($history->update()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data updated'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not updated'));
    }




?>