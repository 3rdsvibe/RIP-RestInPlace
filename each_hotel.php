<?php
require_once 'connection.php';
$hotel_id = $_GET["hotel_id"];


// Query สำหรับดึงข้อมูลโรงแรม
$sql = "SELECT * FROM hotel WHERE hotel_id = ".$hotel_id;
$hotel_des = $conn->query($sql);
$hotelData = mysqli_fetch_assoc($hotel_des);

$location = "SELECT * from locations join hotel using(location_id) where hotel_id = ".$hotel_id;
$hotel_location = $conn->query($location);
$address = mysqli_fetch_assoc($hotel_location);

$feedback = "SELECT * from comments join hotel using(hotel_id) join customer using(customer_id) where hotel_id = ".$hotel_id;
$comment = $conn->query($feedback);

// Query สำหรับดึงข้อมูลรูปภาพห้องแต่ละห้อง
$roomPhotosQuery = "SELECT room.room_id, room.room_details, room.room_type, room.room_price, photo.photo_url 
                    FROM rooms AS room
                    LEFT JOIN photo AS photo ON room.room_id = photo.room_id 
                    WHERE room.hotel_id = ".$hotel_id;
$roomPhotosResult = $conn->query($roomPhotosQuery);

$minRoomPriceQuery = "SELECT MIN(rooms.room_price) AS min_price FROM rooms WHERE rooms.hotel_id = ".$hotel_id;
$minRoomPriceResult = $conn->query($minRoomPriceQuery);
$minPriceData = mysqli_fetch_assoc($minRoomPriceResult);
$minPrice = $minPriceData["min_price"];


// ใช้ array สำหรับจัดเก็บข้อมูลของแต่ละประเภทห้อง
$typeData = array();

while ($row = mysqli_fetch_assoc($roomPhotosResult)) {
    $roomType = $row["room_type"];

    if (!array_key_exists($roomType, $typeData)) {
        $typeData[$roomType] = array(
            "price" => $row["room_price"],
            "rooms" => array()
        );
    }

    $typeData[$roomType]["rooms"][] = array(
        "roomDetails" => $row["room_details"],
        "photos" => array($row["photo_url"])
    );
}

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
    <style>
        /*ฟอนต์ google ที่นำมาใช้*/
        @import url('https://fonts.googleapis.com/css2?family=Athiti&display=swap');

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

        .dropdown .btn-secondary {
            background-color: white;
            color: black;
            width: 100%;
            border: 0px;
        }

        /*จบแถบด้านบน*/

        body {
            background-image: url("https://i.pinimg.com/564x/62/95/79/629579823c4b0f350238522d1067dfb2.jpg");
            background-size: 100%;
            font-family: 'Athiti', sans-serif;
        }

        .center {
            text-align: center;
        }

        .hotels {
            display: inline-block;

        }

        .left {
            text-align: left;
            padding: 30px;
            flex: 1;
            margin: 5;
        }

        .right {
            text-align: right;
            padding: 20px;
            flex: 2;
        }

        .cover {
            background-color: #ffffff;
            border-radius: 20px 20px 20px 20px;
            width:98%;
            margin-left: 12px;
        }

        .same_line {
            display: inline-block;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 30px;
        }

        .box {
            width: 60%;
            height: 18%;
            padding: 25px;
            border: 1px solid #EFF3F4;
            border-radius: 10px 10px 10px 10px;
            background-color: #EFF3F4;
            position: absolute;
            right: 40px;
            text-align: justify;
        }

        .box2 {
            width: 70%;
            height: 60%;
            border: 1px solid #87CEFA;
            border-radius: 20px 20px 20px 20px;
            transform: translateX(200px);
        }

        .room-info {
            display: flex;
            align-items: center;
        }


        .price {
            font-size: 30px;
            color: red;
            text-align: right;
            margin: 5px;
        }

        .start-price {
            font-size: 14px;
            color: black;
            text-align: right;
            margin: 5px;
        }

        .reserve-button {
            text-align: right;
            margin: 5px;
        }

        .reserve-button a {
            text-decoration: none;
        }

        .book {
            background-color: #59A3B4;
            font-family: 'Athiti', sans-serif;
            font-size: 20px;
            color: #ffffff;
            margin: 0;
            width: 160px;
            height: 50px;
        }
    </style>
