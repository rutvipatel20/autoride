<?php
require 'conn.php';
session_start();
$msg="";

if(isset($_POST['login']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $login="SELECT * FROM `driver_user` where email='".$email."' AND password='".$password."' ";
  $res=mysqli_query($conn,$login);
  $check=mysqli_num_rows($res);
  
    if($check > 0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $_SESSION['DRIVER_LOGIN']='yes';
            $_SESSION['DRIVER_ID']=$row['id'];
            $_SESSION['DRIVER_EMAIL']=$row['email'];
            $_SESSION['DRIVER_NAME']=$row['name'];
                ?>
                <script>
                    window.location.href = "index.php";
                </script>
                <?PHP
        }
    }else {
        $msg="username and password incorrect !!!";
    } 
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/bulona/demo/authentication-signin2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Oct 2019 10:34:37 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>autoride-admin</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body>

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

	   <div class="card-authentication2 mx-auto my-5">
	    <div class="card-group">
	    	<div class="card mb-0">
	    	   <div class="bg-signin2"></div>
	    		<div class="card-img-overlay rounded-left my-5">
                 <h2 class="text-white">Lorem</h2>
                 <h1 class="text-white">Ipsum Dolor</h1>
                 <p class="card-text text-white pt-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
             </div>
	    	</div>

	    	<div class="card mb-0 ">
	    		<div class="card-body">
	    			<div class="card-content p-3">
	    				<div class="text-center">
					 		
					 	</div>
					 <div class="card-title text-uppercase text-center py-3">Sign In</div>
					   <form method="post">
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							   <label for="exampleInputUsername" class="sr-only">Email</label>
								 <input type="email" id="exampleInputUsername" name="email" class="form-control" placeholder="Username">
								 <div class="form-control-position">
									<i class="icon-user"></i>
								</div>
						   </div>
						  </div>
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							  <label for="exampleInputPassword" class="sr-only">Password</label>
							  <input type="password" id="exampleInputPassword" name="password" class="form-control" placeholder="Password">
							  <div class="form-control-position">
								  <i class="icon-lock"></i>
							  </div>
						   </div>
						  </div>
						  <div class="form-row mr-0 ml-0">
						  <div class="form-group col-6">
							  <div class="icheck-material-primary">
				               <input type="checkbox" id="user-checkbox" checked="" />
				               <label for="user-checkbox">Remember me</label>
							 </div>
							</div>
							<div class="form-group col-6 text-right">
							 <a href="authentication-reset-password2.html">Reset Password</a>
							</div>
						</div>
						<button type="submit" name="login" class="btn btn-primary btn-block waves-effect waves-light">Sign In</button>
						 <div class="text-center pt-3">
                         <?php if(!empty($msg)){
                            ?>
                                <div style="color: red;margin-top:8px;font-weight: 500;" class="col-12 text-left">
                                <?=$msg?>
                                </div>
                            <?php
                            } ?>
						 <div class="text-center pt-1">
						
						</div>
					</form>
				 </div>
				</div>
	    	</div>
	     </div>
	    </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
      </ul>
      
     </div>
   </div>
  <!--end color cwitcher-->
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  
</body>

<!-- Mirrored from codervent.com/bulona/demo/authentication-signin2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Oct 2019 10:34:37 GMT -->
</html>
<?php
    if(isset($_POST['signin'])){
        $username = $_POST['uname'];
        $password = $_POST['password'];

            
        $sql = "INSERT INTO `login`(`uname`, `password`) 
        VALUES ('$username','$password')";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo "saved successfully";
        }else{
            echo "not successfully". mysqli_error($conn);
        }
    }
?>