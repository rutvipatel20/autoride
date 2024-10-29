<?php 
    include('header.php');
?>

<?php
    if(isset($_POST['submit'])){
        $vehicle_type_id = $_POST['vehicle_type_id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $driver_name = $_POST['driver_name'];
        $audio_input = $_POST['audio_input'];
        $bluetooth = $_POST['bluetooth'];
        $heated_seats = $_POST['heated_seats'];
        $weel_drive = $_POST['weel_drive'];
        $usb_input = $_POST['usb_input'];
        $fm_radio = $_POST['fm_radio'];
        $gps_navigation = $_POST['gps_navigation'];
        $sunroot = $_POST['sunroot'];
        $status = $_POST['status'];
        $fuel_type = $_POST['fuel_type'];
        $persons = $_POST['persons'];
        $number_pate = $_POST['number_pate'];
        $description = $_POST['description'];
        
        $selectCar = "SELECT * FROM `vehicles` WHERE `number_pate`='$number_pate' ";
        $queryCar = mysqli_query($conn,$selectCar);
        $record = mysqli_num_rows($queryCar);
		if($record < 1)
        {
            $img = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']["tmp_name"], "vehicle/" . $img);
                
            $sql = "INSERT INTO `vehicles`(`vehicle_type_id`, `title`,`number_pate`,`image`, `audio_input`, `bluetooth`, `heated_seats`, `weel_drive`, `usb_input`, `fm_radio`, `gps_navigation`, `sunroot`, `price`, `driver_id`, `is_active`,`status`,`description`) 
                VALUES ('".$vehicle_type_id."','".$title."','".$number_pate."','".$img."','".$audio_input."','".$bluetooth."','".$heated_seats."','".$weel_drive."','".$usb_input."','".$fm_radio."','".$gps_navigation."','".$sunroot."','".$price."','".$driver_name."','".$status."','0','".$description."')";
            $query = mysqli_query($conn,$sql);
            if($query){
                ?>
                <script>
                    alert('Car added successfully.');
                    window.location.href = "car-view.php";
                </script>
                <?php
            }else{
                echo "not successfully". mysqli_error($conn);
            }
        
        }else{
            $msg = "This number plate vehicle already exist!!!";
        }
    }

        
?>

<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">New Car </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="car-view.php">Car Details</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Car</li>
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
                        <form id="signupForm" method="POST" enctype="multipart/form-data">
                            <h4 class="form-header text-uppercase">
                                <i class="icon-book-open icons"></i>
                                New Car
                            </h4>
                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">Car Type</label>
                                <div class="col-sm-10">
                                    <?php 
                                         $query = "SELECT * FROM `car_type` ORDER BY `id` ASC";
                                         $result = mysqli_query($conn,$query);
                                    ?>
                                    <select name="vehicle_type_id" class="form-control" required>
                                        <option value="">Select Car Type</option>
                                        <?php
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <option value="<?=$row['id']?>"><?=$row['car_type_name']?></option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-9" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-9" name="title" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-17" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="input-17" name="image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-13" class="col-sm-2 col-form-label">price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="input-13" min=0 name="price" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="input-17" class="col-sm-2 col-form-label">Driver-name</label>
                                <div class="col-sm-10">
                                    <?php 
                                        $drivers = "SELECT * FROM `driver_user` WHERE `is_free`=1";
                                        $result = mysqli_query($conn,$drivers);
                                    ?>
                                    <select id="input-17" name="driver_name" class="form-control" required>
                                        <?php
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="input-14" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="input-14" name="description" required></textarea>
                                </div>     
                            </div>

                            <div class="form-group row">
                                <label for="input-14" class="col-sm-2 col-form-label">Number Plate</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="input-14" name="number_pate" required>
                                </div>

                                <label for="input-11" class="col-sm-2 col-form-label">Fuel Type</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="input-6" name="fuel_type" required>
                                        <option value="">Select a fuel type</option>
                                        <option value="Petrol">Petrol</option>
                                        <option value="CNG">CNG</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Electric Power">Electric Power</option>
                                        <option value="Hybrids">Hybrids</option>
                                    </select>
                                </div>

                                <label for="input-11" class="col-sm-2 col-form-label">Person</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="input-11" name="persons" required>
                                        <option value="">Select a Persons</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-12" class="col-sm-2 col-form-label">AUDIO-INPUT</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="input-12" name="audio_input" required="">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <label for="input-11" class="col-sm-2 col-form-label">Bluetooth</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="bluetooth" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <label for="input-11" class="col-sm-2 col-form-label">Heated-seats</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="heated_seats" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-11" class="col-sm-2 col-form-label">weel-drive</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="weel_drive" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <label for="input-11" class="col-sm-2 col-form-label">usb-input</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="usb_input" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <label for="input-11" class="col-sm-2 col-form-label">fm-radio</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="fm_radio" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-11" class="col-sm-2 col-form-label">gps-navigation</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="gps_navigation" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <label for="input-11" class="col-sm-2 col-form-label">sunroot</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="sunroot" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <label for="input-11" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-2">
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
                vehicle_type_id: "required",
                title: "required",
                price: "required",
                image: "required",
                fuel_type: "required",
                persons: "required",
                driver_name: "required",
                audio_input: "required",
                number_pate: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
            },
            messages: {
                title: "Please enter any Vehicle Name",
                vehicle_type_id: "Please Select any car type",
                image: "Please Select any image",
                price: "Please enter price",
                fuel_type: "Please enter fuel type",
                persons: "Please enter persons",
                driver_name: "Please enter driver name",
                audio_input: "Please select audio_input",
                number_pate: {
                    required: "Please Number Plate Details",
                    minlength: "Your Number Plate must be at least 10 characters long",
                    maxlength: "Your Number Plate must be at least 10 characters long"
                },
            }
        });
    });
</script>
