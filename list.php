<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rest In Place</title>
    <!-- Bootstrap 4 CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        /*ฟอนต์ google ที่นำมาใช้*/
        @import url('https://fonts.googleapis.com/css2?family=Athiti&display=swap');

        .righttxt {
            text-align: right;
        }

        .lefttxt {
            text-align: left;
        }

        /*แถบด้านบน*/
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            height: 70px;
            background-color: #ffffff;
        }

        nav ul {
            float: right;
            background-color: #ffffff;
            display: inline;
        }

        nav ul li a:hover {
            color: #3c8f8c;
        }

        li {
            color: #59A3B4;
            text-align: center;
            font-family: 'Athiti', sans-serif;
            font-size: 24px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }

        nav ul li {
            display: inline-block;
            font-size: 19px;
            line-height: 45px;
            padding: 0 15px;
        }

        a {
            text-decoration: none;
        }

        .signup {
            width: 135px;
            height: 50px;
            flex-shrink: 0;
            font-size: 20px;
            font-family: 'Athiti', sans-serif;
            border-radius: 10px;
            border: 1px solid #59A3B4;
            background-color: #ffffff;
        }

        .signup:hover {
            background-color: #ffffff;
            color: #59A3B4;
        }

        /*จบแถบด้านบน*/

        #cover {
            background-color: #ffffff;
            text-align: center;
            width: 90%;
            height: 85%;
            flex-shrink: 0;
            border-radius: 10px;
            font-size: 20px;
            margin: auto;
        }

        body {
            font-family: 'Athiti', sans-serif;
            background-image: url("https://i.pinimg.com/564x/62/95/79/629579823c4b0f350238522d1067dfb2.jpg");
            background-size: 50%;
        }



        select {
            width: 75%;
            /* กว้างของช่อง dropdown */
            padding: 10px;
            /* ระยะห่างภายในช่อง dropdown */
            font-family: 'Athiti', sans-serif;
            font-size: 16px;
            /* ขนาดตัวอักษร */
            border: 1px solid #d3d3d3;
            /* ขอบของช่อง dropdown */
            border-radius: 3px;
            color: #000000;
            /* สีข้อความในช่อง dropdown */
        }

        select option {
            font-family: 'Athiti', sans-serif;
            font-size: 14px;
            /* ขนาดตัวอักษรของตัวเลือก */
            color: #ffffff;
            /* สีข้อความของตัวเลือก */
        }

        .fdate .ldate {
            font-family: 'Athiti', sans-serif;
        }

        .search {
            font-family: 'Athiti', sans-serif;
            background-color: #59A3B4;
            border-radius: 10px;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            width: 50%;
            height: 15%;
            flex-shrink: 0;
            color: #ffffff;
            font-size: 20px;
        }

        .flex-container {
            display: flex;
            flex-direction: row;
            /* จัดวางแบบแนวนอน */
            align-items: center;
            /* จัดให้อยู่ตรงกลางแนวตั้ง */
            flex-shrink: 0;

        }

        .cover2 {
            background-color: #ffffff;
        }

        h2 {
            text-align: center;
        }

        .where {
            font-family: 'Athiti', sans-serif;

        }

        .hotels {
            display: inline-block;

        }

        .same_line {
            display: inline-block;
        }

        #hotel_img {
            border-radius: 20px 20px 0px 0px;
            background: url(<path-to-image>), rgb(255, 255, 255) 50% / cover no-repeat;
            width: 310px;
            height: 150px;
            flex-shrink: 0;
        }

        #hotel_des {
            border-radius: 0px 0px 20px 20px;
            background: rgb(222, 222, 222);
            width: 310px;
            flex-shrink: 0;
            text-align: center;
            /* จัดให้อยู่กึ่งกลางข้อความ */
            padding: 10px;
            /* เพิ่มระยะห่างข้อความ */
            margin-top: -20px;
            /* ปรับข้อความให้อยู่ตรงกับรูปด้านล่าง */
        }

        .center {
            text-align: center;
        }

        ul li .dropdown {
            margin-left: 10px;
        }

        .tile {
            width: 80%;
            margin: 20px auto;
        }

        #tile-1 .tab-pane {
            padding: 15px;
            height: 80px;
        }

        #tile-1 .nav-tabs {
            position: relative;
            border: none !important;
            background-color: #fff;
            /*   box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2); */
            border-radius: 6px;
        }

        #tile-1 .nav-tabs li {
            margin: 0px !important;
        }

        #tile-1 .nav-tabs li a {
            position: relative;
            margin-right: 0px !important;
            padding: 20px 40px !important;
            font-size: 16px;
            border: none !important;
            color: #333;
        }

        #tile-1 .nav-tabs a:hover {
            background-color: #fff !important;
            border: none;
        }

        td,
        th {
            border-bottom: 2px solid #000;
            padding: 5px;
            text-align: left;
        }

        #tile-1 .slider {
            display: inline-block;
            width: 25px;
            height: 4px;
            border-radius: 3px;
            background-color: #39bcd3;
            position: absolute;
            z-index: 1200;
            bottom: 0;
            transition: all .4s linear;
        }

        #tile-1 .nav-tabs .active {
            background-color: transparent !important;
            border: none !important;
            color: #39bcd3 !important;
        }

        .dropdown .btn-secondary {
            background-color: white;
            color: black;
            width: 100%;

        }

        /* กำหนดขนาดของช่อง */
        input.form-control {
            width: 100%;
            /* ปรับขนาดตามที่คุณต้องการ */
            font-size: 100%;
            /* ปรับขนาดตัวอักษรตามที่คุณต้องการ */
        }

        /* กำหนดขนาดของปุ่ม plus และ minus */
        button.plusButton,
        button.minusButton {
            width: 30px;
            /* ปรับขนาดตามที่คุณต้องการ */
            height: 30px;
            /* ปรับขนาดตามที่คุณต้องการ */
            font-size: 16px;
            /* ปรับขนาดตัวอักษรตามที่คุณต้องการ */
            padding: 0;
            /* ลบขอบของปุ่ม */
        }
    </style>
