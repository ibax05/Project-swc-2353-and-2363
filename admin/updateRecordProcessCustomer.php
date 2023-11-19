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
$booking_id = mysqli_real_escape_string($conn, $_POST['booking_id']);
$Children = mysqli_real_escape_string($conn, $_POST['Children']);
$Adult = mysqli_real_escape_string($conn, $_POST['Adult']);
$Check_in = mysqli_real_escape_string($conn, $_POST['Check_in']);
$Check_out = mysqli_real_escape_string($conn, $_POST['Check_out']);
$room_types = mysqli_real_escape_string($conn, $_POST['room_types']);
$price = mysqli_real_escape_string($conn, $_POST['price']);

// Update bookingform table
$sql_bookingform = "UPDATE bookingform SET Children = '$Children', Adult = '$Adult', Check_in = '$Check_in', Check_out = '$Check_out' WHERE booking_id = '$booking_id'";

// Update roomtypes table
$sql_roomtypes = "UPDATE roomtypes SET room_types = '$room_types', price = '$price' WHERE room_id = '$booking_id'";

// Mulakan transaksi
$conn->begin_transaction();

try {
    // Jalankan pernyataan SQL
    $conn->query($sql_bookingform);
    $conn->query($sql_roomtypes);

    // Commit transaksi jika tiada ralat
    $conn->commit();

    // Close connection
    $conn->close();

    // Show a success message using JavaScript
    echo '<script>alert("Records updated successfully");</script>';

    // Redirect back to the admin menu page after showing the alert
    echo '<script>window.location.href = "customer Information.php";</script>';

} catch (Exception $e) {
    // Rollback transaksi jika terdapat ralat
    $conn->rollback();
    
    // Close connection
    $conn->close();

    // Show an error message using JavaScript
    echo '<script>alert("Error updating records: ' . $e->getMessage() . '");</script>';

    // Redirect back to the admin menu page after showing the alert
    echo '<script>window.location.href = "customer Information.php";</script>';
}
?>
