<?php
include "connection.php";

$old_password=$_REQUEST['old_password'];
$new_password=$_REQUEST['new_password'];
$confirm_password=$_REQUEST['confirm_password'];

session_start();
$username=$_SESSION['username'];
$query1="select * from admin_accounts where username='$username'";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_array($result1);


if($new_password != $confirm_password){
	header("location:admin_change_password.php?q=1");
	exit();
}
if($old_password==$row1[2])
{
	$query2="update admin_accounts set password='$new_password' where username='$username'";
	$result2=mysqli_query($conn,$query2);
	header("location:admin_index.php?q=1");
	exit();
}
else{
    header("location:admin_change_password.php?q=2");
	exit();
}
