<?php
$conn = new mysqli('localhost', 'root', '', 'DFROP');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mobile_number = $_POST['mobile_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$query = "SELECT * FROM registered_user WHERE email='$email'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
  echo "Error: Email already exists!";
} elseif ($password !== $confirm_password) {
  echo "Error: Passwords do not match!";
} else {

  $query = "INSERT INTO registered_user (first_name, last_name, mobile_number, email, password) 
            VALUES ('$first_name', '$last_name', '$mobile_number', '$email', '$password')";
  if ($conn->query($query) === TRUE) {
    echo "Registration successful!";
    header("Location: signin.html");
    exit();
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
  }
}

$conn->close();
?>
