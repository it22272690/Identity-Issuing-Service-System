<!DOCTYPE html>
<html><body>
<?php
include_once'config.php';
?>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
 
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
{
echo "The file has been successfully uploaded.";
} 
else
{
echo "File not uploaded. Something is Wrong";
}
?>
<?php
	
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
	
$target_dir = "uploads/";
$targetfile = $target_dir . basename($_FILES["filename"]["name"]);
 
if (move_uploaded_file($_FILES["filename"]["tmp_name"], $targetfile)) 
{
echo "The file has been successfully uploaded.";
} 
else
{
echo "File not uploaded. Something is Wrong";
}

$sql="insert into new_nic(NewNICFormId,photo,fullName,gender,status,profession,DOB,birthPlace,country,city,certificateNo,address,dualCertificateNo,dateOfIssue,mobileNumber,email,certificatePhoto)
values('','$target_file','$fullName','$gender','$status','$profession','$birthdate','$placeofbirth','$country','$city','$certificateNo','$address','$dcertificateNo','$issuedate','$mobileNo','$email','$targetfile')";

if(mysqli_query($conn,$sql)){
	echo"<script>alert('Record Inserted Successfully')</script>";
	header("Location:payment.html");
}else{
	echo"<script>alert('Error in Insertion')</script>";
}

mysqli_close($conn);
?>

</body>
</html>