<?php 
    include('header.php');
    include('../function.php');
  
?>
<?php 
    if(isset($_POST['register'])){

        $un=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $status = $_POST['status'];

        $checkExistUserEmailSql = "SELECT * FROM `users` WHERE `email`='$email'";
		$checkUserQeury = mysqli_query($conn,$checkExistUserEmailSql);
		$record = mysqli_num_rows($checkUserQeury);
		if($record < 1)
        { 
            $sql = "INSERT INTO `users`(`username`, `email`, `password`, `mobile`, `is_active`) 
            VALUES ('$un','$email','$password','$phone','$status')";
            $query = mysqli_query($conn,$sql);
            if($query){
                $body = '<h3>Your Account Successfully Created</h3>
                        <p>Id: '.$email.'</p>
                        <p>Password: '.$password.'</p>
                        ';
                    sendMail($un,$email,$body);9
                    ?>
                        <script>
                            window.location.href="user-view.php";
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
            <h4 class="page-title">New User</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="user-view.php">Users view</a></li>
                <li class="breadcrumb-item active" aria-current="page">New User</li>
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
                    <div class="card-title">New User</div>
                    <hr>
                    <form id="signupForm" method="post">
                        <div class="form-group">
                            <label for="input-1">Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="name" class="form-control" id="input-1" placeholder="Enter Your Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-2">Email</label>
                            <div class="col-sm-12">
                                <input type="text" name="email" class="form-control" id="input-2" placeholder="Enter Your Email Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-3">Mobile</label>
                            <div class="col-sm-12">
                                <input type="number" name="phone" class="form-control" id="input-3" placeholder="Enter Your Mobile Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-4">Password</label>
                            <div class="col-sm-12">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-5">Confirm Password</label>
                            <div class="col-sm-12">
                                <input type="text" name="confirm_password" class="form-control" id="input-5" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-10" class="col-sm-2 col-form-label">User Status</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="input-6" name="status" required="" aria-invalid="false">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
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
                        <div class="form-group">
                            <button type="submit" name="register" class="btn btn-primary px-5"><i class="icon-lock"></i>Submit</button>
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
                name: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 8
                },
                confirm_password: {
                    required: true,
                    minlength: 8,
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
                agree: "required"
            },
            messages: {
                name: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
                phone: "Please enter your 10 digit number",
                agree: "Please accept our policy"
            }
        });
    
        
    });
</script>
