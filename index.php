<?php
include("php_scripts/log_in.php");
$username = $password = '';
//alert_msg = '';
?>


<!DOCTYPE html>

<html>
  
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
        <!-- Bootstrap 3.3.7 -->
        <!-- <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
        <!-- Font Awesome -->
        <!-- <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css"> -->
        <!-- Ionicons -->
        <!-- <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css"> -->
        <!-- Theme style -->
        <!-- <link rel="stylesheet" href="dist/css/AdminLTE.min.css"> -->
        <!-- Custom CSS -->
        <!-- <link rel="stylesheet" href="dist/css/custom.css"> -->
        <link rel ="stylesheet" href = "styles/form-style.css">
        <!-- <link rel ="stylesheet" href = "Login_v2/css/main.css">
        <link rel ="stylesheet" href = "Login_v2/css/util.css"> -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  </title>

  <title>H.R | Information System</title>
        </head>
        <div class="wrapper fadeInDown ">
  
    <!-- Tabs Titles -->
    <!-- Icon --> <body >

      <h1 class="h1 fadeIn first"  >  Human Resource Information System</h1>
<br>
<br>
<br>
<br>
      <div id="formContent">
    <div class="fadeIn first">
    <?php echo $alert_msg;?>
    </div>

    <!-- Login Form -->
    <form action="" method="POST">
      <br>
     
    
    <br>
  
    
      <input type="text" class="fadeIn second" name="username" placeholder="Username" autofocus require>
      <input type="password" class="fadeIn third" name="password" placeholder="Password" require>
      <input type="submit" name = "submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->

  </div>
</div>
</body>
  </html>