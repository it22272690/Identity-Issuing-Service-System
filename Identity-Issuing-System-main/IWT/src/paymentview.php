<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DFROP";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$province = $_POST['province'];
$postal_code = $_POST['postal_code'];
$card_type = $_POST['card_type'];
$name_on_card = $_POST['name_on_card'];
$card_number = $_POST['card_number'];
$valid_through = $_POST['valid_through'];
$cvv = $_POST['cvv'];
$day_type = $_POST['day_type'];

$sql = "INSERT INTO payment (full_name, email, address, city, province, postal_code, card_type, name_on_card, card_number, valid_through, cvv, day_type)
        VALUES ('$full_name', '$email', '$address', '$city', '$province', '$postal_code', '$card_type', '$name_on_card', '$card_number', '$valid_through', '$cvv', '$day_type')";

if ($conn->query($sql) === TRUE) {
    echo "Payment data inserted successfully.<br>";
    echo "If you want to change the data, <a href='payment.html'>click here</a>.<br>";
    echo "If you want to delete the data, <a href='delete.php'>click here</a>.<br>";
    echo "If you have no changes to make, <a href='confirm.php'>click here</a> to confirm your payment.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
