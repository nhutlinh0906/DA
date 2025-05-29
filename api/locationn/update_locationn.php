<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/locationn.php');

    $database = new Database();
    $conn = $database->Connect(); // Lấy kết nối PDO

   // Khởi tạo lớp Pet với kết nối PDO
   $locationn = new locationn ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    $locationn->id_locationn = $data->id_locationn  ;
    $locationn->name_locationn = $data->name_locationn;
    $locationn->address_locationn = $data->address_locationn;
    $locationn->image_locationn = $data->image_locationn;
    $locationn->information_locationn = $data->information_locationn;
    $locationn->type_locationn = $data->type_locationn;
    $locationn->map_locationn = $data->map_locationn ;
    $locationn->evaluate_locationn = $data->evaluate_locationn;
    $locationn->price_locationn = $data->price_locationn;
    $locationn->contact_locationn = $data->contact_locationn;
    $locationn->open_locationn = $data->open_locationn;
    $locationn->close_locationn = $data->close_locationn;
    $locationn->utilities_locationn = $data->utilities_locationn;
    $locationn->verified_locationn = $data->verified_locationn;
    $locationn->outstand_locationn = $data->outstand_locationn;
    $locationn->update_locationn = $data->update_locationn;
    
    // Gọi hàm thêm mới bình luận đánh giá
    if ($locationn->update()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data updated'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not updated'));
    }




?>