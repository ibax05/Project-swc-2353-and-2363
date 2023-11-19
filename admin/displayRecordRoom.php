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

 //escape special characters in a string
 $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);

 //create and execute query
 $sql = "SELECT * FROM roomtypes WHERE room_id= '$room_id'";
 $result = $conn->query($sql);

 //check if records were returned
 if ($result->num_rows > 0) {

 //create a table to display the record
 echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
 echo '<tr><td align="center"><b>Room Id</b></td>
 <td align="center"><b>Room Type</b></td>
 <td align="center"><b>Price</b></td></tr>';

 // output data of each row
 while($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td align="center">'.$row["room_id "].'</td>';
    echo '<td align="center">'.$row["room_types"].'</td>';
    echo '<td align="center">'.$row["price"].'</td>';
    echo '</tr>';

 }
 echo '</table></p>';
 }
 else {
 echo '<font color=red>No record found';
 }
 //close connection
 $conn->close();
 echo '<p><a href="adminMenu.php">Back to Main Menu</a></p>';
?>