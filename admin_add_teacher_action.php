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

$default_password= substr($lastname,0,3).substr($phone,-4);

$query="select * from teacher_accounts";
$res=mysqli_query($conn,$query);
$flag=0;
while($row=mysqli_fetch_array($res))
{
    if($email==$row[6])
    {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    header("location:admin_view_teachers.php?q=4");
}
else {
    $query2 = "insert into teacher_accounts values('','" . $firstname . "','" . $lastname . "','" . $special_designation . "','" . $job_title . "','" . $department . "','" . $email . "','" . $phone . "','" . $office_address . "','" . $default_password . "','" . $date . "','')";
    mysqli_query($conn, $query2);
    header("location:admin_view_teachers.php?q=2");
}
