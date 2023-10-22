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

        body {
            margin: 0;
            background-image: url("https://i.pinimg.com/564x/79/34/96/793496413f2024536541d6384593d465.jpg");
            background-size: cover;
            font-family: 'Athiti', sans-serif;
        }

        .topnav {
            overflow: hidden;
            list-style-type: none;
            width: 100%;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            display: block;
            color: #111;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }



        /* Hide the link that should open and close the topnav on small screens */
        .topnav .icon {
            display: none;
        }

        /* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
        @media screen and (max-width: 600px) {
            .topnav a:not(.navbar-brand) {
                display: none;
            }

            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        /* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
        @media screen and (max-width: 600px) {
            .topnav.responsive {
                position: relative;
            }

            .topnav.responsive a.icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }

        #cover {
            background-color: #ffffff;
            text-align: center;
            width: 90%;
            height: 80%;
            flex-shrink: 0;
            border-radius: 10px;
            font-size: 20px;
            margin: auto;
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

    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light ">
            <div class="topnav" id="myTopnav">
                <a class="navbar-brand" href="index.html">
                    <img src="logo.png" width="80" height="80" alt="Logo">
                </a>
                <div class="navbar-collapse" id="collapsibleNavbar">
                    <a href="http://localhost/Project/UI4/">หน้าหลัก</a>
                    <a href="#">การจองที่พัก</a>
                    <a href="http://localhost/Project/UI6/">จัดการข้อมูลที่พัก</a>
                    <a href="http://localhost/Project/UI7/">ช่องทางการรับเงิน</a>
                    <a href="http://localhost/Project/UI3/" style="color: rgb(252, 16, 16);">ออกจากระบบ</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>
        </nav>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
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

            $sql = "SELECT * FROM booking join payment on booking.booking_id = payment.booking_id join hotel on booking.hotel_id = hotel.hotel_id join customer on booking.customer_id = customer.customer_id";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table class="table"><tr><th>ข้อมูลผู้จอง</th><th>วันเช็คอิน</th><th>วันเช็คเอาท์</th><th>ราคา</th><th>สถานะ</th><th>เพิ่มเติม</th></tr>';

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . (isset($row['customer_firstname']) ? $row['customer_firstname'] : "") . ' ' . (isset($row['customer_lastname']) ? $row['customer_lastname'] : "") . "</td>";
                    echo "<td>" . (isset($row['check_in_time']) ? $row['check_in_time'] : "") . "</td>";
                    echo "<td>" . (isset($row['check_out_time']) ? $row['check_out_time'] : "") . "</td>";
                    echo "<td>" . (isset($row['amount']) ? $row['amount'] : "") . "</td>";
                    if ($row['booking_status'] == 1) {
                        echo "<td>ยืนยันการจอง</td>";
                    } else {
                        echo "<td>รอดำเนินการ</td>";
                    }
                    echo "<td><a href='partnerdetail.php?booking_id=" . $row['booking_id'] . "'>รายละเอียด</a></td>";
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