<?php include 'nav.html'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <META http-equiv="Content-Type" content="text/html; charset= ISO-8859-1">
    <title>New Student</title>

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
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

<br>
<div class="mnbd">
<span id="msg"></span>
 <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">New User</h2>
                        <form method="POST" class="register-form" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="name"><i class="fa-solid fa-user"></i></label>
                                <input type="text" name="name" id="name" placeholder="Enter Your Name"/>
                                <span id="name_er"></span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fa-solid fa-envelope"></i></label>
                                <input type="email" name="email" id="email" placeholder="Enter your Email"/>
                                <span id="email_er"></span>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="fa-solid fa-phone"></i></label>
                                <input type="tle" pattern="[0-9]{10}" name="phone" id="phone" placeholder="Enter your Phone Number"/>
                                <span id="phone_er"></span>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signin" class="form-submit" value="Submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/new_user.js"></script>
</div>
</body>

</html>
