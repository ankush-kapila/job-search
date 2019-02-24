<?php
include "connection.php";
$date=date("Y-m-d H:i:s");
$job_id=$_REQUEST['job_id'];
$job_title=$_REQUEST['job_title'];
$description=$_REQUEST['description'];
$responsibilities=$_REQUEST['responsibilities'];
$requirements=$_REQUEST['requirements'];
$credits=$_REQUEST['credits'];

$query="update job_info set job_title='$job_title',description='$description',responsibilities='$responsibilities',requirements='$requirements',credits='$credits',last_updated='$date' where id='$job_id'";
mysqli_query($conn, $query);
header("location:teacher_view_job.php?q=3");
