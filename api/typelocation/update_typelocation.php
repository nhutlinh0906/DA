<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/typelocation.php');

    $database = new Database();
    $conn = $database->Connect(); // Lấy kết nối PDO

   // Khởi tạo lớp Pet với kết nối PDO
   $typelocation = new typelocation ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    $typelocation->id_typelocation =$data->id_typelocation;   
    $typelocation->name_typelocation =$data->name_typelocation;
    $typelocation->describe_typelocation =$data->describe_typelocation;
    $typelocation->icon_typelocation =$data->icon_typelocation;
    $typelocation->id_locationn =$data->id_locationn ;
    $typelocation->status_typelocation =$data->status_typelocation;
    $typelocation->update_typelocation =$data->update_typelocation;
    
    // Gọi hàm thêm mới bình luận đánh giá
    if ($typelocation->update()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data updated'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not updated'));
    }




?>