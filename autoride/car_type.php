<?php
    include('conn.php');
    $sdate = $_POST['sdate']; 
    $t = date($sdate);
    $sql = "SELECT * FROM `book` 
        WHERE date = '$t' AND is_expire = 1
        GROUP BY vehicle_type_id";

    $query= mysqli_query($conn,$sql);
    $carTypeid = [];
    if(mysqli_num_rows($query) > 0){
        while($temp = mysqli_fetch_assoc($query)){
            $cartypeid[] = $temp['vehicle_type_id'];
        }
    }
    $string_version = '';
    if(!empty($cartypeid) ){
    $string_version = '('.implode(',', $cartypeid).')';
    }
    
    if(!empty($string_version)){
        $cartype= "SELECT car_type.id,car_type.car_type_name FROM car_type 
            INNER JOIN vehicles ON vehicles.vehicle_type_id = car_type.id
            WHERE car_type.id NOT IN $string_version 
            GROUP BY vehicles.vehicle_type_id";
    }else{
        $cartype= "SELECT * FROM car_type where status = 1";
    }
    // $data= mysqli_query($conn,$cartypequery);
    ?>
    <option value="">select car type</option>
<?php
            $cartypequery= mysqli_query($conn,$cartype);
            while($row = mysqli_fetch_assoc($cartypequery)){
            ?>
<option value="<?=$row['id']; ?>"><?= $row['car_type_name']; ?>
</option>
<?php
        }
?>