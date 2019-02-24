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
<?php
include "student_header.php";
include "connection.php";
$email=$_SESSION['email'];
$query6="select * from student_accounts where email='$email'";
$result6=mysqli_query($conn,$query6);
$row6=mysqli_fetch_array($result6);
$student_id=$row6[7];

$query1 = "select * from student_info where student_id='$student_id'";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_array($result1);

$query2 = "select * from student_education where student_id='$student_id'";
$result2 = mysqli_query($conn, $query2);

$query4 = "select * from student_experience where student_id='$student_id'";
$result4 = mysqli_query($conn, $query4);

$query5 = "select * from student_skills where student_id='$student_id'";
$result5 = mysqli_query($conn, $query5);
$row5 = mysqli_fetch_array($result5);
$skills=$row5[2];
$oneskill=explode(", ",$skills);

$sql="SELECT * FROM resume_uploads";
$result_set=mysqli_query($conn,$sql);
$row7=mysqli_fetch_array($result_set);

?>
	<div id="panel-home">
		<div class="panel-banner"></div>
		<div class="heading">
			<div class="container">
				<div class="title text-center">
					Edit Student Profile
				</div>
			</div>
		</div>
		<div class="page-content">
		    <div class="container">
		        <form action="student_edit_profile_action.php" method="post" enctype="multipart/form-data">
		            <div class="row">
		                <div class="col-md-6 col-md-offset-3">
	                        <div class="row">
	                            <div class="form-group col-md-6">
	                                <label>Semester registered</label>
	                                <select class="form-control" name="semester"required>
	                                    <option selected="selected">
	                                        <?php echo $row1[1] ?>
	                                    </option>
										<option>Fall</option>
	                                    <option>Winter</option>
	                                    <option>Summer</option>
	                                </select>
	                            </div>
	                            <div class="form-group col-md-6">
	                                <label>Year</label>
	                                <select class="form-control"name="year"required>
	                                    <option selected="selected"><?php echo $row1[2] ?></option>
	                                    <option>2016</option>
	                                    <option>2017</option>
	                                    <option>2018</option>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="form-group col-md-12">
	                                <span class="badge">1</span>&nbsp;<label><h3> <strong>Personal Information</strong></h3></label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="form-group col-md-12">
	                                <label>Student ID</label>
	                                <input type="text"class="form-control"name="student_id" value="<?php echo $student_id ?>" readonly>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="form-group col-md-6">
	                                <label>First name</label>
	                                <input type="text"class="form-control"name="firstname" value="<?php echo $row1[4] ?>">
	                            </div>
	                            <div class="form-group col-md-6">
	                                <label>Middle name</label>
	                                <input type="text"class="form-control"name="middlename" value="<?php echo $row1[5] ?>">
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="form-group col-md-12">
	                                <label>Last name</label>
	                                <input type="text"class="form-control"name="lastname" value="<?php echo $row1[6] ?>">
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="form-group col-md-12">
	                                <label>Email</label>
	                                <input type="email"class="form-control"name="email" value="<?php echo $row1[7] ?>">
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="form-group col-md-12">
	                                <label>Phone</label>
	                                <input type="number"class="form-control"name="telephone" value="<?php echo $row1[8] ?>">
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="form-group col-md-6">
	                                <label>Gender</label>
	                                <select class="form-control"name="gender">
	                                    <option selected="selected"><?php echo $row1[10] ?></option>
	                                    <option>Male</option>
	                                    <option>Female</option>
	                                </select>
	                                <br>
	                            </div>
	                            <div class="form-group col-md-6">
	                                <label>Status</label>
	                                <select class="form-control"name="status">
	                                    <option selected="selected"><?php echo $row1[9] ?></option>
	                                    <option>international student</option>
	                                    <option>Green card holder/Citizen</option>
	                                </select>
	                            </div>
	                        </div>
	                        <?php
	                        if ($row1[9]=='International student') {
	                            ?>
	                            <div class="row">
	                                <div class="form-group col-md-6">
	                                    <label>Country</label>
	                                    <input type="text"class="form-control"name="country" value="<?php echo $row1[11]?>">
	                                </div>
	                            </div>
	                            <?php
	                        }
	                        ?>
						</div>
					</div>
					<br>
					<div class="row">
	                    <div class="form-group col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <span class="badge">2</span>&nbsp;<label><h3> <strong style="vertical-align: middle">Education</strong></h3></label>
                                    <input type="button" value="Add education" onclick="add_education();" class="btn btn-primary" style="float: right;vertical-align: middle;margin-top: 28px;">
                                </div>
                            </div>
                            <table class="table table-no-border" id="education">
							<?php
                            while ($row2 = mysqli_fetch_array($result2)) {
                                ?>
                                <tr>
                                    <td><input type="text" placeholder="Program" name="program[]" value="<?php echo $row2[2] ?>" class="form-control"></td>
                                    <td><input type="text" placeholder="University/College" name="university[]" value="<?php echo $row2[3] ?>" class="form-control"></td>
                                    <td><input type="text" placeholder="GPA" name="gpa[]" value="<?php echo $row2[4] ?>" class="form-control"></td>
                                    <td><input type="text" placeholder="Country" name="country[]" value="<?php echo $row2[5] ?>" class="form-control"></td>
                                    <td><input type="text" placeholder="Year" name="year[]" value="<?php echo $row2[6] ?>" class="form-control"></td>
                                </tr>
								<?php
                            }
                            ?>
                            </table>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <span class="badge">3</span>&nbsp;<label><h3> <strong style="vertical-align: middle">Work experience</strong></h3></label>
                                    <input type="button" value="Add company" onclick="add_workexperience();" class="btn btn-primary" style="float: right;vertical-align: middle;margin-top: 28px;">
                                </div>
                            </div>
                            <table class="table table-no-border" id="workexperience">
							<?php
                            while ($row3 = mysqli_fetch_array($result4)) {
                                ?>
                                <tr>
                                    <td><input type="text" placeholder="Job title" name="c_jobtitle[]" value="<?php echo $row3[2] ?>" class="form-control"></td>
                                    <td><input type="text" placeholder="Company" name="c_name[]" value="<?php echo $row3[3] ?>" class="form-control"></td>
                                    <td><input type="text" placeholder="Duties" name="c_duties[]" value="<?php echo $row3[4] ?>" class="form-control"></td>
                                    <td><input placeholder="Start date" class="form-control" type="text" onfocus="(this.type='date')" value="<?php echo $row3[5] ?>" name="c_startdate[]"></td>
                                    <td><input placeholder="End date" class="form-control" type="text" onfocus="(this.type='date')" value="<?php echo $row3[6] ?>" name="c_enddate[]"></td>
                                </tr>
								<?php
                            }
                            ?>
                            </table>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <span class="badge">4</span>&nbsp;<label><h3> <strong style="vertical-align: middle">Skills</strong></h3></label>
                                </div>
                            </div>

							<div class="row" style="padding-left:25px">
								<br>
								<?php
								for($i=0;$i<sizeof($oneskill);$i++){
									?>
									<input type="text" class="form-control" value="<?php echo $oneskill[$i] ?>" style="display:inline; width:110px" name="skills[]">


								<?php
								}
								?>

							</div>
							<br>
                            <div  class="row" style="padding-left: 25px;">
                                <input type="hidden" name="count" value="1" />
                                <div id="field">
                                    <div>
                                        <input autocomplete="off" class="input form-control" id="field1" name="skills[]" type="text" data-items="8"/>
                                        <button id="b1" class="btn add-more newbtn btn-primary" type="button">+</button>
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
								<button type="button" class="btn btn-primary">
									<a href="resume_uploads/<?php echo $row7['file'] ?>" target="_blank" >View resume</a>
								</button>
								<br><br>
								<a id="btn2" style="margin-top:15px;">Upload new resume</a>
								<br>
								<script>
								document.querySelector("#btn2").addEventListener("click", function(){
									document.querySelector("#upload_resume").style.display = "block";
								});
								</script>
								<div id="upload_resume" style="display:none">
									<br><br>
									<input type="file" name="file">
									<br>
									<span style="color:red">Note: Select pdf, doc or docx file only</span>
									<br>
									<span style="color:red">Note: Your previous resume will be deleted</span>
								</div>
                            </div>
                            <br><br>
                            <div class="row" style="margin-left: 15px">
                                <button type="submit" class="btn btn-primary btn-lg" style="float: left;">Submit</button>
                            </div>
                        </div>
                	</div>
		        </form>
		    </div>
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
	<?php
	include "student_footer.php";
	?>
