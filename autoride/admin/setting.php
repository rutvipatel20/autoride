<?PHP 
	include 'header.php';
	// include 'conn.php';
	// session_start();
	$msg="";
	if(isset($_SESSION['ADMIN_ID']) && $_SESSION['ADMIN_ID']!='')
	{
	    $id=$_SESSION['ADMIN_ID'];
	    $select_admin= "SELECT * FROM `admin` WHERE id='".$_SESSION['ADMIN_ID']."' ";
	    $res=mysqli_query($conn,$select_admin);
	    $check=mysqli_num_rows($res);
	    if($check>0)
	    {
	        $row=mysqli_fetch_assoc($res);
	        $email=$row['email'];
	        $name=$row['name'];
	        $password=$row['password'];
			
	        if(isset($_POST['update']))
	        {   
	            $emailPost=$_POST['email'];
	            $namePost=$_POST['name'];
	            $old_password=$_POST['old_password'];
	            $new_password=$_POST['new_password'];
	            $confirm_password=$_POST['confirm_password'];

				if(!empty($new_password)){
					if($password == $old_password){
						if($new_password == $confirm_password){
							$update_ctg="UPDATE `admin` SET `name`='$namePost', `email`='$emailPost',`password`='$new_password' WHERE `id`='$id' ";
							$update=mysqli_query($conn,$update_ctg);
							if(isset($update))
							{
								$_SESSION['ADMIN_EMAIL']=$emailPost;
								$_SESSION['ADMIN_NAME']=$namePost;
								?>
									<script>
										alert('profile successfully updated.');
										window.location.href='index.php';
									</script>
								<?PHP 
							}
							else
							{
								echo "no";
							}
						}else{
							$msg = "new password & Confirm password not match";
						}
					}else{
						$msg = "Please enter correct old password";
					}
				
				}else{
	           
					$update_ctg="UPDATE `admin` SET `name`='$namePost', `email`='$emailPost' WHERE `id`='$id' ";
					$update=mysqli_query($conn,$update_ctg);
					if(isset($update))
					{
						$_SESSION['ADMIN_EMAIL']=$emailPost;
						$_SESSION['ADMIN_NAME']=$namePost;
						?>
							<script>
								window.location.href='index.php';
							</script>
						<?PHP 
					}
					else
					{
						echo "no";
					}
				}
        	} 
    	}
	    else 
	    {    
	        ?>
	            <script>
	                window.open('index.php','_self');
	            </script>
	        <?PHP
	    }
	}
?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row pt-2 pb-2">
					<div class="col-sm-9">
						<h4 class="page-title">Admin Edit</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    		<li class="breadcrumb-item active" aria-current="page">Edit admin</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 mt-3 col-edit">
					<div class="card">
						<div class="card-body">
							<form id="signupForm" method="POST">
								<h4 class="form-header text-uppercase">
									<i class="fa fa-address-book-o"></i>
									Admin Profile
								</h4>
								<div class="form-group row">
									<label for="input-10" class="col-sm-3 col-lg-2 col-form-label" name="firstname">Name</label>
									<div class="col-sm-10">
										<input type="name" class="form-control" id="input-10" name="name" value="<?=$name;?>" required>
									</div>
								</div>

								<div class="form-group row">
                                    <label for="input-10" class="col-sm-3 col-lg-2 col-form-label" name="firstname">email</label>
									<div class="col-sm-10">
										<input type="email" class="form-control" id="input-10" name="email" value="<?=$email;?>" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="input-10" class="col-sm-3 col-lg-2 col-form-label" name="firstname">Old password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="input-10" name="old_password" value="" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="input-10" class="col-sm-3 col-lg-2 col-form-label" name="firstname">New password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="input-10" name="new_password" value="">
									</div>
								</div>

								<div class="form-group row">
									<label for="input-10" class="col-sm-3 col-lg-2 col-form-label" name="firstname">Confirm password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="input-10" name="confirm_password" value="">
									</div>
								</div>

								<div class="form-footer">
									<button type="submit" name="update" class="btn btn-success"><i class="fa fa-check-square-o"></i> SAVE</button>
								</div>
								<div class="card-body alert_msg" style="color: red;"> 
									<?PHP 
				                        echo $msg;
				                    ?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
<?PHP 
	require 'footer.php';
?>