</head>

<body>
    <nav>
        <a href="home.php"><img src="RIP.png" width="80px" height="80px"></a>
        <ul>
            <li>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="47" viewBox="0 0 72 62" fill="none">
                            <rect width="72" height="62" rx="10" fill="#59A3B4" />
                            <path d="M54 15H19V18.2H54V15Z" fill="white" />
                            <path d="M54 29.3999H19V32.5999H54V29.3999Z" fill="white" />
                            <path d="M54 43.7999H19V46.9999H54V43.7999Z" fill="white" />
                        </svg>
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <!--<li class="action-item"><a class="dropdown-item" href="#">การจองของฉัน</a></li>
                        <li class="another-action-item"><a class="dropdown-item" href="#">ออกจากระบบ</a></li>-->
                        <li><a class="dropdown-item" href="#">การจองของฉัน</a></li>
                        <li><a class="dropdown-item" href="#">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    <br>
    <br>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // รับอ้างอิงถึงรายการแถบ Dropdown
        var actionItem = document.querySelector(".action-item");
        var anotherActionItem = document.querySelector(".another-action-item");
        var somethingElseItem = document.querySelector(".something-else-item");

        // ซ่อนรายการแถบแรกและรายการที่สอง
        actionItem.style.display = "none";
        anotherActionItem.style.display = "none";
        somethingElseItem.style.display = 'none';

        // รับอ้างอิงถึงปุ่ม Dropdown
        var dropdownButton = document.getElementById("dropdownMenuButton");

        // สร้างตัวแปรสำหรับตรวจสอบสถานะแถบ Dropdown
        var isDropdownOpen = false;

        // เมื่อคลิกที่ปุ่ม Dropdown
        dropdownButton.addEventListener("click", function() {
            if (isDropdownOpen) {
                // ถ้าแถบ Dropdown เปิดอยู่ให้ปิด
                actionItem.style.display = "none";
                anotherActionItem.style.display = "none";
                somethingElseItem.style.display = 'none';
                isDropdownOpen = false;
            } else {
                // แสดงรายการแถบ Dropdown เมื่อคลิก
                actionItem.style.display = "block";
                anotherActionItem.style.display = "block";
                somethingElseItem.style.display = 'block';
                isDropdownOpen = true;
            }
        });
        var locationSelect = document.getElementById("locationSelect");

        // เมื่อคลิกที่ option
        locationSelect.addEventListener("change", function() {
            // ดึงค่า URL จาก option ที่เลือก
            var selectedOption = locationSelect.options[locationSelect.selectedIndex];
            var url = selectedOption.value;

            // เปิดลิงก์ไปยัง URL ที่กำหนด
            if (url) {
                window.location.href = url;
            }
        });
    </script>

<form id="cover">
    <div class="tile" id="tile-1">
        <br>
        <h2>รายการจอง</h2>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "rest_in_place";

        // เชื่อมต่อกับ MySQL
        $conn = new mysqli($servername, $username, $password, $dbname);

        // ตรวจสอบการเชื่อมต่อ
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM booking join payment on booking.booking_id = payment.booking_id join hotel on booking.hotel_id = hotel.hotel_id where booking.customer_id = 1";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table"><tr><th>ชื่อที่พัก</th><th>วันเช็คอิน</th><th>วันเช็คเอาท์</th><th>ราคา</th><th>สถานะการจอง</th><th>เพิ่มเติม</th></tr>';
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . (isset($row['hotel_name']) ? $row['hotel_name'] : "") . "</td>";
                echo "<td>" . (isset($row['check_in_time']) ? $row['check_in_time'] : "") . "</td>";
                echo "<td>" . (isset($row['check_out_time']) ? $row['check_out_time'] : "") . "</td>";
                echo "<td>" . (isset($row['amount']) ? $row['amount'] : "") . "</td>";
                if ($row['booking_status'] == 1) {
                    echo "<td>เสร็จสิ้น</td>";
                } else {
                    echo "<td>รอดำเนินการ</td>";
                }
                echo "<td><a href='detail.php?booking_id=" . $row['booking_id'] . "'>รายละเอียด</a></td>";
            }
        
            echo "</table>";
            echo '</div>';
        } else {
            echo "ไม่พบรายการจอง";
        }

        $conn->close();
        ?>
    </div>
</form>

    
</body>

</html>