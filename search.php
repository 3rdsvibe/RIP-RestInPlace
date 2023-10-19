<?php
require_once 'connection.php';

if (isset($_GET["tabId"])) {
    $tabId = $_GET["tabId"];
    $sql = "";

    if ($tabId === 'all') {
        $sql = "SELECT * FROM hotel join photo using(hotel_id) join locations using(location_id)";
    } else if ($tabId === 'condo') {
        $sql = "SELECT * FROM hotel WHERE hotel_type = 'คอนโด' join photo using(hotel_id) join locations using(location_id)";
    } else if ($tabId === 'cottage') {
        $sql = "SELECT * FROM hotel WHERE hotel_type = 'บังกะโล' join photo using(hotel_id) join locations using(location_id)";       
    } else if ($tabId === 'house') {
        $sql = "SELECT * FROM hotel WHERE hotel_type = 'บ้านเดี่ยว' join photo using(hotel_id) join locations using(location_id)";
    } else if ($tabId === 'villa') {
        $sql = "SELECT * FROM hotel WHERE hotel_type = 'วิลลา' join photo using(hotel_id) join locations using(location_id)";
    }

    $type_hotel = $conn->query($sql); // ต้องตั้งค่า $type_hotel ในทุกกรณี
}

$price = "SELECT hotel_id, MIN(room_price) AS min_price FROM rooms GROUP BY hotel_id";
$price_room = $conn->query($price);

if ($price_room->num_rows > 0) {
    while ($row = $price_room->fetch_assoc()) {
        $hotel_id = $row["hotel_id"];
        $min_price = $row["min_price"];
    }
}
?>
<html>

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
    </style>
</head>

<body>
    <nav>
        <a href="home.php"><img src="RIP.png" width="80px" height="80px"></a>
        <ul>
            <li><a href="sign_in.html">เข้าสู่ระบบ</a></li>
            <li><a href="sign_up.html"><button type="ิีbutton" value="สมัครสมาชิก" class="signup" >สมัครสมาชิก</button></a>
            </li>
        </ul>
    </nav>
    <br><br><br><br>
    <?php
while ($row = mysqli_fetch_assoc($type_hotel)) {
?>
<div class="hotel-entry">
    <img src="<?php echo $row["photo_url"]; ?>" width="300px" height="180px" style="border-radius: 20px 20px 0px 0px;">
    <p><?php echo $row["hotel_name"] ?></p>
    <p><?php echo $row["address"] ?></p>
    <p>ราคาเริ่มต้น(ต่อคืน)</p>
    <?php
    if ($minprice = mysqli_fetch_assoc($price_room)){ ?>
        <p><?php echo "THB " . $minprice["room_price"]; ?><p>
    <?php } ?>
</div>
<?php
}
?>

    
</body>

</html>