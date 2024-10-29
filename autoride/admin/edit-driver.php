<?php 
    include('header.php');
    $driverid = $_GET['id'];
    
?>
<?php 
    if(isset($_POST['register'])){

        $un = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        $adhar_card = $_POST['acnumber'];
        $license_number = $_POST['lnumber'];

        $checkExistUserEmailSql = "SELECT * FROM `driver_user` WHERE `id`!='$driverid' AND`email`='$email' OR `adhar_card`='$adhar_card' OR `license_number`='$license_number' ";
		$checkUserQeury = mysqli_query($conn,$checkExistUserEmailSql);
		$record = mysqli_num_rows($checkUserQeury);

		if($record < 1)
        { 
            $sql = "UPDATE `driver_user` SET `name`='$un',`email`='$email',`phone`='$phone',`address`='$address',`is_active`='$status',`adhar_card`='$adhar_card', `license_number`='$license_number' WHERE `id`= $driverid";
            $query = mysqli_query($conn,$sql);
            if($query){
                ?>
<script>
    alert('driver detail successfully updated');
    window.location.href = "driver-view.php";
</script>
<?php
            }else{
                echo "not successfully". mysqli_error($conn);
            }
        }else{
            $msg = "account already exist";
        }
    }
?>
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Edit Driver</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="driver-view.php">Driver details</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Driver</li>
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
                        <div class="card-title">Edit Driver</div>
                        <hr>
                        <form id="signupForm" method="post">
                            <?php 
                        $checkExistUserEmailSql = "SELECT * FROM `driver_user` WHERE `id`='$driverid'";
                        $checkUserQeury = mysqli_query($conn,$checkExistUserEmailSql);
                        $record = mysqli_num_rows($checkUserQeury);
                        while($row=mysqli_fetch_assoc($checkUserQeury))
					    {
                        ?>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="input-1">Name</label>
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control" value="<?=$row['name']?>"
                                        id="input-1" placeholder="Enter Your Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="input-2">Email</label>
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" name="email" class="form-control" value="<?=$row['email']?>"
                                        id="input-2" placeholder="Enter Your Email Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="input-3">Mobile</label>
                                </div>
                                <div class="col-sm-12">
                                    <input type="number" name="phone" class="form-control" value="<?=$row['phone']?>"
                                        id="input-3" placeholder="Enter Your Mobile Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="input-3">Address</label>
                                </div>
                                <div class="col-sm-12">
                                    <textarea type="text" name="address" class="form-control" id="input-3"
                                        placeholder="Enter Your address"><?=$row['address']?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="input-5">Aadhar-card number</label>
                                </div>
                                <div class="col-sm-12">
                                    <input type="number" name="acnumber" class="form-control" id="input-5"
                                        value="<?=$row['adhar_card']?>" placeholder="Enter Your Aadhar-card number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="input-6">Licence number</label>
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" name="lnumber" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"
                                        value="<?=$row['license_number']?>" class="form-control" id="input-6"
                                        placeholder="Enter Your Licence number">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="input-4">Status</label>
                                </div>
                                <div class="col-sm-12">
                                    <select class="form-control" id="input-6" name="status" required=""
                                        aria-invalid="false">
                                        <option value="1" <?= $row['is_active']==1 ? 'selected' : ''?>>Active</option>
                                        <option value="2" <?= $row['is_active']==2 ? 'selected' : ''?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="register" class="btn btn-primary px-5"><i
                                            class="icon-lock"></i>Submit</button>
                                </div>
                            </div>
                            <?php 
                        }
                        ?>
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
                name: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 11
                },
                address: {
                    required: true,
                    minlength: 10
                },
                acnumber: {
                    required: true,
                    minlength: 12,
                    maxlength: 12
                },
                lnumber: {
                    required: true,
                    minlength: 15,
                    maxlength: 15
                },
                agree: "required"
            },
            messages: {
                name: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long",
                    equalTo: "Please enter the same password as above"
                },
                acnumber: {
                    required: "Please Driver Adhar Card Details",
                    minlength: "Your Adhar Card Number must be at least 12 characters long",
                    maxlength: "Your Adhar Card Number must be at least 12 characters long"
                },
                lnumber: {
                    required: "Please Driver License Card Details",
                    minlength: "Your License Number must be at least 15 characters long",
                    maxlength: "Your License Number must be at least 15 characters long"
                },
                email: "Please enter a valid email address",
                phone: "Please enter your 10 digit number",
                agree: "Please accept our policy"
            }
        });


    });
</script>