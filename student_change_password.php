<?php
include "student_header.php";
if(isset($_REQUEST['q'])) {
    if($_REQUEST['q'] == 1) {
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>New password and confirm password should match!</center>
        </div>
        <?php
    }
    if($_REQUEST['q'] == 2) {
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Old password is incorrect!</center>
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
					Change password
				</div>
			</div>
		</div>
		<div class="page-content">
			<div class="container" style="padding-top: 25px">
		        <div class="form-group col-md-6 col-md-offset-3">
	                <form action="student_change_password_action.php" method="post">
	                    <div class="row">
	                        <div class="form-group col-md-12">
	                            <label>Old password</label>
	                            <input type="text" class="form-control" name="old_password"required>
	                        </div>
	                    </div>
						<div class="row">
	                        <div class="form-group col-md-12">
	                            <label>New password</label>
	                            <input type="text" class="form-control" name="new_password" id="password" minlength="6" required>
	                        </div>
	                    </div>
						<div class="row">
	                        <div class="form-group col-md-12">
	                            <label>Confirm password</label>
	                            <input type="text" class="form-control" name="confirm_password" id="confirm_password" minlength="6" required>
	                        </div>
	                    </div>
						<script>
							$('#password, #confirm_password').on('keyup', function () {
								if ($('#password').val() == $('#confirm_password').val()) {
									$('#message').html('').css('color', 'green');
								} else
									$('#message').html('Error: passwords should match').css('color', 'red');
							});
						</script>
						<div class="row">
	                        <div class="form-group col-md-12">
	                            <span id='message'></span>
	                        </div>
	                    </div>
						<br>
						<div class="row" style="margin-left: 5px">
							<button type="submit" class="btn btn-primary btn-lg">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	include "student_footer.php";
	?>
