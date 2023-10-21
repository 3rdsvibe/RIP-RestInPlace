<?php
$servername = "localhost";
$username = "root"; //ตามที่กำหนดให้
$password = ""; //ตามที่กำหนดให้
$dbname = "rest_in_places";    //ตามที่กำหนดให้
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

session_start();
$username = $_SESSION['username'];

$bank = $_POST['checkbox_name'];
$bank = implode(",", $bank);
$num_bank = $_POST['bank_number'];

$sqlnumbank = "UPDATE partner SET bank_number='$num_bank' WHERE partner_email='$username'";
$sqlcatebank = "UPDATE partner SET bank='$bank' WHERE partner_email='$username'";



if ($conn->query($sqlnumbank) == TRUE AND $conn->query($sqlcatebank) == TRUE) {
    echo "อัปเดตข้อมูลเรียบร้อย";
} else {
    echo "ข้อผิดพลาดในการอัปเดตข้อมูล: " . $conn->error;
}

// close connection
mysqli_close($conn);
?>