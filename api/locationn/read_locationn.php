<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/locationn.php');

$db = new database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$locationn = new locationn ($conn);
$read = $locationn->read();

$num = $read->rowCount();

if ($num > 0) 
{
    $locationn_aray = []; // Khởi tạo mảng trống để chứa dữ liệu
    while ($row = $read->fetch(PDO::FETCH_ASSOC))
     {
        extract($row);

        $locationn_item = array(
            'id_locationn'=> $id_locationn ,
            'name_locationn'=> $name_locationn,
            'address_locationn'=> $address_locationn,
            'image_locationn'=> $image_locationn,
            'information_locationn'=> $information_locationn,
            'type_locationn'=> $type_locationn,
            'map_locationn'=> $map_locationn,
            'evaluate_locationn'=> $evaluate_locationn ,
            'price_locationn'=> $price_locationn,
            'contact_locationn'=> $contact_locationn,
            'open_locationn'=> $open_locationn,
            'close_locationn'=> $close_locationn,
            'utilities_locationn'=> $utilities_locationn,
            'verified_locationn'=> $verified_locationn,
            'outstand_locationn'=> $outstand_locationn,
            'update_locationn'=> $update_locationn,
            
        );
        array_push($locationn_aray, $locationn_item); // Thêm pet_item vào mảng
    }
    echo json_encode($locationn_aray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>
