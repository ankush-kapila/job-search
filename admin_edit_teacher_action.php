<?php
include "connection.php";
$date=date("Y-m-d H:i:s");
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$special_designation=$_REQUEST['special_designation'];
$job_title=$_REQUEST['job_title'];
$department=$_REQUEST['department'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['phone'];
$office_address=$_REQUEST['office_address'];

$query="update teacher_accounts set firstname='$firstname',lastname='$lastname',special_designation='$special_designation',job_title='$job_title',department='$department',phone='$phone',office_address='$office_address',last_updated='$date' where email='$email'";
mysqli_query($conn, $query);
header("location:admin_view_teachers.php?q=3");
