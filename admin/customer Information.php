<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
             display: flex;
             justify-content: center;
             align-items: center;
             margin-top:20px;
            }

        label {
            display: inline-block;
            width: 100px; /* Sesuaikan jika perlu */
            text-align: right;
            margin-right: 10px; /* Sesuaikan jika perlu */
            }

        input[type="text"] {
            width: 200px; /* Sesuaikan jika perlu */
            height:30px;
            }

        input[type="submit"] {
            margin-left: 5px; /* Sesuaikan jika perlu */
            /* Sesuaikan jika perlu */
            height:36px;
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

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }

        .delete-link {
            color: #dc3545;
            cursor: pointer;
        }

        .delete-link:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <script>
        function showNotification(message, isSuccess) 
        {
            var notificationClass = isSuccess ? 'success-message' : 'error-message';
            var notificationElement = document.createElement('p');
            notificationElement.className = notificationClass;
            notificationElement.innerHTML = message;

            document.body.appendChild(notificationElement);

            setTimeout(function () 
            {
                document.body.removeChild(notificationElement);
            }, 3000); // Remove notification after 3 seconds
        }
    </script>
</head>

<body>
    <form action="displayRecordCustomer.php" method="post">
        <label for="id_user">User Id:</label>
        <input type="text" id="id_user" name="id_user" size="30">
        <br><br>
        <input type="submit" name="submit" value="Search">
    </form>

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

    // SQL query to retrieve data from cardinfo, roomtypes, and bookingform
    $sql = "SELECT cardinfo.id_user, cardinfo.email_card, cardinfo.name_card, cardinfo.address_card, 
               cardinfo.city_card, cardinfo.state_card, cardinfo.zip_code_card, cardinfo.name_on_card, 
               cardinfo.number_card, cardinfo.exp_month_card, cardinfo.exp_year_card, cardinfo.cvv_card,
               bookingform.booking_id, bookingform.Children, bookingform.Adult, 
               bookingform.Check_in, bookingform.Check_out,
               roomtypes.room_id, roomtypes.room_types, roomtypes.price
        FROM cardinfo
        LEFT JOIN roomtypes ON cardinfo.id_user = roomtypes.room_id 
        LEFT JOIN bookingform ON cardinfo.id_user = bookingform.booking_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo '<table>';
        echo '<tr>
                  <th>User ID</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Name on Card</th>
                  <th>Booking ID</th>
                  <th>Children</th>
                  <th>Adult</th>
                  <th>Check-in</th>
                  <th>Check-out</th>
                  <th>Room ID</th>
                  <th>Room Type</th>
                  <th>Price</th>
                  <th>Action</th>
                  <th>Action</th>
              </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id_user"] . '</td>';
            echo '<td>' . $row["email_card"] . '</td>';
            echo '<td>' . $row["name_card"] . '</td>';
            echo '<td>' . $row["address_card"] . '</td>';
            echo '<td>' . $row["city_card"] . '</td>';
            echo '<td>' . $row["state_card"] . '</td>';
            echo '<td>' . $row["name_on_card"] . '</td>';
            echo '<td>' . $row["booking_id"] . '</td>';
            echo '<td>' . $row["Children"] . '</td>';
            echo '<td>' . $row["Adult"] . '</td>';
            echo '<td>' . $row["Check_in"] . '</td>';
            echo '<td>' . $row["Check_out"] . '</td>';
            echo '<td>' . $row["room_id"] . '</td>';
            echo '<td>' . $row["room_types"] . '</td>';
            echo '<td>' . $row["price"] . '</td>';
            echo '<td><a href="updateRecordCustomer.php?id_user=' . $row["id_user"] . '">UPDATE</a></td>';
            echo '<td><a class="delete-link" href="deleteCustomer.php?id_user=' .$row["id_user"]. '">DELETE</a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "<p>No results found</p>"; // if no record found in the database
    }

    // Close connection
    $conn->close();

    if (isset($_GET['notification'])) {
        $notification = $_GET['notification'];
        $isSuccess = $_GET['success'];

        echo "<script>showNotification('$notification', $isSuccess)</script>";
    }

    echo '<p><a class="back-link" href="adminMenu.php">Back to Admin Menu</a></p>';
    ?>
</body>

</html>
