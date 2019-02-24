<?php
include "connection.php";

$old_password=$_REQUEST['old_password'];
$new_password=$_REQUEST['new_password'];
$confirm_password=$_REQUEST['confirm_password'];

session_start();
$email=$_SESSION['email'];
$query1="select * from student_accounts where email='$email'";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_array($result1);

if($new_password <> $confirm_password){
	header("location:student_change_password.php?q=1");
	break;
}

if(password_verify($old_password, $row1[2])){
	$new_password = password_hash($new_password, PASSWORD_BCRYPT);
	$query2="update student_accounts set password='$new_password' where email='$email'";
	$result2=mysqli_query($conn,$query2);
	header("location:student_index.php?q=1");

}
else
    header("location:student_change_password.php?q=2");
