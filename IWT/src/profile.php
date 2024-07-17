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

echo "<h1>Your profile</h1>";
echo "<br>";

echo "Welcome, " . $row['first_name'] . " " . $row['last_name'] . "!<br>";
echo "Email: " . $row['email'] . "<br>";
echo "Mobile Number: " . $row['mobile_number'] . "<br>";
echo "Password: " . $row['password'] . "<br>";
echo "<br>";

echo "<a href='update_profile.php'>Update Profile</a>   <a href='delete_profile.php'>Delete Profile</a><br>";
echo "<br>";
echo "View Services :<a href='services.html'>Services</a><br><br>";
echo "Go back into Home Page :<a href='home.html'>Home</a><br>";
echo "<br>";

echo "<form action='logout.php' method='POST'>";
echo "<input type='submit' value='Log Out'>";
echo "</form>";

$conn->close();
?>
