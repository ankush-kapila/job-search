<?php
session_start();
if(isset($_SESSION['email']))
{}
else
{
    header("location:teacher_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teacher Portal | Job Portal | University of Bridgeport</title>
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
                    <a href="teacher_index.php">
                        <img class="panel-logo" src="images/ub-logo-1.png" alt="image">
                        <div class="panel-heading">Teacher Portal</div>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right nav-panel">
                    <li><a href="teacher_index.php">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Jobs<span class="caret"></span></a>
                        <ul class="dropdown-menu">
        					<li><a href="teacher_add_job.php">Add job</a></li>
        					<li><a href="teacher_view_job.php">View job(s) posted</a></li>
                        </ul>
                    </li>
                    <li><a href="teacher_view_job_applications.php">Job applications</a></li>
    				<li><a href="teacher_change_password.php">Change password</a></li>
                    <li>
                        <a href="teacher_logout.php">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
