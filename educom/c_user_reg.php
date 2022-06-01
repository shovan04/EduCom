<?php
if (isset($_POST['submit'])) {

    include_once('mail/class.phpmailer.php');
    include_once('mail/class.smtp.php');
    include_once('mail/PHPMailerAutoload.php');
    //6nb5Drv;

    function sendmail()
    {
        $mail = new PHPMailer();
        include 'dbcon.php';

        $usermail = $_POST['email'];
        $userphone = $_POST['phone'];
        $username = $_POST['name'];
        $vf = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxya0123456789";
        $vfkey = str_shuffle($vf);
        $ukey = "edu_" . time() . "_com";

        $sql = "INSERT INTO `user`(`name`, `uname`, `email`, `phone`, `vfkey`, `status`) VALUES ('$username','$ukey','$usermail','$userphone','$vfkey','0')";
        mysqli_query($conn, $sql);

        $msg = '<h1>User Details</h1><br><br>Name : ' . $username . '<br>Email : ' . $usermail . '<br>Phone : ' . $userphone . '<br><br>Verify user details <a href="edycom.shovan04.xyz/verify_de.php?key=' . $vfkey . '">Click here</a>';

        $mail->IsSMTP();                                      // set mailer to use SMTP
        $mail->SMTPAuth = true;     // turn on SMTP authentication
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";  // specify main and backup server
        $mail->Port = 587; // Set the SMTP port i tried and 457
        $mail->Username = 'testingemailweb04@gmail.com';                // SMTP username
        $mail->Password = 'educ@123#com';                  // SMTP password

        $mail->SMTPDebug  = 1;                   // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only

        $mail->From = 'testingemailweb04@gmail.com';
        $mail->FromName = 'EduCom';
        $mail->AddAddress("shovanm50@gmail.com", "Shovan Mondal");  // Add a recipient

        $mail->IsHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'User Details';
        $mail->Body    = $msg;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->Send()) {
            // header("location:new_user.php?e=Message could not be sent. Mailer Error: $mail->ErrorInfo");
            echo 0;
            exit;
        }
        echo 1;
        // header("location:new_user.php?m=Your request has been sent to our admin. If admin verifi then the username will be sent to your email.");
    }
    sendmail();
}
// else{
//     echo 2;
//     // header("location:new_user.php?e=something went wrong please try again later");
//     }
