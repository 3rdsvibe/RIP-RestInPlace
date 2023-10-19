<?php
require_once 'connection.php'; // เชื่อมต่อกับฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $commentscore = $_GET["score"];
    $commentText = $_GET["comment"]; // รับคอมเมนต์จากฟอร์ม

    // ทำการบันทึกคอมเมนต์ลงในฐานข้อมูล (ตัดส่วนนี้ต้องเขียนอย่างถูกต้องตามโครงสร้างของฐานข้อมูลของคุณ)
    $insertCommentQuery = "INSERT INTO comments (comment_score,comment_description,hotel_id,customer_id) VALUES ('$score','$commentText', '1', '')";
    $result = $conn->query($insertCommentQuery);

    if ($result) {
        echo "บันทึกคอมเมนต์สำเร็จ";
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึกคอมเมนต์: " . $conn->error;
    }
}

// หลังจากบันทึกคอมเมนต์แล้วให้รีเดิมหน้าเว็บเพื่อแสดงคอมเมนต์ที่อัปเดต
header('Location: each_hotel.php'); 
?>
