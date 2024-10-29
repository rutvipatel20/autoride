<?php
    include('conn.php');
    $packageQuery = "SELECT * FROM `package` WHERE `id`='".$_POST['package_id']."' ";
    $package=mysqli_query($conn,$packageQuery);
    while($row = mysqli_fetch_assoc($package)){
        $value = $row['value'];
    }
    $query = "SELECT * FROM `vehicles` WHERE `id`='".$_POST['car_id']."' ";
    $car=mysqli_query($conn,$query);
    $carCount=mysqli_num_rows($car);
    if($carCount > 0){
        while($row = mysqli_fetch_assoc($car)){
            $price = $row['price'];
            $description = $row['description'];
            $audio = $row['audio_input']== 1 ? 'ti-check' : 'ti-close';
            $bluetooth = $row['bluetooth']== 1 ? 'ti-check' : 'ti-close';
            $heated_seats = $row['heated_seats']== 1 ? 'ti-check' : 'ti-close';
            $weel_drive = $row['weel_drive']== 1 ? 'ti-check' : 'ti-close';
            $usb_input = $row['usb_input']== 1 ? 'ti-check' : 'ti-close';
            $fm_radio = $row['fm_radio']== 1 ? 'ti-check' : 'ti-close';
            $gps_navigation = $row['gps_navigation']== 1 ? 'ti-check' : 'ti-close';
            $sunroot = $row['sunroot']== 1 ? 'ti-check' : 'ti-close';
            $image = 'admin/vehicle/'.$row['image'];

            echo "
            <img class='d_static' style='box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;margin-top: 100px;height: 600px;' src='$image' alt=''>
                <br class='clear' />
                <div class='single_car_content'>
                <h4 class='p1'>Description</h4>
                <p class='p2'>$description</p>
                <ul class='single_car_departure_wrapper themeborder'>
                    <li>
                        <div class='single_car_departure_title'>Included</div>
                        <div class='single_car_departure_content'>
                            <div class='one_half '>
                                <span class='$audio' ></span>Audio input </div>
                            <div class='one_half last'>
                                <span class='ti-check'></span>All Wheel drive </div>
                            <div class='one_half '>
                                <span class='$bluetooth'></span>Bluetooth </div>
                            <div class='one_half last'>
                                <span class='$usb_input'></span>USB input </div>
                            <div class='one_half '>
                                <span class='$heated_seats'></span>Heated seats </div>
                            <div class='one_half last'>
                                <span class='$fm_radio'></span>FM Radio </div>
                            <div class='one_half '>
                                <span class='$gps_navigation'></span>GPS Navigation </div>
                            <div class='one_half last'>
                                <span class='$sunroot'></span>Sunroof </div>
                        </div>
                    </li>
                </ul>    
                </div>   
            ";
            
        }
    }else{
        $_SESSION['price'] = 0;
        echo "
        <span id='single_car_price'><span class='single_car_currency'>₹</span>
                    <span id='car' class='single_car_price'>0</span></span>
                    <input type='hidden' name='price' value='0'> 
                    ";
    }
?>