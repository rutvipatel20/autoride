<?php
    include('conn.php');
    $car_type = $_POST['car_type']; 
    $car_type = "SELECT * FROM `vehicles` WHERE `vehicle_type_id`='$car_type' AND `is_active`=1";
    $cars=mysqli_query($conn,$car_type);
    ?>
        <option value="">Select Car</option>
        <?php
            while($row = mysqli_fetch_assoc($cars)){
        ?>
            <option value="<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></option>
        <?php
        }

?>