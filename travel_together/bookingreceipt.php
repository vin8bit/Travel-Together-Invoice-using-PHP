<?php
include_once "config.php";

$bookerName = isset($_POST['booker-name']) ? $_POST['booker-name'] : '';
$regNo = isset($_POST['reg-no']) ? $_POST['reg-no'] : '';
$guestName = isset($_POST['guest-name']) ? $_POST['guest-name'] : '';
$guestMobileNo = isset($_POST['guest-no']) ? $_POST['guest-no'] : '';
$reportTime = isset($_POST['report-time']) ? $_POST['report-time'] : '';
$package = isset($_POST['package']) ? $_POST['package'] : '';
$paymentMode = isset($_POST['payment-mode']) ? $_POST['payment-mode'] : '';
$specialInst = isset($_POST['special-inst']) ? $_POST['special-inst'] : '';
$company = isset($_POST['company']) ? $_POST['company'] : '';
$releasingDate = isset($_POST['releasing-date']) ? $_POST['releasing-date'] : '';
$vehicle = isset($_POST['vehicle']) ? $_POST['vehicle'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$pinCode = isset($_POST['pin-code']) ? $_POST['pin-code'] : '';
$pickupDate = isset($_POST['pickup-date']) ? $_POST['pickup-date'] : '';



    try {
                  
        $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("INSERT INTO booking (booker_name, reg_no, guest_name, guest_mobile_no, reporting_time, package , payment_mode, special_inst, company , releasing_date, vehicle, address , city, pin_code, pickup_date) VALUES (? ,? ,?,? ,? ,?,? ,? ,?,? ,? ,?,? ,? ,?)");
        $sql->bindParam(1, $bookerName);
        $sql->bindParam(2, $regNo);
        $sql->bindParam(3, $guestName);
        $sql->bindParam(4, $guestMobileNo);
        $sql->bindParam(5, $reportTime);
        $sql->bindParam(6, $package);
        $sql->bindParam(7, $paymentMode);
        $sql->bindParam(8, $specialInst);
        $sql->bindParam(9, $company);
        $sql->bindParam(10, $releasingDate);
        $sql->bindParam(11, $vehicle);
        $sql->bindParam(12, $address);
        $sql->bindParam(13, $city);
        $sql->bindParam(14, $pinCode);
        $sql->bindParam(15, $pickupDate);
        $sql->execute();
        
        echo("<script>alert('Submited Successfully');</script>");
      

       }catch(PDOException $e) {echo $e->getMessage();
            die();
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Together</title>
    <link rel="stylesheet" href="./css/bookingreceipt.css">

<style id="table_style" type="text/css" > 
    body{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    width: 100%;
}

.container{
    width: 100%;
   
}

table {
    width: 695;
    
    margin: 40px auto;
    border: 1px solid black;
    border-collapse: collapse;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10pt;
  }

#head-title{
    border-collapse: collapse;
    -webkit-print-color-adjust: exact;
    background-color: yellow;
    text-align: center;
    font-weight: bold;
}

  th, td {
    border: 1px solid black;
    padding: 5px;
  }
  .receipt-data{
    width: 150px;
    text-align: center;
}
  .receipt-blank{
      width: 60px;
  }

  .receipt-blank2 ,#addcell{
      width: 200px;
      border: 0px solid  white;
  }

#addcell2{
    width: 300px;
    border-bottom: 0px solid  white;
}

  .receipt-heading{
      width: 150px;
      background-color: green;
      text-transform: uppercase;
      font-style: bold;
  }

  @media print
      {
         @page {
           margin-top: 0;
           margin-bottom: 0;
         }
         body  {
           padding-top: 72px;
           padding-bottom: 72px ;
         }
      } 

</style>

