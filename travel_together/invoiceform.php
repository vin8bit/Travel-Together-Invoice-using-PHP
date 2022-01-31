<?php
include_once "config.php";
    $regNo=$_GET['id'];

    try {
                  
        $query = $conn->prepare('SELECT * FROM booking WHERE reg_no = :reg_no');
        if (!$query) return false;
        if (!$query->execute(array(':reg_no' => $regNo))) return false;
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (empty($results)) return false;
        foreach ($results as $row){
        $bookerName = $row['booker_name'];
        $guestName = $row['guest_name'];

        }
      
       }catch(PDOException $e) {echo $e->getMessage();}


    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/invoiceform.css">
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
            <a href="invoiceform.php"><li>Invoice</li></a>
        </ul>
      </div>
    </div>


    <!-- Start Main -->

    <div class="main">
        <div class="title">
            <h2>Generate Invoice</h2><hr>
            <h4>Reg No. <span><?php echo isset($regNo) ? $regNo : ''; ?> </span> </h4>
            <h4>Booker Name :<span><?php echo isset($bookerName) ? $bookerName : ''; ?> </span></h4>
            <h4>Guest Name :<span><?php echo isset($guestName) ? $guestName : ''; ?> </span></h4>
            
        </div>
        <div class="booking-form">
        <form name="details-form" id="details-form" action="./invoicereceipt.php" method="POST"   enctype="multipart/form-data">
           
            <input type="hidden"  name="reg_no" value ="<?php echo isset($regNo) ? $regNo : ''; ?>">
            <label for="extra_hr_manual">Extra Hr</label>
            <input type="number" name="extra_hr_manual">
            <label for="driver_allowance_manual">Driver Allowance</label>
            <select name="driver_allowance_manual" id="driver_allowance_manual" >
                    
                    <option value="" ></option>
                    <option value="yes">yes</option>
                    <option value="no">no</option>       
            
             </select>

             <label for="extra_km_manual">Extra KM</label>
            <input type="number" name="extra_km_manual">

            <label for="total_km_manual">Total KM</label>
            <input type="number" name="total_km">


            <input type="submit" id="submit" name="submit" value="Submit">
            <input type="reset" id="reset" value="Reset">

        </form>
        </div>
    </div>
    <!-- End Main -->

    </div>
</body>
</html>