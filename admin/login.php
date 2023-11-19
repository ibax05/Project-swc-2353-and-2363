<?php
$servername="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$dbName="hotelbooking"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
// Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$sql = "SELECT admin_username,admin_password FROM admin WHERE admin_username='$myusername' and
admin_password='$mypassword'";
$result = $conn->query($sql);

// Mysql_num_row is counting table row
if ($result->num_rows > 0)
{
 //redirect to file "adminMenu.php"
 header("location:adminMenu.php");
}
else
{
 echo "<p>Wrong Username or Password. Please try again.";
}
$conn->close();
?>