<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<b><?php  if(isset($_GET['e'])){?><div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($_GET['e']);?></div><?php } ?></b>
<b><?php  if(isset($_GET['m'])){?><div class="alert alert-success" role="alert"><?php echo htmlspecialchars($_GET['m']);?></div><?php } ?></b>

<?php
include 'dbcon.php';
if(isset($_REQUEST['key'])){
    $vfkey = $_REQUEST['key'];
    $sql = "SELECT * FROM `user` WHERE `vfkey` = '$vfkey'";
    $res = mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) == 1) {
        $sql = "UPDATE `user` SET `status`='1' WHERE `vfkey` = '$vfkey'";
          $dis = mysqli_fetch_array($res);
          $res = mysqli_query($conn,$sql);
        if($res){
          $name = $dis['name'];
          $uname = $dis['uname'];
          
        ?>
   <div class="card">
  <div class="card-body">
    <h5 class="card-title">Successfully Verified</h5>
    <p class="card-text">Send User's UserName to User</p>
  <a href="usermailsend.php?key=<?php echo$vfkey;?>" class="btn btn-primary">Send Email</a>
  </div>
</div><?php } else{ ?>
    <div class="card">
  <div class="card-body">
    <h5 class="card-title">Error</h5>
    <p class="card-text">Failed to match Verification Key</p>
  </div>
</div>
<?php }}} ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- script jQuery -->
<script type="vendor/jquery/jquery.min.js"></script>

</html>
