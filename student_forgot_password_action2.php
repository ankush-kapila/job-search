<?php
include "connection.php";
error_reporting(0);
//fetching the values
$security_answer=$_REQUEST['security_answer'];
$email=$_REQUEST['email'];
$value=$_REQUEST['value'];
//querying the database to get value of security_answer for entered email id
$query="select * from student_accounts where email='$email'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$answer=$row[6];
?>
<html>
<head>
    <title>Student Portal | University of Bridgeport</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php
//alert
if(isset($_REQUEST['q'])) {
    if ($_REQUEST['q'] == 1) {
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Password and confirm password should match!</center>
        </div>
        <?php
    }
}
//if security_answer entered by user matches the security_answer in the db
if($security_answer==$answer) {
    ?>
    <br><br><br><br>
    <div class="form-group col-md-4"></div>
    <div class="form-group col-md-4">
        <div class="well">
            <center><h3><strong>Set up your password</strong></h3></center>
            <br>
            <form action="student_forgot_password_action3.php" method="get">
                <br><br>
                <div class="row">
                    <div class="form-group col-md-12">
                        Password
                        <br><br>
                        <input type="password" class="form-control" id="password" name="password" required minlength="6">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        Confirm password
                        <br><br>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                               minlength="6">
                    </div>
                    <!-- Script to check password, confirm_password match or not -->
                    <script>
                        $('#password, #confirm_password').on('keyup', function () {
                            if ($('#password').val() == $('#confirm_password').val()) {
                                $('#message').html('').css('color', 'green');
                            } else
                                $('#message').html('Error: passwords should match').css('color', 'red');
                        });
                    </script>
                </div>
                <!-- Message from script above is printed in the row below -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <span id='message'></span>
                    </div>
                </div>
                <input type="hidden" name="email" value="<?php echo $email ?>">
                <input type="hidden" name="security_answer" value="<?php echo $security_answer ?>">
                <div class="row" style="padding: 20px">
                    <button type="submit" class="btn btn-block btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <?php
}
//if security_answer entered by user doesnt match the security_answer in the db
else{
    header("location:student_forgot_password_action.php?q=1&value=$value");
}
?>
</body>
</html>
