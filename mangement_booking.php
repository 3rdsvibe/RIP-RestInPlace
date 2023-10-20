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
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
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
                                    <span style="font-size:30px" id ="countBedRoom">0</span>
                                    <button type="button" style="width: 30px; height:30px" id ="increment-bedroom">  <ion-icon name="add-outline" size="small"></ion-icon></button>
                                </div>
                            </div>
                            <div class="box-room">
                                <span >ห้องเดี่ยว</span>
                                <div class="btn-increas">
                                    <button type="button" style="width: 30px; height:30px" id ="decrement-singleRoom">  <ion-icon name="remove-outline" size ="small"></ion-icon></button>
                                    <span style="font-size:30px" id="singleRoom">0</span>
                                    <button type="button" style="width: 30px; height:30px" id ="increment-singleRoom">   <ion-icon name="add-outline" size="small"></ion-icon></button>
                                </div>
                            </div>
                            <div class="box-room">
                                <span >จำนวนที่รองรับ</span>
                                <div class="btn-increas">
                                    <button type="button" style="width: 30px; height:30px" id ="decrement-amount"> <ion-icon name="remove-outline" size ="small"></ion-icon></button>
                                    <label style="font-size:30px" id="amount">0</label>
                                    <button type="button" style="width: 30px; height:30px" id ="increment-amount">  <ion-icon name="add-outline" size="small"></ion-icon></button>
                                </div>
                            </div>
                            <div class="box-room">
                                <span >ห้องน้ำ</span>
                                <div class="btn-increas">
                                    <button type="button" style="width: 30px; height:30px" id ="decrement-bathroom">  <ion-icon name="remove-outline" size ="small"></ion-icon></button>
                                    <label style="font-size:30px" id="bathroom">0</label>
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
                <div class="test" id = "test"></div>
                <a style="color: #59A3B4;"  href="" id = "addRoom">เพิ่มห้องพักประเภทอื่น</a>
                <div class="box-address">
                    <h2>ชื่อที่พัก</h2>
                    <div class="input-group flex-nowrap">
                        <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <h2>ตำแหน่งที่ตั้ง</h2>
                    <div class="group-address">
                        <div class="address">
                            <label>ที่อยู่</label><br/>
                            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>
                        <div class="fix-item-address">
                            <div class="item">
                                <labe>ประเทศ</labe><br/>
                                <input type="text" class="form-control country" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="item">
                                <labe style="margin-left:15px">จังหวัด</labe><br/>
                                <input type="text" class="form-control apv" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="item">
                                <labe>เมือง</labe><br/>
                                <input type="text" class="form-control city" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="item">
                                <labe>รหัสไปรษณีย์</labe><br/>
                                <input type="text" class="form-control zip" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                        </div>
                        <div class="box-Convenience">
                            <h2>สิ่งอำนวยความสะดวก</h2>
                            <textarea id="w3review" name="w3review" rows="4" cols="50">At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.</textarea>
                        </div>
                    </div>
                </div>
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
            var oldButtonId = "";
            $("button").click(function() {
                // Get the id attribute of the clicked button
                var buttonId = $(this).attr("id");
                var splitButtonId = buttonId.split("-");
                if(splitButtonId[0] == "increment")
                {
                    // count++
             
                    if(buttonId == "increment-bedroom")
                    {
                        let num =  $("#countBedRoom").text();
                        num++
                        $("#countBedRoom").text(num);
                    }
                    if(buttonId == "increment-singleRoom")
                    {
                        let num =  $("#singleRoom").text();
                        num++
                        $("#singleRoom").text(num);
                    }
                    if(buttonId == "increment-amount")
                    {
                        let num =  $("#amount").text();
                        num++
                      
                        $("#amount").text(num);
                    }
                    if(buttonId == "increment-bathroom")
                    {
                        let num =  $("#bathroom").text();
                        num++
                        $("#bathroom").text(num);
                    }   
                }
                else{
                    if(buttonId == "decrement-bedroom")
                    {
                        let num =  $("#countBedRoom").text();
                        if(num >0)
                        {
                            num--
                            $("#countBedRoom").text(num);
                        }
                    }
                    if(buttonId == "decrement-singleRoom")
                    {
                        let num =  $("#singleRoom").text();
                        if(num>0)
                        {
                            num--
                            $("#singleRoom").text(num);
                        }
                    }
                    if(buttonId == "decrement-amount")
                    {
                        let num =  $("#amount").text();
                        if(num>0)
                        {
                            num--
                            $("#amount").text(num);
                        }
                    }
                    if(buttonId == "decrement-bathroom")
                    {
                        let num =  $("#bathroom").text();
                        if(num>0)
                        {
                            num--
                            $("#bathroom").text(num);
                        }
                    }
                    // $("#countBedRoom").text(count);
                }

                
                // Display the id in an alert (you can do something else with it)
                // alert("Button ID: " + buttonId);
            });
            $("#addRoom").click(function(e) {
                var newDiv = $(
                    `<div class='body-detail'>
            <div class="room">
                <div class="box-room">
                    <span >ห้องนอน</span>
                    <div class="btn-increas">
                        <button type="button" style="width: 30px; height:30px" id ="decrement-bedroom"> <ion-icon name="remove-outline" size ="small"></ion-icon></button>
                        <span style="font-size:30px" id ="countBedRoom">0</span>
                        <button type="button" style="width: 30px; height:30px" id ="increment-bedroom">  <ion-icon name="add-outline" size="small"></ion-icon></button>
                    </div>
                </div>
                <div class="box-room">
                    <span >ห้องเดี่ยว</span>
                    <div class="btn-increas">
                        <button type="button" style="width: 30px; height:30px" id ="decrement-singleRoom">  <ion-icon name="remove-outline" size ="small"></ion-icon></button>
                        <span style="font-size:30px" id="singleRoom">0</span>
                        <button type="button" style="width: 30px; height:30px" id ="increment-singleRoom">   <ion-icon name="add-outline" size="small"></ion-icon></button>
                    </div>
                </div>
                <div class="box-room">
                    <span >จำนวนที่รองรับ</span>
                    <div class="btn-increas">
                        <button type="button" style="width: 30px; height:30px" id ="decrement-amount"> <ion-icon name="remove-outline" size ="small"></ion-icon></button>
                        <label style="font-size:30px" id="amount">0</label>
                        <button type="button" style="width: 30px; height:30px" id ="increment-amount">  <ion-icon name="add-outline" size="small"></ion-icon></button>
                    </div>
                </div>
                <div class="box-room">
                    <span >ห้องน้ำ</span>
                    <div class="btn-increas">
                        <button type="button" style="width: 30px; height:30px" id ="decrement-bathroom">  <ion-icon name="remove-outline" size ="small"></ion-icon></button>
                        <label style="font-size:30px" id="bathroom">0</label>
                        <button type="button" style="width: 30px; height:30px" id ="increment-bathroom">  <ion-icon name="add-outline" size="small"></ion-icon></button>
                    </div>
                </div>
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
        </div>`
                );
                e.preventDefault();
                $("#test").append(newDiv);
            });
        });
    </script>
</body>
</html>