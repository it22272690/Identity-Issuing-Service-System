<?php
include_once'config.php';

$sql="select * from new_nic";
$result=$conn->query($sql);

if($result->num_rows>0){
	echo"<br><br>";
		echo"<table border=1 cellspacing=2 cellpadding=4>";
	while($row=$result->fetch_assoc()){
	
		echo"<tr><td>".$row['photo']."&nbsp&nbsp&nbsp&nbsp</td><td>".$row['fullname']."</td><td>".$row['gender']."</td><td>".$row['status']."</td><td>".$row['profession']."</td><td>".$row['DOB']."</td><td>".$row['birthPlace']."</td><td>".$row['country']."</td><td>".$row['city']."</td><td>".$row['certificateNo']."</td><td>".$row['address']."</td><td>".$row['dualCertificateNo']."</td><td>".$row['dateOfIssue']."</td><td>".$row['mobileNumber']."</td><td>".$row['email']."</td><td>".$row['certificatePhoto']."</td><td>".$row['NewNICFormId']."</td></tr>";
	}
	echo "</table>";
}
else{
	echo "Empty Rows";
}

	echo"<br><br>";
echo "<a href='update_form.php'>Update</a>   <a href='delete_new_nic.php'>Delete</a><br>";
echo "<br>";

$conn->close();
?>
