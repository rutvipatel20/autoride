<?php
include('header.php');
if(isset($_SESSION['USER_ID'])){
    $uId = $_SESSION['USER_ID'];
    echo $uId;
}else{
    ?>
<script>
    window.location.href = "login.php";
</script>
<?PHP
}
?>

<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 95%;
        margin: auto;
        margin-bottom: 50px;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
<div id="page_caption" class="hasbg parallax  withtopbar  " style="background-image:url(upload/driver-2.jpg);">

    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1 class="withtopbar">Booking History</h1>
                <div class="page_tagline">
                    This is sample of page tagline and you can set it up using page option </div>
            </div>
        </div>
    </div>

</div>

<table id="customers">
    <tr>
        <th>No.</th>
        <th>Date</th>
        <th>Driver Name</th>
        <th>Driver phone</th>
        <th>email</th>
        <th>phone</th>
        <th>location</th>
        <th>Status</th>
    </tr>
    <?php 
        $query = "SELECT book.*,
            package.id as packageId,package.time, package.time_type, package.time_type, package.km, package.value,
            car_type.car_type_name,
            vehicles.id as vehicleId, vehicles.title, vehicles.driver_id, vehicles.driver_id, vehicles.price, vehicles.status,
            driver_user.name as driverName,driver_user.phone as driverPhone
            FROM `book` 
            INNER JOIN package ON package.id = book.package_id
            INNER JOIN car_type ON car_type.id = book.vehicle_type_id
            INNER JOIN vehicles ON vehicles.id = book.car_id
            INNER JOIN driver_user ON driver_user.id = book.driver_id
            WHERE `user_id`= '$uId'
            ORDER BY book.id ASC";
            
        $result = mysqli_query($conn,$query);
        $check = mysqli_num_rows($result);
        if($check > 0){
            $i=1;
        while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><?=$i?></td>
        <td><?=$row['date']?></td>
        <td><?=$row['driverName']?></td>
        <td><?=$row['driverPhone']?></td>
        <td><?=$row['email']?></td>
        <td><?=$row['mobile']?></td>
        <td><?=$row['location']?></td>
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
    </tr>
    <?php 
    $i++;
        }
    }
    ?>
</table>

<?php
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $phone = $_POST['mobile'];

    $sql = " UPDATE `users` SET `username`='$name',`mobile`='$phone' WHERE `id`= $uId";

    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['USER_NAME']=$name;
?>
<script>
    window.location.href = "index.php";
</script>
<?PHP
    } else {
        echo "no" . mysqli_error($conn);
    }
}

?>

<?php

include('footer.php');
// test git
?>