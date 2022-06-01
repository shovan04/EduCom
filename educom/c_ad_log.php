<?php
    session_start();
    session_regenerate_id();
    include 'dbcon.php';
if (isset($_POST['sub'])) {
    $uname = htmlspecialchars($_POST['uname']);
    $pass = htmlspecialchars($_POST['pass']);
    $pass = "@edu#".$pass."#com@";
    $sql = "SELECT * FROM `admin` WHERE uname = '$uname'";
    $res = mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) == 1) {
      $session_id = session_id();
      $_SESSION['sesid'] = $session_id;
      $chsys = "UPDATE `admin` SET `chsys`='$session_id' WHERE uname = '$uname'";
        $dis = mysqli_fetch_array($res);
        $phash = $dis['pass'];
        if(password_verify($pass,$phash)){
            $_SESSION['user'] = $uname;
            echo 1;
        }
        else{
            // header("location:log_admin.php?m=Password don't match");
            echo 0;
        }
    }
    else{
        // header("location:log_admin.php?m=Invalid Credentials");
        echo 00;
    }
}

?>
