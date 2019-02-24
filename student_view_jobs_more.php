<?php
include "student_header.php";
include "connection.php";
$teacher_id=$_REQUEST['teacher_id'];
$job_title=$_REQUEST['job_title'];

$query1 = "select * from job_info where job_title='$job_title' and teacher_id='$teacher_id'";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_array($result1);
$job_id=$row1[0];

$mysqldate = strtotime($row1[7]);
$date=date('M j, Y', $mysqldate);

$query2="select firstname,lastname from teacher_accounts where id='$teacher_id'";
$result2=mysqli_query($conn,$query2);
$row2=mysqli_fetch_array($result2);
$teacher_name= $row2[0].' '.$row2[1];
?>
    <div id="panel-home">
        <div class="panel-banner"></div>
        <div class="heading">
            <div class="container">
                <div class="title text-center">
                    Job information
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <table class="table table-condensed table-no-border">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <td style="font-weight:bold">Posted by</td>
                                    <td></td>
                                    <td><?php echo $teacher_name ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Posted on</td>
                                    <td></td>
                                    <td><?php echo $date ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Job title</td>
                                    <td></td>
                                    <td><?php echo $job_title ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Description</td>
                                    <td></td>
                                    <td><?php echo $row1[2] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Responsibilities</td>
                                    <td></td>
                                    <td><?php echo $row1[3] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Requirements</td>
                                    <td></td>
                                    <td><?php echo $row1[4] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Credits</td>
                                    <td></td>
                                    <td><?php echo $row1[5] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                            $email=$_SESSION['email'];
                            $query3="select student_id from student_accounts where email='$email'";
                            $res3=mysqli_query($conn,$query3);
                            $row3=mysqli_fetch_array($res3);
                            $student_id=$row3[0];
                            $query4="select * from job_applications";
                            $res4=mysqli_query($conn,$query4);
                            $flag=0;
                            while($row4=mysqli_fetch_array($res4))
                            {
                                if($job_id==$row4[1] && $student_id==$row4[3])
                                {
                                    $flag=1;
                                    break;
                                }
                            }
                            if($flag==1)
                                {
                                    ?>
                                    <button class="btn btn-primary">Already Applied</button>
                                    <?php
                                }
                                else {
                                    ?>
                                    <button onclick="location.href='student_apply_job.php?job_id=<?php echo $job_id ?>&teacher_id=<?php echo $teacher_id ?>'"
                                        class="btn btn-primary">Apply to this position
                                    </button>
                                    <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "student_footer.php";
    ?>
