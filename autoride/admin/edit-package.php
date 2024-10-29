<?php 
    include('header.php');
    if (isset($_GET['id']) && $_GET['id'] != '') {
        $packageId = $_GET['id'];
    }else{
        ?>
        <script>
            window.location.href = 'package-view.php';
        </script>
        <?PHP
    }
?>

<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Edit Package Type</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="package-view.php">Package view</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Package</li>
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
                                Edit Package
                            </h4>

                            <?php 
                                $query = "SELECT * FROM `package` WHERE `id`='$packageId' ";
                                $result = mysqli_query($conn,$query);
                                while($row = mysqli_fetch_assoc($result))
                                {
                            ?>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hrs</label>
                                <div class="col-sm-2 input-group mb-3">
                                    <input type="number" class="form-control" min=0 max=8 name="hrs" value="<?=$row['hrs']?>" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Hrs</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Min</label>
                                <div class="col-sm-2 input-group mb-3">
                                    <select name="min" class="form-control" required>
                                        <option value="">select Min</option>
                                        <option value="00" <?=$row['min']==00 ? 'selected' : '' ?> >00</option>
                                        <option value="15" <?=$row['min']==15 ? 'selected' : '' ?> >15</option>
                                        <option value="30" <?=$row['min']==30 ? 'selected' : '' ?> >30</option>
                                        <option value="45" <?=$row['min']==15 ? 'selected' : '' ?> >45</option>
                                    </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Min</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">KM</label>
                                <div class="col-sm-2 input-group mb-3">
                                    <input type="number" class="form-control" min='0' name="km" value="<?=$row['km']?>" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">KM</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="status" required=""
                                        aria-invalid="false">
                                        <option value="1" <?=$row['is_active']==1 ? 'selected' : ''?> >Active</option>
                                        <option value="0" <?=$row['is_active']==0 ? 'selected' : ''?> >Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" name="submit" class="btn btn-success"><i
                                        class="fa fa-check-square-o"></i>
                                    SAVE</button>
                            </div>
                            <?php } ?>
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
            $value=0;
        }else if($min == 15){
            $value= $hrs.'.'.'25';
        }else if($min == 30){
            $value=$hrs.'.'.'50';
        }else if($min == 45){
            $value=$hrs.'.'.'75';
        }

        $sql = "UPDATE `package` SET `time`='$time', `time_type`='$time_type', `km`='$km', `value`='$value', `hrs`='$hrs', `min`='$min', `is_active`='$status' WHERE `id`='$packageId' ";
        $query = mysqli_query($conn,$sql);
        if($query){
            ?>
					<script>
                        alert('Package Successfully updated');
						window.location.href="package-view.php";
					</script>
				<?php
        }else{
            echo "not successfully". mysqli_error($conn);
        }
    }
?>