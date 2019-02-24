<?php
include "teacher_header.php";
include "connection.php";
$job_title=$_REQUEST['job_title'];
$query="select * from job_info where job_title='$job_title'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$job_id=$row[0];
?>
    <div id="panel-home">
        <div class="panel-banner"></div>
        <div class="heading">
            <div class="container">
                <div class="title text-center">
                    Edit job information
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form action="teacher_edit_job_action.php" method="post">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <table class="table table-condensed table-no-border">
                                        <thead></thead>
                                        <tbody>
                                        <tr>
                                            <td>Job title</td>
                                            <td></td>
                                            <td><input type="text"class="form-control"name="job_title" value="<?php echo $row[1] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td></td>
                                            <td><textarea class="form-control" rows="4" name="description"><?php echo $row[2] ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Responsibilities</td>
                                            <td></td>
                                            <td><textarea class="form-control" rows="4" name="responsibilities"><?php echo $row[3] ?></textarea></td>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>Requirements</td>
                                            <td></td>
                                            <td><textarea class="form-control" rows="4" name="requirements"><?php echo $row[4] ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Credits</td>
                                            <td></td>
                                            <td>
                                                <select class="form-control" name="credits">
                                                    <option selected="selected">
                                                        <?php echo $row[5] ?>
                                                    </option>
                                                    <option>3</option>
                                                    <option>6</option>
                                                    <option>9</option>
                                                </select>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <input type="hidden" name="job_id" value="<?php echo $job_id ?>">
                            <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <button onclick="location.href='teacher_view_job.php'"class="btn btn-primary btn-md" style="margin-top:10px;">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "teacher_footer.php";
    ?>
