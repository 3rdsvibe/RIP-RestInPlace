

<?php 
//เชื่อมเข้าฐานข้อมูล
    session_start();
    include('server.php');
    include('login.php');

    //ทำarray เก็บค่า errorต่างๆของ user
    $errors = array();

    //check เงื่อนไขต่างๆ
    if (isset($_POST['customer'])){
        $email = mysqli_real_escape_string($conn, $_POST['customer_email']);
        $password = mysqli_real_escape_string($conn, $_POST['customer_password']);
        
        if (empty($email)) {
            array_push($errors, "กรุณากรอกอีเมล");
        }

        if (empty($password)) {
            array_push($errors, "กรุณากรอกรหัส");
        }

        if (isset($_POST['manager'])){
            $email = mysqli_real_escape_string($conn, $_POST['manager_email']);
            $password = mysqli_real_escape_string($conn, $_POST['manager_password']);
            
            if (empty($email)) {
                array_push($errors, "กรุณากรอกอีเมล");
            }
    
            if (empty($password)) {
                array_push($errors, "กรุณากรอกรหัส");
            }
    
            //ถ้าไม่มีerrorด้านบน เชคว่ารหัสตรงกับที่สมัครมาไหม เชคในฐานข้อมูล
            if (count($errors) == 0) {
                $password = md5($password);
                $query = "SELECT * FROM manager WHERE manager_password = '$password', manager_email = '$email' ";
                $result = mysqli_query($conn, $query);
    
                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['email'] = $email;
                    $_SESSION['success'] = 'ยินดีตอนรับเข้าสู่ระบบ';
                   header("location: http://localhost/Project/UI4/");
                }
                else {
                    array_push($errors, "อีเมล/รหัสไม่ถูกต้อง");
                    $_SESSION['error'] = "อีเมล/รหัสไม่ถูกต้อง กรุณากรอกใหม่อีกครั้งค่ะ";
                   header("location: index.php");
                
                }
    
            }
        }
    }

?>