<?php
include "connection.php";
session_start();
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
//querying the db to fetch username, password of admins
$query="select * from admin_accounts";
$result=mysqli_query($conn,$query);
$flag=0;
while($row=mysqli_fetch_array($result)){
    //if entered username, password matches database values
    if($username==$row[1] & $password==$row[2]) {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    $_SESSION['username']=$username;
    header("location:admin_index.php");
}
// if enetered username, password doesnt match db values
else
{
    header("location:admin_login.php?q=1");
}
