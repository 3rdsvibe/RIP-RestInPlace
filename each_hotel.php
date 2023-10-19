<?php
require_once 'connection.php';

// Query สำหรับดึงข้อมูลโรงแรม
$sql = "SELECT * FROM hotel WHERE hotel_id = '1'";
$hotel_des = $conn->query($sql);
$hotelData = mysqli_fetch_assoc($hotel_des);

$location = "SELECT * from locations join hotel using(location_id) where hotel_id='1'";
$hotel_location = $conn->query($location);
$address = mysqli_fetch_assoc($hotel_location);

$feedback = "SELECT * from comments join hotel using(hotel_id) join customer using(customer_id) where hotel_id='1'";
$comment = $conn->query($feedback);

// Query สำหรับดึงข้อมูลรูปภาพห้องแต่ละห้อง
$roomPhotosQuery = "SELECT room.room_id, room.room_details, room.room_type, room.room_price, photo.photo_url 
                    FROM rooms AS room
                    LEFT JOIN photo AS photo ON room.room_id = photo.room_id 
                    WHERE room.hotel_id = '1'";
$roomPhotosResult = $conn->query($roomPhotosQuery);

$minRoomPriceQuery = "SELECT MIN(rooms.room_price) AS min_price FROM rooms WHERE rooms.hotel_id = '1'";
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
    <style>
        /*ฟอนต์ google ที่นำมาใช้*/
        @import url('https://fonts.googleapis.com/css2?family=Athiti&display=swap');

        /*แถบด้านบน*/
        nav {
            position: fixed;
            top: 0;
            width: 99%;
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
            padding: 20px;
            flex: 1;
        }

        .right {
            text-align: right;
            padding: 20px;
            flex: 2;
        }

        .cover {
            background-color: #ffffff;
            border-radius: 20px 20px 20px 20px;
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
            right: 30px;
            text-align: justify;
        }

        .box2 {
            width: 80%;
            height: 50%;
            padding: 20px;
            border: 1px solid red;
            border-radius: 20px 20px 20px 20px;
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
        </ul>
    </nav>
    <br><br><br><br>
    <div class="cover">
        <div>
            <p class="same_line">
                <?php
                $i = 0; // กำหนดตัวแปร i เพื่อนับรูปภาพ
                while ($row = mysqli_fetch_assoc($roomPhotosResult) && $i < 3) { // ลูปเรียกข้อมูลรูปภาพ
                ?>
                    <img src="<?php echo $row["photo_url"]; ?>" width="300px" height="300px">
                <?php
                    $i++; // เพิ่มค่าตัวแปร i เมื่อแสดงรูปภาพแล้ว
                }
                ?>
            </p>
            <div class="same_line">
                <h2 class="left"><?php echo $hotelData["hotel_name"]; ?></h2>
                <p class="left"><?php echo $address["address"]; ?></p>
            </div>
            <div class="same_line">
                <p class="right">ราคาเริ่มต้น(ต่อคืน)</p>
                <h2 class="right"><?php echo "THB " . $minPrice; ?></h2>
            </div>
        </div>
        <?php foreach ($typeData as $roomType => $typeInfo) { ?>
            <section class="center">
                <p class="same_line">
                <h2 class="left">
                    <?php echo $roomType; ?>
                </h2>
                </p>
                <p class="hotels">
                    <?php foreach ($typeInfo["rooms"] as $room) { ?>
                        <a href="">
                            <img src="<?php echo $room["photos"][0]; ?>" width="200px" height="200px" style="border-radius: 20px 20px 20px 20px;" id="hotel_img">
                        </a>
                    <?php } ?>
                </p>
                &nbsp;


                <p class="right">ราคาเริ่มต้น(ต่อคืน)</p>
                <h2 class="right">
                    <?php echo "THB " . $typeInfo["price"]; ?>
                </h2>
            </section>
        <?php
        }
        ?>
        <div>
            <p class="left" style="font-size: 32px; font-weight: 900;" >รีวิวจากผู้เข้าพักจริง</p>
            <?php while ($all_comment = mysqli_fetch_assoc($comment)) { ?>
                <div class="container">
                    <div class="left">
                        <p style="font-size: 40px; color:#59A3B4;">
                            <b><?php echo number_format( $all_comment["comment_score"], 2 ); ?></b>
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
            <input type="number" min=0 max=5 placeholder="ให้คะแนน ต่ำสุด 0 มากสุด 5" style="width:17%; font-size:20px; font-family:'Athiti', sans-serif; margin-left:35px;">
            <input type="text" name="name" placeholder="=ชื่อ">
            <input type="text" name="comment" placeholder="เขียนรีวิวที่นี่" size="200" style="height:60px; width:94%; font-size:20px; font-family:'Athiti', sans-serif; margin-left:35px;">
            <button type="submit" style="font-size:20px; font-family:'Athiti', sans-serif; margin-left:35px; background-color:#ADD8E6;" >ส่ง</button>
            </form>
        </div>

</body>

</html>