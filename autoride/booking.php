<?php 
    include('header.php');
    ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    $(document).ready(function () {
    $('#txtDate').change(function() {
    var date = $(this).val();
    <?php 
             $ff ="<script>document.write(date)</script>";             
          ?>
    console.log(date, 'change')
    $("#time").prop('disabled', false);
    $(".v_type").prop('disabled', false);
    $("#package").prop('disabled', false);
});    
});
    </script>
<div id="page_caption" class="hasbg  withtopbar " style="background-image:url(upload/Audi-A4-Avant-1.jpg);">
    <div class="single_car_header_button">
        <div class="standard_wrapper">
            <a href="upload/nw6xremkxkg-nicolai-berntsen.jpg" id="single_car_gallery_open"
                class="button fancy-gallery"><span class="ti-camera"></span>View Photos</a>
            <div style="display:none;">
                <a id="single_car_gallery_image1" href="upload/traffic-car-vehicle-black.jpg" title=""
                    class="fancy-gallery"></a>
                <a id="single_car_gallery_image2" href="upload/evening.jpg" title="" class="fancy-gallery"></a>
                <a id="single_car_gallery_image3" hr ef="upload/IMG_3496bfree.jpg"
                    title="The road to success and the road to failure are almost exactly the same"
                    class="fancy-gallery"></a>
                <a id="single_car_gallery_image4" href="upload/road-people-street-smartphone.jpg" title=""
                    class="fancy-gallery"></a>
            </div>
            <a href="#video_review112" id="single_car_video_review_open" class="button" data-type="inline"><span
                    class="ti-control-play"></span>Video Review</a>
            <div id="video_review112" class="car_video_review_wrapper" style="display:none;">
                <!-- <iframe width="1280" height="720" src="https://www.youtube.com/embed/rV7FQaAf4nc" frameborder="0"
                    allowfullscreen></iframe> -->
            </div>
        </div>
    </div>
    <div class="single_car_header_content">
        <div class="standard_wrapper">
            <div class="single_car_header_price _car">
                <span id="single_car_price"><span class="single_car_currency">$</span>
                    <span id='car' class="single_car_price">0</span></span>
                    <span id="single_car_price_per_unit_change" class="single_car_price_per_unit">
                    <!-- <span id="single_car_unit">Per Day</span> -->
                    <!-- <span class="ti-angle-down"></span> -->
                </span>
            </div>
            <div class="single_car_header_price car_change d-none">
            </div>
        </div>
    </div>
