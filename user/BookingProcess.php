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


$sql = "SELECT MAX(booking_id) AS max_id FROM bookingform";
$result = $conn->query($sql);

  if ($result->num_rows > 0) 
 {
    $row = $result->fetch_assoc();
    $lastId = $row['max_id'];
    // set nilai booking_id ke dalam sesi
    $Children=$_POST['Children'];
    $Children=$_POST['Children'];
    $Adult=$_POST['Adult'];
    $Check_in=$_POST['Check_in'];
    $Check_out=$_POST['Check_out'];

    // Tambah 1 kepada ID terakhir untuk mendapatkan ID yang baru
    $newId = $lastId + 1;

    // Gunakan ID yang baru untuk menyisipkan rekod baru
    $sql = "INSERT INTO bookingform SET booking_id='$newId', Children='$Children', Adult='$Adult', Check_in='$Check_in', Check_out='$Check_out'";
    $resultInsert = $conn->query($sql);









    if ($resultInsert === TRUE)
     {
        header("location:Roomtypes.html");
    } 
    else 
    {
        echo "Ralat: " . $sql . "<br>" . $conn->error;
    }
  } 
   else 
  {
    echo "Ralat semasa mengambil ID terakhir: " . $conn->error;

  }
$conn->close();
?>