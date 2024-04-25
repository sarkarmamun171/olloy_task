<?php
$connect = mysqli_connect('localhost', 'root', '');
mysqli_select_db($connect,'inventory');

session_start();

// Register session variables (deprecated)
// session_register("type");
// session_register('user_id');
?>

<!-- <?php
// $connect = mysqli_connect("localhost","root","","inventory");

// Check connection
// if (mysqli_connect_errno()) {
  // echo "Failed to connect to MySQL: " . mysqli_connect_error();
  // exit();
// }
?> -->


