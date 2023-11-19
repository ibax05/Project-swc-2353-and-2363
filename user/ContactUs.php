<?php
$servername = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$dbName = "hotelbooking"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define $myusername and $mypassword
$email = $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];

// Using prepared statement to prevent SQL injection
$cek_query = $conn->prepare("SELECT email_contact_us FROM contactus WHERE email_contact_us = ?");
$cek_query->bind_param("s", $email);
$cek_query->execute();
$cek_query->store_result();

if ($cek_query->num_rows > 0) {
    // if in database has been that email, gonna pop notification 
    echo "Email is already registered. Please use a different email.";
} else {
    // Using prepared statement for the insert query
    $sql = $conn->prepare("INSERT INTO contactus (email_contact_us, name_contact_us, feedback) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $email, $name, $message);

    // Execute the prepared statement
    if ($sql->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connections
$conn->close();
?>
