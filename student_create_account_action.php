<?php
include "connection.php";
//fetching values from "create account" form on student_login page
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$security_question=$_REQUEST['security_question'];
$security_answer=$_REQUEST['security_answer'];
$confirm_password=$_REQUEST['confirm_password'];
$student_id=$_REQUEST['student_id'];
if($password==$confirm_password){
    $query="select * from student_accounts";
    $res=mysqli_query($conn,$query);
    $flag=0;
    while($row=mysqli_fetch_array($res))
    {
        if($email==$row[1] or $student_id==$row[7])//checking if account with entered email and student id already exists
        {
            $flag=1;
            break;
        }
    }
    if($flag==1)
    {
        header("location:student_login.php?q=2");
    }
    else//inserting values into "student_accounts" table
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = "insert into student_accounts values('','" . $email . "','" . $password . "','" . $firstname . "','".$lastname."','".$security_question."','".$security_answer."','".$student_id."')";
        mysqli_query($conn, $query);
        header("location:student_login.php?q=3");
    }
}
//if password and confirm_password doesn't match
else{
    header("location:student_login.php?q=4");
}
