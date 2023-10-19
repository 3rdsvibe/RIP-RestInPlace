<?php
require_once 'connection.php';
$sql = "SELECT * from hotel join photo using(hotel_id) join locations using(location_id) join rooms using(hotel_id)";
$all_hotel = $conn->query($sql);
$data = mysqli_fetch_assoc($all_hotel);

$minRoomPriceQuery = "SELECT MIN(rooms.room_price) AS min_price FROM rooms WHERE rooms.hotel_id = '1'";
$minRoomPriceResult = $conn->query($minRoomPriceQuery);
$minPriceData = mysqli_fetch_assoc($minRoomPriceResult);
$minPrice = $minPriceData["min_price"];

/*session_start();

// page redirect
$usermail="";
$usermail=$_SESSION['usermail'];
if($usermail == true){

}else{
  header("location: index.php");
}
*/
?>

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

        .signup:hover {
            background-color: #ffffff;
            color: #59A3B4;
        }

        /*จบแถบด้านบน*/

        #cover {
            background-color: #eeeeee;
            text-align: center;
            width: 80%;
            height: 280px;
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
            <li><a href="sign_in.html">เข้าสู่ระบบ</a></li>
            <li><a href="sign_up.html"><button type="submit" value="สมัครสมาชิก" class="signup">สมัครสมาชิก</button></a>
            </li>
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

    <form id="cover">
        <div class="tile" id="tile-1">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <div class="slider"></div>
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" onclick="loadHotelData('all')" data-toggle="tab" href="#" role="tab" aria-controls="all" aria-selected="true">ที่พักทั้งหมด</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="condo-tab" onclick="loadHotelData('condo')" data-toggle="tab" href="#" role="tab" aria-controls="condo" aria-selected="false">คอนโด/อพาร์ตเมนต์</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="cottage-tab" onclick="loadHotelData('cottage')" data-toggle="tab" href="#" role="tab" aria-controls="cottage" aria-selected="false">บังกะโล</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="house-tab" onclick="loadHotelData('house')" data-toggle="tab" href="#" role="tab" aria-controls="house" aria-selected="false">บ้านเดี่ยว</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="villa-tab" onclick="loadHotelData('villa')" data-toggle="tab" href="#" role="tab" aria-controls="villa" aria-selected="false">วิลลา</a>
                </li>
            </ul>


        </div>
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 39 39" fill="none">
                <path d="M15.6096 3.90039C12.5046 3.90039 9.52688 5.13389 7.33136 7.32954C5.13583 9.52519 3.9024 12.5031 3.9024 15.6083C3.9024 18.7134 5.13583 21.6913 7.33136 23.887C9.52688 26.0826 12.5046 27.3161 15.6096 27.3161C18.7145 27.3161 21.6923 26.0826 23.8878 23.887C26.0833 21.6913 27.3168 18.7134 27.3168 15.6083C27.3168 12.5031 26.0833 9.52519 23.8878 7.32954C21.6923 5.13389 18.7145 3.90039 15.6096 3.90039ZM9.64209e-08 15.6083C0.000355754 13.124 0.59359 10.6756 1.7304 8.46673C2.86721 6.25784 4.51476 4.35217 6.53613 2.90812C8.55751 1.46406 10.8943 0.523321 13.3524 0.164078C15.8104 -0.195164 18.3187 0.0374668 20.6687 0.842638C23.0188 1.64781 25.1428 3.00226 26.8641 4.79344C28.5855 6.58461 29.8545 8.76078 30.5657 11.1411C31.277 13.5214 31.4099 16.037 30.9534 18.479C30.4969 20.921 29.4642 23.2188 27.9412 25.1814L38.4523 35.6931C38.8077 36.0611 39.0044 36.554 38.9999 37.0656C38.9955 37.5773 38.7903 38.0667 38.4285 38.4285C38.0667 38.7903 37.5774 38.9955 37.0658 38.9999C36.5542 39.0044 36.0613 38.8077 35.6933 38.4522L25.1822 27.9405C22.8748 29.732 20.111 30.8401 17.2052 31.1387C14.2994 31.4373 11.3681 30.9145 8.74458 29.6297C6.12111 28.345 3.91077 26.3498 2.3649 23.8711C0.819033 21.3923 -0.000324524 18.5296 9.64209e-08 15.6083Z" fill="black" />
            </svg>
            <?php
            $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
            ?>

            <select id="place">
                <option value="0">คุณจะไปที่ไหน?</option>
                <option value="1">กรุงเทพ</option>
                <option value="2">ชลบุรี</option>
            </select>
        </p>



        <div class="flex-container">
            <div class="col-6">
                <p class="same_line">
                    <label for="fdate">วันเช็คอิน</label>
                    <input type="date" id="fdate" name="fdate" max="ldate">
                    <label for="ldate">วันเช็คเอาท์</label>
                    <input type="date" id="ldate" name="ldate" /></input>
                </p>
                <!--<p>
                    <input type="text" name="daterange" value="27/10/2023 - 28/10/2023" style="width: 75%;" />
                </p>
                <script>
                    $(function() {
                        $('input[name="daterange"]').daterangepicker({
                            opens: 'left'
                        }, function(start, end, label) {
                            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                        });
                    });
                </script> -->
            </div>
            <div class="col-6">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" viewBox="0 0 41 33" fill="none">
                            <path d="M1 31.1364V29.3637C1 22.5103 6.55575 16.9546 13.4091 16.9546C20.2625 16.9546 25.8182 22.5103 25.8182 29.3637V31.1364" stroke="black" stroke-width="2" stroke-linecap="round" />
                            <path d="M22.2727 20.5C22.2727 15.6048 26.2411 11.6364 31.1363 11.6364C36.0316 11.6364 40 15.6048 40 20.5V21.3864" stroke="black" stroke-width="2" stroke-linecap="round" />
                            <path d="M13.4091 16.9545C17.3253 16.9545 20.5001 13.7797 20.5001 9.86361C20.5001 5.94741 17.3253 2.77271 13.4091 2.77271C9.49294 2.77271 6.31824 5.94741 6.31824 9.86361C6.31824 13.7797 9.49294 16.9545 13.4091 16.9545Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M31.1364 11.6364C34.0737 11.6364 36.4546 9.25532 36.4546 6.31818C36.4546 3.38104 34.0737 1 31.1364 1C28.1992 1 25.8182 3.38104 25.8182 6.31818C25.8182 9.25532 28.1992 11.6364 31.1364 11.6364Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span id="quantityLabel">ห้อง: 1, ผู้เข้าพัก: 1</span>
                    </button>


                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li class="room">
                            <p class="dropdown-item">ห้อง
                                <button class="btn minusButton" data-target="quantityRoom">-</button>
                                <input type="number" id="quantityRoom" class="form-control" min="1" value="1" placeholder="1 ห้อง">

                                <button class="btn plusButton" data-target="quantityRoom">+</button>
                            </p>
                        </li>
                        <li class="adult">
                            <p class="dropdown-item">ผู้เข้าพัก
                                <button class="btn minusButton" data-target="quantityAdults">-</button>
                                <input type="number" id="quantityAdults" class="form-control" min="1" value="1" placeholder="ผู้เข้าพัก 1">
                                <button class="btn plusButton" data-target="quantityAdults">+</button>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <div>
            <a href="search_room.php"><button type="button" class="search" onclick="searchRooms()">ค้นหา</button></a>

        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
