<html>
<head>
 <title>Creative Multimedia Competition 2020</title>
</head>
<body>
<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "hotelbooking";
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }
 
 //get input value
 $booking_id =$_POST['booking_id'];
 // sql to delete a record
 $sql = "DELETE FROM bookingform WHERE booking_id ='$booking_id'";
 if ($conn->query($sql) === TRUE) {
 echo "Record deleted successfully";
 }
 else {
 echo "Error deleting record: " . $conn->error;
 }



?>
<p><a href="adminMenu.php">Back to Main Menu</a></p>

</body>
</html>