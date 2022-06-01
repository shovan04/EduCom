<?php
include 'dbcon.php';
if(isset($_POST['submit'])){
$uname =  htmlspecialchars($_POST['uname']);
$pass =  htmlspecialchars($_POST['pass']);
$pass = "@edu#".$pass."#com@";
$phash = password_hash($pass , PASSWORD_DEFAULT);

    $sql = "INSERT INTO `admin`(`id`, `uname`, `pass`, `status`, `attempt`) VALUES ('','$uname','$phash','1','0')";
        $res = mysqli_query($conn,$sql);
    if ($res) {
        echo 1;
    } else {
        echo 0;
    }
    
}
?>