<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Title Here</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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


    .row {
      position: relative;
      padding: px;
      padding-left: 30px;
      margin-top: 20px;
      width: 100%;
    }

    .col-sm-4 {
      text-align: center;
      /* Center the content */
    }

    .col-md-6 {
      margin-top: 20px;
      text-align: center;
      /* Center the content */
    }

    .col-md-12 {
      margin-top: 20px;
      text-align: center;
      /* Center the content */
    }

    h2 {
      font-size: 2rem;
      /* Updated the font size property */
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

  <form action="server.php" method="post">
  <div class="container-fluid">
    <div class="row text-center">
      <div class="col-md-6">
        <div class="card card-bd">
          <div class="card-border"></div>
          <div class="card-body box-style">
            <div class="media align-items-center">
              <h2 id="process">รอดำเนินการ</h2>
<?php

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) 
{
  echo $row['booking_status'];
}
} else {
  echo "0 results";
}
// close connection
mysqli_close($conn);
?>
              <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
              </svg>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card card-bd">
          <div class="card-border"></div>
          <div class="card-body box-style">
            <div class="media align-items-center">
              <h2 id="conferm">ยืนยันการจอง</h2>
              <svg width="150" height="150" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-bd">
          <div class="card-border"></div>
          <div class="card-body box-style">
            <div class="media align-items-center">
              <h2 id="totalroom">จำนวนห้องพักทั้งหมด</h2>
              <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-bd">
          <div class="card-border"></div>
          <div class="card-body box-style">
            <div class="media align-items-center">
              <h2 id="employee">จำนวนพนักงาน</h2>
              <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card card-bd">
          <div class="card-border"></div>
          <div class="card-body box-style">
            <div class="media align-items-center">
              <h2 id="total_price">รายได้ทั้งหมด</h2>
              <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>




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







</body>

</html>