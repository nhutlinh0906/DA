<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/history.php');

$db = new database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$history = new history ($conn);
$read = $history->read();

$num = $read->rowCount();

if ($num > 0) 
{
    $history_aray = []; // Khởi tạo mảng trống để chứa dữ liệu
    while ($row = $read->fetch(PDO::FETCH_ASSOC))
     {
        extract($row);

        $history_item = array(
            'id_history' => $id_history,
            'id_user' => $id_user,
            'id_locationn' => $id_locationn,
            'date_history' => $date_history,
            'time_history' => $time_history,
            'note_history' => $note_history,
            'evaluate_history' => $evaluate_history,
            'image_history' => $image_history ,
            'creat_history' => $creat_history,
            
            
        );
        array_push($history_aray, $history_item); // Thêm pet_item vào mảng
    }
    echo json_encode($history_aray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>
