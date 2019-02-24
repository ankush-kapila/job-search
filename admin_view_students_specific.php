<?php
include "admin_header.php";
include "connection.php";
$student_id=$_REQUEST['student_id'];

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

$sql="SELECT * FROM resume_uploads where student_id='$student_id'";
$result_set=mysqli_query($conn,$sql);
$row7=mysqli_fetch_array($result_set);
?>
    <div id="panel-home">
        <div class="panel-banner"></div>
        <div class="heading">
            <div class="container">
                <div class="title text-center">
                    Student Profile
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="row">
                            <span class="badge">1</span>&nbsp;<label><h3><strong>Personal Information</strong></h3>
                            </label>
                        </div>
                        <table class="table table-condensed table-no-border table-hover">
                            <thead></thead>
                            <tbody>
                            <tr>
                                <td style="font-weight:bold;">Student ID</td>
                                <td></td>
                                <td><?php echo $student_id ?></td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td></td>
                                <td><?php echo $row1[1] ?></td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td></td>
                                <td><?php echo $row1[2] ?></td>
                            </tr>
                            <tr>
                                <td>First name</td>
                                <td></td>
                                <td><?php echo $row1[4] ?></td>
                            </tr>
                            <tr>
                                <td>Middle name</td>
                                <td></td>
                                <td><?php echo $row1[5] ?></td>
                            </tr>
                            <tr>
                                <td>Last name</td>
                                <td></td>
                                <td><?php echo $row1[6] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td></td>
                                <td><a href="mailto:<?php echo $row1[7] ?>"><?php echo $row1[7] ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td></td>
                                <td><?php echo $row1[8] ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td></td>
                                <td><?php echo $row1[9] ?></td>
                            </tr>
                            <?php
                            if($row1[9]=='International student') {
                                ?>
                                <tr>
                                    <td>Country</td>
                                    <td></td>
                                    <td><?php echo $row1[11] ?></td>
                                </tr>
                                <?php
                            }
                            ?>

                            <tr>
                                <td>Gender</td>
                                <td></td>
                                <td><?php echo $row1[10] ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="row">
                            <span class="badge">2</span>&nbsp;<label><h3><strong>Education</strong></h3></label>
                        </div>
                        <br>
                        <div class="row">
                            <table class="table table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th>Program</th>
                                    <th>University</th>
                                    <th>GPA</th>
                                    <th>Country</th>
                                    <th>Year</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row2[2] ?></td>
                                            <td><?php echo $row2[3] ?></td>
                                            <td><?php echo $row2[4] ?></td>
                                            <td><?php echo $row2[5] ?></td>
                                            <td><?php echo $row2[6] ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="row">
                            <span class="badge">3</span>&nbsp;<label><h3><strong>Work experience</strong></h3></label>
                        </div>
                        <br>
                        <div class="row">
                            <table class="table table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>Duties</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row4 = mysqli_fetch_array($result4)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row4[2] ?></td>
                                        <td><?php echo $row4[3] ?></td>
                                        <td><?php echo $row4[4] ?></td>
                                        <td><?php echo $row4[5] ?></td>
                                        <td><?php echo $row4[6] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="row">
                            <span class="badge">4</span>&nbsp;<label><h3><strong>Skills</strong></h3></label>
                        </div>
                        <div class="row">
                            <br>
                            <?php
                            for($i=0;$i<sizeof($oneskill);$i++){
                                ?>
                                <button type="button" class="btn btn-primary"><?php echo $oneskill[$i] ?></button>
                            <?php
                            }
                            ?>
                        </div>
                        <br><br>
                        <div class="row">
                            <span class="badge">5</span>&nbsp;<label><h3><strong>Resume</strong></h3></label>
                        </div>
    					<br>
    					<div class="row">
                            <button type="button" class="btn btn-primary">
                               <a href="resume_uploads/<?php echo $row7['file'] ?>" target="_blank" >Download resume</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "admin_footer.php";
    ?>
