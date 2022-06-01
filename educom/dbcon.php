<?php 
// $conn = mysqli_connect("sql213.epizy.com","epiz_30866752","tUy4Tf1j781","epiz_30866752_smp");  //infinityfree

$conn = mysqli_connect("localhost","root","","attendance");  //localhost
// Check connection
if (!$conn) {
  echo "Failed to connect Server. Plase try again letter";
}
?>