<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu for Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        p {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .logout-btn {
            background-color: #f44336;
            margin-top: 10px;
        }

        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <p>Main Menu for Admin</p>

    <form action="customer Information.php" method="post">
        <p><input type="submit" value="View Record" name="cmdView"></p>
    </form>

    <form action="logout.php" method="post">
        <p><input class="logout-btn" type="submit" value="Log Out" name="cmdlogout"></p>
    </form>
</body>

</html>
