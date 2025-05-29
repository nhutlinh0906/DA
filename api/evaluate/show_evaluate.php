<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/evaluate.php');

$db = new Database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$evaluate = new evaluate ($conn);

$evaluate->id_evaluate = isset($_GET['id']) ? $_GET['id']: die();
//nếu có $_GET['id'] lấy, không có die

$evaluate->show();


$evaluate_item = array(
            'id_evaluate' => $evaluate->id_evaluate  ,
            'id_user' => $evaluate->id_user ,
            'id_location' => $evaluate->id_location,
            'point_evaluate' => $evaluate->point_evaluate,
            'content_evaluate' => $evaluate->content_evaluate,
            'image_evaluate' => $evaluate->image_evaluate,
            'likes_evaluate' => $evaluate->likes_evaluate ,
            'feedback_evaluate' => $evaluate->feedback_evaluate,
            'useful_evaluate' => $evaluate->useful_evaluate,
            'reported_evaluate' => $evaluate->reported_evaluate,
            'reporting_evaluate' => $evaluate->reporting_evaluate,
            'censorship_status_evaluate' => $evaluate->censorship_status_evaluate,
            'Update_evaluate' => $evaluate->Update_evaluate,
        );
 print_r(json_encode($evaluate_item))


?>