<?php
$connect = mysqli_connect("localhost", "root", "", "hotelbooking") or die("Connection failed!!");

// Get all records from bookingform
$bookingform = $connect->query("SELECT * FROM bookingform"); 

// Get all records from roomtypes
$roomtypes = $connect->query("SELECT * FROM roomtypes");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ConfirmationBooking.css">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>

<body>
    <?php 
    foreach ($bookingform as $booking) 
    {
        foreach ($roomtypes as $room) 
        {

            $table1 = 0;
            $table2 = 0; 
        }
    }        // Check if the criteria are met
            if (( $table1 == $table2 )) 
            {
    ?>      
                <div class="confirmation">
                    <h1>Confirmation of Your Booking</h1>
                    <div class="booking-details">
                        <p><strong>Adults:</strong> <?php echo $booking['Adult']; ?></p>
                        <p><strong>Children:</strong> <?php echo $booking['Children']; ?></p>
                        <p><strong>Check-in Date:</strong> <?php echo $booking['Check_in']; ?></p>
                        <p><strong>Check-out Date:</strong> <?php echo $booking['Check_out']; ?></p>
                        <p><strong>Room Type:</strong> <?php echo $room['room_types']; ?></p>
                        <p><strong>Total Price:</strong> <?php echo $room['price']; ?></p>
                    </div>
                </div>
    <?php
            }
        
    
    ?>   
    <form action="payment.html" method="post">
        <div id="submit">
            <button type="submit" name="booking_id" value="SUBMIT" id="booking_id">Confirm</button>
            <button type="reset" onclick="goBack()" id="cancel">Cancel</button>
        </div>
    </form>
</body>
</html>
