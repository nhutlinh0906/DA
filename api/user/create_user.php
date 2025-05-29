<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/user.php');
    $db = new database();
    $conn = $db->Connect(); // Lấy kết nối PDO

    // Khởi tạo lớp Pet với kết nối PDO
    $user = new user ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    $user->id_user =$data->id_user;   
    $user->phone_user =$data->phone_user;
    $user->name_user =$data->name_user;
    $user->password_user =$data->password_user;
    $user->email_user =$data->email_user;
    $user->avata_user =$data->avata_user;
    $user->address_user	 =$data->address_user;
    $user->hobbi_user =$data->hobbi_user;
    $user->gender_user =$data->gender_user;
    $user->status_user =$data->status_user;
    $user->data_create_user =$data->data_create_user;
    $user->data_update_user =$data->data_update_user;
    
    
    // Gọi hàm thêm mới bình luận đánh giá
    if ($user->create()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data create.'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not create'));
    }

?>