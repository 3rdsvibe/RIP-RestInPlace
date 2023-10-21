
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
     @import url('https://fonts.googleapis.com/css2?family=Athiti&display=swap');
    * {
      font-family: 'Athiti', sans-serif;
    }
    
    body {
      margin: 0;
      background-image: url(wall.png);
      background-size: cover;
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
  .topnav a:not(.navbar-brand)  {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }

  @media screen and(max-width:600px) {
    .border-container {
      width: 100%;
    }
    
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}


.border-container {
  position: center;
  background-color: #F6F6F6;
    height: 90%;
    width: 90%;
    margin-top: 30px;
    flex-shrink: 0;
    border-radius: 10px;
    font-size: 18px;
    padding: 25px;
}

.row {
  position: center;
}

.detail {
  margin-top: 50px;
}

form {
    margin-top: 30px;
}

.col-sm-3{
    font-size: 16px;
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
        <a href="http://localhost/Project/UI5/">การจองที่พัก</a>
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

  <form action="updatebank.php" method="post">
  <div class="border-container">
    <div class="payment">
      <h2>เลือกช่องทางการรับเงิน</h2><br>
      <div class="row">
        <div class="col-sm-3">
        <input type="radio" name="checkbox_name[]" value="กสิกร" >
        <label for="bank">ธนาคารกสิกร</label>
            <img id="bank" src="https://bluporthuahin.com/wp-content/uploads/2020/01/icon_kbank.png" style="width: 60px; height: 60px;">
      </div>

      <div class="col-sm-3">
      <input type="radio" name="checkbox_name[]" value="กรุงเทพ">
      <label for="bank">ธนาคารกรุงเทพ</label>
            <img id="bank" src="https://awards.brandingforum.org/wp-content/uploads/2016/10/BBL-New-EN.jpg" style="width: 60px; height: 60px;">
      </div>

      <div class="col-sm-3">
      <input type="radio" name="checkbox_name[]" value="ไทยพาณิชย์">
      <label for="bank">ธนาคารไทยพาณิชย์</label>
            <img id="bank" src="https://play-lh.googleusercontent.com/fRj3gVsSGNq1izt8NON0l6Cdqt2dEK4IRhInLoPLlunZMCA0wwOmVnaeDYQEZ8ejWQ" style="width: 60px; height: 60px;">
      </div>

      <div class="col-sm-3">
      <input type="radio" name="checkbox_name[]" value="กรุงไทย">
      <label for="bank">ธนาคารกรุงไทย</label>
            <img id="bank" src="https://i0.wp.com/www.kanjanabaramee.org/wp-content/uploads/2017/11/logo_ktb_sqr.jpg?fit=380%2C380&ssl=1" style="width: 60px; height: 60px;">
        
      </div>
    </div>
    
    <label for="bank_number">เลขที่บัญชี</label><br>
    <input type="text" name="bank_number" id="bank_number" >
    <input type="submit" value="ยืนยัน" id="submit" onclick="return bank_check()">
    <h5>
      โอนเงินเข้าธนาคาร
    </h5>
    <p>หลังจากที่ลูกค้าเช็คเอาต์ เราจะโอนเงินเข้าบัญชีธนาคารของท่านโดยตรง</p>
    
  </div>

  </form>

  <script>
    function bank_check() {
    var accountNumber = document.getElementById("bank_number").value;

    // ตรวจสอบว่าหมายเลขบัญชีมีความยาว 10 หลัก
    if (accountNumber.length !== 10) {
        alert("เลขบัญชีต้องมีความยาว 10 หลัก");
        return false;
    }

    // ตรวจสอบว่าหมายเลขบัญชีประกอบด้วยตัวเลขเท่านั้น
    if (!/^\d+$/.test(accountNumber)) {
        alert("เลขบัญชีต้องประกอบด้วยตัวเลขเท่านั้น");
        return false;
    }

    // นำหมายเลขบัญชีที่ไม่รวมหลักตรวจสอบไปคำนวณ
    var accountWithoutChecksum = accountNumber.substring(0, 9);

    // คำนวณหลักตรวจสอบ
    var sum = 0;
    for (var i = 0; i < accountWithoutChecksum.length; i++) {
        var digit = parseInt(accountWithoutChecksum.charAt(i));
        if (i % 2 === 0) {
            digit *= 2;
            if (digit > 9) {
                digit -= 9;
            }
        }
        sum += digit;
    }

    var checksum = (10 - (sum % 10)) % 10;

    // เปรียบเทียบหลักตรวจสอบที่คำนวณกับหลักตรวจสอบที่ในหมายเลขบัญชี
    var actualChecksum = parseInt(accountNumber.charAt(9));

    if (checksum === actualChecksum) {
        alert("เลขบัญชีถูกต้อง");
        return true;
    } else {
        alert("เลขบัญชีไม่ถูกต้อง");
        return false;
    }
}


  </script>


  


  


</body>
</html>