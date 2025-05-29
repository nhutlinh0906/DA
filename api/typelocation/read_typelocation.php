<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/typelocation.php');

$db = new database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$typelocation = new typelocation ($conn);
$read = $typelocation->read();

$num = $read->rowCount();

if ($num > 0) 
{
    $typelocation_aray = []; // Khởi tạo mảng trống để chứa dữ liệu
    while ($row = $read->fetch(PDO::FETCH_ASSOC))
     {
        extract($row);

        $typelocation_item = array(
            'id_typelocation'=> $id_typelocation ,
            'name_typelocation'=> $name_typelocation ,
            'describe_typelocation'=> $describe_typelocation,
            'icon_typelocation'=> $icon_typelocation,
            'id_locationn'=> $id_locationn ,
            'status_typelocation'=> $status_typelocation,
            'update_typelocation'=> $update_typelocation,
                      
        );
        array_push($typelocation_aray, $typelocation_item); // Thêm pet_item vào mảng
    }
    echo json_encode($typelocation_aray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>