</div>
<!-- Begin content -->
<div id="page_content_wrapper" class="hasbg withtopbar ">
    <div class="inner">
        <!-- Begin main content -->
        <div class="inner_wrapper">
            <div class="sidebar_content">
                <img class="c_static" style="box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;margin-top: 100px;height: 600px;"  src="upload/istock-618837564_0.jpg" alt="">

                <!-- <br class="clear" />
                        <div class="single_car_content">
                            
                        </div> -->

            </div>
            <form action="pay.php" method="post" class="wpcf7-form" novalidate="novalidate">
            <div class="sidebar_wrapper">
                <div class="sidebar_top"></div>
                <div class="sidebar">
                    <div class="content">
                        <div class="single_car_header_price">
                            <span id="single_car_price_scroll"><span class="single_car_currency">$</span><span
                                    class="single_car_price">84</span></span>
                            <span id="single_car_price_per_unit_change_scroll" class="single_car_price_per_unit">
                                <span id="single_car_unit_scroll">Per Day</span>
                                <span class="ti-angle-down"></span>
                            </span>
                            <hr />
                        </div>
                        <div class="single_car_booking_wrapper themeborder book_instantly">
                            <div role="form" class="wpcf7" id="wpcf7-f5-o1" lang="en-US" dir="ltr">
                                
                                    <p>
                                        <label> Pickup Date Date
                                            <br />
                                            <span class="wpcf7-form-control-wrap dropoff-date"><input type="date"
                                                name="date" value="mm/dd/yyyy" max='04/20/2022'
                                                class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date"
                                                aria-required="true" aria-invalid="false" id="txtDate" /></span> </label>
                                    </p>
                                  
                                    <!-- vehicles.status=0 AND -->
                                    <div class="screen-reader-response"></div>
                                        <?PHP
                                            $today = date('Y-m-d'); 
                                            $sql = "SELECT car_type.id FROM `vehicles` 
                                                INNER JOIN `car_type` ON car_type.id=vehicles.vehicle_type_id
                                                LEFT JOIN `book` ON book.car_id=vehicles.id
                                                WHERE vehicles.is_active=1 AND book.date > $today
                                                GROUP BY vehicles.vehicle_type_id";
                                            $query= mysqli_query($conn,$sql);
                                            $carTypeid = [];
                                            while($temp = mysqli_fetch_assoc($query)){
                                                $cartypeid[] = $temp['id'];
                                            }
                                            $string_version = '('.implode(',', $cartypeid).')';
                                        ?>

                                        <p>
                                            <label>
                                                Drop Off Time<br>
                                                <span class="wpcf7-form-control-wrap dropoff-time">
                                                    <select name="btime" id="time" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" disabled> 
                                                        <option value="">---</option>
                                                        <option value="1:00">1:00</option>
                                                        <option value="1:30">1:30</option>
                                                        <option value="2:00">2:00</option>
                                                        <option value="2:30">2:30</option>
                                                        <option value="3:00">3:00</option>
                                                        <option value="3:30">3:30</option>
                                                        <option value="5:00">5:00</option>
                                                        <option value="5:30">5:30</option>
                                                        <option value="6:00">6:00</option>
                                                        <option value="6:30">6:30</option>
                                                        <option value="7:00">7:00</option>
                                                        <option value="7:30">7:30</option>
                                                        <option value="8:00">8:00</option>
                                                        <option value="8:30">8:30</option>
                                                        <option value="9:00">9:00</option>
                                                        <option value="9:30">9:30</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="16:30">16:30</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="21:00">21:00</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="22:00">22:00</option>
                                                        <option value="22:30">22:30</option>
                                                        <option value="23:00">23:00</option>
                                                        <option value="23:30">23:30</option>
                                                        <option value="24:00">24:00</option>
                                                        <option value="24:30">24:30</option>
                                                    </select>
                                                </span>
                                            </label>
                                            <span class="wpcf7-form-control-wrap dynamictitle"><input type="hidden" name="dynamictitle" value="Audi A4" size="40" class="wpcf7-form-control wpcf7dtx-dynamictext wpcf7-dynamichidden" aria-invalid="false"></span><span class="wpcf7-form-control-wrap dynamicurl"><input type="hidden" name="dynamicurl" value="https://grandcarrentalv1.themegoods.com:443/car/audi-a4/" size="40" class="wpcf7-form-control wpcf7dtx-dynamictext wpcf7-dynamichidden" aria-invalid="false"></span>
                                        </p>
                                        <p>
                                            <label>
                                                vehicle type
                                                <br />
                                                <span class="wpcf7-form-control-wrap your-name">
                                                    <select name="vehicle_type" id="allbooks"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required v_type" disabled>
                                                        
                                                    </select>
                                                </span>
                                            </label>
                                        </p>
                                        <p>
                                            <label for="state">Package</label>
                                            <select class="form-control" id="package" name="package" onchange="myFunction()" disabled>
                                                <option value="">Select Package</option>
                                                <?php
                                                    $packageSql = "SELECT * FROM `package` WHERE `is_active`=1";
                                                    $packageQuery = mysqli_query($conn,$packageSql);
                                                    while($packageRow = mysqli_fetch_assoc($packageQuery)){
                                                        ?>
                                                        <option value="<?=$packageRow['id'];?>">
                                                            <?=$packageRow['time'] .' '. $packageRow['time_type'] .' '. $packageRow['km'].' KM'?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                            </select>
                                        </p>
                                        <p class="car-manage d-none">
                                            <label for="state">Car</label>
                                            <select class="form-control" id="show_car" name="show_car">
                                                    <option value="">Select car</option>
                                                        <?php 
                                                            while($row = mysqli_fetch_assoc($query)){
                                                                ?>
                                                        <option value="<?=$row['id']; ?>"><?= $row['title']; ?>
                                                        </option>
                                                        <?php
                                                            }
                                                        ?> 
                                            </select>
                                        </p>
                                        <p>
                                            <label> location
                                                <br />
                                                <span class="wpcf7-form-control-wrap your-name"><input type="text"
                                                        name="location" value="" size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                        aria-required="true" aria-invalid="false"
                                                        placeholder="John Doe" /></span>
                                            </label>
                                        </p>
                                        <p>
                                            <label> Full Name
                                                <br />
                                                <span class="wpcf7-form-control-wrap your-name"><input type="text"
                                                        name="name" value="" size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                        aria-required="true" aria-invalid="false"
                                                        placeholder="John Doe" /></span>
                                            </label>
                                        </p>
                                        <p>
                                            <label> Email Address
                                                <br />
                                                <span class="wpcf7-form-control-wrap your-email"><input type="email"
                                                        name="email" value="" size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                        aria-required="true" aria-invalid="false"
                                                        placeholder="sample@yourcompany.com" /></span> </label>
                                        </p>
                                        <p>
                                            <label> Phone Number
                                                <br />
                                                <span class="wpcf7-form-control-wrap your-tel"><input type="tel"
                                                        name="phone" value="" size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                                                        aria-required="true" aria-invalid="false"
                                                        placeholder="+66-4353434" /></span>
                                            </label>
                                        </p>
                                    </div>
                                    <?php 
                                        
                                    ?>
                                    <?php 
                                        if(isset($_SESSION['USER_ID'])){
                                    ?>
                                    <div class="single_car_booking_woocommerce_wrapper">
                                        <button type="submit" name="submit" data-product="132" data-processing="Please wait..."
                                            data-url="#" class="single_car_add_to_cart button">Book Instantly</button>
                                    </div>
                                    <?php 
                                        }else{
                                            ?>
                                            <div class="single_car_booking_woocommerce_wrapper">
                                                <a href="login.php" data-processing="Please wait..."
                                                class="single_car_add_to_cart button">Book Instantly</a>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                <div class="single_car_view_wrapper themeborder">
                                    <div class="single_car_view_desc">
                                        This car&#039;s been viewed&nbsp;544&nbsp;times in the past week
                                    </div>
                                    <div class="single_car_view_icon ti-alarm-clock"></div>
                                </div>
                                <br class="clear" />
                            </div>
                            <div class="single_car_users_online_wrapper themeborder">
                                <div class="single_car_users_online_icon">
                                    <span class="ti-info-alt"></span>
                                </div>
                                <div class="single_car_users_online_content">
                                    <strong>231</strong> traveler(s) are considering our cars right now!
                                </div>
                            </div>
                        </div>
                    </div>
                    <br class="clear" />
                    <div class="sidebar_bottom"></div>
                    </div>
                </div>
            <!-- End main content -->
            </form>
        <br class="clear" />
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#txtDate").change(function () {
            var sdate = $(this).val();
            $.ajax({
                type: "POST",
                url: "car_type.php",
                data: {
                    sdate: sdate
                },
                success: function (result) {
                    $("#allbooks").html(result);
                }
            });

        });


        $("#allbooks").change(function () {
            var car_type = $(this).val();
            $.ajax({
                type: "POST",
                url: "get-data.php",
                data: {
                    car_type: car_type
                },
                success: function (result) {
                    $("#show_car").html(result);
                }
            });

        });
    });

    $("#package").change(function () {
        var package = $(this).val();
        if (package != "") {
            $('.car-manage').removeClass("d-none");
        } else {
            $('.car-manage').addClass("d-none");
        }
    });
    $(document).ready(function () {
        $("#show_car").change(function () {
            var car_id = $(this).val();
            var package_id = $("#package").val();
            $.ajax({
                type: "POST",
                url: "get-car-data.php",
                data: {
                    package_id: package_id,
                    car_id: car_id
                },
                success: function (result) {
                    $('._car').addClass("d-none");
                    $('.car_change').removeClass("d-none");
                    $('.single_car_header_price').html(result);
                }
            });

        });

        $("#show_car").change(function () {
            var car_id = $(this).val();
            var package_id = $("#package").val();
            $.ajax({
                type: "POST",
                url: "get-car-description-data.php",
                data: {
                    package_id: package_id,
                    car_id: car_id
                },
                success: function (result) {
                    $('.c_static').addClass("d-none");
                    $('.sidebar_content').html(result);
                }
            });

        });
    });

    function myFunction(){
        // $("#show_car").change(function () {
            var car_id = $('#show_car').val();
            var package_id = $("#package").val();
            $.ajax({
                type: "POST",
                url: "get-car-data.php",
                data: {
                    package_id: package_id,
                    car_id: car_id
                },
                success: function (result) {
                    $('._car').addClass("d-none");
                    $('.car_change').removeClass("d-none");
                    $('.single_car_header_price').html(result);
                }
            });
        // });
    }

    $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#txtDate').attr('min', minDate);
});

</script>
<?php 
    include('footer.php'); 
?>

<?php


require('config.php');
require('razorpay-php/Razorpay.php');

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

// $price = $_POST['price'];
// $_SESSION['price'] = $price;
// $customername = $_POST['customername'];
// $email = $_POST['email'];
// $_SESSION['email'] = $email;
// $contactno = $_POST['contactno'];
// $orderData = [
//     'receipt'         => 3456,
//     'amount'          => $price * 100, // 2000 rupees in paise
//     'currency'        => 'INR',
//     'payment_capture' => 1 // auto capture
// ];

$price = 10;
$_SESSION['price'] = $price;
$customername = 'test';
$email = 'test@yopmail.com';
$_SESSION['email'] = 'test@yopmail.com';
$contactno = '7990782521';
$orderData = [
    'receipt'         => 3456,
    'amount'          => $price * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Gotham Coding",
    "description"       => "Coding for Everyone",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => $customername,
    "email"             => $email,
    "contact"           => $contactno,
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
?>