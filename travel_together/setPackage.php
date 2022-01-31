<?php
include_once "config.php";

if(isset($_POST['submit'])){
   
    $tier = isset($_POST['tier']) ? $_POST['tier'] : '';
    $vehicle = isset($_POST['vehicle']) ? $_POST['vehicle'] : '';
    $airport = isset($_POST['airport']) ? $_POST['airport'] : '';
    $hr4_40km = isset($_POST['4hr/40km']) ? $_POST['4hr/40km'] : '';
    $hr8_80km = isset($_POST['8hr/80km']) ? $_POST['8hr/80km'] : '';
    $outstation_package = isset($_POST['outstationpackage']) ? $_POST['outstationpackage'] : '';
    $extra_km = isset($_POST['extra-km']) ? $_POST['extra-km'] : '';
    $extra_hr = isset($_POST['extra-hr']) ? $_POST['extra-hr'] : '';
    $out_min_hr = isset($_POST['out-min-hr']) ? $_POST['out-min-hr'] : '';
    $out_min_km = isset($_POST['out-min-km']) ? $_POST['out-min-km'] : '';
    $driver_allowance = isset($_POST['driver-allowance']) ? $_POST['driver-allowance'] : '';
    $night_allowance = isset($_POST['night-allowance']) ? $_POST['night-allowance'] : '';
   

    try {
                  
        $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql =  "UPDATE `package_price`   
SET `tier` = :tier,
    `vehicle` = :vehicle,
    `airport` = :airport,
    `4hr_40km` = :4hr_40km,
    `8hr_80km` = :8hr_80km,
    `extra_km` = :extra_km,
    `extra_hr` = :extra_hr,
    `out_min_hr` = :out_min_hr,
    `out_min_km` = :out_min_km,
    `driver_allowance` = :driver_allowance,
    `night_allowance` = :night_allowance,
    `outstation_package` = :outstation_package
    WHERE `vehicle` = :vehicle and `tier`= :tier";
        
        $statement = $conn->prepare($sql);
        $statement->bindValue(":tier", $tier);
        $statement->bindValue(":vehicle", $vehicle);
        $statement->bindValue(":airport", $airport);
        $statement->bindValue(":4hr_40km", $hr4_40km);
        $statement->bindValue(":8hr_80km", $hr8_80km);
        $statement->bindValue(":extra_km", $extra_km);
        $statement->bindValue(":extra_hr", $extra_hr);
        $statement->bindValue(":out_min_hr", $out_min_hr);
        $statement->bindValue(":out_min_km", $out_min_km);
        $statement->bindValue(":driver_allowance", $driver_allowance);
        $statement->bindValue(":night_allowance", $night_allowance);
        $statement->bindValue(":outstation_package", $outstation_package);

        
        $cont = $statement->execute();
        echo("<script>alert('Updated Successfully');</script>");
      

       }catch(PDOException $e) {echo $e->getMessage();}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Travel Together</title>
</head>
<body>
    <div class="container">


    <!-- Side Bar -->

    <div class="sidebar">
      <div class="logo">
        <img src="./icons/logo.png" alt="travel together">
      </div>
      <div class="side-menu">
        <ul>
            <a href="createbooking.php"><li>Create Booking</li></a>
            <a href="bookingtable.php"><li>Booking Table</li></a>
            <a href="invoice.php"><li>Invoice</li></a>
        </ul>
      </div>
    </div>


    <!-- Start Main -->

    <div class="main">
        <div class="title">
            <h2>Update Package Price</h2>
            <hr>
        </div>
        <div class="booking-form">
        <form name="details-form" id="details-form" action="#" method="POST"   enctype="multipart/form-data">
        <label for="tier">Tier :</label>
            <select name="tier" id="tier" >
                    
                    <option value="" ></option>
                    <option value="1">1</option>
                    <option value="2">2</option>       
            
             </select>
        
             <label for="vehicle">Vehicle Type :</label>
            <select name="vehicle" id="vehicle" >
                    
                    <option value="" ></option>
                    <option value="sedan">sedan</option>
                    <option value="ex sedan(verna/honda city)">ex sedan(verna/honda city)</option>
                    <option value="suv">suv</option>
                    <option value="crysta">crysta</option>
            
             </select> 

            <label for="airport">Airport :</label>
            <input type="number" name="airport" id="airport">


            <label for="4hr/40km">4HR/40KM :</label>
            <input type="number" name="4hr/40km" id="4hr/40km">
 

            <label for="8hr/80km">8HR/80KM :</label>
            <input type="number" name="8hr/80km" id="8hr/80km">


            <label for="extra-km">Extra KM :</label>
            <input type="number" name="extra-km" id="extra-km">
 

            <label for="extra-hr">Extra Hr :</label>
            <input type="number" name="extra-hr" id="extra-hr">


            <label for="out-min-hr">Out Min Hr :</label>
            <input type="number" name="out-min-hr" id="out-min-hr">


            <label for="out-min-km">Out Min KM :</label>
            <input type="number" name="out-min-km" id="out-min-km">


            <label for="driver-allowance">Driver Allowance :</label>
            <input type="number" name="driver-allowance" id="driver-allowance">


            <label for="night-allovance">Night Allowance :</label>
            <input type="number" name="night-allowance" id="allowance">



            <label for="uotstationpackage">Outstation Package :</label>
            <input type="number" name="outstationpackage" id="outstatoinpackage">

            <input type="submit" id="submit" name="submit" value="Update">
            <input type="reset" id="reset" value="Reset">

            

        </form>
        </div>
    </div>
    <!-- End Main -->

    </div>
</body>
</html>