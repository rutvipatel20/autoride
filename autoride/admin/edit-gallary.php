<?php 
    include('header.php');
    $gallaryId = $_GET['id'];
?>

<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">New Gallary </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javaScript:void();">Gallary Details</a></li>
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
                                <i class="fa fa-address-book-o"></i>
                                New Gallary
                            </h4>

                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="input-10" name="image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-10" class="col-sm-2 col-form-label">postion</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="input-10" name="postion">
                                </div>

                                <label for="input-10" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-4">
                                    <select name="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">In active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-footer">
                                <button type="submit" name="submit" class="btn btn-success"><i
                                        class="fa fa-check-square-o"></i> SAVE</button>
                            </div>

                        </form>
                    </div>
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

<?php
    if(isset($_POST['submit'])){

        $postion = $_POST['postion'];
	    $status = $_POST['status'];
            
        if(!empty($_FILES['image']['name'])){
            $img = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']["tmp_name"], "gallary/" . $img);
            $sql = "UPDATE `gallary` SET`image`='".$img."',`position`='$postion',`is_active`='$status' WHERE `id`=$gallaryId ";
        }else{
            $sql = "UPDATE `gallary` SET `position`='$postion',`is_active`='$status' WHERE `id`=$gallaryId ";
        }
        $query = mysqli_query($conn,$sql);
        if($query){
            ?>
                <script>
                    alert('Gallary successfully updated');
                    window.location.href = "gallary.php";
                </script>
            <?php
        }else{
            echo "not successfully". mysqli_error($conn);
        }
    }
?>