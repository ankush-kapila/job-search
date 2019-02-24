    <?php
    include "admin_header.php";
    include "connection.php";
    $query="select * from teacher_accounts";
    $result=mysqli_query($conn,$query);
    //alerts
    if(isset($_REQUEST['q'])) {
        if ($_REQUEST['q'] == 1) {
            ?>
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <center>Teacher information deleted</center>
            </div>
            <?php
        }
        if ($_REQUEST['q'] == 2) {
            ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <center>Teacher information added</center>
            </div>
            <?php
        }
        if ($_REQUEST['q'] == 3) {
            ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <center>Teacher information updated</center>
            </div>
            <?php
        }
        if ($_REQUEST['q'] == 4) {
            ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <center>Teacher information already exists!</center>
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
                    Teacher information
                </div>
            </div>
        </div>
    <div class="page-content">
        <div class="container" >
            <div class="col-md-12">
                <div class="table-responsive">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Special designation</th>
                            <th>Job title</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Office address</th>
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
                            <td><a href="mailto:<?php echo $row[6] ?>" target="_top"><?php echo $row[6] ?></a></td>
                            <td><?php echo $row[7] ?></td>
                            <td><?php echo $row[8] ?></td>
    						<td>
    							<button onclick="location.href='admin_edit_teacher.php?email=<?php echo $row[6] ?>'"class="btn btn-primary btn-md">Edit</button>
    							<button data-toggle="modal" data-target="#myModal" data-id="<?php echo $row[6] ?>" class="open-modal btn btn-primary btn-md">Delete</button>
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
    				<form action="admin_delete_teacher.php" method="post">
    					<input type="hidden" id="email" name="email">
    					<div class="alert-warning text-center" style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;">
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
    <?php
    include "admin_footer.php";
    ?>
