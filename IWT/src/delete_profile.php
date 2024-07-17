<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: signin.html");
  exit();
}

$email = $_SESSION['email'];
$conn = new mysqli('localhost', 'root', '', 'DFROP');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "DELETE FROM registered_user WHERE email='$email'";
if ($conn->query($query) === TRUE) {
  echo "Profile deleted successfully!";
  session_destroy();
  header("Location: signin.html");
  exit();
} else {
  echo "Error deleting profile: " . $conn->error;
}

$conn->close();
?>
