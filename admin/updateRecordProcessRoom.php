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

// Escape special characters in strings
$room_id = mysqli_real_escape_string($conn, $_POST['room_id']);
$room_types = mysqli_real_escape_string($conn, $_POST['room_types']);
$price = mysqli_real_escape_string($conn, $_POST['price']);


// Update the record
$sql = "UPDATE roomtypes SET room_types = '$room_types', price = '$price' WHERE room_id = '$room_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close connection
$conn->close();
echo '<p><a href="adminMenu.php">Back to Main Menu</a></p>';
?>
