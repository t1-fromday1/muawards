<?php

// Create connection
$conn = mysqli_connect("localhost", "root", "", "muawards");
// $conn = mysqli_connect("localhost", "t1ne", "thispassword255", "muawards_muawards");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>