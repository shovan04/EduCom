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

<body>
<b><?php  if(isset($_GET['e'])){?><div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($_GET['e']);?></div><?php } ?></b>
<b><?php  if(isset($_GET['m'])){?><div class="alert alert-success" role="alert"><?php echo htmlspecialchars($_GET['m']);?></div><?php } ?></b>
<div class="mnbd">
<div class="main">
<!-- Sing in  Form -->
<section class="sign-in">
    <div class="container">
<div class="signin-content">
    <div class="signin-form">
        <h2 class="form-title">Find UserName</h2>
        <form method="POST" autocomplete="off" class="register-form" id="login-form">
            <div class="form-group">
                <label for="your_name"><i class="fa-solid fa-envelope"></i></label>
                <input type="email" required name="email" id="your_name" placeholder="Enter Your Email"/>
            </div>
            <div class="form-group form-button">
                <input type="reset" class="form-submit reset" value="reset">
                <input type="submit" name="sub" id="signin" class="form-submit" value="Submit"/>
            </div>
        </form>
        <div class="err"></div>
    </div>
        </div>
    </div>
</section>
</div>
<!-- script -->
<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function () {

    $(document).bind("contextmenu",function(e){
    return false;
    });
    
    document.onkeypress = function (event) {  
    event = (event || window.event);  
    if (event.keyCode == 123) {  
    return false;  
    }  
    }  
    document.onmousedown = function (event) {  
    event = (event || window.event);  
    if (event.keyCode == 123) {  
    return false;  
    }  
    }  
    document.onkeydown = function (event) {  
    event = (event || window.event);  
    if (event.keyCode == 123) {  
    return false;  
    }  
    } 

    $("#your_name").keyup(function (e) {
        var uname = $(this).val();
        if(uname == ""){
            $(".err").html('<div class="text-danger">Enter an Email.</div>');
        }else{
            $.ajax({

                type: "POST",
                url: "check_em_ph.php",
                data: {
                    "find_user_name" : 1,
                    "email" : uname
                },
                success: function (data) {
                    if(data == 0){
                        $(".err").html('<div class="text-danger">Please Create an Account</div>');
                        $("#signin").hide();
                    }if(data == 1){
                        $(".err").html('<div class="text-success">Valid Email.</div>');
                        $("#signin").show();
                        $(".reset").hide();
                    }
                }
            });
        }
    $("#signin").click(function (e) {
        e.preventDefault();
        setTimeout(function(){
                        $(".err").html('<div class="text-primary">Loading...</div>');
                    },6000)
                var email = $("#your_name").val();
                if(email == ""){
                    $(".err").html('<div class="text-danger">Enter an Email.</div>');
                }else{
                    $.ajax({
                        type: "POST",
                        url: "funame.php",
                        data: {
                            "sub" : 1,
                            "email" : email
                        },
                        success: function (data) {
                            if(data == 0){
                                $(".err").html('<div class="text-danger">Message could not be sent.</div>');
                            }if(data == 1){
                                $(".err").html('<div class="text-success">Message Sent Successfully.</div>');
                            }if(data == 2){
                                $(".err").html('<div class="text-danger">Please Create an Account</div>');
                            }
                        }
                    });
                }
            });
    });
});

</script>
<!-- end script -->
</div>
</body>
</html>
