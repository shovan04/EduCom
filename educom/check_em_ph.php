<?php
	$conn = mysqli_connect("localhost","root","","attendance");
	if (!$conn) {
	  echo 'failed';
	}

		// check email
		if(isset($_POST['sub_em'])){
		  $email = htmlspecialchars($_POST['email']);
		  $res_em =mysqli_query($conn,"SELECT * FROM `user` WHERE email = '$email'");
		if( mysqli_num_rows($res_em) > 0){
		  echo 0;
		}else{
		  echo 1;
		}
		}
		// check phone
		if(isset($_POST['sub_ph'])){
		  $phone = htmlspecialchars($_POST['phone']);
		  $res_ph = mysqli_query($conn,"SELECT * FROM `user` WHERE phone = '$phone'");
		  if(mysqli_num_rows($res_ph) > 0){
			echo 0;
		  }else{
			echo 1;
		  }
		}


		// new_user
		if (isset($_POST['sub'])) {
			$email = htmlspecialchars($_POST['email']);
			$phone = htmlspecialchars($_POST['phone']);
		  $res_em =mysqli_query($conn,"SELECT * FROM `user` WHERE email = '$email'");
		if( mysqli_num_rows($res_em) > 0){
		  echo 0;
		}

		$res_ph = mysqli_query($conn,"SELECT * FROM `user` WHERE phone = '$phone'");
		if(mysqli_num_rows($res_ph) > 0){
		  echo 0;
		}

		}
		// new_user end

		// index
		if (isset($_POST['subind'])) {
		$uname = htmlspecialchars($_POST['uname']);
		date_default_timezone_set("Asia/Kolkata");
		  $wek = date("W");
		  // Fetch week
		  $sql = "SELECT * FROM `attendance` WHERE `uname` = '$uname'";
		  $res = mysqli_query($conn,$sql);
			if(mysqli_num_rows($res) > 0){
				$dis = mysqli_fetch_array($res);
				$wk = $dis['week'];
				if ($wek == $wk) {
					echo 0;
				}else{
					echo 1;
				}
			}else {
				echo 2;
			}
		}
		// end_index
		// start find_user_name
		if(isset($_POST['find_user_name'])){
		  $email = htmlspecialchars($_POST['email']);
				$sql = "SELECT * FROM `user` WHERE email = '$email'";
				  $res = mysqli_query($conn,$sql);
				  if (mysqli_num_rows($res) == 1) {
					  echo 1;
				  }else{
					echo 0;
				  }
		}
		// end find_user_name
		// start admin_reg
			if (isset($_POST['sub_ad_pw'])) {
			  $pass = htmlspecialchars($_POST['pass']);
			  $cpass = htmlspecialchars($_POST['cpass']);

			  if ($pass != $cpass) {
				echo 0;
			  }if($pass == $cpass){
				echo 1;
			  }
			}
		  // admin_reg_____check username
			if (isset($_POST['sub_ad_reg_ch_uname'])) {
			  $uname = htmlspecialchars($_POST['uname']);
			  $res = mysqli_query($conn,"SELECT * FROM `admin` WHERE uname = '$uname'");
				if (mysqli_num_rows($res) == 1) {
				  echo 0;
				} else {
				  echo 1;
				}
		    }
		// End  _admin_reg_
		// start log_admin
		if(isset($_POST['ch_lo_ad_un'])){
		  $uname = htmlspecialchars($_POST['uname']);
		  $res = mysqli_query($conn,"SELECT * FROM `admin` WHERE uname = '$uname'");
			if (mysqli_num_rows($res) == 1) {
			  echo 1;
			} else {
			  echo 0;
			}
		}
?>