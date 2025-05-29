<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/history.php');

$db = new Database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$history = new history($conn);

$history->id_history  = isset($_GET['id']) ? $_GET['id']: die();
//nếu có $_GET['id'] lấy, không có die

$history->show();

$history_item = array(
            'id_history ' => $history->id_history ,
            'id_user ' => $history->id_user ,
            'id_locationn' => $history->id_locationn,
            'date_history' => $history->date_history,
            'time_history' => $history->time_history,
            'note_history ' => $history->note_history ,
            'evaluate_history' => $history->evaluate_history,
            'image_history' => $history->image_history,
            'creat_history' => $history->creat_history,

        );
 print_r(json_encode($history_item))

?>
