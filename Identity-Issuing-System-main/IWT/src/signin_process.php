<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli('localhost', 'root', '', 'DFROP');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM registered_user WHERE email='$email' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {

  $_SESSION['email'] = $email;
  header("Location: profile.php");
} else {

  echo "<script>alert('Invalid email or password. Please sign up.');</script>";
  header("Refresh:0; url=signup.html");
}

$conn->close();
?>
