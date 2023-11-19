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

// Get input value
$id_user = mysqli_real_escape_string($conn, $_GET['id_user']);

// SQL query to delete a record from cardinfo
$sql_delete_cardinfo = "DELETE FROM cardinfo WHERE id_user = '$id_user'";
$success_cardinfo = $conn->query($sql_delete_cardinfo);

// SQL query to delete related records from roomtypes and bookingform
$sql_delete_related_records = "DELETE roomtypes, bookingform FROM roomtypes
                               LEFT JOIN bookingform ON roomtypes.room_id = bookingform.booking_id
                               WHERE roomtypes.room_id = '$id_user'";
$success_related_records = $conn->query($sql_delete_related_records);

// Close connection
$conn->close();

// Check if deletion was successful
if ($success_cardinfo && $success_related_records) {
    $notification = '<span style="color: red;">Record deleted successfully .</span>';
    $isSuccess = true;
} else {
    $notification = '<span style="color: red;">Error deleting record: ' . $conn->error . '</span>';
    $isSuccess = false;
}

// Redirect back to displayRecordCustomer.php with notification
header("Location: customer Information.php?notification=$notification&success=$isSuccess");
exit();
?>
