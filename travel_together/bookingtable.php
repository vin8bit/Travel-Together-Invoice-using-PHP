<?php
include_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/bookingtable.css">
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
            <a href="invoicetable.php"><li>Invoice</li></a>
        </ul>
      </div>
    </div>


    <!-- Start Main -->

    <div class="main">
        <div class="title">
            <h2>Booking Table</h2>
            <hr>
        </div>
        <div class="booking-form">
        <table id="myTable">
        <tr>
            <th>Booker Name</th>
            <th>Reg.No</th>
            <th>Guest Name</th>
            <th>Guest Mobile</th>
			<th>Report Time</th>
			<th>Package</th>
            <th>Payment Mode</th>
            <th>Special Inst</th>
            <th>Company</th>
            <th>Releas Date</th>
            <th>Vehicle</th>
			<th>Address</th>
			<th>City</th>
            <th>Pon Code</th>
            <th>Pickup Date</th>
            <th>Invoice</th>
        </tr>
        <?php 
       $stmt = $conn->query("SELECT * FROM booking "); 
       while ($res = $stmt->fetch()) {    
            echo "<tr>";
            echo "<td id='booker_name'>".$res['booker_name']."</td>";
            echo "<td id='reg_no'>".$res['reg_no']."</td>";
            echo "<td id='guest_name'>".$res['guest_name']."</td>";
			echo "<td id='guest_mobile_no'>".$res['guest_mobile_no']."</td>";
            echo "<td id='reporting_time'>".$res['reporting_time']."</td>";
            echo "<td id='package'>".$res['package']."</td>";
            echo "<td id='payment_mode'>".$res['payment_mode']."</td>";
            echo "<td id='special_inst'>".$res['special_inst']."</td>";
			echo "<td id='company'>".$res['company']."</td>";
            echo "<td id='releasing_date'>".$res['releasing_date']."</td>";
            echo "<td id='vehicle'>".$res['vehicle']."</td>";
            echo "<td id='address'>".$res['address']."</td>";
			echo "<td id='city'>".$res['city']."</td>";
            echo "<td id='pin_code'>".$res['pin_code']."</td>";
            echo "<td id='pickup_date'>".$res['pickup_date']."</td>";
            
            echo "<td><a  href=\"invoiceform.php?id=$res[reg_no]\"><div class='edit'>Invoice</div></a> </td>";
			echo "</tr>";
        }
        ?>
    </table>
        </div>
    </div>
    <!-- End Main -->

    </div>
</body>
</html>