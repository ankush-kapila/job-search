<?php
include "teacher_header.php";
include "connection.php";
$email=$_SESSION['email'];
$query3="select id from teacher_accounts where email='$email'";
$res3=mysqli_query($conn,$query3);
$row3=mysqli_fetch_array($res3);
$teacher_id=$row3[0];
$query="select * from job_info where teacher_id='$teacher_id'";
$result=mysqli_query($conn,$query);
//alerts
if(isset($_REQUEST['q'])) {
    if ($_REQUEST['q'] == 1) {
        ?>
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Job information deleted</center>
        </div>
        <?php
    }
    if ($_REQUEST['q'] == 2) {
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Job added</center>
        </div>
        <?php
    }
    if ($_REQUEST['q'] == 3) {
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Job information updated</center>
        </div>
        <?php
    }
    if ($_REQUEST['q'] == 4) {
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Job with same job title already exists!</center>
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
                <div class="col-md-12">
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
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job title</th>
                                    <th>Description</th>
                                    <th>Responsibilities</th>
                                    <th>Requirements</th>
                                    <th>Credits</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count=1;
                                    while($row=mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                    <td><?php echo $count."." ?></td>
                                    <td><?php echo $row[1] ?></td>
                                    <td><?php echo $row[2] ?></td>
                                    <td><?php echo $row[3] ?></td>
                                    <td><?php echo $row[4] ?></td>
                                    <td><?php echo $row[5] ?></td>
            						<td>
            							<button onclick="location.href='teacher_edit_job.php?job_title=<?php echo $row[1] ?>'"class="btn btn-primary btn-md">Edit</button>
            							<button data-toggle="modal" data-target="#myModal" data-id="<?php echo $row[0] ?>" class="open-modal btn btn-primary btn-md">Delete</button>
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
        	<script>
            	$(document).on("click", ".open-modal", function () {
            		var teacher_email = $(this).data('id');
            		$("#email").val( teacher_email );
            	});
        	</script>
        	<div class="modal fade" id="myModal" role="dialog" style="top:150px">
        		<div class="modal-dialog modal-sm">
        			<div class="modal-content">
        			<div class="modal-header">
        				<form action="teacher_delete_job.php" method="post">
        					<input type="hidden" id="email" name="job_id">
        					<div class="alert alert-warning text-center">
        						<strong>Are you sure?</strong>
        					</div>
        					<div class="text-center">
        					<button type="submit" class="btn btn-default">Yes</button>
        				</form>
        				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        				</div>
        			</div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
    <?php
    }
    include "teacher_footer.php";
    ?>
