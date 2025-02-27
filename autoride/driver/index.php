<?php 
    include('header.php');
    $driverId = $_SESSION['DRIVER_ID'];
?>
        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                <!--Start Dashboard Content-->

                <div class="row mt-3">
                    <div class="col-12 col-lg-6 col-xl-6">
                        <div class="card gradient-deepblue">
                            <div class="card-body">
                                <?php 
                                $tdate = date('Y-m-d');
                                    $vehicles = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `book` where `date` ='$tdate' AND `driver_id`='$driverId' "));
                                ?>
                                <h5 class="text-white mb-0"><?php print_r($vehicles); ?> <span class="float-right"><i
                                            class="icon-book-open icons"></i></span>
                                </h5>
                                <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:55%"></div>
                                </div>
                                <p class="mb-0 text-white small-font">My Today Booking <span class="float-right"></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg-6 col-xl-6">
                        <div class="card gradient-ibiza">
                            <div class="card-body">
                            <?php 
                                    $book = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `book` where `driver_id`='$driverId' "));
                                ?>
                                <h5 class="text-white mb-0"><?php print_r($book); ?> <span class="float-right"><i
                                            class="fa fa-envira"></i></span></h5>
                                <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:55%"></div>
                                </div>
                                <p class="mb-0 text-white small-font">Total Booking <span class="float-right">+2.2% <i
                                            class="zmdi zmdi-long-arrow-up"></i></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->


                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-header">Site Traffic
                                <div class="card-action">
                                    <div class="dropdown">
                                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                            data-toggle="dropdown">
                                            <i class="icon-options"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void();">Action</a>
                                            <a class="dropdown-item" href="javascript:void();">Another action</a>
                                            <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-circle mr-2 text-primary"></i>New
                                        Visitor</li>
                                    <li class="list-inline-item"><i class="fa fa-circle mr-2"
                                            style="color: #ade2f9"></i>Old Visitor</li>
                                </ul>
                                <div class="chart-container-1">
                                    <canvas id="chart1"></canvas>
                                </div>
                            </div>

                            <div class="row m-0 row-group text-center border-top border-light-3">
                                <div class="col-12 col-lg-4">
                                    <div class="p-3">
                                        <h5 class="mb-0">45.87M</h5>
                                        <small class="mb-0">Overall Visitor <span> <i class="fa fa-arrow-up"></i>
                                                2.43%</span></small>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="p-3">
                                        <h5 class="mb-0">15:48</h5>
                                        <small class="mb-0">Visitor Duration <span> <i class="fa fa-arrow-up"></i>
                                                12.65%</span></small>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="p-3">
                                        <h5 class="mb-0">245.65</h5>
                                        <small class="mb-0">Pages/Visit <span> <i class="fa fa-arrow-up"></i>
                                                5.62%</span></small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card">
                            <div class="card-header">Weekly sales
                                <div class="card-action">
                                    <div class="dropdown">
                                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                            data-toggle="dropdown">
                                            <i class="icon-options"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void();">Action</a>
                                            <a class="dropdown-item" href="javascript:void();">Another action</a>
                                            <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-container-2">
                                    <canvas id="chart2"></canvas>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center">
                                    <tbody>
                                        <tr>
                                            <td><i class="fa fa-circle text-primary mr-2"></i> Direct</td>
                                            <td>$5856</td>
                                            <td>+55%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle text-success mr-2"></i>Affiliate</td>
                                            <td>$2602</td>
                                            <td>+25%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle text-secondary mr-2"></i>E-mail</td>
                                            <td>$1802</td>
                                            <td>+15%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle text-warning mr-2"></i>Other</td>
                                            <td>$1105</td>
                                            <td>+5%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->

                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="w_chart easy-dash-chart1" data-percent="60">
                                        <span class="w_percent"></span>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Facebook Followers</h6>
                                        <small class="mb-0">22.14% <i class="fa fa-arrow-up"></i> Since Last
                                            Week</small>
                                    </div>
                                    <i class="fa fa-facebook text-facebook text-right fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="w_chart easy-dash-chart2" data-percent="65">
                                        <span class="w_percent"></span>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Twitter Tweets</h6>
                                        <small class="mb-0">32.15% <i class="fa fa-arrow-up"></i> Since Last
                                            Week</small>
                                    </div>
                                    <i class="fa fa-twitter text-twitter text-right fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="w_chart easy-dash-chart3" data-percent="75">
                                        <span class="w_percent"></span>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Youtube Subscribers</h6>
                                        <small class="mb-0">58.24% <i class="fa fa-arrow-up"></i> Since Last
                                            Week</small>
                                    </div>
                                    <i class="fa fa-youtube text-youtube fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->


                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">World Selling Region
                                <div class="card-action">
                                    <div class="dropdown">
                                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                            data-toggle="dropdown">
                                            <i class="icon-options"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void();">Action</a>
                                            <a class="dropdown-item" href="javascript:void();">Another action</a>
                                            <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="dashboard-map" style="height: 275px;"></div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped align-items-center">
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>Income</th>
                                            <th>Trend</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-ca mr-2"></i> USA</td>
                                            <td>4,586$</td>
                                            <td><span id="trendchart1"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-us mr-2"></i>Canada</td>
                                            <td>2,089$</td>
                                            <td><span id="trendchart2"></span></td>
                                        </tr>

                                        <tr>
                                            <td><i class="flag-icon flag-icon-in mr-2"></i>India</td>
                                            <td>3,039$</td>
                                            <td><span id="trendchart3"></span></td>
                                        </tr>

                                        <tr>
                                            <td><i class="flag-icon flag-icon-gb mr-2"></i>UK</td>
                                            <td>2,309$</td>
                                            <td><span id="trendchart4"></span></td>
                                        </tr>

                                        <tr>
                                            <td><i class="flag-icon flag-icon-de mr-2"></i>Germany</td>
                                            <td>7,209$</td>
                                            <td><span id="trendchart5"></span></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-12 col-xl-6">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Page Views</p>
                                        <h4 class="mb-0">8,293 <small class="small-font">5.2% <i
                                                    class="zmdi zmdi-long-arrow-up"></i></small></h4>
                                    </div>
                                    <div class="chart-container-3">
                                        <canvas id="chart3"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Total Clicks</p>
                                        <h4 class="mb-0">7,493 <small class="small-font">1.4% <i
                                                    class="zmdi zmdi-long-arrow-up"></i></small></h4>
                                    </div>
                                    <div class="chart-container-3">
                                        <canvas id="chart4"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p class="mb-4">Total Downloads</p>
                                        <input class="knob" data-width="175" data-height="175" data-readOnly="true"
                                            data-thickness=".2" data-angleoffset="90" data-linecap="round"
                                            data-bgcolor="rgba(0, 0, 0, 0.08)" data-fgcolor="#843cf7" data-max="15000"
                                            value="8550" />
                                        <hr>
                                        <p class="mb-0 small-font text-center">3.4% <i
                                                class="zmdi zmdi-long-arrow-up"></i> since yesterday
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Device Storage</p>
                                        <h4 class="mb-3">42620/50000</h4>
                                        <hr>
                                        <div class="progress-wrapper mb-4">
                                            <p>Documents <span class="float-right">12GB</span></p>
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar bg-success" style="width:80%"></div>
                                            </div>
                                        </div>

                                        <div class="progress-wrapper mb-4">
                                            <p>Images <span class="float-right">10GB</span></p>
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar bg-danger" style="width:60%"></div>
                                            </div>
                                        </div>

                                        <div class="progress-wrapper mb-4">
                                            <p>Mails <span class="float-right">5GB</span></p>
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar bg-primary" style="width:40%"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--End Row-->


                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <p>Total Earning</p>
                                <h4 class="mb-0">287,493$</h4>
                                <small>1.4% <i class="zmdi zmdi-long-arrow-up"></i> Since Last Month</small>
                                <hr>
                                <p>Total Sales</p>
                                <h4 class="mb-0">87,493</h4>
                                <small>5.43% <i class="zmdi zmdi-long-arrow-up"></i> Since Last Month</small>
                                <div class="mt-5">
                                    <div class="chart-container-4">
                                        <canvas id="chart5"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-lg-6 col-xl-8">
                        <div class="card">
                            <div class="card-header">Customer Review
                                <div class="card-action">
                                    <div class="dropdown">
                                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                            data-toggle="dropdown">
                                            <i class="icon-options"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void();">Action</a>
                                            <a class="dropdown-item" href="javascript:void();">Another action</a>
                                            <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <img src="assets/images/avatars/avatar-13.png" alt="user avatar"
                                            class="customer-img rounded-circle">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">iPhone X <small class="ml-4">08.34 AM</small></h6>
                                            <p class="mb-0 small-font">Sara Jhon : This i svery Nice phone in low
                                                budget.</p>
                                        </div>
                                        <div class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <img src="assets/images/avatars/avatar-15.png" alt="user avatar"
                                            class="customer-img rounded-circle">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Air Pod <small class="ml-4">05.26 PM</small></h6>
                                            <p class="mb-0 small-font">Danish Josh : The brand apple is original !</p>
                                        </div>
                                        <div class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <img src="assets/images/avatars/avatar-14.png" alt="user avatar"
                                            class="customer-img rounded-circle">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Mackbook Pro <small class="ml-4">06.45 AM</small></h6>
                                            <p class="mb-0 small-font">Jhon Doe : Excllent product and awsome quality
                                            </p>
                                        </div>
                                        <div class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <img src="assets/images/avatars/avatar-16.png" alt="user avatar"
                                            class="customer-img rounded-circle">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Air Pod <small class="ml-4">08.34 AM</small></h6>
                                            <p class="mb-0 small-font">Christine : The brand apple is original !</p>
                                        </div>
                                        <div class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <img src="assets/images/avatars/avatar-17.png" alt="user avatar"
                                            class="customer-img rounded-circle">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Mackbook <small class="ml-4">08.34 AM</small></h6>
                                            <p class="mb-0 small-font">Michle : The brand apple is original !</p>
                                        </div>
                                        <div class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Row-->

                <!-- <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header border-0">Recent Order Tables
                                <div class="card-action">
                                    <div class="dropdown">
                                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                            data-toggle="dropdown">
                                            <i class="icon-options"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void();">Action</a>
                                            <a class="dropdown-item" href="javascript:void();">Another action</a>
                                            <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Product</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Completion</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img alt="Image placeholder" src="assets/images/products/01.png"
                                                    class="product-img">
                                            </td>
                                            <td>Headphone GL</td>
                                            <td>$1,840 USD</td>
                                            <td>
                                                <span class="badge-dot">
                                                    <i class="bg-danger"></i> pending
                                                </span>
                                            </td>
                                            <td>
                                                <div class="progress shadow" style="height: 4px;">
                                                    <div class="progress-bar gradient-ibiza" role="progressbar"
                                                        style="width: 60%"></div>
                                                </div>
                                            </td>
                                            <td>10 July 2018</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img alt="Image placeholder" src="assets/images/products/02.png"
                                                    class="product-img">
                                            </td>
                                            <td>Clasic Shoes</td>
                                            <td>$1,520 USD</td>
                                            <td>
                                                <span class="badge-dot">
                                                    <i class="bg-success"></i> completed
                                                </span>
                                            </td>
                                            <td>
                                                <div class="progress shadow" style="height: 4px;">
                                                    <div class="progress-bar gradient-ohhappiness" role="progressbar"
                                                        style="width: 100%"></div>
                                                </div>
                                            </td>
                                            <td>12 July 2018</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img alt="Image placeholder" src="assets/images/products/03.png"
                                                    class="product-img">
                                            </td>
                                            <td>Hand Watch</td>
                                            <td>$1,620 USD</td>
                                            <td>
                                                <span class="badge-dot">
                                                    <i class="bg-warning"></i> delayed
                                                </span>
                                            </td>
                                            <td>
                                                <div class="progress shadow" style="height: 4px;">
                                                    <div class="progress-bar gradient-orange" role="progressbar"
                                                        style="width: 70%"></div>
                                                </div>
                                            </td>
                                            <td>14 July 2018</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img alt="Image placeholder" src="assets/images/products/04.png"
                                                    class="product-img">
                                            </td>
                                            <td>Hand Camera</td>
                                            <td>$2,220 USD</td>
                                            <td>
                                                <span class="badge-dot">
                                                    <i class="bg-info"></i> on schedule
                                                </span>
                                            </td>
                                            <td>
                                                <div class="progress shadow" style="height: 4px;">
                                                    <div class="progress-bar gradient-scooter" role="progressbar"
                                                        style="width: 85%"></div>
                                                </div>
                                            </td>
                                            <td>16 July 2018</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img alt="Image placeholder" src="assets/images/products/05.png"
                                                    class="product-img">
                                            </td>
                                            <td>Iphone-X Pro</td>
                                            <td>$9,890 USD</td>
                                            <td>
                                                <span class="badge-dot">
                                                    <i class="bg-success"></i> completed
                                                </span>
                                            </td>
                                            <td>
                                                <div class="progress shadow" style="height: 4px;">
                                                    <div class="progress-bar gradient-ohhappiness" role="progressbar"
                                                        style="width: 100%"></div>
                                                </div>
                                            </td>
                                            <td>17 July 2018</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img alt="Image placeholder" src="assets/images/products/06.png"
                                                    class="product-img">
                                            </td>
                                            <td>Ladies Purse</td>
                                            <td>$3,420 USD</td>
                                            <td>
                                                <span class="badge-dot">
                                                    <i class="bg-danger"></i> pending
                                                </span>
                                            </td>
                                            <td>
                                                <div class="progress shadow" style="height: 4px;">
                                                    <div class="progress-bar gradient-ibiza" role="progressbar"
                                                        style="width: 80%"></div>
                                                </div>
                                            </td>
                                            <td>18 July 2018</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--End Row-->

                <!--End Dashboard Content-->

            </div>
            <!-- End container-fluid-->

        </div>
 
 <?php 
    include('footer.php');
 ?>

     <script src="assets/plugins/Chart.js/Chart.min.js"></script>
    <!-- Vector map JavaScript -->
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Easy Pie Chart JS -->
    <script src="assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <!-- Sparkline JS -->
    <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
    <script src="assets/plugins/jquery-knob/excanvas.js"></script>
    <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

    <script>
        $(function () {
            $(".knob").knob();
        });
    </script>
    <!-- Index js -->
    <script src="assets/js/index.js"></script>


</body>

<!-- Mirrored from codervent.com/bulona/demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Oct 2019 10:17:54 GMT -->

</html>