<?php 
    include('header.php');
?>

<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">New Vehicle </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javaScript:void();">Vehicle Details</a></li>
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
                        <form id="signupForm" method="POST">
                            <h4 class="form-header text-uppercase">
                                <i class="fa fa-address-book-o"></i>
                                Edit Vehicle
                            </h4>
                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">Vehicle Type</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-10" name="vehicle_type">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-10" name="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-17" class="col-sm-2 col-form-label">price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="input-10" name="price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-17" class="col-sm-2 col-form-label">Driver-name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-10" name="driver_name">


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control valid" id="input-6" name="status" required=""
                                        aria-invalid="false">
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">AUDIO-INPUT</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="audio_input" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>

                                <label for="input-10" class="col-sm-2 col-form-label">Bluetooth</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="bluetooth" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
 
                                <label for="input-10" class="col-sm-2 col-form-label">Heated-seats</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="heated_seats" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">weel-drive</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="weel_drive" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>

                                <label for="input-10" class="col-sm-2 col-form-label">usb-input</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="usb_input" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>

                                <label for="input-10" class="col-sm-2 col-form-label">fm-radio</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="fm_radio" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">gps-navigation</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="gps_navigation" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>

                                <label for="input-10" class="col-sm-2 col-form-label">sunroot</label>
                                <div class="col-sm-2">
                                    <select class="form-control valid" id="input-6" name="sunroot" required=""
                                        aria-invalid="false">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>

                            <div class="form-footer">
                                <button type="submit" name="cancle" class="btn btn-danger"><i class="fa fa-times"></i>
                                    CANCEL</button>
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
                                car_type_name: "required",
                                car_type_description: "required",

                                messages: {
                                    car_type_name: "Please enter your car type name",
                                    car_type_description: "Please enter your car type description",

                                }
</script>
<?php
    if(isset($_POST['submit'])){
        $vehicle_type = $_POST['vehicle_type'];
        $title = $_POST['title'];
        $driver_name = $_POST['driver_name'];
        $status = $_POST['status'];
        $audio_input = $_POST['audio_input'];
        $bluetooth = $_POST['bluetooth'];
        $heated_seats = $_POST['heated_seats'];
        $weel_drive = $_POST['weel_drive'];
        $usb_input = $_POST['usb_input'];
        $fm_radio = $_POST['fm_radio'];
        $gps_navigation = $_POST['gps_navigation'];
        $sunroot = $_POST['sunroot'];
            
        $sql = "";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo "saved successfully";
        }else{
            echo "not successfully". mysqli_error($conn);
        }
    }
?>