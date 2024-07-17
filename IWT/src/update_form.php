<?php
include_once'config.php';
 ?>
<?php
session_start();

if (!isset($_SESSION['fullname'])) {
  header("Location: NewNICForm.html");
  exit();
}

$email = $_SESSION['fullname'];

$conn = new mysqli('localhost', 'root', '', 'dfrop');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM new_nic WHERE fullname='$fullName'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

echo "<h1>Update Profile</h1> <br>";
echo "<form action='update_new_nic.php' method='POST'>";
echo "photo: <input type='file name='image' value='" . $row['photo'] . "' required><br>";
echo "fullname: <input type='text' name='fullname' value='" . $row['fullname'] . "' required><br>";
echo "gender: <input type='radio' name='gender' value='" . $row['gender'] . "' required><br>";
echo "status: <input type='radio' name='status' value='" . $row['status'] . "' required><br><br><br>";
echo "profession: <input type='text' name='pro' value='" . $row['profession'] . "' required><br>";
echo "birthdate: <input type='date' name='date' value='" . $row['fDOB'] . "' required><br>";
echo "placeofbirth: <input type='text' name='place' value='" . $row['birthPlace'] . "' required><br>";
echo "country: <input type='text' name='country' value='" . $row['country'] . "' required><br>";
echo "city: <input type='text' name='city' value='" . $row['city'] . "' required><br>";
echo "certificateNo: <input type='text' name='certificateNo' value='" . $row['certificateNo'] . "' required><br>";
echo "address: <input type='text' name='address' value='" . $row['address'] . "' required><br>";
echo "dcertificateNo: <input type='text' name='dcnumber' value='" . $row['dualCertificateNo'] . "' required><br>";
echo "issuedate: <input type='date' name='cdate' value='" . $row['dateOfIssue'] . "' required><br>";
echo "mobileNo: <input type='text' name='mobile' value='" . $row['fmobileNumber'] . "' required><br>";
echo "email: <input type='email' name='email' value='" . $row['email'] . "' required><br>";
echo "certificatePhoto: <input type='file' name='filename' value='" . $row['certificatePhoto'] . "' required><br>";
echo "<input type='submit' value='Update'>";
echo "</form>";

$conn->close();
?>


	