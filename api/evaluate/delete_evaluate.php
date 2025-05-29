<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/evaluate.php');

    $database = new Database();
    $conn = $database->Connect(); // Lấy kết nối PDO

   // Khởi tạo lớp Pet với kết nối PDO
   $evaluate = new evaluate ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    $evaluate->id_evaluate = $data->id_evaluate;
   
    // Gọi hàm thêm mới bình luận đánh giá
    if ($evaluate->delete()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data deleted'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not deleted'));
    }




?>