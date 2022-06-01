<?php include 'nav.html'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <META http-equiv="Content-Type" content="text/html; charset= ISO-8859-1">
    <title>Create an Admin Account</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="css/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- FONTAWSOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

<div style="display: none;" class="alert alert-danger" id="er_msg" role="alert"></div>
<div style="display: none;" class="alert alert-success" id="su_msg" role="alert"></div>

<div class="main">
<!-- Sing in  Form -->
<section class="sign-in">
<div class="container">
    <div class="signin-content">
        <div class="signin-form">

        <h2 class="form-title">Create an Account</h2>

        <form method="POST" autocomplete="off" class="register-form" id="login-form">

            <div class="form-group">
                <label for="uname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" required autocomplete="off" name="uname" id="uname" placeholder="Enter a UserName"/>
            </div>
            <span id="un_er"></span>

            <div class="form-group">
                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                <span id="passer"> </span>
                <input type="password" autocomplete="off" required name="pass" id="pass" placeholder="Password"/>
            </div>
            <span id="p_er"></span>

            <div class="form-group">
                <label for="cpass"><i class="zmdi zmdi-lock"></i></label>
                <span id="cpasser"> </span>
                <input type="password" autocomplete="off" required name="cpass" id="cpass" placeholder="Confirm Password"/>
            </div>
            <span id="cp_er"></span>

            <div class="form-group form-button">
                <input type="reset" class="form-submit" value="Reset"/>
                <input type="submit" name="submit" id="signin" class="form-submit" value="Submit"/>
            </div>

        </form>
        </div>
    </div>
</div>
</section>
</div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
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

        $("#uname").keyup(function (e) { 
            var uname = $(this).val();
            if (uname == "") {
                $("#un_er").html('<p style="color:red">Enter a UserName</p>')
            } else {
                $.ajax({
                    type: "POST",
                    url: "check_em_ph.php",
                    data: {
                        "sub_ad_reg_ch_uname":1,
                        "uname":uname
                    },
                    success: function (data) {
                        if (data == 0) {
                            $("#un_er").html('<p style="color:red">***UserName alrady exits***</p>');
                        } if(data == 1) {
                            $("#un_er").html('');
                        }
                    }
                });
            }
        });


           $("#cpass").keyup(function (e) { 
            var pass = $("#pass").val();
            var cpass = $("#cpass").val();
            
            if (pass!=cpass) {
                $("#signin").hide();
                $("#cp_er").html('<p style="color:red">***password not match***</p>');
            } else {
                $("#cp_er").text('');
                $("#signin").show();
            }

           });

           $("#signin").click(function (e) { 
               e.preventDefault();
               var uname = $("#uname").val();
               var pass = $("#pass").val();
               var cpass = $("#cpass").val();

               if (uname == "") {
                $("#un_er").html('<p style="color:red">***Enter a UserName***</p>');
               } if(pass == "") {
                $("#p_er").html('<p style="color:red">***Enter a Password.***</p>');
               } if (cpass == "") {
                $("#cp_er").html('<p style="color:red">***Enter Confirm Password***</p>'); 
               }
               else{
                   $.ajax({
                       type: "POST",
                       url: "c_ad_reg.php",
                       data: {
                           "submit":1,
                           "uname":uname,
                           "pass":pass
                       },
                       success: function (data) {
                           if(data == 1){
                            $("#su_msg").show();
                                $("#su_msg").text('Success');
                           } if(data == 0){
                            $("#er_msg").show();
                                $("#su_msg").text('Something went wrong. Please try again later')
                           }
                       }
                   });
               }
           });
       });
       
    </script>
</body>
</html>
