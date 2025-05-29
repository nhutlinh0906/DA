<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/statistical.php');

$db = new database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$statistical = new statistical ($conn);
$read = $statistical->read();

$num = $read->rowCount();

if ($num > 0) 
{
    $statistical_aray = []; // Khởi tạo mảng trống để chứa dữ liệu
    while ($row = $read->fetch(PDO::FETCH_ASSOC))
     {
        extract($row);

        $statistical_item = array(
            'id_statistical '=> $id_statistical ,
            'number_user_statistical'=> $number_user_statistical  ,
            'number_locationn_statistical'=> $number_locationn_statistical,
            'number_review_statistical'=> $number_review_statistical,
            'number_responses_statistical'=> $number_responses_statistical,
            'time_statistical'=> $time_statistical,
            'index_statistical'=> $index_statistical,
            'popular_statistical'=> $popular_statistical ,
            'activity_statistical'=> $activity_statistical ,
            'date_statistical'=> $date_statistical ,
            
            
        );
        array_push($statistical_aray, $statistical_item); // Thêm pet_item vào mảng
    }
    echo json_encode($statistical_aray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>
