<?php
include "connection.php";

$status=$_REQUEST['status'];
$query="select country_name from apps_countries";
$result=mysqli_query($conn,$query);
if($status=='International student')
{
    ?>
    <label>Country</label>
    <select name="student_country" class="form-control">
    <?php
    while($row=mysqli_fetch_array($result)){
        ?>
        <option><?php echo $row[0]?></option>
        <?php
    }
    ?>
    </select>
    <?php
}

?>