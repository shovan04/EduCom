<?php
include 'nav.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="css/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Fontqwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Home</title>
</head>
<style>
body{
font-family: 'Akaya Telivigala', cursive;
    }
</style>
<body>

<noscript>
    <link rel="stylesheet" href="css/jsblock.css">
<div id="cssLoader17" class="main-wrap main-wrap--white">
<div class="cssLoader17"></div>
</div>
<style>
    .mnbd{
        display:none;
    }
</style>
</noscript>

<div class="mnbd">

    <div class="bd">
<b><?php  if(isset($_GET['e'])){?><div class="alert alert-danger" role="alert"><?php echo $_GET['e'];?></div><?php } ?></b>
<b><?php  if(isset($_GET['m'])){?><div class="alert alert-success" role="alert"><?php echo $_GET['m'];?></div><?php } ?></b>
<?php
//  if (date('l') == "Saturday") {?>
<div class="main">
<!-- Sing in  Form -->
<section class="sign-in">
    <div class="container">
<div class="signin-content">
    <div class="signin-form">
        <h2 class="form-title">Attendance ||  <?php echo date("W"); ?></h2>
        <form method="POST" autocomplete="off" class="register-form" id="login-form">
            <div class="form-group">
                <label for="uname"><i class="fa-solid fa-user"></i></label>
                <input type="text" required name="uname" id="uname" placeholder="Enter Your UserName"/>
            </div>
            <div class="form-group form-button">
                <input type="reset" id="reset" class="form-submit" value="reset">
                <input type="submit" name="sub" style="display:none;" id="signin" class="form-submit" value="Submit"/>
                <span class="check"></span>
            </div>
            <div class="alert alert-success success" style="display: none;" role="alert"></div>
        </form>
    </div>
        </div>
    </div>
</section>
</div>
<!-- script -->
<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script src="js/index.js"></script>
    </div>

</div>
 <!-- end script -->

<?php /* }
 else{ ?>
<h1>Wait for Saturday</h1>
<?php } */ ?>

 </div>
 </body>
</html>