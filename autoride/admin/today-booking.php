<?php
    include('header.php');
?>
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Today Booking History</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Today booking history</li>
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
                    <div class="card-header"><i class="fa fa-table"></i> Data Exporting</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php $today = date("Y-m-d"); ?>
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>location</th>
                                        <th>booked</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                     $query = "SELECT book.*,
                                        package.id as packageId,package.time, package.time_type, package.time_type, package.km, package.value,
                                        car_type.car_type_name,
                                        vehicles.id as vehicleId, vehicles.title, vehicles.driver_id, vehicles.driver_id, vehicles.price, vehicles.status
                                        FROM `book` 
                                        INNER JOIN package ON package.id = book.package_id
                                        INNER JOIN car_type ON car_type.id = book.vehicle_type_id
                                        INNER JOIN vehicles ON vehicles.id = book.car_id
                                        WHERE DATE(`date`) >= '$today' 
                                        ORDER BY book.id ASC";
                                    $result = mysqli_query($conn,$query);
                                    $check = mysqli_num_rows($result);
                                ?>
                                <tbody>
                                    <?php 
                                    if($check > 0){
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td><?php echo $row['location']; ?></td>
                                        <td>
                                            <?php 
                                                if($row['is_expire']==1){
                                                    echo "RUNNING";
                                                }else if($row['is_expire']==2){
                                                    echo "Cancel";
                                                }else{
                                                    echo "Complate";
                                                }
                                            ?>
                                        </td>
                                       
                                        <td><?php echo date("d-m-Y", strtotime($row['created_at'])); ?></td>
                                        <td>
                                            <a style='padding: 8px 18px;'
                                                class='btn btn-primary waves-effect waves-light m-1'
                                                href="show-booking.php?id=<?php echo $row['id']; ?>"
                                                class='btn btn-link'>
                                                <i class='fa fa-eye'></i></a>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
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