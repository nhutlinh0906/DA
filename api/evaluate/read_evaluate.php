<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/evaluate.php');

$db = new database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$evaluate = new evaluate ($conn);
$read = $evaluate->read();

$num = $read->rowCount();

if ($num > 0) 
{
    $evaluate_aray = []; // Khởi tạo mảng trống để chứa dữ liệu
    while ($row = $read->fetch(PDO::FETCH_ASSOC))
     {
        extract($row);

        $evaluate_item = array(
            'id_evaluate' => $id_evaluate,
            'id_user' => $id_user,
            'id_location' => $id_location,
            'point_evaluate' => $point_evaluate,
            'content_evaluate' => $content_evaluate,
            'image_evaluate' => $image_evaluate,
            'likes_evaluate' => $likes_evaluate,
            'feedback_evaluate' => $feedback_evaluate ,
            'useful_evaluate' => $useful_evaluate,
            'reported_evaluate' => $reported_evaluate,
            'reporting_evaluate' => $reporting_evaluate,
            'censorship_status_evaluate' => $censorship_status_evaluate,
            'Update_evaluate' => $Update_evaluate,
            
        );
        array_push($evaluate_aray, $evaluate_item); // Thêm pet_item vào mảng
    }
    echo json_encode($evaluate_aray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>
