<?php
include "teacher_header.php";
include "connection.php";
$email=$_SESSION['email'];
$query3="select id from teacher_accounts where email='$email'";
$res3=mysqli_query($conn,$query3);
$row3=mysqli_fetch_array($res3);
$teacher_id=$row3[0];

$query="select * from job_applications where teacher_id=$teacher_id group by job_id";
$result=mysqli_query($conn,$query);
if(isset($_REQUEST['q'])) {
    if ($_REQUEST['q'] == 1) {
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Successfully applied to job position</center>
        </div>
        <?php
    }
}
?>
    <div id="panel-home">
        <div class="panel-banner"></div>
        <div class="heading">
            <div class="container">
                <div class="title text-center">
                    Job applications
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container" >
                <div class="col-md-10 col-md-offset-1">
                            <?php
                            if(mysqli_num_rows($result)== 0){
                            ?>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <center><h2>No job application yet</h2></center>
                                    </div>
                                </div>
                                </div></div></div></div>
                            <?php
                            }
                            else{
                            ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job title</th>
                                    <th>Number of applications</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count=1;
                                    while($row=mysqli_fetch_array($result)){
                                        $query2="select job_title from job_info where id='$row[1]'";
                                        $result2=mysqli_query($conn,$query2);
                                        $row2=mysqli_fetch_array($result2);

                                        $query3="SELECT count(student_id) FROM `job_applications` WHERE job_id=$row[1]";
                                        $result3=mysqli_query($conn,$query3);
                                        $row3=mysqli_fetch_array($result3);
                                ?>
                                <tr>
                                    <td><?php echo $count."." ?></td>
                                    <td><?php echo $row2[0] ?></td>
                                    <td><?php echo $row3[0] ?></td>
            						<td>
            							<button onclick="location.href='teacher_view_job_applications_list.php?job_id=<?php echo $row[1] ?>'"class="btn btn-primary btn-md">View application(s)</button>
            						</td>
                                </tr>
                                <?php
                                $count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    include "teacher_footer.php";
    ?>
