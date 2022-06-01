<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" autocomplete="off">
        <input type="text" name="name" placeholder="Enter Name" id=""><br><br>
        <input type="email" name="email" id="" placeholder="Enter email"><br><br>
        <button type="submit" name="submit">Submit</button>    
    </form>
</body>
</html>

<?php

require 'class.phpmailer.php';
require 'class.smtp.php';
 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

$mail = new PHPMailer;
 
$mail->IsSMTP();
// Send email using Yahoo SMTP server
$mail->Host = 'mail.shovan04.xyz';
// port for Send email
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->Username = 'shovan@shovan04.xyz';
$mail->Password = 'dYYFml4_blOb';
 
$mail->From = 'shovan@shovan04.xyz';
$mail->FromName = 'Shovan Mondal';// frome name
$mail->AddAddress($email, $name);  // Add a recipient  to name
// $mail->AddAddress('to-Yahoo-address@Yahoo.com');  // Name is optional
 
$mail->IsHTML(true); // Set email format to HTML
 
$mail->Subject = 'Test';
$mail->Body    = '<html><h3>This is the HTML message body</h3> <strong>in bold!</strong></html>';
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients at http://onlinecode/';
 
if(!$mail->Send()) {
echo 'Message could not be sent.<br>';
echo 'Mailer Error: ' . $mail->ErrorInfo;
exit;
}
echo 'Message of Send email using Yahoo SMTP server has been sent';
}
?>