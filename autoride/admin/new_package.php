<?php 
    include('header.php');
?>

<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">New Package</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="package-view.php">Package view</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Package</li>
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
                        <form id="" method="POST">
                            <h4 class="form-header text-uppercase">
                                <i class="icon-support icons"></i>
                                New Package
                            </h4>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hrs</label>
                                <div class="col-sm-3 input-group mb-3">
                                    <input type="number" class="form-control" min=0 max=8 name="hrs" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Hrs</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Min</label>
                                <div class="col-sm-3 input-group mb-3">
                                    <select name="min" class="form-control" required>
                                        <option value="">select Min</option>
                                        <option value="00">00</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                    </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Min</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">KM</label>
                                <div class="col-sm-3 input-group mb-3">
                                    <input type="number" class="form-control" min='0' name="km" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">KM</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-3">
                                    <select class="form-control valid" id="input-6" name="status" required=""
                                        aria-invalid="false">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" name="submit" class="btn btn-success"><i
                                        class="fa fa-check-square-o"></i>
                                    SAVE</button>
                            </div>
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
                hrs: "required",
                min: "required",
                km: "required",
                status: "required",
            },
            messages: {
                hrs: "Please enter Hours",
                min: "Please Select any minuts",
                km: "Please enter KM",
                status: "Please enter price",
            }
        });
    });
</script>
<?php
    if(isset($_POST['submit'])){

        $hrs = $_POST['hrs'];
        $min = $_POST['min'];
        $km = $_POST['km'];
        $status = $_POST['status'];

        $time = $hrs.':'.$min;
        if($hrs <=00){
            $time_type = 'min';
        }else{
            $time_type = 'hrs';
        }

        if($min == 00){
            $value=$hrs.'.'.'0';
        }else if($min == 15){
            $value= $hrs.'.'.'25';
        }else if($min == 30){
            $value=$hrs.'.'.'50';
        }else if($min == 45){
            $value=$hrs.'.'.'75';
        }

        $sql = "INSERT INTO `package`(`time`, `time_type`, `km`, `value`, `hrs`, `min`, `is_active`) 
        VALUES ('$time','$time_type','$km','$value','$hrs','$min','$status')";
        $query = mysqli_query($conn,$sql);
        if($query){
            ?>
					<script>
						window.location.href="package-view.php";
					</script>
				<?php
        }else{
            echo "not successfully". mysqli_error($conn);
        }
    }
?>