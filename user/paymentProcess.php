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

// Get the maximum ID from cardinfo
$sqlMaxId = "SELECT MAX(id_user) AS max_id FROM cardinfo";
$resultMaxId = $conn->query($sqlMaxId);

if ($resultMaxId->num_rows > 0) {
    $rowMaxId = $resultMaxId->fetch_assoc();
    $lastId = $rowMaxId['max_id'];

    // User input
    $name_payment = $_POST['name_payment'];
    $email_payment = $_POST['email_payment'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $name_on_card = $_POST['name_on_card'];
    $credit_card_number = $_POST['credit_card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];

    // Increment the last ID to get a new ID
    $newId = $lastId + 1;

    // Check if the email already exists in the cardinfo table
    $sqlCheckEmail = "SELECT email_card FROM cardinfo WHERE email_card = '$email_payment'";
    $resultCheckEmail = $conn->query($sqlCheckEmail);

    if ($resultCheckEmail->num_rows > 0) {
        // Email already exists, show an error message
        echo "Error: This email is already registered. Please use a different email.";
    } else {
        // Use the new ID to insert a new record
        $sqlInsert = "INSERT INTO cardinfo (id_user, email_card, name_card, address_card, city_card, state_card,
            zip_code_card, name_on_card, number_card, exp_month_card, exp_year_card, cvv_card) 
            VALUES ('$newId', '$email_payment', '$name_payment', '$address', '$city', '$state', '$zip_code', 
            '$name_on_card', '$credit_card_number', '$exp_month', '$exp_year', '$cvv')";

        $resultInsert = $conn->query($sqlInsert);

        // Execute the query
        if ($resultInsert === TRUE) {
            header("location: acknowledgementfrompayment.html");
        } else {
            echo "Error: " . $sqlInsert . "<br>" . $conn->error;
        }
    }
} else {
    echo "Error retrieving the last ID: " . $conn->error;
}

// Close the connection
$conn->close();
?>
