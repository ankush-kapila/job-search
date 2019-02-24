<?php
include "connection.php";
session_start();
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
//querying the db to fetch username, password of admins
$query="select * from teacher_accounts";
$result=mysqli_query($conn,$query);
$flag=0;
while($row=mysqli_fetch_array($result)){
    //if entered email, password matches database values
    if($email==$row[6] & $password==$row[9]) {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    $_SESSION['email']=$email;
    header("location:teacher_index.php");
}
// if enetered email, password doesnt match db values
else
{
    header("location:teacher_login.php?q=1");
}
