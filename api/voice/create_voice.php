<?php


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../model/voice.php');
    $db = new database();
    $conn = $db->Connect(); // Lấy kết nối PDO

    // Khởi tạo lớp Pet với kết nối PDO
    $voice = new voice ($conn);
    // Lấy dữ liệu JSON được gửi từ client
    $data = json_decode(file_get_contents("php://input"));


    // Gán dữ liệu cho các thuộc tính của đối tượng
    $voice->id_voice =$data->id_voice;   
    $voice->id_user =$data->id_user;
    $voice->content_voice =$data->content_voice;
    $voice->file_voice =$data->file_voice;
    $voice->transcription_voice =$data->transcription_voice;
    $voice->result_voice =$data->result_voice;
    $voice->odertype_voice =$data->odertype_voice;
    $voice->reliability_voice =$data->reliability_voice;
    $voice->language_voice =$data->language_voice;
    $voice->imformation_voice =$data->imformation_voice;
    $voice->date_voice =$data->date_voice;
   
    // Gọi hàm thêm mới bình luận đánh giá
    if ($voice->create()) {
        // Nếu thêm thành công
        echo json_encode(array('message' => 'user data create.'));
    } else {
        // Nếu thêm thất bại
        echo json_encode(array('message' => 'user data not create'));
    }

?>