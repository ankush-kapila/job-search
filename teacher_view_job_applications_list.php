<?php
include "teacher_header.php";
include "connection.php";
$job_id=$_REQUEST['job_id'];

$query="select student_id from job_applications where job_id=$job_id";
$result=mysqli_query($conn,$query);
?>
    <div id="panel-home">
        <div class="panel-banner"></div>
        <div class="heading">
            <div class="container">
                <div class="title text-center">
                    Job applicants
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container" >
                <div class="col-md-10 col-md-offset-1">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Batch</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count=1;
                                    while($row=mysqli_fetch_array($result)){
                                        $query2="select * from student_info where student_id='$row[0]'";
                                        $result2=mysqli_query($conn,$query2);
                                        $row2=mysqli_fetch_array($result2);
                                        $name=$row2[4].' '.$row2[6];
                                        $batch=$row2[1].' '.$row2[2];
                                ?>
                                <tr>
                                    <td><?php echo $count."." ?></td>
                                    <td><?php echo $row2[3] ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $batch ?></td>
            						<td>
            							<button onclick="location.href='teacher_view_job_applications_specific.php?student_id=<?php echo $row2[3] ?>'"class="btn btn-primary btn-md">View profile</button>
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
    include "teacher_footer.php";
    ?>
