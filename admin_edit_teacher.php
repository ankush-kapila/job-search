<?php
include "admin_header.php";
include "connection.php";
$email=$_REQUEST['email'];
$query="select * from teacher_accounts where email='$email'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
?>
    <div id="panel-home">
        <div class="panel-banner"></div>
        <div class="heading">
            <div class="container">
                <div class="title text-center">
                    Edit teacher information
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <form action="admin_edit_teacher_action.php" method="post">
                            <table class="table table-no-border">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td>First name</td>
                                        <td></td>
                                        <td><input type="text"class="form-control"name="firstname" value="<?php echo $row[1] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Last name</td>
                                        <td></td>
                                        <td><input type="text"class="form-control"name="lastname" value="<?php echo $row[2] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Special designation</td>
                                        <td></td>
                                        <td><input type="text"class="form-control"name="special_designation" value="<?php echo $row[3] ?>">
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>Job title</td>
                                        <td></td>
                                    <td><input type="text"class="form-control"name="job_title" value="<?php echo $row[4] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Department</td>
                                        <td></td>
                                        <td><input type="text"class="form-control"name="department" value="<?php echo $row[5] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td></td>
                                        <td><input type="text"class="form-control"name="email" value="<?php echo $row[6] ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td></td>
                                        <td><input type="text"class="form-control"name="phone" value="<?php echo $row[7] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Office address</td>
                                        <td></td>
                                        <td><input type="text"class="form-control"name="office_address" value="<?php echo $row[8] ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <button onclick="location.href='admin_view_teachers.php'"class="btn btn-primary btn-md" style="margin-top:10px;">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "admin_footer.php";
    ?>
