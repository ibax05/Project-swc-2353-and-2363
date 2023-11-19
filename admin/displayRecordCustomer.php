<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.7);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
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

    //escape special characters in a string
    $id_user = mysqli_real_escape_string($conn, $_POST['id_user']);

    //create and execute query
    $sql = "SELECT * FROM cardinfo WHERE id_user= '$id_user'";
    $sql = "SELECT cardinfo.id_user, cardinfo.email_card, cardinfo.name_card, cardinfo.address_card, 
               cardinfo.city_card, cardinfo.state_card, cardinfo.zip_code_card, cardinfo.name_on_card, 
               cardinfo.number_card, cardinfo.exp_month_card, cardinfo.exp_year_card, cardinfo.cvv_card,
               bookingform.booking_id, bookingform.Children, bookingform.Adult, 
               bookingform.Check_in, bookingform.Check_out,
               roomtypes.room_id, roomtypes.room_types, roomtypes.price
        FROM cardinfo
        LEFT JOIN roomtypes ON cardinfo.id_user = roomtypes.room_id 
        LEFT JOIN bookingform ON cardinfo.id_user = bookingform.booking_id
        WHERE cardinfo.id_user = '$id_user'";
    $result = $conn->query($sql);

    //check if records were returned
    if ($result->num_rows > 0) {
        // Output data of each row
        echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
        echo '<tr>
                  <td align="center"><b>User ID</b></td>
                  <td align="center"><b>Email</b></td>
                  <td align="center"><b>Name</b></td>
                  <td align="center"><b>Address</b></td>
                  <td align="center"><b>City</b></td>
                  <td align="center"><b>State</b></td>
                  <td align="center"><b>Name on Card</b></td>
                  <td align="center"><b>Booking ID</b></td>
                  <td align="center"><b>Children</b></td>
                  <td align="center"><b>Adult</b></td>
                  <td align="center"><b>Check-in</b></td>
                  <td align="center"><b>Check-out</b></td>
                  <td align="center"><b>Room ID</b></td>
                  <td align="center"><b>Room Type</b></td>
                  <td align="center"><b>Price</b></td>
              </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td align="center">' . $row["id_user"] . '</td>';
            echo '<td align="center">' . $row["email_card"] . '</td>';
            echo '<td align="center">' . $row["name_card"] . '</td>';
            echo '<td align="center">' . $row["address_card"] . '</td>';
            echo '<td align="center">' . $row["city_card"] . '</td>';
            echo '<td align="center">' . $row["state_card"] . '</td>';
            echo '<td align="center">' . $row["name_on_card"] . '</td>';
            echo '<td align="center">' . $row["booking_id"] . '</td>';
            echo '<td align="center">' . $row["Children"] . '</td>';
            echo '<td align="center">' . $row["Adult"] . '</td>';
            echo '<td align="center">' . $row["Check_in"] . '</td>';
            echo '<td align="center">' . $row["Check_out"] . '</td>';
            echo '<td align="center">' . $row["room_id"] . '</td>';
            echo '<td align="center">' . $row["room_types"] . '</td>';
            echo '<td align="center">' . $row["price"] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        
    } else {
        echo '<font color=red>No record found';
    }
    //close connection
    $conn->close();
    echo '<p><a href="customer Information.php">Back to View Menu</a></p>';
    ?>

</body>

</html>
