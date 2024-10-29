<?php
    include('conn.php');
    include('function.php');
	session_start();
	$msg="";
	if(!isset($_SESSION['forgetEmail']) && !isset($_SESSION['otp'])){
		?>
		<script>
			window.location.href = "foget-password.php";
		</script>
		<?PHP
	}else{
		// header("location:login.php");
	}
	if(isset($_POST['login'])){
		$npassword=$_POST['npassword'];
		$cpassword=$_POST['cpassword'];

        if($npassword==$cpassword){
            $updatePassword = "UPDATE `users` SET `password`='$npassword' WHERE `email`='".$_SESSION['forgetEmail']."'";
            $query = mysqli_query($conn,$updatePassword);
            if($query){
                ?>
                <script>
                    alert('password successfully updated');
                    window.location.href = "login.php";
                </script>
                <?PHP
            }else{
                $msg = "password not updated!!!";
            }
        }else{
            $msg = "new password and confirm password not match";
        }
            
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forget Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login_assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="login_assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="login_assets/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						forgot Password
					</span>
					<?php 
					if(isset($msg) && $msg!=""){
						?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								 <?=$msg?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php
					} 
					?>
					<div class="wrap-input100 validate-input" data-validate = "new Password is required">
						<input class="input100" type="password" name="npassword" placeholder="new Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "confirm Password is required">
						<input class="input100" type="password" name="cpassword" placeholder="confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="login">Forgot password</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="login_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/vendor/bootstrap/js/popper.js"></script>
	<script src="login_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="login_assets/js/main.js"></script>

</body>
</html>
