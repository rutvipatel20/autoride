<?php

require('config.php');
include('function.php');
session_start();
//db connection
$conn = mysqli_connect($host, $username, $password, $dbname);

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $email = $_SESSION['email'];
    $price = $_SESSION['price'];

    $vehicle_type = $_SESSION['vehicle_type'];
    $package = $_SESSION['package'];
    $car_id = $_SESSION['show_car'];
    $location = $_SESSION['location'];
    $name = $_SESSION['name'];
    $phone = $_SESSION['phone'];
    $date = $_SESSION['date'];
    $userId = $_SESSION['USER_ID'];
    $btime = $_SESSION['btime'];
    

    $date = date("Y-m-d h:i:s");

    $sql = "SELECT * FROM `vehicles` WHERE `id`='$car_id'";
    $car = mysqli_query($conn, $sql);
    while($carData = mysqli_fetch_assoc($car)){
        $driverId = $carData['driver_id']; 
        $car_name = $carData['title']; 
        $car_number = $carData['number_pate']; 
    }

    $sql = "INSERT INTO `book`(`razorpay_payment_id`,`user_id`,`vehicle_type_id`, `package_id`, `car_id`, `driver_id`, `price`, `location`, `name`, `email`, `mobile`, `date`,`time`) 
        VALUES ('$razorpay_payment_id','$userId','$vehicle_type','$package','$car_id','$driverId','$price','$location','$name','$email','$phone','$date','$btime')";

    $query = mysqli_query($conn,$sql);

    // $html = "<p>Your payment was successful</p>
    //          <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

    // $vehicle = "UPDATE `vehicles` SET `status`=1 WHERE `id`=$car_id ";

    // if(mysqli_query($conn, $vehicle)){
    //     // echo "payment details inserted to db";
    // }
    $package = mysqli_query($conn,"SELECT * FROM package WHERE `id` = '$package'");
    while ($packageRow = mysqli_fetch_assoc($package)){
        $packagetime = $packageRow['time'];
        $packagetime_type = $packageRow['time_type'];
        $packagekm = $packageRow['km'];
    }

    $driver = mysqli_query($conn,"SELECT * FROM driver_user WHERE `id` = '$driverId'");
    while ($driverRow = mysqli_fetch_assoc($driver)){
        $driver_name = $driverRow['name'];
        $driver_email = $driverRow['email'];
        $driver_phone = $driverRow['phone'];
    }

    $body = '<h3>Your Vehicle successfully booked</h3>
        <p>Razor pay id: '.$razorpay_payment_id.'</p>
        <p>Car Name: '.$car_name.'</p>
        <p>Car Number: '.$car_number.'</p>
        <p>driver name: '.$driver_name.'</p>
        <p>driver email: '.$driver_email.'</p>
        <p>driver phone: '.$driver_phone.'</p>
        <p>Pickup Location: '.$location.'</p>
        <p>Price: '.$packagetime.' '.$packagetime_type. ' ' .$packagekm.' KM</p>
        <p>booking time: '.$date.' '.$btime.'</p>
        ';
    sendMail($username,$email,$body);
    ?>
        <script>
            alert('car successfully booked');
            window.location.href = "index.php";
        </script>
    <?php
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
