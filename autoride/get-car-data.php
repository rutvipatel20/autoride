<?php
    include('conn.php');
    $packageQuery = "SELECT * FROM `package` WHERE `id`='".$_POST['package_id']."' ";
    $package=mysqli_query($conn,$packageQuery);
    while($row = mysqli_fetch_assoc($package)){
        $value = $row['value'];
    }
    $query = "SELECT `price` FROM `vehicles` WHERE `id`='".$_POST['car_id']."' ";
    $car=mysqli_query($conn,$query);
    $carCount=mysqli_num_rows($car);
    if($carCount > 0){
        while($row = mysqli_fetch_assoc($car)){
            $price = $value * $row['price'];
            // $_SESSION['price'] = $row['price'];
            echo "
            <span id='single_car_price'><span class='single_car_currency'>₹</span>
                        <span id='car' class='single_car_price'>".$price."</span></span>
            <input type='hidden' name='price' value='".$price."'>            
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