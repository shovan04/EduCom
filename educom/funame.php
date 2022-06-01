<?php

include_once('mail/class.phpmailer.php');
include_once('mail/class.smtp.php');

function sendmail(){
    $mail = new PHPMailer();  
    include 'dbcon.php';
    if (isset($_POST['sub'])) {
        $email = htmlspecialchars($_POST['email']);
        $sql = "SELECT * FROM `user` WHERE email = '$email'";
          $res = mysqli_query($conn,$sql);
              $dis  = mysqli_fetch_array($res);
              $name = $dis['name'];
             $uname = $dis['uname'];
            $msg = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
            <div style="margin:50px auto;width:70%;padding:20px 0">
              <div style="border-bottom:1px solid #eee">
                <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">EduCom</a>
              </div>
              <p style="font-size:1.1em">Hi,</p>
              <p><b>'.$name.'</b>&nbsp;&nbsp;Your username is</p>
              <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">'.$uname.'</h2>
              <p style="font-size:0.9em;">Regards,<br />EduCom</p>
              <hr style="border:none;border-top:1px solid #eee" />
              <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                <p>EduCom</p>
                <p>Teacher - Samir Das.</p>
                <p>Location - </p>
              </div>
            </div>
          </div>';
           
    $mail->IsSMTP();                                      // set mailer to use SMTP
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";  // specify main and backup server
    $mail->Port = 587; // Set the SMTP port i tried and 457
    $mail->Username = 'your_mail@example.com';                // SMTP username
    $mail->Password = 'your_email_account_password';                  // SMTP password
    
    // $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                               // 1 = errors and messages
                                               // 2 = messages only
    
    $mail->From = 'educom@cs.com';
    $mail->FromName = 'EduCom';
    $mail->AddAddress($email);  // Add a recipient
    
    $mail->IsHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = 'Resend UserName';
    $mail->Body    = $msg;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    if(!$mail->Send()) {
        // header("location:finduname.php?e=Message could not be sent. Mailer Error: $mail->ErrorInfo");
        echo 0;
       exit;
    }
    
    // header("location:finduname.php?m=Message Sent Successfully");
    echo 1;
    }
}
    sendmail();
    echo 2;
?>