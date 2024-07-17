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

$query = "SELECT * FROM registered_user WHERE email='$email'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

echo "<h1>Update Profile</h1> <br>";
echo "<form action='update_profile_process.php' method='POST'>";
echo "First Name: <input type='text' name='first_name' value='" . $row['first_name'] . "' required><br>";
echo "Last Name: <input type='text' name='last_name' value='" . $row['last_name'] . "' required><br>";
echo "Mobile Number: <input type='text' name='mobile_number' value='" . $row['mobile_number'] . "' required><br>";
echo "New Password: <input type='password' name='new_password' value='" . $row['password'] . "' required><br><br><br>";
echo "<input type='submit' value='Update'>";
echo "</form>";

$conn->close();
?>
