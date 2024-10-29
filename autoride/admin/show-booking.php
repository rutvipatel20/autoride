<?php 
    include('header.php');
?>
<style>
    .cust_lable {
        font-weight: 600;
    }
</style>
<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Typography</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Bulona</a></li>
                    <li class="breadcrumb-item"><a href="javaScript:void();">UI Elements</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Typography</li>
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

        <?php 
            $query = "SELECT book.*,
                package.id as packageId,package.time, package.time_type, package.time_type, package.km, package.value,
                car_type.car_type_name,
                vehicles.*,vehicles.id as vid,
                users.username as username, users.email as userEmail, users.mobile as userMobile
                FROM `book` 
                INNER JOIN package ON package.id = book.package_id
                INNER JOIN car_type ON car_type.id = book.vehicle_type_id
                INNER JOIN vehicles ON vehicles.id = book.car_id
                INNER JOIN users ON users.id = book.user_id
                WHERE book.id = '".$_GET['id']."' ";
            $result = mysqli_query($conn,$query);
            $check = mysqli_num_rows($result);
            if($check > 0){
                while($row = mysqli_fetch_assoc($result))
                {
                    $data[] = $row;
                
        ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-uppercase">Booking Details</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 cust_lable col-sm-4">
                                Payment Id
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['razorpay_payment_id']?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                Booking Date
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['date']?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                Location
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['location']?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                Price
                            </div>
                            <div class="mb-3 col-sm-8">
                                ₹ <?=$row['price']?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                Package
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['time'] .' '. $row['time_type'] .' '. $row['km']?>
                            </div>
                        </div>
                    </div>

                    <div class="card-header text-uppercase">Booking User Details</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 cust_lable col-sm-4">
                                name
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['username']?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                email
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['userEmail']?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                mobile
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['userMobile']?>
                            </div>
                        </div>
                    </div>

                    <div class="card-header text-uppercase">User Details</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 cust_lable col-sm-4">
                                name
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['name']?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                email
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['email']?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                mobile
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['mobile']?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-uppercase">Car Details</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 cust_lable col-sm-4">
                                Vehicle Type
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['car_type_name']?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                Vehicle Name
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['title']?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                Audio Input
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['audio_input']==1 ? 'Yes' : 'No' ?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                Bluetooth
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['bluetooth']==1 ? 'Yes' : 'No' ?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                Heated Seats
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['heated_seats']==1 ? 'Yes' : 'No' ?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                Weel Drive
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['weel_drive']==1 ? 'Yes' : 'No' ?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                USB Input
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['usb_input']==1 ? 'Yes' : 'No' ?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                FM Radio
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['fm_radio']==1 ? 'Yes' : 'No' ?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                FM Radio
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['fm_radio']==1 ? 'Yes' : 'No' ?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                GPS Navigation
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['gps_navigation']==1 ? 'Yes' : 'No' ?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                Sunroot
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['sunroot']==1 ? 'Yes' : 'No' ?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                price
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['price']==1 ? 'Yes' : 'No' ?>
                            </div>

                            <div class="mb-3 cust_lable col-sm-4">
                                Booking Status
                            </div>
                            <div class="mb-3 col-sm-8">
                                <?=$row['status']==1 ? 'Yes' : 'No' ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header text-uppercase">Package Update</div>
                    <form method="post">
                        <input type="hidden" name="vehicle" value="<?php echo $row['vid']; ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 cust_lable col-sm-4">
                                    Package
                                </div>
                                <div class="mb-3 col-sm-8">
                                    <?php if($row['is_expire']==1){ ?>
                                    <select name="status" class="form-control">
                                        <option value="<?=$row['is_expire']==1 ? '1' : '' ?>"
                                            <?=$row['is_expire']==1 ? 'selected' : '' ?>>Active</option>
                                        <option value="<?=$row['is_expire']==2 ? '2' : '' ?>"
                                            <?=$row['is_expire']==2 ? 'selected' : '' ?>>Cancel</option>
                                        <option value="<?=$row['is_expire']==0 ? '0' : ''?>"
                                            <?=$row['is_expire']==0 ? 'selected' : ''?>>Complate</option>
                                    </select>
                                    <?php }else{ ?>
                                        <?php echo 'Expire'; ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php if($row['is_expire']==1){ ?>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-info">submit</button>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
            }
        }
    ?>
    <!-- End container-fluid-->

</div>

<?php 

    if(isset($_POST['submit'])){
        $bid = $_GET['id'];
        $vid = $_POST['vehicle'];
        $status = $_POST['status'];
        // echo $vid; die;
        // $vehicle = mysqli_query($conn, "UPDATE `vehicles` SET `status`='0' WHERE `id`='$vid'");
        $book = mysqli_query($conn, "UPDATE `book` SET `is_expire`='$status' WHERE `id`='$bid'");

        if($book){
        ?>
            <script>
                window.location.href = "today-booking.php";
            </script>
		<?PHP
        }
    }   

?>

<?php 
    include('footer.php');
?>