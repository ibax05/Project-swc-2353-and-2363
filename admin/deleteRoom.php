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
 $room_id=$_POST['room_id'];

 // sql to delete a record
 $sql = "DELETE FROM roomtypes WHERE room_id='$room_id'";
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