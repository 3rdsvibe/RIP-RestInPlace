
 <?php include('server.php'); ?>


<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
  body {
    background-image: url('wall.png');
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    background-size: cover;
  }

  
  /* Control the left side */
  #leftHalf {
    float: left;
    background-color: #F6F6F6;
    text-align: left;
    height: 80%;
    width: 45%;
    margin-left: 20px;
    flex-shrink: 0;
    border-radius: 10px;
    font-size: 18px;
    padding: 25px;
    margin-top: 5%;
    font-family: 'Athiti', sans-serif;
  }

  /* Control the right side */
  #rightHalf {
    
    margin-left: 50%;
    height: 60px;
  }

  /* .btn-primary {
    background-color: rgb(55, 145, 229);
    border: rgb(55, 145, 229);
  } */

  .login{
    background-color: rgb(55, 145, 229);
    border: rgb(55, 145, 229);
  }

  .regis{
    background-color: #fff;
    border: rgb(61, 119, 177);
    color: rgb(55, 145, 229);
  }

  h2 {
    text-align: center;
  }
  
  
  
  
</style>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>log in</title>
</head>

<body class="text-center">
<section class="vh-100">
<div class="container-fluid">
<div id="leftHalf">
  <h2 >เข้าสู่ระบบ</h2>
    <main class="form-signin">
      <form action="customer.php partner.php manager.php" method="post">
        
        <?php if (isset($_SESSION['error'])) : ?>
          <div class="error">
            <h3>
              <?php 
              echo $_SESSION['error'];
              unset($_SESSION['error']);
              ?>
            </h3>
          </div>
          <?php endif ?>
      
      

        <div class="form-group">
          <label for="email">อีเมล</label><br>
          <input class="form-control" type="text" name="email" placeholder="อีเมล" >
        </div>

        <div class="form-group">
          <label for="password">รหัสผ่าน</label><br>
          <input class="form-control" type="text" name="password" placeholder="รหัสผ่าน" >
        </div><br>

        <div class="form-group sign-in">
          <button type="submit" name="customer" class="login customer w-100 btn btn-md btn-primary">เข้าสู่ระบบผู้จอง</button>
          </div><br>

          <div class="form-group sign-in">
          <button type="submit" name="partner" class="login partner w-100 btn btn-md btn-primary" href="partner.php">เข้าสู่ระบบผู้ปล่อยเช่า</button><br>
          <a href="index.php">ลืมรหัสผ่าน</a>  
        </div><br>

        
        
        <div class="form-group">
          <button type="submit" name="regis_user" class="regis w-100 btn btn-md btn-primary" href="register.php">ยังไม่มีบัญชี? สมัครสมาชิก</button>
        </div><br>

        <div class="form-group">
          <button type="submit" name="manager" class="regis w-100 btn btn-md btn-primary" href="register.php">เข้าสู่ระบบผู้จัดการ</button>
        </div>
      </form>
    </main>

  </div>

  <div  id="rightHalf">
    <div class="centered">
      <img src="logo.png" id="logo" width="250px" height="250px">
    </div>

  </div>


</div>
</section>
  

</body>

</html>

