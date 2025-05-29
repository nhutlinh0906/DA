<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json; charset=UTF-8');

include_once('../../config/database.php');
include_once('../../model/voice.php');

$db = new database();
$conn = $db->Connect(); // Lấy kết nối PDO

// Khởi tạo lớp Pet với kết nối PDO
$voice = new voice ($conn);
$read = $voice->read();

$num = $read->rowCount();

if ($num > 0) 
{
    $voice_aray = []; // Khởi tạo mảng trống để chứa dữ liệu
    while ($row = $read->fetch(PDO::FETCH_ASSOC))
     {
        extract($row);

        $voice_item = array(
            'id_voice' => $id_voice  ,
            'id_user' => $id_user ,
            'content_voice' => $content_voice,
            'file_voice' => $file_voice,
            'transcription_voice' => $transcription_voice,
            'result_voice' => $result_voice,
            'odertype_voice' => $odertype_voice,
            'reliability_voice ' => $reliability_voice ,
            'language_voice' => $language_voice,
            'imformation_voice' => $imformation_voice,
            'date_voice' => $date_voice,      
        );
        array_push($voice_aray, $voice_item); // Thêm pet_item vào mảng
    }
    echo json_encode($voice_aray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>
