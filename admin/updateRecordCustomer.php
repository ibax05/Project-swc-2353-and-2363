<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Record - Hotel Booking System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        .error-message {
            color: #dc3545;
            font-weight: bold;
        }

        .back-link {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        .back-link:hover {
            color: #0056b3;
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

    // Escape special characters in a string
    $id_user = mysqli_real_escape_string($conn, $_GET['id_user']);

    // Fetch the record based on the email
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

    // Check if the record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display a form with the existing data for the user to update
        ?>
        <form action="updateRecordProcessCustomer.php" method="post">
            <input type="hidden" name="booking_id" value="<?php echo $row['id_user']; ?>">
            <label for="Children">Children:</label>
            <input type="text" name="Children" value="<?php echo $row['Children']; ?>">
            <label for="Adult">Adult:</label>
            <input type="text" name="Adult" value="<?php echo $row['Adult']; ?>">
            <label for="Check_in">Check-in:</label>
            <input type="text" name="Check_in" value="<?php echo $row['Check_in']; ?>">
            <label for="Check_out">Check-out:</label>
            <input type="text" name="Check_out" value="<?php echo $row['Check_out']; ?>">
            <label for="room_types">Room Type:</label>
            <input type="text" name="room_types" value="<?php echo $row['room_types']; ?>">
            <label for="price">Price:</label>
            <input type="text" name="price" value="<?php echo $row['price']; ?>">
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo '<p class="error-message">No record found</p>';
    }

    // Close connection
    $conn->close();
    echo '<p><a class="back-link" href="customer Information.php">Back to View Menu</a></p>';
    ?>
</body>

</html>
