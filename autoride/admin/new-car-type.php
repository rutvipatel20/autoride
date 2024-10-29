<?php 
    include('header.php');
?>
<?php
    if(isset($_POST['submit'])){
        $car_type_name = $_POST['car_type_name'];
        $car_type_description = $_POST['car_type_description'];
        $status = $_POST['status'];
            
        $checkExistUserEmailSql = "SELECT * FROM `car_type` WHERE `car_type_name`='$car_type_name'";
		$checkUserQeury = mysqli_query($conn,$checkExistUserEmailSql);
		$record = mysqli_num_rows($checkUserQeury);
		if($record < 1)
        { 

            $sql = "INSERT INTO `car_type`(`car_type_name`, `car_type_description`, `status`) 
            VALUES ('$car_type_name','$car_type_description','$status')";
            $query = mysqli_query($conn,$sql);
            if($query){
                echo "saved successfully";
            }else{
                echo "not successfully". mysqli_error($conn);
            }
        }else{
            $msg = "This car type already exist";
        }

    }
?>
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">New Car Type</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="car-type-view.php">Car Type View</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Car Type</li>
                </ol>
            </div>
            <div class="col-sm-3">
                <div class="btn-group float-sm-right">
                    <button type="button" class="btn btn-light waves-effect waves-light"><i class="fa fa-cog mr-1"></i>
                        Setting</button>
                    <button type="button"
                        class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                        data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu">
                        <a href="javaScript:void();" class="dropdown-item">Action</a>
                        <a href="javaScript:void();" class="dropdown-item">Another action</a>
                        <a href="javaScript:void();" class="dropdown-item">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a href="javaScript:void();" class="dropdown-item">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="signupForm" method="POST">
                            <h4 class="form-header text-uppercase">
                                <i class="zmdi zmdi-card-travel"></i>
                                New Car Type
                            </h4>
                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">Car Type Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-10" name="car_type_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control valid" id="input-6" name="status" required=""
                                        aria-invalid="false">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-17" class="col-sm-2 col-form-label">Car Type Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="car_type_description" rows="4"
                                        id="input-17"></textarea>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" name="submit" class="btn btn-success"><i
                                        class="fa fa-check-square-o"></i>
                                    SAVE</button>
                            </div>
                            <?PHP 
                            if(isset($msg)){
                        ?>
                            <div class="card-body alert_msg" style="font-weight:500;color: red;"> 
                                <?php echo $msg; ?> 
                            </div>
				        <?php
                            }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->
    </div>
    <!-- End container-fluid-->
</div>
<!--End content-wrapper-->

<?php 
    include('footer.php');
?>
<!--Form Validatin Script-->
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script>
    $().ready(function () {

        $("#personal-info").validate();

        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                car_type_name: "required",
                car_type_description: "required",
            },
            messages: {
                car_type_name: "Please enter your car type name",
                car_type_description: "Please enter your car type description",
            }
        });
    });
</script>
