<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/systemnotification.php');

$db = new Database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$systemnotification = new systemnotification($conn);

$systemnotification->id_systemnotification = isset($_GET['id']) ? $_GET['id']: die();
//nếu có $_GET['id'] lấy, không có die

$systemnotification->show();

$systemnotification_item = array(
            'id_systemnotification  '=> $systemnotification->id_systemnotification    ,
            'title_systemnotification'=> $systemnotification->title_systemnotification ,
            'content_systemnotification'=> $systemnotification->content_systemnotification,
            'type_systemnotification'=> $systemnotification->type_systemnotification,
            'id_user '=> $systemnotification->id_user,
            'time_systemnotification'=> $systemnotification->time_systemnotification ,
            'status_systemnotification'=> $systemnotification->status_systemnotification,
            'id_create_systemnotification'=> $systemnotification->id_create_systemnotification,
            'date_systemnotification'=> $systemnotification->date_systemnotification,            

        );
 print_r(json_encode($systemnotification_item))

?>
