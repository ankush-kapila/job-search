    <?php
    include "teacher_header.php";
    include "connection.php";
    ?>
    <div id="panel-home">
        <div class="panel-banner"></div>
        <div class="heading">
            <div class="container">
                <div class="title text-center">
                    Add Job information
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <form action="teacher_add_job_action.php" method="post">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Job title</label><span style="color:red">*</span>
                                <input type="text"class="form-control"name="job_title" required>
							</div>
                        </div>
						<div class="row">
                            <div class="form-group col-md-12">
                                <label>Description</label>
								<textarea class="form-control" rows="4" name="description"></textarea>
                            </div>
                        </div>
						<div class="row">
                            <div class="form-group col-md-12">
                                <label>Responsibilities</label>
								<textarea class="form-control" rows="4" name="responsibilities"></textarea>
                            </div>
                        </div>
						<div class="row">
                            <div class="form-group col-md-12">
                                <label>Requirements</label>
								<textarea class="form-control" rows="4" name="requirements"></textarea>
                            </div>
                        </div>
						<div class="row">
                            <div class="form-group col-md-12">
                                <label>Credits</label><span style="color:red">*</span>
								<select class="form-control" name="credits">
                                    <option>3</option>
                                    <option>6</option>
                                    <option>9</option>
                                </select>
                            </div>
                        </div>
						<br>
						<div class="row" style="margin-left: 5px">
							<button type="submit" class="btn btn-primary btn-lg">Submit</button>
						</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include "teacher_footer.php";
    ?>