</head>
<body>
    

    <div class="container" id="divContents" >
    <table id="print_table" class="receipt-table">
        <tr>
            <td colspan="6" id=head-title>Total Reservation</td>
            
            
        </tr>
        <tr>
            <td class="receipt-heading">Booker Name</td>
            <td class="receipt-data"><?php echo isset($bookerName) ? $bookerName : ''; ?></td>
            <td class="receipt-blank"></td>
            <td class="receipt-heading">Company</td>
            <td class="receipt-data"><?php echo isset($company) ? $company : ''; ?></td>
            <td class="receipt-blank2"></td>
        </tr>
        <tr>
            <td class="receipt-heading">Reg.No</td>
            <td class="receipt-data"><?php echo isset($regNo) ? $regNo : ''; ?></td>
            <td class="receipt-blank"></td>
            <td class="receipt-heading"></td>
            <td class="receipt-data"></td>
            <td class="receipt-blank2"></td>
        </tr>

        <tr>
            <td class="receipt-heading">Guest Name</td>
            <td class="receipt-data"><?php echo isset($guestName) ? $guestName : ''; ?></td>
            <td class="receipt-blank"></td>
            <td class="receipt-heading">Guest mOBILE</td>
            <td class="receipt-data"><?php echo isset($guestMobileNo) ? $guestMobileNo : ''; ?></td>
            <td class="receipt-blank2"></td>
        </tr>
        <tr>
            <td class="receipt-heading">Pickup Date</td>
            <td class="receipt-data"><?php echo isset($pickupDate) ? $pickupDate : ''; ?></td>
            <td class="receipt-blank"></td>
            <td class="receipt-heading">Releasing Date</td>
            <td class="receipt-data"><?php echo isset($releasingDate) ? $releasingDate : ''; ?></td>
            <td class="receipt-blank2"></td>
        </tr>

        <tr>
            <td class="receipt-heading">City</td>
            <td class="receipt-data"><?php echo isset($city) ? $city : ''; ?></td>
            <td class="receipt-blank"></td>
            <td class="receipt-heading">Vehicle</td>
            <td class="receipt-data"><?php echo isset($vehicle) ? $vehicle : ''; ?></td>
            <td class="receipt-blank2"></td>
        </tr>
        <tr>
            <td class="receipt-heading">Package</td>
            <td class="receipt-data"><?php echo isset($package) ? $package : ''; ?></td>
            <td class="receipt-blank"></td>
            <td class="receipt-heading"></td>
            <td class="receipt-data"></td>
            <td class="receipt-blank2"></td>
        </tr>
        <tr>
            <td class="receipt-heading">Report Time</td>
            <td class="receipt-data"><?php echo isset($reportTime) ? $reportTime : ''; ?></td>
            <td class="receipt-blank"></td>
            <td class="receipt-heading">Address</td>
            <td  colspan="2" id="addcell2" class="receipt-data"></td>
            
        </tr>
        <tr>
            <td class="receipt-heading">Payment Mode</td>
            <td class="receipt-data"><?php echo isset($paymentMode) ? $paymentMode : ''; ?></td>
            <td class="receipt-blank"></td>
            <td class="receipt-heading"></td>
            <td colspan="2" id="addcell" class="receipt-data"><?php echo isset($address) ? $address : ''; ?></td>
            
        </tr>
        <tr>
            <td class="receipt-heading">Special Inst</td>
            <td class="receipt-data"><?php echo isset($specialInst) ? $specialInst : ''; ?></td>
            <td class="receipt-blank"></td>
            <td class="receipt-heading"></td>
           
            
        </tr>
    </table>
    </div>

    <div class="buttonDiv">
    <input type="button" onclick="PrintTable();" value="Print"/>
    </div>


 <!-- print function -->
  
<script type="text/javascript">
    function PrintTable() {
     
        var printWindow = window.open('', '', 'height=842,width=695');
        printWindow.document.write('<html><head>');
 
        //Print the Table CSS.
        var table_style = document.getElementById("table_style").innerHTML;
        printWindow.document.write('<style type = "text/css">');
        printWindow.document.write(table_style);
        printWindow.document.write('</style>');
        printWindow.document.write('</head>');
 
        //Print the DIV contents i.e. the HTML Table.
        printWindow.document.write('<body>');
        var divContents = document.getElementById("divContents").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');
 
        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    }


</script>
</body>
</html>