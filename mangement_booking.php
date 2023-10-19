<!-- <?php include 'navbar.php'; ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css"  href="./style/booking.css">
    <title>Document</title>
    <title>
        <style>
             
        </style>
    </title>
    <script>
        $(document).ready(function(){
            console.log("test")
            let pathName = window.location.pathname;
            // pathName = pathName.replace("/project/RIP-RestInPlace","");
            console.log("check path = ",pathName);
            const navLinks = document.querySelectorAll("nav a")
            .forEach(link =>{
                if(link.href.includes(`${pathName}`))
                {
                   link.classList.add('active');
                   console.log("Link = ",link)
                }
            })
        });
        </script>
</head>
<body>
   
    <header>
        <nav>
            <div class="logo">  
                <img src="logo.png" id="logo" width="100px" height="100px">
            </div>
            <ul class="navbar">
                <li><a href="index.php">หน้าหลัก</a></li>
                <li><a href="payment.php">การจองที่พัก</a></li>
                <li><a href="mangement_booking.php">จัดการข้อมูลที่พัก</a></li>
                <li><a href="contact.php">ช่องทางการรับเงิน</a></li>
            </ul>
    </nav>
    </header>
    <div class="container">
        <div class="container-body">
            <div class="header">
                <button type="button" class="btn-manage">แก้ไขข้อมูลที่พัก</button>
                <button type="button"  class="btn-manage">เพิ่มข้อมูลที่พัก</button>
            </div>
            <div class="top">
                <div class="title">
                    <h2>ประเภทที่พัก</h2>
                </div>
                <div class="top-body">
                    <button type="button" class="btn-room">คอนโด / อพาร์ตเมนต์</button>
                    <button type="button"  class="btn-room move-right">บังกะโล</button>
                    <button type="button"  class="btn-room move-right">บ้านเดียว</button>
                    <button type="button"  class="btn-room move-right">วิลลา</button>
                </div>
                <div class="detail-room">
                    <div class="title-detail">
                        <h2>รายละเอียดที่พัก</h2>
                    </div>
                    <div class="body-detail">
                        <div class="room">
                            <div class="box-room">
                                <span >ห้องนอน</span>
                                <div class="btn-increas">
                                    <button type="button" style="width: 30px; height:30px" id ="decrement-bedroom"> <ion-icon name="remove-outline" size ="small"></ion-icon></button>
                                    <span style="font-size:30px" id ="countBedRoom"></span>
                                    <button type="button" style="width: 30px; height:30px" id ="increment-bedroom">  <ion-icon name="add-outline" size="small"></ion-icon></button>
                                </div>
                            </div>
                            <div class="box-room">
                                <span >ห้องเดี่ยว</span>
                                <div class="btn-increas">
                                    <button type="button" style="width: 30px; height:30px" id ="decrement-singleRoom">  <ion-icon name="remove-outline" size ="small"></ion-icon></button>
                                    <span style="font-size:30px" id="singleRoom"></span>
                                    <button type="button" style="width: 30px; height:30px" id ="increment-singleRoom">   <ion-icon name="add-outline" size="small"></ion-icon></button>
                                </div>
                            </div>
                            <div class="box-room">
                                <span >จำนวนที่รองรับ</span>
                                <div class="btn-increas">
                                    <button type="button" style="width: 30px; height:30px" id ="decrement-amount"> <ion-icon name="remove-outline" size ="small"></ion-icon></button>
                                    <label style="font-size:30px" id="amount"></label>
                                    <button type="button" style="width: 30px; height:30px" id ="increment-amount">  <ion-icon name="add-outline" size="small"></ion-icon></button>
                                </div>
                            </div>
                            <div class="box-room">
                                <span >ห้องน้ำ</span>
                                <div class="btn-increas">
                                    <button type="button" style="width: 30px; height:30px" id ="decrement-bathroom">  <ion-icon name="remove-outline" size ="small"></ion-icon></button>
                                    <label style="font-size:30px" id="bathroom"></label>
                                    <button type="button" style="width: 30px; height:30px" id ="increment-bathroom">  <ion-icon name="add-outline" size="small"></ion-icon></button>
                                </div>
                            </div>
                            <!-- <div class="box-room">ห้องเดี่ยว</div>
                            <div class="box-room">จำนวนที่รองรับ</div>
                            <div class="box-room">ห้องน้ำ</div> -->
                        </div>
                        <div class="img-detail">
                            <div class="all-img">
                                <img src="logo.png" id="logo" width="100%" height="100%">
                                <img src="logo.png" id="logo" width="100%" height="100%">
                                <img src="logo.png" id="logo" width="100%" height="100%">
                                <img src="logo.png" id="logo" width="100%" height="100%">
                            </div>
                            <div class="text-per-day">
                                <h2>ราคาต่อคืน</h2>
                            </div>
                            <div class="price-per-day">
                                <h2>2,250.00</h2>
                                <h2 style="width:100px;">THB</h2>
                            </div>
                        </div>
                    </div>
                </div>
              
                    <!-- <div class="body-detail2">
                        
                        <div class="box-room">ห้องนอน</div>
                        <div class="box-room">ห้องสวีท</div>
                        <div class="box-room">จำนวนที่รองรับ</div>
                    </div> -->

                </div>
                <hr color="gray">
            </div>
            

        </div>
    </div>

    <script>
        $(document).ready(function() {
            var countBedRoom = 0; // Initialize countBedRoom to 0
            var singleRoom = 0; // Initialize singleRoom to 0
            var amount = 0; // Initialize amount to 0
            var bathroom = 0; // Initialize singleRoom to 0
            var count = 0;
            $("#countBedRoom").text(countBedRoom);
            $("#singleRoom").text(singleRoom);
            $("#amount").text(amount);
            $("#bathroom").text(bathroom);

            // // Function to update the count and display it
            // function updateCount() {
            //     $("#countBedRoom").text(countBedRoom);
            // }

            // // Increment the count when the "Increment" button is clicked
            // $("#increment-bedroom").click(function() {
            //     countBedRoom++;
            //     updateCount();
            // });

            // // Decrement the count when the "Decrement" button is clicked
            // $("#decrement-bedroom").click(function() {
            //     if(countBedRoom >0)
            //     {
            //         updateCount();
            //     }
                
            // });

            $("button").click(function() {
                // Get the id attribute of the clicked button
                var buttonId = $(this).attr("id");
                var splitButtonId = buttonId.split("-");
                console.log("buttonId =",buttonId)
                if(splitButtonId[0] == "increment")
                {
                    count++
                    if(buttonId == "increment-bedroom")
                    {
                        $("#countBedRoom").text(count);
                    }
                    if(buttonId == "increment-singleRoom")
                    {
                        $("#singleRoom").text(count);
                    }


                }
                else{
                   if(count >0)
                   {
                    count--
                    $("#countBedRoom").text(count);
                   }
                    // $("#countBedRoom").text(count);
                }

                
                // Display the id in an alert (you can do something else with it)
                // alert("Button ID: " + buttonId);
            });
        });
    </script>
</body>
</html>