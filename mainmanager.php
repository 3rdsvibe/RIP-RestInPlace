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

        body {
            font-family: 'Athiti', sans-serif;
            background-image: url("https://i.pinimg.com/564x/62/95/79/629579823c4b0f350238522d1067dfb2.jpg");
            background-size: 50%;
        }

        /*แถบด้านบน*/
        nav {
            border-radius: 0px 0px 20px 20px;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            position: fixed;
            top: 0;
            width: 100%;
            height: 80px;
            background-color: #ffffff;
        }

        nav ul {

            float: right;
            display: inline;
            z-index: 100;
        }

        nav ul li a:hover {
            color: #ffffff;
        }

        * {
            padding: 1;
            box-sizing: border-box;
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

        li:hover {
            background-color: #59A3B4;
            border-radius: 4px;
        }

        .dropdown {
            position: absolute;
            display: block;
            background-color: #ffffff;
            top: 120%;
            opacity: 0;
            visibility: hidden;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(255, 255, 255, 0.9), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: 0.3s;
            right: 2px;
            width: 200px;
            height: 100px;

        }

        .dropdown-link:hover .dropdown {
            top: 140%;
            opacity: 1;
            visibility: visible;
        }

        .dropdown-link:hover a i {
            transform: rotate(-180deg);
        }

        .navbar {
            border-radius: 7px;
            position: relative;
        }

        a {
            text-decoration: none;
        }

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

        .btn {
            margin-top: 0.5%;
        }

        .manageContainer {
            border-radius: 20px;
            color: #FFF;
            width: 1400;
            height: 53px;
            position: relative;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            border: 3px solid #59A3B4;
            background: #59A3B4;
            font-weight: bolder;
            font-size: larger;
            margin: auto;
        }

        .manageContainer::before {
            content: '';
            position: absolute;
            width: 50%;
            height: 100%;
            left: 0%;
            border-radius: 20px;
            background: white;
            transition: all 0.3s;
        }

        .manageCheckbox:checked+.manageContainer::before {
            left: 50%;
        }

        .manageContainer div {
            padding: 6px;
            text-align: center;
            z-index: 1;
        }

        .manageCheckbox {
            display: none;
        }

        .manageCheckbox:checked+.manageContainer div:first-child {
            color: white;
            transition: color 0.3s;
        }

        .manageCheckbox:checked+.manageContainer div:last-child {
            color: #343434;
            transition: color 0.3s;
        }

        .manageCheckbox+.manageContainer div:first-child {
            color: #343434;
            transition: color 0.3s;
        }

        .manageCheckbox+.manageContainer div:last-child {
            color: white;
            transition: color 0.3s;
        }

        .manageContainer .manageContent {
            display: none;
        }

        /* CSS เมื่อ checkbox ถูกติกถถัง */
        .manage:checked+.manageContainer .manageContent {
            display: block;
        }

        /*จบแถบด้านบน*/

        .background {
            border-radius: 20px;
            background: #FFF;
            width: 1432px;
            height: 760px;
            margin: auto;
            margin-top: 25px;
        }
    </style>
</head>

<body>
    <nav>
        <a href="home.php"><img src="RIP.png" width="px" height="80px"></a>
        <ul>
            <div class="navbar">
                <ul></ul>
                <li class="dropdown-link">
                    <a href=""><svg width="30" height="30" viewBox="0 0 35 32">
                            <path d="M35 0H0V3.2H35V0Z" fill="black" />
                            <path d="M35 14.3999H0V17.5999H35V14.3999Z" fill="black" />
                            <path d="M35 28.7999H0V31.9999H35V28.7999Z" fill="black" />
                        </svg>
                    </a>

                    </a>
                    <ul class="dropdown">
                        <li><a href="#">การจองของฉัน</a></li>
                        <li><a href="#">ออกจากระบบ</a></li>
                    </ul>
            </div>
        </ul>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <form id="cover">
        <div class="tile" id="tile-1">
            <div class="btn">
                <input type="checkbox" id="manage" class="manageCheckbox" />
                <label for="manage" class='manageContainer'>
                    <div>ข้อมูลการจองทั้งหมด</div>
                    <div>ยังไม่ได้จัดการเงิน</div>
                </label>
            </div>

            <div class="table-container" id="allBookings">
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

            $sql = "SELECT * FROM booking join hotel on booking.hotel_id = hotel.hotel_id join payment on booking.booking_id = payment.booking_id left join finance on booking.payment_id = finance.payment_id";

            $result = $conn->query($sql);



            echo '<div class="table-responsive">';
            echo '<table class="table"><tr><th>ชื่อที่พัก</th><th>วันเช็คอิน</th><th>วันเช็คเอาท์</th><th>ราคา</th><th>สถานะการจอง</th><th>สถานะการจัดการเงิน</th><th>เพิ่มเติม</th></tr>';

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
                if ($row['finance_status'] == 1) {
                    echo "<td>เสร็จสิ้น</td>";
                } else {
                    echo "<td>รอดำเนินการ</td>";
                }
                echo "<td><a href='detailmng.php?booking_id=" . $row['booking_id'] . "'>รายละเอียด</a></td>";
            }

            echo "</table>";
            echo '</div>';


            $conn->close();
            ?>
        </div>

        <div class="table-container" id="financialManagement" style="display: none;">
            <!-- แสดงข้อมูลการจัดการเงิน ดัชนีนี้ควรมีข้อมูลการจัดการเงิน -->
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

            $sql2 = "SELECT * FROM booking 
            JOIN hotel ON booking.hotel_id = hotel.hotel_id 
            JOIN payment ON booking.booking_id = payment.booking_id 
            LEFT JOIN finance ON booking.payment_id = finance.payment_id 
            WHERE finance.finance_status != 1";


            $result2 = $conn->query($sql2);

            echo '<table class="table"><tr><th>ชื่อที่พัก</th><th>วันเช็คอิน</th><th>วันเช็คเอาท์</th><th>ราคา</th><th>สถานะการจอง</th><th>สถานะการจัดการเงิน</th><th>เพิ่มเติม</th></tr>';

            while ($row2 = $result2->fetch_assoc()) {
                echo "<tr><td>" . (isset($row2['hotel_name']) ? $row2['hotel_name'] : "") . "</td>";
                echo "<td>" . (isset($row2['check_in_time']) ? $row2['check_in_time'] : "") . "</td>";
                echo "<td>" . (isset($row2['check_out_time']) ? $row2['check_out_time'] : "") . "</td>";
                echo "<td>" . (isset($row2['amount']) ? $row2['amount'] : "") . "</td>";
                if ($row2['booking_status'] == 1) {
                    echo "<td>เสร็จสิ้น</td>";
                } else {
                    echo "<td>รอดำเนินการ</td>";
                }
                if ($row2['finance_status'] == 1) {
                    echo "<td>เสร็จสิ้น</td>";
                } else {
                    echo "<td>รอดำเนินการ</td>";
                }
                echo "<td><a href='managemoney.php?booking_id=" . $row2['booking_id'] . "'>รายละเอียด</a></td>";
            }

            echo "</table>";
            echo '</div>';


            $conn->close();
            ?>
        </div>
        </div>
    </form>

    <script>
        // รับอ้างอิงถึง Checkbox และส่วนที่ต้องการแสดงผล
        const manageCheckbox = document.querySelector(".manageCheckbox");
        const allBookings = document.getElementById("allBookings");
        const financialManagement = document.getElementById("financialManagement");

        // เมื่อมีการเปลี่ยนแปลงใน Checkbox
        manageCheckbox.addEventListener("change", function() {
            if (manageCheckbox.checked) {
                // ถ้า Checkbox ถูกติกถถัง แสดงส่วน "จัดการเงิน" และซ่อนส่วน "ข้อมูลการจองทั้งหมด"
                allBookings.style.display = "none";
                financialManagement.style.display = "block";
            } else {
                // ถ้า Checkbox ไม่ถูกติกถถัง แสดงส่วน "ข้อมูลการจองทั้งหมด" และซ่อนส่วน "จัดการเงิน"
                allBookings.style.display = "block";
                financialManagement.style.display = "none";
            }
        });
    </script>


</body>

</html>

///ถ้าผู้จองชำระเสร็จสิ้นนอกจากเพิ่มในpaymentแล้วต้องเพิ่มในfinanceด้วยค่า finance_status จะได้เท่ากับ 0///