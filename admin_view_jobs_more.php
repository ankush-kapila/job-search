<?php
include "admin_header.php";
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
                <div class="col-sm-8 col-sm-offset-2">
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
                </div>
            </div>
        </div>
    </div>
    <?php
    include "admin_footer.php";
    ?>
