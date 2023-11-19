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

if (isset($_POST['room_id']) && $_POST['room_id'] === 'budget_Room') 
{



    $sql = "SELECT MAX(room_id) AS max_id FROM roomtypes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
    $row = $result->fetch_assoc();
    $lastId = $row['max_id'];
    $room_types = "Budget room";
    $price = 100;

    // Tambah 1 kepada ID terakhir untuk mendapatkan ID yang baru
    $newId = $lastId + 1;

    // Gunakan ID yang baru untuk menyisipkan rekod baru
    $sqlInsert = "INSERT INTO roomtypes (room_id, room_types,price) VALUES ('$newId', '$room_types', '$price ')";
    $resultInsert = $conn->query($sqlInsert);

    if ($resultInsert === TRUE)
     {
        header("Location: payment.html");
    } else 
    {
        echo "Ralat semasa penyisipan: " . $conn->error;
    }
    } 
    else 
    {
    echo "Ralat semasa mengambil ID terakhir: " . $conn->error;
    }


    $conn->close();
}
elseif(isset($_POST['room_id']) && $_POST['room_id'] === 'standard_Room')
 {

     
    
    $sql = "SELECT MAX(room_id) AS max_id FROM roomtypes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
    $row = $result->fetch_assoc();
    $lastId = $row['max_id'];
    $room_types = "Standard room";
    $price = 200;

    // Tambah 1 kepada ID terakhir untuk mendapatkan ID yang baru
    $newId = $lastId + 1;

    // Gunakan ID yang baru untuk menyisipkan rekod baru
    $sqlInsert = "INSERT INTO roomtypes (room_id, room_types,price) VALUES ('$newId', '$room_types', '$price ')";
    $resultInsert = $conn->query($sqlInsert);

    if ($resultInsert === TRUE)
     {
        header("Location: payment.html");
    } else 
    {
        echo "Ralat semasa penyisipan: " . $conn->error;
    }
    } 
    else 
    {
    echo "Ralat semasa mengambil ID terakhir: " . $conn->error;
    }

    $conn->close();
}

elseif(isset($_POST['room_id']) && $_POST['room_id'] === 'twin_Room')
 {

     
    $sql = "SELECT MAX(room_id) AS max_id FROM roomtypes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
    $row = $result->fetch_assoc();
    $lastId = $row['max_id'];
    $room_types = "Twin room";
    $price = 255;

    // Tambah 1 kepada ID terakhir untuk mendapatkan ID yang baru
    $newId = $lastId + 1;

    // Gunakan ID yang baru untuk menyisipkan rekod baru
    $sqlInsert = "INSERT INTO roomtypes (room_id, room_types,price) VALUES ('$newId', '$room_types', '$price ')";
    $resultInsert = $conn->query($sqlInsert);

    if ($resultInsert === TRUE)
     {
        header("Location: payment.html");
    } else 
    {
        echo "Ralat semasa penyisipan: " . $conn->error;
    }
    } 
    else 
    {
    echo "Ralat semasa mengambil ID terakhir: " . $conn->error;
    }

    $conn->close();
}

elseif(isset($_POST['room_id']) && $_POST['room_id'] === 'family_Room')
 {

     
   
    $sql = "SELECT MAX(room_id) AS max_id FROM roomtypes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
    $row = $result->fetch_assoc();
    $lastId = $row['max_id'];
    $room_types = "Family room";
    $price = 300;

    // Tambah 1 kepada ID terakhir untuk mendapatkan ID yang baru
    $newId = $lastId + 1;

    // Gunakan ID yang baru untuk menyisipkan rekod baru
    $sqlInsert = "INSERT INTO roomtypes (room_id, room_types,price) VALUES ('$newId', '$room_types', '$price ')";
    $resultInsert = $conn->query($sqlInsert);

    if ($resultInsert === TRUE)
     {
        header("Location:payment.html");
    } else 
    {
        echo "Ralat semasa penyisipan: " . $conn->error;
    }
    } 
    else 
    {
    echo "Ralat semasa mengambil ID terakhir: " . $conn->error;
    }

    $conn->close();
}

