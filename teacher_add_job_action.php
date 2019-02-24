<?php
include "connection.php";
$date=date("Y-m-d H:i:s");
session_start();
$email=$_SESSION['email'];
$query3="select id from teacher_accounts where email='$email'";
$res3=mysqli_query($conn,$query3);
$row3=mysqli_fetch_array($res3);
$teacher_id=$row3[0];

$job_title=$_REQUEST['job_title'];
$description=$_REQUEST['description'];
$responsibilities=$_REQUEST['responsibilities'];
$requirements=$_REQUEST['requirements'];
$credits=$_REQUEST['credits'];

$query="select * from job_info";
$res=mysqli_query($conn,$query);
$flag=0;
while($row=mysqli_fetch_array($res))
{
    if($teacher_id==$row[6] && $job_title==$row[1])
    {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    header("location:teacher_view_job.php?q=4");
}
else {
    $query2 = "insert into job_info values('','" . $job_title . "','" . $description . "','" . $responsibilities . "','" . $requirements . "','" . $credits . "','" . $teacher_id . "','" . $date . "','')";
    mysqli_query($conn, $query2);
    header("location:teacher_view_job.php?q=2");
}
