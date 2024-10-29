<?php
include('header.php');

if(isset($_GET['type']) && $_GET['type']!='')
{
  $type=$_GET['type'];
    if($type=='delete')
    {
        $id=$_GET['id'];
        mysqli_query($conn,"UPDATE `vehicles` SET `is_deleted`=0 WHERE `id`='".$id."' ");
    }
}
?>

<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Vehicle View</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vehicle View</li>
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
                    <div class="card-header"><i class="fa fa-table"></i> Vehicle Details</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Car Type Name</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Driver Name</th>
                                        <th>Number Plate</th>
                                        <th>Fuel Type</th>
                                        <th>price</th>
                                        <th>booked</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $query = "SELECT vehicles.id as vid,vehicles.title,vehicles.price,driver_user.name,car_type.car_type_name,vehicles.image,vehicles.status,vehicles.number_pate,vehicles.fuel_type,vehicles.created_at FROM `vehicles` 
                                        INNER JOIN `car_type` ON car_type.id = vehicles.vehicle_type_id
                                        INNER JOIN `driver_user` ON driver_user.id = vehicles.driver_id
                                        WHERE is_deleted = 1
                                        ORDER BY vehicles.id"; 
                                    $result = mysqli_query($conn,$query);
                                ?>
                                <tbody>
                                    <?php 
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['vid']; ?></td>
                                        <td><?php echo $row['car_type_name']; ?></td>
                                        <td><?PHP  echo "<img src='vehicle/" .$row['image']." ' height=70px width=70px>" ; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['number_pate']; ?></td>
                                        <td><?php echo $row['fuel_type']; ?></td>
                                        <td>₹ <?php echo $row['price']; ?></td>

                                        <td>
                                            <?php 
                                                if($row['status']==0){
                                                    echo "FREE";
                                                }else{
                                                    echo "BOOKED";
                                                }
                                            ?>
                                        </td>
                                        <!-- <td>
                                            <?php 
                                                if($row['is_active']==1){
                                                    // echo "Active";
                                                }else{
                                                    // echo "In-active";
                                                }
                                            ?>
                                        </td> -->
                                        <td><?php echo date("d-m-Y", strtotime($row['created_at'])); ?></td>
                                        <td>
                                            <a style='padding: 8px 18px;'
                                                class='btn btn-primary waves-effect waves-light m-1'
                                                href="edit-vehicle.php?id=<?php echo $row['vid']; ?>"
                                                class='btn btn-link'>
                                                <i class='fa fa-edit'></i></a>
                                            <a style='padding: 8px 18px;'
                                                class='btn btn-danger  waves-effect waves-light m-1'
                                                href='?type=delete&id=<?PHP echo $row['vid']; ?>' class='btn
                                                btn-link' onclick="return
                                                confirm('Are you sure to delete ?')">
                                                <i class='fa fa-times'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>

                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Row-->

        <?php
        include('footer.php');
        ?>

        <!--Data Tables js-->
        <script src="assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
        <script src="assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
        <script src="assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
        <script src="assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
        <script src="assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
        <script src="assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

        <script>
            $(document).ready(function () {
                //Default data table
                $('#default-datatable').DataTable();


                var table = $('#example').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
                });

                table.buttons().container()
                    .appendTo('#example_wrapper .col-md-6:eq(0)');

            });
        </script>

        </html>