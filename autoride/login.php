<?php
    include('conn.php');
	session_start();
	$msg="";
	if(isset($_SESSION['USER_LOGIN'])){
		?>
		<script>
			window.location.href = "index.php";
		</script>
		<?PHP
	}else{
		// header("location:login.php");
	}
	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$password=$_POST['password'];

		if(strlen($password) >= 8){
			$checkMail="SELECT * FROM `users` where email='".$email."'";
			$emailRes=mysqli_query($conn,$checkMail);
			$emailCheck=mysqli_num_rows($emailRes);
			if($emailCheck > 0)
			{
				$login="SELECT * FROM `users` where email='".$email."' AND password='".$password."' ";
				$res=mysqli_query($conn,$login);
				$check=mysqli_num_rows($res);
				
				if($check > 0)
				{
					$account="SELECT * FROM `users` where email='".$email."' AND password='".$password."' AND `is_active`=1 ";
					$accountRes=mysqli_query($conn,$account);
					$accountCheck=mysqli_num_rows($accountRes);
					if($accountCheck > 0)
					{
						while($row=mysqli_fetch_assoc($res))
						{
						$_SESSION['USER_LOGIN']='yes';
						$_SESSION['USER_ID']=$row['id'];
						$_SESSION['USER_EMAIL']=$row['email'];
						$_SESSION['USER_NAME']=$row['username'];
							?>
							<script>
								alert('login successfully');
								window.location.href = "index.php";
							</script>
							<?PHP
						}
					}else{
						$msg="Your account is blocked";
					}
				}
				else 
				{
					$msg="username or password incorrect!";
				}
			} 
			else 
			{
				$msg="Account not exist!";
			} 
		}else{
			$msg="Your password must be at least 8 characters long";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
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
						User Login
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
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div>
						<input type="rediobutton"  none="">
					</div>
					
					<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="login">Login</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="foget-password.php">
							Username / Password?
						</a>
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