<?php
include "connection.php";
session_start();
$email=$_SESSION['email'];
$query3="select id from teacher_accounts where email='$email'";
$res3=mysqli_query($conn,$query3);
$row3=mysqli_fetch_array($res3);
$teacher_id=$row3[0];
$job_id=$_REQUEST['job_id'];

$query="delete from job_info where id='$job_id' and teacher_id='$teacher_id'";
mysqli_query($conn,$query);
header("location:teacher_view_job.php?q=1");
