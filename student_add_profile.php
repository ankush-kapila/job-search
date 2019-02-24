<?php
include "student_header.php";
include "connection.php";
$query="select country_name from apps_countries";
$result=mysqli_query($conn,$query);

$email=$_SESSION['email'];
$query6="select * from student_accounts where email='$email'";
$result6=mysqli_query($conn,$query6);
$row6=mysqli_fetch_array($result6);
$student_id=$row6[7];

$query1 = "select * from student_info where student_id='$student_id'";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_array($result1);

if (!empty($row1[0]))
	header("location:student_view_profile.php");

?>
<!doctype>
<html>
<head>
    <script type="text/javascript">
        function go()
        {
            var status=document.getElementById("status").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("sp1").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "student_add_profile2.php?status=" +status,true);
            xmlhttp.send();
        }
        function add_education() {
            document.getElementById('education').innerHTML += '<tr> <td><input type="text" placeholder="Program" name="program[]" class="form-control"></td> <td><input type="text" placeholder="University/College" name="university[]" class="form-control"></td> <td><input type="text" placeholder="GPA" name="gpa[]" class="form-control"></td><td><input type="text" placeholder="Country" name="country[]" class="form-control"></td> <td><input type="text" placeholder="Year" name="year[]" class="form-control"></td></tr>';
        }
        function add_workexperience() {
            document.getElementById('workexperience').innerHTML += '<tr> <td><input type="text" placeholder="Job title" name="c_jobtitle[]" class="form-control"></td> <td><input type="text" placeholder="Company" name="c_name[]" class="form-control"></td> <td><input type="text" placeholder="Duties" name="c_duties[]" class="form-control"></td> <td><input type="date" placeholder="Start date" name="c_startdate[]" class="form-control"></td> <td><input type="date" placeholder="End date" name="c_enddate[]" class="form-control"></td> </tr>';
        }
    </script>

</head>
<body>
<?php
	if(isset($_REQUEST['q'])) {
			if($_REQUEST['q'] == 1) {
				?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<center>Please upload correct file type</center>
				</div>
				<?php
			}
	}
	?>
<div style="background-image: url('');padding: 40px;height:auto;background-size: 100%;">

    <div class="container">
        <form action="student_add_profile_action.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="well">
                        <div class="row">
                            <div class="form-group">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h2><center>Student information</center></h2></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Semester</label>
                                <select class="form-control" name="semester">
                                    <option>Fall</option>
                                    <option>Winter</option>
                                    <option>Summer</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Year</label>
                                <select class="form-control" name="student_year">
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <span class="badge">1</span>&nbsp;<label><h3> <strong style="vertical-align: middle">Personal Information</strong></h3></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Student ID</label>
                                <input type="number"class="form-control"name="student_id" value="<?php echo $student_id ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>First name</label>
                                <input type="text"class="form-control"name="firstname">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Middle name</label>
                                <input type="text"class="form-control"name="middlename">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Last name</label>
                                <input type="text"class="form-control"name="lastname">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Email</label>
                                <input type="email"class="form-control"name="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Phone</label>
                                <input type="number"class="form-control"name="telephone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Gender</label>
                                <select class="form-control"name="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <br>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Status</label>
                                <select class="form-control"name="status" id="status" onchange="go()">
                                    <option>Green card holder/Citizen</option>
                                    <option>International student</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <span id="sp1"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-10 col-md-offset-1">
                        <div class="well">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <span class="badge">2</span>&nbsp;<label><h3> <strong style="vertical-align: middle">Education</strong></h3></label>
                                    <input type="button" value="Add education" onclick="add_education();" class="btn btn-info" style="float: right;vertical-align: middle;margin-top: 28px;">
                                </div>
                            </div>
                            <table class="table" id="education">
                                <tr>
                                    <td><input type="text" placeholder="Program" name="program[]" class="form-control"></td>
                                    <td><input type="text" placeholder="University/College" name="university[]" class="form-control"></td>
                                    <td><input type="text" placeholder="GPA" name="gpa[]" class="form-control"></td>
                                    <td><input type="text" placeholder="Country" name="country[]" class="form-control"></td>
                                    <td><input type="text" placeholder="Year" name="year[]" class="form-control"></td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <span class="badge">3</span>&nbsp;<label><h3> <strong style="vertical-align: middle">Work experience</strong></h3></label>
                                    <input type="button" value="Add company" onclick="add_workexperience();" class="btn btn-info" style="float: right;vertical-align: middle;margin-top: 28px;">
                                </div>
                            </div>
                            <table class="table" id="workexperience">
                                <tr>
                                    <td><input type="text" placeholder="Job title" name="c_jobtitle[]" class="form-control"></td>
                                    <td><input type="text" placeholder="Company" name="c_name[]" class="form-control"></td>
                                    <td><input type="text" placeholder="Duties" name="c_duties[]" class="form-control"></td>
                                    <td><input placeholder="Start date" class="form-control" type="text" onfocus="(this.type='date')" name="c_startdate[]"></td>
                                    <td><input placeholder="End date" class="form-control" type="text" onfocus="(this.type='date')" name="c_enddate[]"></td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <span class="badge">4</span>&nbsp;<label><h3> <strong style="vertical-align: middle">Skills</strong></h3></label>
                                </div>
                            </div>

                            <div  class="row" style="padding-left: 25px;">
                                <input type="hidden" name="count" value="1" />
                                <div id="field">
                                    <div>
                                        <input autocomplete="off" class="input form-control" id="field1" name="skills[]" type="text" data-items="8"/>
                                        <button id="b1" class="btn add-more newbtn" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .input{
                                    width: 110px;
                                    display: inline-block;
                                }
                                .newbtn{
                                    margin-right: 30px;
                                }
                            </style>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <span class="badge">5</span>&nbsp;<label><h3> <strong style="vertical-align: middle">Upload resume</strong></h3></label>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 25px">
                                <input type="file" name="file">
                                <br>
                                <span>Note: Select pdf, doc or docx file only</span>
                            </div>
                            <br><br>
                            <div class="row" style="margin-left: 15px">
                                <button type="submit" class="btn btn-primary btn-lg" style="float: left;">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        var next = 1;
        $(".add-more").click(function(e){
            e.preventDefault();
            var addto = "#field" + next;
            var addRemove = "#field" + (next);
            next = next + 1;
            var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="skills[]" type="text">';
            var newInput = $(newIn);
            var removeBtn = '<button id="remove' + (next - 1) + '" class="btn newbtn btn-danger remove-me" >-</button>';
            var removeButton = $(removeBtn);
            $(addto).after(newInput);
            $(addRemove).after(removeButton);
            $("#field" + next).attr('data-source',$(addto).attr('data-source'));
            $("#count").val(next);

            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
        });



    });

</script>
</body>
</html>
