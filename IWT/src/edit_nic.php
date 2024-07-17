<?php
    include_once'config.php';
?>
<!DOCTYPE html>
<html><body>
<?php

	$cardnumber1=$_POST['card_no'];
	$new_date1 = date('Y-m-d', strtotime($_POST['id_no']));
    $new_date12 = date('Y-m-d', strtotime($_POST['date']));
    $name=$_POST['newname'];
	$occupation=$_POST['job'];
	$address=$_POST['place'];
		
	$target_dir = "upload/";
	$target_file1 = $target_dir . basename($_FILES["policefile"]["name"]);
 
if (move_uploaded_file($_FILES["policefile"]["tmp_name"], $target_file1)) 
{
echo "The file has been successfully uploaded.";
} 
else
{
echo "File not uploaded. Something is Wrong";
}
		
$target_dir = "upload/";
$targetfile1 = $target_dir . basename($_FILES["photofile"]["name"]);
 
if (move_uploaded_file($_FILES["photofile"]["tmp_name"], $targetfile1)) 
{
echo "The file has been successfully uploaded.";
} 
else
{
echo "File not uploaded. Something is Wrong";
}	
		
$sql="insert into edit_nic(edit_nic_id,idcard_no,issue_date,police_report,photograph,newname,newdate,occupation,address)
values('','$cardnumber1','$new_date1','$target_file1','$targetfile1','$name','$new_date12','$occupation','$address')";

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