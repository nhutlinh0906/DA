<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/locationn.php');

$db = new Database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$locationn = new locationn ($conn);

$locationn->id_locationn=isset($_GET['id']) ? $_GET['id']: die();
//nếu có $_GET['id'] lấy, không có die

$locationn->show();


$locationn_item = array(
            'id_locationn '=> $locationn->id_locationn   ,
            'name_locationn'=> $locationn->name_locationn ,
            'address_locationn'=> $locationn->address_locationn,
            'image_locationn'=> $locationn->image_locationn,
            'information_locationn' => $locationn->information_locationn,
            'type_locationn'=> $locationn->type_locationn,
            'map_locationn'=> $locationn->map_locationn ,
            'evaluate_locationn'=> $locationn->evaluate_locationn,
            'price_locationn'=> $locationn->price_locationn,
            'contact_locationn'=> $locationn->contact_locationn,
            'open_locationn'=> $locationn->open_locationn,
            'close_locationn'=> $locationn->close_locationn,
            'utilities_locationn'=> $locationn->utilities_locationn,
            'verified_locationn'=> $locationn->verified_locationn,
            'outstand_locationn'=> $locationn->outstand_locationn,
            'update_locationn'=> $locationn->update_locationn,      
        );
 print_r(json_encode($locationn_item))


?>