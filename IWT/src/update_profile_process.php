<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: signin.html");
  exit();
}

$email = $_SESSION['email'];

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mobile_number = $_POST['mobile_number'];
$new_password = $_POST['new_password'];

$conn = new mysqli('localhost', 'root', '', 'DFROP');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!empty($new_password)) {
  $query = "UPDATE registered_user SET first_name='$first_name', last_name='$last_name', mobile_number='$mobile_number', password='$new_password' WHERE email='$email'";
} else {
  $query = "UPDATE registered_user SET first_name='$first_name', last_name='$last_name', mobile_number='$mobile_number' WHERE email='$email'";
}

if ($conn->query($query) === TRUE) {
  echo "Profile updated successfully!";
  header("Location: profile.php");
  exit();
} else {
  echo "Error updating profile: " . $conn->error;
}

$conn->close();
?>
