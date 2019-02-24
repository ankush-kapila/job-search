<?php
include "connection.php";

$email=$_REQUEST['email'];

$query="delete from teacher_accounts where email='$email'";
mysqli_query($conn,$query);
header("location:admin_view_teachers.php?q=1");


