<?php
include 'dbcon.php';
if(isset($_POST['submit'])){
date_default_timezone_set("Asia/Kolkata");
$uname = $_POST['uname'];
// Fetch Name
$namesql = "SELECT * FROM `user` WHERE `uname` = '$uname'";
$nres = mysqli_query($conn,$namesql);
$namedis = mysqli_fetch_array($nres);

$datetime = date("Y-m-d h:i:s");
$wek = date("W");

$name = $namedis['name'];
$sql = "INSERT INTO `attendance`( `name`,`uname`, `dt`, `week`) VALUES ('$name','$uname','$datetime','$wek')";
$res = mysqli_query($conn,$sql);

    if($res){
        echo 1;
    }else{
        echo 0;
    }
}
?>