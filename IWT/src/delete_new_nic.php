<?php
include_once'config.php';
?>
<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: NewNICForm.html");
  exit();
}

$email = $_SESSION['email'];
$conn = new mysqli('localhost', 'root', '', 'dfropP');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "DELETE FROM new_nic WHERE fullname='$fullName'";
if ($conn->query($query) === TRUE) {
  echo "Profile deleted successfully!";
  session_destroy();
  header("Location: NewNICForm.html");
  exit();
} else {
  echo "Error deleting profile: " . $conn->error;
}

$conn->close();
?>
