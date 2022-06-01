<?php
include_once('mail/class.phpmailer.php');
include_once('mail/class.smtp.php');
//6nb5Drv;

function sendmail(){
$mail = new PHPMailer();  
include 'dbcon.php';
$vfkey = $_REQUEST['key'];
$sql = "SELECT * FROM `user` WHERE vfkey = '$vfkey'";
$res = mysqli_query($conn,$sql);
if (mysqli_num_rows($res) == 1) {

$dis = mysqli_fetch_array($res);
 $usermail = $dis['email'];
 $username = $dis['name'];
 $uname = $dis['uname'];

 $sqld = "INSERT INTO `attendance`(`name`, `uname`, `dt`, `week`) VALUES ('$username','$uname','0','0')";
 $reset = "UPDATE `user` SET `vfkey`='0' WHERE `uname` = '$uname'";
    mysqli_query($conn,$sqld);
    mysqli_query($conn,$reset);

 $msg = '<h1>Your Details have been Verified Correctly</h1><br>Your user Name : '.$uname;
}
$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->Port = 587; // Set the SMTP port i tried and 457
$mail->Username = 'your_email@example.com';                // SMTP username
$mail->Password = 'your_email_account_password';                  // SMTP password

// $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only

$mail->From = 'testingemailweb04@gmail.com';
$mail->FromName = 'EduCom';
$mail->AddAddress($usermail, $username);  // Add a recipient

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Admin Verify Your Details';
$mail->Body    = $msg;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
    header("location:verify_de.php?e=Message could not be sent. Mailer Error: $mail->ErrorInfo");
   exit;
}

header("location:verify_de.php?m=Message Sent Successfully");
}
sendmail();


?>