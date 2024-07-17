<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'DFROP');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM registered_user WHERE email='$email' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
  // Authentication successful
  $_SESSION['email'] = $email;
  header("Location: profile.php");
  exit();
} else {

  echo "Error: Invalid email or password!";
}

$conn->close();
?>

