<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/evaluate.php');
    $db = new database();
    $conn = $db->Connect(); // Lấy kết nối PDO

    // Khởi tạo lớp Pet với kết nối PDO
    $evaluate = new evaluate ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    $evaluate->id_evaluate =$data->id_evaluate;
    $evaluate->id_user =$data->id_user ;
    $evaluate->id_location =$data->id_location ;
    $evaluate->point_evaluate =$data->point_evaluate;
    $evaluate->content_evaluate =$data->content_evaluate;
    $evaluate->image_evaluate =$data->image_evaluate;
    $evaluate->likes_evaluate =$data->likes_evaluate;
    $evaluate->feedback_evaluate =$data->feedback_evaluate;
    $evaluate->useful_evaluate =$data->useful_evaluate;
    $evaluate->reported_evaluate =$data->reported_evaluate;
    $evaluate->reporting_evaluate =$data->reporting_evaluate;
    $evaluate->censorship_status_evaluate =$data->censorship_status_evaluate;
    $evaluate->Update_evaluate =$data->Update_evaluate;
    
    
    // Gọi hàm thêm mới bình luận đánh giá
    if ($evaluate->create()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data create.'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not create'));
    }

?>