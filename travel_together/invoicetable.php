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
            <h2>Invoice Table</h2>
            <hr>
        </div>
        <div class="booking-form">
        <table id="myTable">
        <tr>
            <th>Inv No</th>
            <th>Reg.No</th>
            <th>Booker Name</th>
            <th>Company Name</th>
			<th>Package</th>
			<th>Pckg Price</th>
            <th>Vehicle</th>
            <th>Address</th>
            <th>Tier</th>
            <th>Extra Hr</th>
            <th>Extra KM</th>
			<th>Drive All</th>
			<th>Subtotal</th>
            <th>Tax</th>
            <th>Total</th>
            <th>Genr Date</th>
            <th>Booking Date</th>
            <th></th>
           
        </tr>
        <?php 
       $stmt = $conn->query("SELECT * FROM invoice "); 
       while ($res = $stmt->fetch()) {    
            echo "<tr>";
            echo "<td id='invoice_no'>".$res['id']."</td>";
            echo "<td id='reg_no'>".$res['reg_no']."</td>";
            echo "<td id='booker_name'>".$res['booker_name']."</td>";
			echo "<td id='company'>".$res['company']."</td>";
            echo "<td id='package'>".$res['package']."</td>";
            echo "<td id='package_price'>".$res['package_price']."</td>";
            echo "<td id='vehicle'>".$res['vehicle']."</td>";
            echo "<td id='address'>".$res['address']."</td>";
			echo "<td id='tier'>".$res['tier']."</td>";
            echo "<td id='total_extra_hr'>".$res['total_extra_hr']."</td>";
            echo "<td id='total_extra_km'>".$res['total_extra_km']."</td>";
            echo "<td id='driver_allowance'>".$res['driver_allowance']."</td>";
			echo "<td id='subtotal'>".$res['subtotal']."</td>";
            echo "<td id='tax'>".$res['tax']."</td>";
            echo "<td id='Total'>".$res['total']."</td>";
            echo "<td id='current_date1'>".$res['current_date1']."</td>";
            echo "<td id='releasing_date'>".$res['releasing_date']."</td>";
            
            echo "<td><a  href=\"done.php?id=$res[reg_no]\"><div class='edit'>Done</div></a> </td>";
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