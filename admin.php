<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect to the login page if true
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>admin</title>
</head>
<body>

<h1>Employee Details</h1>
<a href="/PDO/logout.php" id="logout">logout</a>
<form action="/PDO/connection.php" method="post">
    <div>
    <label for="name">Employee Name:</label>
    <input type="text" name="name" id="name">
    <span id="name-error"></span>
    </div>

    <div>
        <label for="employee-id">Employee ID:</label>
        <input type="text" name="id" id="id">
        <span id="id-error"></span>
    </div>

    <div>
        <label for="phone">Phone NO:</label>
        <input type="text" name="phone" id="phone">
        <span id="phone-error"></span>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <span id="email-error"></span>
    </div>
    <div id="sub">
        <button type="submit" id="submit" onclick="validateForm(event)"> Submit </button>
        <button type="button" id="view"> <a href="/PDO/view.php">view details </a></button>
    </div>
    
</form>
<script src="script.js"></script>
</body>
</html>