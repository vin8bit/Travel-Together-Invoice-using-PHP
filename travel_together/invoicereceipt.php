<?php
include_once "config.php";
if(isset($_POST['submit'])){
    $currentDate1 = date('Y-m-d');
    $regNo = isset($_POST['reg_no']) ? $_POST['reg_no'] : '';
    $extraHrManual = isset($_POST['extra_hr_manual']) ? $_POST['extra_hr_manual'] : '';
    $driverAllowanceManual = isset($_POST['driver_allowance_manual']) ? $_POST['driver_allowance_manual'] : '';
    $extraKmManual = isset($_POST['extra_km_manual']) ? $_POST['extra_km_manual'] : '';
    $totalKm = isset($_POST['total_km']) ? $_POST['total_km'] : '';


    $tier = 1;

    try {
                  
        $query = $conn->prepare('SELECT * FROM booking WHERE reg_no = :reg_no');
        if (!$query) return false;
        if (!$query->execute(array(':reg_no' => $regNo))) return false;
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (empty($results)) return false;
        foreach ($results as $row){
        $bookerName = $row['booker_name'];
        $guestName = $row['guest_name'];
        $guestMobileNo = $row['guest_mobile_no'];
        $reportTime = $row['reporting_time'];
        $package = $row['package'];
        $paymentMode = $row['payment_mode'];
        $specialInst = $row['special_inst'];
        $company = $row['company'];
        $releasingDate = $row['releasing_date'];
        $vehicle = $row['vehicle'];
        $address = $row['address'];
        $city = $row['city'];
        $pinCode = $row['pin_code'];
        $pickupDate = $row['pickup_date'];

        }
    
        $query = $conn->prepare('SELECT * FROM city_tier WHERE city = :city ');
        if (!$query->execute(array(':city' => $city))) return false;
        $count= $query->rowCount();
        if ($count == 0){
            $tier = 2;
        }

      

        $query = $conn->prepare('SELECT * FROM package_price WHERE tier = :tier and vehicle =:vehicle');
        if (!$query) return false;
        if (!$query->execute(array(':tier' => $tier ,':vehicle' => $vehicle))) return false;
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (empty($results)) return false;
        foreach ($results as $row){
        $packagePrice = $row[$package];
        $extraHrPrice = $row['extra_hr'];
        $driverAllowancePrice = $row['driver_allowance'];
        $extraKmPrice = $row['extra_km'];

        if($extraHrManual != 0){
            $extraHr = $extraHrPrice*$extraHrManual;

        }else{ $extraHr = 0;}

        if($extraKmManual != 0){
            $extraKm = $extraKmPrice*$extraKmManual;

        }else{ $extraKm = 0;}

        if($driverAllowanceManual == "yes"){
            $driverAllowance = $driverAllowancePrice;

        }else{ $driverAllowance = 0;}
        
        }

        $subTotal = $packagePrice+$extraHr+$driverAllowance+$extraKm;

        $tax = ($subTotal/100) * 5;

        $total = $tax+$subTotal;

        $fullAddress = $address.", ".$city.", ".$pinCode;

        //**********insert invoice data */


        $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("INSERT INTO invoice (reg_no, current_date1, releasing_date , company, address, booker_name, vehicle , city, tier, package , package_price, extra_hr_fix, total_extra_hr , driver_allowance, extra_km_fix, total_extra_km, total_km, subtotal, tax, total) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bindParam(1, $regNo);
        $sql->bindParam(2, $currentDate1);
        $sql->bindParam(3, $releasingDate);
        $sql->bindParam(4, $company);
        $sql->bindParam(5, $fullAddress);
        $sql->bindParam(6, $bookerName);
        $sql->bindParam(7, $vehicle);
        $sql->bindParam(8, $city);
        $sql->bindParam(9, $tier);
        $sql->bindParam(10, $package);
        $sql->bindParam(11, $packagePrice);
        $sql->bindParam(12, $extraHrManual);
        $sql->bindParam(13, $extraHr);
        $sql->bindParam(14, $driverAllowance);
        $sql->bindParam(15, $extraKmManual);
        $sql->bindParam(16, $extraKm);
        $sql->bindParam(17, $totalKm);
        $sql->bindParam(18, $subTotal);
        $sql->bindParam(19, $tax);
        $sql->bindParam(20, $total);
        $sql->execute();
        $invoiceNo = $conn->lastInsertId();
        echo("<script>alert('Invoice Generated Successfully');</script>");



      
  
       }catch(Exception $e) {echo $e->getMessage();  die();}




}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Together</title>
    <link rel="stylesheet" href="./css/invoicereceipt22222222222.css">
</head>
<body>
    
<div style="width: 695px;overflow: visible;">
            <table cellspacing="0" cellpadding="0" style="border: 1px solid Black;width: 100%;">
                <tr>
                    <td colspan="6" style="border: 1px solid black;"><img src="./icons/logo.png" style="height: 100px;"> </td>
                    
                </tr>
                <tr>
                    <td  style="border: 1px solid black;">Mailing Address</td>
                    <td  colspan="3" style="border: 1px solid black;">Travel Together</td>
                    <td colspan="4" style="border: 1px solid black;">Invoice No.: <?php echo isset($invoiceNo) ? $invoiceNo : ''; ?> Date: <?php echo isset($currentDate1) ? $currentDate1 : ''; ?></td>                    
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td colspan="4">E BLOCK PLOT NO 417<br />MCD COLONY AZADPUR <br />DELHI 110033  </td>
                    <td> Bill To</td>
                    <td> <?php echo isset($company) ? $company : ''; ?><br /> <?php echo isset($fullAddress) ? $fullAddress : ''; ?></td>
                </tr>
                <tr>
                    <td>
                        Phone
                    </td>
                    <td colspan="4">9958213324, 9873122434, 8799737231  </td>
                </tr>
                <tr>
                    <td>
                        E-mail
                    </td>
                    <td colspan="4"><a href="mailto:gulshan.kagra0007@gmail.com" style="text-decoration: none;">gulshan.kagra0007@gmail.com</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        Cab hiring charge for:-
                    </td>
                    <td><?php echo isset($bookerName) ? $bookerName : ''; ?></td>
                    <td>Period</td>
                    <td></td>
                    <td colspan="2">Date :- <?php echo isset($releasingDate) ? $releasingDate : ''; ?></td>
                </tr>
                <tr style="font-weight:bold; font-size: 1.2em; text-align: center;">
                    <td  style="border: 1px solid black;"></td>
                    <td   style="border: 1px solid black; width: 20%;">Particulars</td>
                    <td  style="border: 1px solid black;">Booking Type</td>
                    <td  style="border: 1px solid black;"><?php echo isset($city) ? $city : ''; ?></td>
                    <td   style="border: 1px solid black; width: 20%;"></td>
                    <td   style="border: 1px solid black;"></td>
                    <td  style="border: 1px solid black;">RATE</td>
                    <td  style="border: 1px solid black;">AMOUNT</td>
                </tr>
                <tr>
                    <td>Car Type</td>
                    <td ><?php echo isset($vehicle) ? $vehicle : ''; ?></td>
                    <td></td>
                    <td><?php echo isset($tier) ? $tier : ''; ?></td>
                    <td ></td>
                    <td ></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="4">Package</td>
                    <td ><?php echo isset($package) ? $package : ''; ?></td>
                    <td></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td><?php echo isset($packagePrice) ? $packagePrice : ''; ?></td>
                    <td><?php echo isset($packagePrice) ? $packagePrice : ''; ?></td>
                </tr>
                <tr>
                    <td >EXTRA HOURS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td ></td>
                    <td><?php echo isset($extraHrManual) ? $extraHrManual : ''; ?></td>
                    <td><?php echo isset($extraHr) ? $extraHr : ''; ?></td>
                </tr>
                <tr>
                    <td >DRIVER ALLOWANCE</td>
                    <td></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td ><?php echo isset($driverAllowance) ? $driverAllowance : ''; ?></td>
                    <td><?php echo isset($driverAllowance) ? $driverAllowance : ''; ?></td>
                </tr>
                <tr>
                    <td  >EXTRA KMS</td>
                    <td></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td ><?php echo isset($extraKmManual) ? $extraKmManual : ''; ?></td>
                    <td><?php echo isset($extraKm) ? $extraKm : ''; ?></td>
                </tr>
                <tr><td><br /></td></tr>
                <tr>
                    <td ></td>
                    <td >TOTAL KMS</td>
                    <td></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td><?php echo isset($totalKm) ? $totalKm : ''; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td>SUBTOTAL</td>
                    <td><?php echo isset($subTotal) ? $subTotal : ''; ?></td>
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td>Tax (5%)</td>
                    <td><?php echo isset($tax) ? $tax : ''; ?></td>
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td>TOTAL</td>
                    <td><?php echo isset($total) ? $total : ''; ?></td>
                </tr>
                <tr>
                    <td colspan="8">
                        <pre>
            OTHER COMMENTS
            1. Total payment due in 15 days
            2. Please include the invoice number on your check
            3 To pay via NEFT sent payment details on gulshan.kagra0007@gmail.com
            GULSHAN KUMAR 1911602963
            BANK NAME KOTAK MAHINDRA BANK
            IFSC KKBK0000172
            Thank You For Your Business!
                        </pre>
                    </td>
                </tr>
            </table>
        </div>
    </div>



</body>
</html>