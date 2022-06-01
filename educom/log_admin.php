<?php include 'nav.html'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <META http-equiv="Content-Type" content="text/html; charset= ISO-8859-1">
    <title>Login Here!</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="css/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
    <div class="alert alert-danger" style="display: none;" id="err" role="alert"></div>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
            </div>
            <div class="signin-form">
                <h2 class="form-title">Login</h2>
                <form method="POST" autocomplete="off" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" required name="uname" id="your_name" placeholder="Enter Your UserName"/>
                    </div><span id="un_er"></span>
                    <div class="form-group">
                        <label for="pass"><i class="fa-solid fa-lock"></i></label>
                        <input type="password" class="pass" name="pass" id="pass" placeholder="Enter your Password"/>
                    </div><span id="pw_er"></span>
                    <div class="form-group form-button">
                        <input type="submit" name="sub" id="signin" class="form-submit" value="Submit"/>
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

            $("#your_name").keyup(function (e) { 
                var uname = $(this).val();
                if (uname == "") {
                    $("#un_er").html('<p style="color:red">Enter a UserName</p>');
                } else {
                    $.ajax({
                        type: "POST",
                        url: "check_em_ph.php",
                        data: {
                            "ch_lo_ad_un":1,
                            "uname":uname
                        },
                        success: function (data) {
                            if (data == 1) {
                                $("#signin").show();
                                $("#un_er").html('<p style="color:green">Valid UserName</p>');
                            } if(data == 0){
                                $("#un_er").html('<p style="color:red">UserName does not exist</p>');
                                $("#signin").hide();
                            }
                        }
                    });
                }
            });

            $("#signin").click(function (e) { 
                e.preventDefault();
                var uname = $("#your_name").val();
                var pass = $("#pass").val();
                if (uname == "") {
                    $("#un_er").html('<p style="color:red">Enter a UserName.</p>');
                } if(pass == ""){
                    $("#pw_er").html('<p style="color:red">Enter a Password.</p>');
                } if(uname != "" && pass != ""){
                    $.ajax({
                        type: "POST",
                        url: "c_ad_log.php",
                        data: {
                            "sub":1,
                            "uname":uname,
                            "pass":pass
                        },
                        success: function (data) {
                            $("#err").show();
                            // $("#err").text(data);
                            if(data == 00){
                                $("#err").text('Invalid Credentials')
                            } if (data == 0) {
                                $(".pass").trigger("reset");
                                $("#err").text('Password not match');
                            } if (data == 1) {
                                // $.session.set("", );
                                window.location.href = "admin_con.php";
                            }
                        }
                    });
                }
            });
        });

    </script>
</body>
</html>
