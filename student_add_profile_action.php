<?php
include "connection.php";
$date=date("Y-m-d H:i:s");

$semester=$_REQUEST['semester'];
$year=$_REQUEST['student_year'];
$student_id=$_REQUEST['student_id'];
$firstname=$_REQUEST['firstname'];
$middlename=$_REQUEST['middlename'];
$lastname=$_REQUEST['lastname'];
$email=$_REQUEST['email'];
$telephone=$_REQUEST['telephone'];
$status=$_REQUEST['status'];
$gender=$_REQUEST['gender'];
$status=$_REQUEST['status'];
$country=$_REQUEST['student_country'];

if($status=='Green card holder/Citizen')
	$country="United States";


$file = rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$folder="resume_uploads/";

$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);


$allowedExts = array("pdf","doc","docx");

if ( ! ( in_array($extension, $allowedExts ) ) ) {
	header("location:student_add_profile.php?q=1");
}
else{
	echo "yes";
	$new_size = round($file_size/1024);
	$new_file_name = strtolower($file);

	$final_file=str_replace(' ','-',$new_file_name);

	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO resume_uploads(student_id,file,type,size) VALUES('$student_id','$final_file','$file_type','$new_size')";
		//echo $sql;
		mysqli_query($conn,$sql);

	}
	else
	{
		header("location:student_add_profile.php?q=1");
	}

	$query1 = "insert into student_info values('','" . $semester . "','" . $year . "','" . $student_id . "','" . $firstname . "','" . $middlename . "','" . $lastname . "','" . $email . "','" . $telephone . "','" . $status . "','" . $gender . "','" . $country . "')";
	//echo $query1;
	mysqli_query($conn, $query1);

	$countPrograms= sizeof( $_REQUEST['program'] );
	for($i=0;$i<$countPrograms;$i++){
		$query2 = "insert into student_education values('','" . $student_id . "','" . $_REQUEST['program'][$i] . "','" . $_REQUEST['university'][$i] . "','" . $_REQUEST['gpa'][$i] . "','" . $_REQUEST['country'][$i] . "','" . $_REQUEST['year'][$i] . "')";
		mysqli_query($conn, $query2);
		//echo $_REQUEST['program'][$i];
	}

	$countWorkexperience= sizeof( $_REQUEST['c_jobtitle'] );
	for($i=0;$i<$countWorkexperience;$i++){
		$query3 = "insert into student_experience values('','" . $student_id . "','" . $_REQUEST['c_jobtitle'][$i] . "','" . $_REQUEST['c_name'][$i] . "','" . $_REQUEST['c_duties'][$i] . "','" . $_REQUEST['c_startdate'][$i] . "','" . $_REQUEST['c_enddate'][$i] . "')";
		mysqli_query($conn, $query3);
	}


	$countSkills = sizeof( $_REQUEST['skills'] );
	//echo $countSkills;
	$skills='';
	for($i=0;$i<$countSkills;$i++){
		$skills .= $_REQUEST['skills'][$i];
		$skills .= ', ';
	}
	$skills=rtrim($skills,", ");

	$query4 = "insert into student_skills values('','" . $student_id . "','" . $skills . "')";
	mysqli_query($conn, $query4);
	//echo $query4;


	/*
	$oneskill=explode(", ",$skills);
	for($i=0;$i<sizeof($oneskill);$i++){
		echo $oneskill[$i] .'<br>';
	}
	*/
	header("location:student_view_profile.php?q=1");
}
