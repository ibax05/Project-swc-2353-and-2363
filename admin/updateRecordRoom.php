<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotelbooking";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}



// Escape special characters in a string
$room_id = mysqli_real_escape_string($conn, $_GET['roomid']);

// Fetch the record based on the email
$sql = "SELECT * FROM roomtypes WHERE room_id= '$room_id'";
$result = $conn->query($sql);

// Check if the record exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Display a form with the existing data for the user to update
    ?>
    <form action="updateRecordProcessRoom.php" method="post">
        <input type="hidden" name="room_id" value="<?php echo $row['room_id']; ?>">
        Room type: <input type="text" name="room_types" value="<?php echo $row['room_types']; ?>"><br>  
        Price  : <input type="text" name="price" value="<?php echo $row['price']; ?>"><br>  
        <input type="submit" value="Update">
    </form>
    <?php
} else {
    echo '<font color=red>No record found</font>';
}


// Close connection
$conn->close();
echo '<p><a href="adminMenu.php">Back to Main Menu</a></p>';
?>
