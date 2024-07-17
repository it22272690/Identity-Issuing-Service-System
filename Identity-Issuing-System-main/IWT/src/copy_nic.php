<!DOCTYPE html>
<html><body>
<?php
include_once'config.php';
 ?>
 <?php
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["photofile"]["name"]);
 
if (move_uploaded_file($_FILES["photofile"]["tmp_name"], $target_file)) 
{
echo "The file has been successfully uploaded.";
} 
else
{
echo "File not uploaded. Something is Wrong";
}
?>
<?php
	
	$cardnumber=$_POST['card_no'];
	$new_date=date('Y-m-d', strtotime($_POST['issuedate']));
	
$target_dir = "upload/";
$targetfile = $target_dir . basename($_FILES["policefile"]["name"]);
 
if (move_uploaded_file($_FILES["policefile"]["tmp_name"], $targetfile)) 
{
echo "The file has been successfully uploaded.";
} 
else
{
echo "File not uploaded. Something is Wrong";
}

$sql="insert into copy_nic(IDcard_No,Date,Police_Report,Photograph,Copy_Nic_ID)
values('$cardnumber','$new_date','$targetfile','$target_file','')";

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
