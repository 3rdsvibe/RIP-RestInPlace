<?php
// นำเข้าไฟล์เชื่อมต่อกับฐานข้อมูล
require_once 'connection.php';

// รับข้อมูลที่ส่งมาจากหน้าค้นหา
$going_to = $_POST["going_to"];
$fdate = $_POST["fdate"];
$ldate = $_POST["ldate"];
$quantityRoom = $_POST["quantityRoom"];
$quantityAdults = $_POST["quantityAdults"];
// ตามวันที่เช็คอิน, เช็คเอาท์, จำนวนห้อง, และ จำนวนผู้เข้าพัก ขาดเพิ่มจังหวัด
//$sql = "SELECT * FROM hotel WHERE hotel_status='1' join rooms using(hotel_id) join locations using(hotel_id) join booking  using(hotel_id) where province = $going_to and room_numtotal-num_room >= $quantityRoom and room_status='1' and $quantityAdults <= $quantityRoom*max_person ";

// ตรวจสอบและสร้างคำสั่ง SQL ในตัวแปร $sql
$sql = "SELECT * FROM hotel 
        JOIN rooms ON hotel.hotel_id = rooms.hotel_id 
        JOIN locations ON hotel.hotel_id = locations.hotel_id 
        WHERE hotel.hotel_status = '1' 
        AND rooms.room_status = '1' 
        AND rooms.room_numtotal >= $quantityRoom 
        AND $quantityAdults <= $quantityRoom * rooms.max_person 
        AND locations.province = '$going_to' 
        AND rooms.room_id NOT IN (
            SELECT room_id 
            FROM booking 
            WHERE ('$fdate' BETWEEN check_in_time AND check_out_time)
            OR ('$ldate' BETWEEN check_in_time AND check_out_time)
        )";

// ส่งคำสั่ง SQL ไปยังฐานข้อมูล
$result = $conn->query($sql);

// ตรวจสอบและแสดงรายการโรงแรมที่มีห้องว่าง
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // แสดงข้อมูลของโรงแรมที่ตรงเกณฑ์
        echo '<div class="hotel-entry">';
        echo '<img src="' . $row["photo_url"] . '" width="300px" height="180px" style="border-radius: 20px 20px 0px 0px;">';
        echo '<p>' . $row["hotel_name"] . '</p>';
        echo '<p>' . $row["address"] . '</p>';
        echo '<p>ราคาเริ่มต้น (ต่อคืน): THB ' . $row["room_price"] . '</p>';
        echo '</div>';
    }
} else {
    // ถ้าไม่มีโรงแรมที่ตรงเกณฑ์
    echo '<p>ขออภัย ไม่มีโรงแรมที่ตรงเกณฑ์ในช่วงวันที่คุณเลือก</p>';
}
?>
