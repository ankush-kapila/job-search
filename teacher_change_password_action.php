<?php
include "connection.php";

$old_password=$_REQUEST['old_password'];
$new_password=$_REQUEST['new_password'];
$confirm_password=$_REQUEST['confirm_password'];

session_start();
$email=$_SESSION['email'];
$query1="select * from teacher_accounts where email='$email'";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_array($result1);

if($new_password != $confirm_password){
	header("location:teacher_change_password.php?q=1");
	exit();
}
if($old_password==$row1[9])
{
	$query2="update teacher_accounts set password='$new_password' where email='$email'";
	$result2=mysqli_query($conn,$query2);
	header("location:teacher_index.php?q=1");
	exit();
}
else{
    header("location:teacher_change_password.php?q=2");
	exit();
}
