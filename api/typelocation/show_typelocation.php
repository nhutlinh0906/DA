<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/typelocation.php');

$db = new Database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$typelocation = new typelocation($conn);

$typelocation->id_typelocation = isset($_GET['id']) ? $_GET['id']: die();
//nếu có $_GET['id'] lấy, không có die

$typelocation->show();

$typelocation_item = array(
            'id_typelocation '=> $typelocation->id_typelocation   ,
            'name_typelocation'=> $typelocation->name_typelocation ,
            'describe_typelocation'=> $typelocation->describe_typelocation,
            'icon_typelocation'=> $typelocation->icon_typelocation,
            'id_locationn '=> $typelocation->id_locationn ,
            'status_typelocation'=> $typelocation->status_typelocation ,
            'update_typelocation'=> $typelocation->update_typelocation,
            
        );
 print_r(json_encode($typelocation_item))

?>
