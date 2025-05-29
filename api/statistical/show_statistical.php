<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/statistical.php');

$db = new Database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$statistical = new statistical($conn);

$statistical->id_statistical  = isset($_GET['id']) ? $_GET['id']: die();
//nếu có $_GET['id'] lấy, không có die

$statistical->show();

$statistical_item = array(
            'id_statistical  '=> $statistical->id_statistical    ,
            'number_user_statistical'=> $statistical->number_user_statistical ,
            'number_locationn_statistical'=> $statistical->number_locationn_statistical,
            'number_review_statistical'=> $statistical->number_review_statistical,
            'number_responses_statistical'=> $statistical->number_responses_statistical,
            'time_statistical'=> $statistical->time_statistical ,
            'index_statistical'=> $statistical->index_statistical,
            'popular_statistical'=> $statistical->popular_statistical,
            'activity_statistical'=> $statistical->activity_statistical,
            'date_statistical'=> $statistical->date_statistical,
            
        );
 print_r(json_encode($statistical_item))

?>
