
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

$fullName=$_POST['fullname'];
	$gender=$_POST['gender'];
	$status=$_POST['status'];
	$profession=$_POST['pro'];
	$birthdate = date('Y-m-d', strtotime($_POST['date']));
	$placeofbirth=$_POST['place'];
	$country=$_POST['country'];
	$city=$_POST['city'];
	$certificateNo=$_POST['certificateNo'];
	$address=$_POST['address'];
	$dcertificateNo=$_POST['dcnumber'];
	$issuedate = date('Y-m-d', strtotime($_POST['cdate']));
	$mobileNo=$_POST['mobile'];
	$email = $_POST['email'];

$conn = new mysqli('localhost', 'root', '', 'dfrop');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!empty($fullName)) {
  $query = "UPDATE new_nic SET photo='$target_file' fullname='$fullName', gender='$gender', status='$atatus', profession='$profession',DOB='$birthdate',birthPlace='$placeofbirth',country='$country',ciyt='$city',certificateNo='$certificateNo',address='$address',dualCertificateNo='$dcertificateNo',dateOfIssue='$issuedate',mobileNumber='$mobileNo',email='$email',certificatePhoto='$targetfile' WHERE fullname='$fullName'";
} else {
  $query = "UPDATE new_nic SET   photo='$target_file' fullname='$fullname', gender='$gender', status='$atatus', profession='$profession',DOB='$birthdate',birthPlace='$placeofbirth',country='$country',ciyt='$city',certificateNo='$certificateNo',address='$address',dualCertificateNo='$dcertificateNo',dateOfIssue='$issuedate',mobileNumber='$mobileNo',email='$email',certificatePhoto='$targetfile' WHERE fullname='$fullName'";
} 

if ($conn->query($query) === TRUE) {
  echo "Profile updated successfully!";
  header("Location:NewNICForm.html");
  exit();
} else {
  echo "Error updating profile: " . $conn->error;
}

$conn->close();
?>
