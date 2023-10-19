<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
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
        body{
            font-family: 'Athiti', sans-serif;
            background-image: url("https://i.pinimg.com/564x/62/95/79/629579823c4b0f350238522d1067dfb2.jpg");
            background-size: 100%;
        }
    </style>
</head>

<body>
    <nav>
        <a href="home.php"><img src="RIP.png" width="80px" height="80px"></a>
        <ul>
            <li>ข้อมูลการจอง</li>
            <li>ข้อมูลการชำระเงิน</li>
            <li>ยืนยันการจอง</li>
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