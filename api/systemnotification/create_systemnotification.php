<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/systemnotification.php');
    $db = new database();
    $conn = $db->Connect(); // Lấy kết nối PDO

    // Khởi tạo lớp Pet với kết nối PDO
    $systemnotification = new systemnotification ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    //$systemnotification->id_systemnotification =$data->id_systemnotification;   
    $systemnotification->title_systemnotification =$data->title_systemnotification;
    $systemnotification->content_systemnotification =$data->content_systemnotification;
    $systemnotification->type_systemnotification =$data->type_systemnotification;
    $systemnotification->id_user =$data->id_user ;
    $systemnotification->time_systemnotification =$data->time_systemnotification;
    $systemnotification->status_systemnotification =$data->status_systemnotification;
    $systemnotification->id_create_systemnotification =$data->id_create_systemnotification;
    $systemnotification->date_systemnotification =$data->date_systemnotification;
    
    // Gọi hàm thêm mới bình luận đánh giá
    if ($systemnotification->create()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data create.'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not create'));
    }
    

?>
