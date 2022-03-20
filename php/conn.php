<?php
$conn = new mysqli("localhost","root","","cv_email");
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>