<?php
include "connection.php";
$date=date("Y-m-d H:i:s");

session_start();
$email=$_SESSION['email'];
$query1="select student_id from student_accounts where email='$email'";
$res1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_array($res1);
$student_id=$row1[0];

$job_id=$_REQUEST['job_id'];
$teacher_id=$_REQUEST['teacher_id'];

$query2 = "insert into job_applications values('','" . $job_id . "','".$teacher_id."','" . $student_id . "','" . $date . "')";
mysqli_query($conn, $query2);
header("location:student_view_jobs.php?q=1");
