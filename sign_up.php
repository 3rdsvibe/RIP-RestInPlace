<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s234hgtp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$signupType = $_POST['signup_type'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$c_pass = $_POST['c_pass'];
$tel = $_POST['tel'];

// Check if the email is already in use
$emailCheckSql = "SELECT * FROM $signupType WHERE ${signupType}_email = '$email'";
$emailCheckResult = mysqli_query($conn, $emailCheckSql);

if (mysqli_num_rows($emailCheckResult) > 0) {
    $response = array('emailExists' => true, 'message' => 'อีเมลนี้ถูกใช้ไปแล้ว');
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Stop further execution
}

if ($password !== $c_pass) {
    $response = array('passwordMatch' => false, 'message' => 'รหัสผ่านไม่ตรงกัน');
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Stop further execution
}

$sql = "INSERT INTO $signupType (${signupType}_firstname, ${signupType}_lastname, ${signupType}_email, ${signupType}_password, ${signupType}_phone_num) 
        VALUES ('$fname', '$lname', '$email', '$password', '$tel')";

$result = mysqli_query($conn, $sql);

if ($result) {
    $response = array('emailExists' => false, 'passwordMatch' => true, 'message' => 'เพิ่มข้อมูลลงในฐานข้อมูลเรียบร้อยแล้ว');
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array('emailExists' => false, 'passwordMatch' => true, 'error' => 'ผิดพลาดในการเพิ่่มข้อมูล: ' . mysqli_error($conn));
    header('Content-Type: application/json');
    echo json_encode($response);
}

mysqli_close($conn);
?>