</head>

<body>
    <!-- โค้ด HTML และแถบด้านบน (navbar) ตามที่คุณต้องการ -->
    <nav>
        <a href="home.php"><img src="RIP.png" width="80px" height="80px"></a>
        <ul>
            <li><a href="sign_in.html">เข้าสู่ระบบ</a></li>
            <li><a href="sign_up.html"><button type="submit" value="สมัครสมาชิก" class="signup">สมัครสมาชิก</button></a>
            </li>
            <li>
                </div>
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
    <br><br><br><br>
    <div class="cover">
        <div>
            <div class="same_line">
                <h2 class="left"><?php echo $hotelData["hotel_name"]; ?></h2>
                <p class="left"><?php echo $address["address"]; ?></p>
            </div>
            <div class="same_line">
                <p class="right">ราคาเริ่มต้น(ต่อคืน)</p>
                <h2 class="right"><?php echo "THB " . $minPrice; ?></h2>
            </div>
        </div>
        <br>
        <div class="box2">
            <p class="left"><?php echo $hotelData["convenient"]; ?></p>
        </div>
        <br>
        <?php foreach ($typeData as $roomType => $typeInfo) { ?>
            <section class="center">
                <div class="box2">
                    <div class="room-info">
                        <h2 class="left">
                            <?php echo $roomType; ?>
                        </h2>

                        <p class="hotels">
                            <?php foreach ($typeInfo["rooms"] as $room) { ?>
                                <a href="">
                                    <img src="<?php echo $room["photos"][0]; ?>" width="200px" height="200px" style="border-radius: 20px 20px 20px 20px;" id="hotel_img">
                                </a>
                            <?php } ?>
                        </p>
                        <p class="price">
                            <?php echo "THB " . $typeInfo["price"]; ?>
                        </p>
                        <p class="start-price">
                            ราคาเริ่มต้น (ต่อคืน)
                        </p>
                        <p class="reserve-button">
                            <a href="reserve.php?room_id=<?php echo $room["room_id"]; ?>">
                                <input type="button" value="จองเลย" class="book">
                            </a>
                        </p>
                    </div>
                </div>
                <br>
            </section>

        <?php
        }
        ?>
        <div>
            <p class="left" style="font-size: 32px; font-weight: 900;">รีวิวจากผู้เข้าพักจริง</p>
            <?php while ($all_comment = mysqli_fetch_assoc($comment)) { ?>
                <div class="container">
                    <div class="left">
                        <p style="font-size: 40px; color:#59A3B4;">
                            <b><?php echo number_format($all_comment["comment_score"], 2); ?></b>
                        </p>
                        <p style="font-size: 20px;">
                            <b><?php echo $all_comment["customer_firstname"]; ?></b>
                        </p>
                    </div>
                    <div class="right">
                        <div class="box">
                            <p style="font-size: 20px;">
                                <?php echo $all_comment["comment_description"]; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <p style="text-align:center; color:#59A3B4;">______________________________________________________________________________________________________________________________________________________</p>
            <?php } ?>
            <form action="process_comment.php" method="post">
                <h2 class="left">กรอกความคิดเห็น</h2>
                <p><input type="text" name="name" placeholder="ชื่อ" style="width:17%; font-size:20px; font-family:'Athiti', sans-serif; margin-left:35px;">
                <input type="number" min=0 max=5 placeholder="ให้คะแนน ต่ำสุด 0 มากสุด 5" style="width:17%; font-size:20px; font-family:'Athiti', sans-serif; margin-left:35px;"></p>
                <p><input type="text" name="comment" placeholder="เขียนความคิดเห็นที่นี่" size="200" style="height:60px; width:94%; font-size:20px; font-family:'Athiti', sans-serif; margin-left:35px;"></p>
                <button type="submit" style="font-size:20px; font-family:'Athiti', sans-serif; margin-left:35px; background-color:#ADD8E6;">ส่งความคิดเห็น</button>
                <p><br></p>
            </form>
        </div>
        <!--เกี่ยวกับการแสดงผลของแถบด้านบน เวอร์ชั่นที่ใช้-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- จัดการการแสดงผลของรายการแถบ Dropdown -->
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
</body>

</html>