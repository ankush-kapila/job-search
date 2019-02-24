<?php
session_start();
if(isset($_SESSION['email']))
{}
else
{
    header("location:student_login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Portal | Job Portal | University of Bridgeport</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="logo">
                    <a href="student_index.php">
                        <img class="panel-logo" src="images/ub-logo-1.png" alt="image">
                        <div class="panel-heading">Student Portal</div>
                    </a>

                </div>
                <ul class="nav navbar-nav navbar-right nav-panel">
                    <li><a href="student_index.php">Home</a></li>
                    <li><a href="student_add_profile.php">Profile</a></li>
                    <li><a href="student_view_jobs.php">View jobs</a></li>
    				<li><a href="student_change_password.php">Change password</a></li>
                    <li><a href="student_logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </div>
