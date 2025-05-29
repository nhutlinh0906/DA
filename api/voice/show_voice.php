<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/voice.php');

$db = new Database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$voice = new voice ($conn);

$voice->id_voice  = isset($_GET['id']) ? $_GET['id']: die();
//nếu có $_GET['id'] lấy, không có die

$voice->show();


$voice_item = array(
            'id_voice' => $voice->id_voice  ,
            'id_user' => $voice->id_user ,
            'content_voice' => $voice->content_voice,
            'file_voice' => $voice->file_voice,
            'transcription_voice' => $voice->transcription_voice,
            'result_voice' => $voice->result_voice,
            'odertype_voice ' => $voice->odertype_voice ,
            'reliability_voice' => $voice->reliability_voice,
            'language_voice' => $voice->language_voice,
            'imformation_voice' => $voice->imformation_voice,
            'date_voice' => $voice->date_voice,
            
        );
 print_r(json_encode($voice_item))

?>