

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
            <a href="invoicetable.php"><li>Invoice</li></a>
        </ul>
      </div>
    </div>


    <!-- Start Main -->

    <div class="main">
        <div class="title">
            <h2>Create Booking</h2>
            <hr>
        </div>
        <div class="booking-form">
        <form name="details-form" id="details-form" action="./bookingreceipt.php" method="POST"   enctype="multipart/form-data">
            <label for="booker-name">Booker Name :</label>
            <input type="text" name="booker-name" id="booker-name">

            <label for="reg-no">Reg.No. :</label>
            <input type="number" name="reg-no" id="reg-no">

            <label for="guest-name">Guest Name :</label>
            <input type="text" name="guest-name" id="guest-name">

            <label for="guest-no">Guest Mobile No. :</label>
            <input type="text" name="guest-no" id="guest-no">


            <label for="report-time">Report Time (hrs) :</label>
            <input type="time" name="report-time" id="report-time">


            <label for="package">Package :</label>
            <select name="package" id="package" >
                    
                    <option value="" ></option>
                    <option value="airport">airport</option>
                    <option value="4hr_40km">4hr_40km</option>
                    <option value="8hr_80km">8hr_80km</option>
                    <option value="outstation_package">outstation_package</option>
            
             </select>

            <label for="payment-mode">Payment Mode :</label>
            <input type="text" name="payment-mode" id="payment-mode">

            <label for="special-inst">Special Inst. :</label>
            <input type="text" name="special-inst" id="special-inst">

            <label for="company">Company :</label>
            <input type="text" name="company" id="company">


            <label for="releasing-date">Releasing Date :</label>
            <input type='date' name='releasing-date' id='releasing-date'  >


            <label for="vehicle">Vehicle :</label>
            <select name="vehicle" id="vehicle" required>
                    
                    <option value="" ></option>
                    <option value="sedan">sedan</option>
                    <option value="ex sedan(verna/honda city)">ex sedan(verna/honda city)</option>
                    <option value="suv">suv</option>
                    <option value="crysta">crysta</option>
            
             </select>

            
            <label for="address">address :</label>
            <input type="text" name="address" id="address">

            
            <label for="city">City :</label>
            <input type="text" name="city" id="city">


            <label for="pin-code">Pin Code :</label>
            <input type="number" name="pin-code" id="pin-code">

            <label for="pickup-date">Packup Date :</label>
            <input type='date' name='pickup-date' id='pickup-date'  >

            <input type="submit" id="submit" value="Submit">
            <input type="reset" id="reset" value="Reset">

        </form>
        </div>
    </div>
    <!-- End Main -->

    </div>
</body>
</html>