elseif(isset($_POST['room_id']) && $_POST['room_id'] === 'suite_Room')
 {

     
    
    $sql = "SELECT MAX(room_id) AS max_id FROM roomtypes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
    $row = $result->fetch_assoc();
    $lastId = $row['max_id'];
    $room_types = "Suite room";
    $price = 500;

    // Tambah 1 kepada ID terakhir untuk mendapatkan ID yang baru
    $newId = $lastId + 1;

    // Gunakan ID yang baru untuk menyisipkan rekod baru
    $sqlInsert = "INSERT INTO roomtypes (room_id, room_types,price) VALUES ('$newId', '$room_types', '$price ')";
    $resultInsert = $conn->query($sqlInsert);

    if ($resultInsert === TRUE)
     {
        header("Location: payment.html");
    } else 
    {
        echo "Ralat semasa penyisipan: " . $conn->error;
    }
    } 
    else 
    {
    echo "Ralat semasa mengambil ID terakhir: " . $conn->error;
    }

    $conn->close();
}


elseif(isset($_POST['room_id']) && $_POST['room_id'] === 'luxury_Room')
 {

     
    
    $sql = "SELECT MAX(room_id) AS max_id FROM roomtypes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
    $row = $result->fetch_assoc();
    $lastId = $row['max_id'];
    $room_types = "luxury room";
    $price = 800;

    // Tambah 1 kepada ID terakhir untuk mendapatkan ID yang baru
    $newId = $lastId + 1;

    // Gunakan ID yang baru untuk menyisipkan rekod baru
    $sqlInsert = "INSERT INTO roomtypes (room_id, room_types,price) VALUES ('$newId', '$room_types', '$price ')";
    $resultInsert = $conn->query($sqlInsert);

    if ($resultInsert === TRUE)
     {
        header("Location: payment.html");
    } else 
    {
        echo "Ralat semasa penyisipan: " . $conn->error;
    }
    } 
    else 
    {
    echo "Ralat semasa mengambil ID terakhir: " . $conn->error;
    }

    $conn->close();
}

elseif(isset($_POST['room_id']) && $_POST['room_id'] === 'view_Room')
 {

     
    
    $sql = "SELECT MAX(room_id) AS max_id FROM roomtypes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
    $row = $result->fetch_assoc();
    $lastId = $row['max_id'];
    $room_types = "View room";
    $price = 500;

    // Tambah 1 kepada ID terakhir untuk mendapatkan ID yang baru
    $newId = $lastId + 1;

    // Gunakan ID yang baru untuk menyisipkan rekod baru
    $sqlInsert = "INSERT INTO roomtypes (room_id, room_types,price) VALUES ('$newId', '$room_types', '$price ')";
    $resultInsert = $conn->query($sqlInsert);

    if ($resultInsert === TRUE)
     {
        header("Location: payment.html");
    } else 
    {
        echo "Ralat semasa penyisipan: " . $conn->error;
    }
    } 
    else 
    {
    echo "Ralat semasa mengambil ID terakhir: " . $conn->error;
    }

    $conn->close();
}

elseif(isset($_POST['room_id']) && $_POST['room_id'] === 'connecting_Room')
 {

     
    
    $sql = "SELECT MAX(room_id) AS max_id FROM roomtypes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
    $row = $result->fetch_assoc();
    $lastId = $row['max_id'];
    $room_types = "connectng room";
    $price = 500;

    // Tambah 1 kepada ID terakhir untuk mendapatkan ID yang baru
    $newId = $lastId + 1;

    // Gunakan ID yang baru untuk menyisipkan rekod baru
    $sqlInsert = "INSERT INTO roomtypes (room_id, room_types,price) VALUES ('$newId', '$room_types', '$price ')";
    $resultInsert = $conn->query($sqlInsert);

    if ($resultInsert === TRUE)
     {
        header("Location:payment.html");
    } else 
    {
        echo "Ralat semasa penyisipan: " . $conn->error;
    }
    } 
    else 
    {
    echo "Ralat semasa mengambil ID terakhir: " . $conn->error;
    }

    $conn->close();
}





?>