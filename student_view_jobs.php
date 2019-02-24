<?php
include "student_header.php";
include "connection.php";
$query="select * from job_info";
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
                    List of jobs posted
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
                                <center><h2>No jobs posted</h2></center>
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
                                    <th>Credits</th>
                                    <th>Posted by</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count=1;
                                    while($row=mysqli_fetch_array($result)){
                                        $query2="select firstname,lastname from teacher_accounts where id='$row[6]'";
                                        $result2=mysqli_query($conn,$query2);
                                        $row2=mysqli_fetch_array($result2);
                                        $teacher_name= $row2[0].' '.$row2[1];
                                ?>
                                <tr>
                                    <td><?php echo $count."." ?></td>
                                    <td><?php echo $row[1] ?></td>
                                    <td><?php echo $row[5] ?></td>
                                    <td><?php echo $teacher_name ?></td>
            						<td>
            							<button onclick="location.href='student_view_jobs_more.php?job_title=<?php echo $row[1] ?>&teacher_id=<?php echo $row[6] ?>'"class="btn btn-primary btn-md">View more info</button>
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
    include "student_footer.php";
    ?>
