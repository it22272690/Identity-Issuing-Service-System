<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DFROP";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM payment";

if ($conn->query($sql) === TRUE) {
    echo "Payment data deleted successfully.";
} else {
    echo "Error deleting payment data: " . $conn->error;
}

$conn->close();
?>