// เมื่อคลิกปุ่ม "ค้นหา"
function searchRooms() {
    var place = document.getElementById("place");
    var going_to = place.options[place.selectedIndex].text;
    var fdate = document.getElementById("fdate").value;
    var ldate = document.getElementById("ldate").value;
    var quantityRoom = document.getElementById("quantityRoom").value;
    var quantityAdults = document.getElementById("quantityAdults").value;

    // สร้าง XMLHttpRequest object
    var xhttp = new XMLHttpRequest();

    // กำหนดการเรียกใช้งานเมื่อข้อมูลถูกโหลดเสร็จ
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("search-results").innerHTML = this.responseText;
        }
    };

    // ส่งข้อมูลไปยัง PHP script
    xhttp.open("POST", "search_room.php", true);

    // ต้องการส่งข้อมูลในรูปแบบข้อมูลแบบฟอร์ม
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // ส่งข้อมูลในรูปแบบข้อมูลแบบฟอร์ม
    xhttp.send("going_to=" + going_to + "&fdate=" + fdate + "&ldate=" + ldate + "&quantityRoom=" + quantityRoom + "&quantityAdults=" + quantityAdults);
}


    </script>
    <!--ทำให้วันที่ต้องการเช็คอิน ไม่เกินวันเช็คเอาท์-->
    <script>
        //date
        var fdateInput = document.getElementById("fdate");
        var ldateInput = document.getElementById("ldate");

        fdateInput.addEventListener("input", function() {
            var fdateValue = new Date(this.value);
            var ldateValue = new Date(ldateInput.value);

            if (fdateValue >= ldateValue) {
                var newFDate = new Date(ldateValue);
                newFDate.setDate(ldateValue.getDate() - 1);
                var year = newFDate.getFullYear();
                var month = String(newFDate.getMonth() + 1).padStart(2, "0");
                var day = String(newFDate.getDate()).padStart(2, "0");
                fdateInput.value = year + "-" + month + "-" + day;
            }
        });

        ldateInput.addEventListener("input", function() {
            var fdateValue = new Date(fdateInput.value);
            var ldateValue = new Date(this.value);

            if (fdateValue >= ldateValue) {
                var newFDate = new Date(ldateValue);
                newFDate.setDate(ldateValue.getDate() - 1);
                var year = newFDate.getFullYear();
                var month = String(newFDate.getMonth() + 1).padStart(2, "0");
                var day = String(newFDate.getDate()).padStart(2, "0");
                fdateInput.value = year + "-" + month + "-" + day;
            }
        });
    </script>


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
    <!-- jQuery JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <!-- Bootstrap JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js'></script>
    <!--ทำการเลื่อนแถบเลื่อนที่พักแบบต่างๆ-->
    <script>
        $(document).ready(function() {

            $("#tile-1 .nav-tabs a").click(function() {

                var position = $(this).parent().position();

                var width = $(this).parent().width();

                $("#tile-1 .slider").css({
                    "left": +position.left,
                    "width": width
                });

            });
            var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();

            var actPosition = $("#tile-1 .nav-tabs .active").position();

            $("#tile-1 .slider").css({
                "left": +actPosition.left,
                "width": actWidth
            });

        });
    </script>
    <script>
        function loadHotelData(tabId) {
            // สร้าง XMLHttpRequest object
            var xhttp = new XMLHttpRequest();

            // กำหนดการเรียกใช้งานเมื่อข้อมูลถูกโหลดเสร็จ
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // รับข้อมูลจากเซิร์ฟเวอร์และอัปเดตหน้าเว็บ
                    document.getElementById("hotel-data").innerHTML = this.responseText;
                }
            };

            // ส่งคำขอ GET ไปยัง PHP script พร้อม tabId ที่ถูกเลือก
            xhttp.open("GET", "search.php?tabId=" + tabId, true);
            xhttp.send();
        }
    </script>

    <!--ทำการเพิ่มลด จำนวนห้องและผู้เข้าพัก-->
    <script>
        // เลือกทุกปุม
        const buttons = document.querySelectorAll('.minusButton, .plusButton');

        // เพิ่ม event listener สำหรับแต่ละปุม
        buttons.forEach(button => {
            button.addEventListener('click', event => {
                event.preventDefault();
                // หาอินพุตที่เกี่ยวข้องโดยใช้ data-target
                const targetId = button.getAttribute('data-target');
                const quantityInput = document.getElementById(targetId);

                if (quantityInput) {
                    let currentValue = parseInt(quantityInput.value);
                    if (button.textContent === '-' && !isNaN(currentValue)) {
                        if (currentValue > 1) {
                            quantityInput.value = currentValue - 1;
                        }
                    } else if (button.textContent === '+') {
                        quantityInput.value = currentValue + 1;
                    }
                }
            });
        });
    </script>
    <script>
        // ฟังก์ชันเพิ่มค่า
        function increaseValue(target) {
            var input = document.getElementById(target);
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            input.value = value;
            updateQuantityLabel();
        }

        // ฟังก์ชันลดค่า
        function decreaseValue(target) {
            var input = document.getElementById(target);
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                input.value = value;
            }
            updateQuantityLabel();
        }

        // ฟังก์ชันอัปเดตเนื้อหาของ label
        function updateQuantityLabel() {
            var quantityRoom = document.getElementById("quantityRoom").value;
            var quantityAdults = document.getElementById("quantityAdults").value;
            var quantityLabel = document.getElementById("quantityLabel");
            quantityLabel.textContent = `ห้อง: ${quantityRoom}, ผู้เข้าพัก: ${quantityAdults}`;
        }

        // ใส่การเชื่อมโยงไปยังปุ่ม plus และ minus ใน HTML
        var plusButtons = document.querySelectorAll(".plusButton");
        var minusButtons = document.querySelectorAll(".minusButton");

        plusButtons.forEach(function(button) {
            var target = button.getAttribute("data-target");
            button.addEventListener("click", function() {
                increaseValue(target);
            });
        });

        minusButtons.forEach(function(button) {
            var target = button.getAttribute("data-target");
            button.addEventListener("click", function() {
                decreaseValue(target);
            });
        });
    </script>
    <!--จบ + - ห้อง ผู้เข้าพัก-->

    <div class="cover2">
        <br>
        <br>
        <h2>ที่พักแนะนำสำหรับคุณ</h2>
        <br>
        <br>
        <section class="center">
            <p class="hotels">
                <a href="each_hotel.php"><img src="<?php echo $data["photo_url"]; ?>" width="300px" height="300px" id="hotel_img"></a>

            </p>
            <p class="hotels">
                <a href="each_hotel.php"><img src="<?php echo $data["photo_url"]; ?>" width="300px" height="300px" id="hotel_img"></a>
            </p>
            <p class="hotels">
                <a href="each_hotel.php"><img src="<?php echo $data["photo_url"]; ?>" width="300px" height="300px" id="hotel_img"></a>
            </p>
            <p class="hotels">
                <a href="each_hotel.php"><img src="<?php echo $data["photo_url"]; ?>" width="300px" height="300px" id="hotel_img"></a>
            </p>
        </section>
        <section class="center">
            <p class="hotels" id="hotel_des">
                <?php echo $data["hotel_name"]; ?>
                <br>
                <?php echo $data["address"]; ?>
                <br>
                <?php echo "THB " . $minPrice; ?>
            </p>
            <p class="hotels" id="hotel_des">
                <?php echo $data["hotel_name"]; ?>
                <br>
                <?php echo $data["address"]; ?>
                <br>
                <?php echo "THB " . $minPrice; ?>
            </p>
            <p class="hotels" id="hotel_des">
                <?php echo $data["hotel_name"]; ?>
                <br>
                <?php echo $data["address"]; ?>
                <br>
                <?php echo "THB " . $minPrice; ?>
            </p>
            <p class="hotels" id="hotel_des">
                <?php echo $data["hotel_name"]; ?>
                <br>
                <?php echo $data["address"]; ?>
                <br>
                <?php echo "THB " . $minPrice; ?>
            </p>
        </section>
    </div>
</body>

</html>