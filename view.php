<?php


// Start the session
session_start();

// Check if the user is not logged in, redirect to the login page if true
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}


require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Load environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database credentials from environment variables
$db_host = $_ENV['DB_HOST'];
$db_name = $_ENV['DB_NAME'];
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASS'];

// PDO connection to MySQL
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve all data from the employee_details table
    $stmt = $conn->prepare("SELECT * FROM employee_details");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the data in an HTML table
    echo '<h1> Employee details</h1>';
    echo "<table>";
    echo "<tr><th>Employee Name</th><th>Employee ID</th><th>Phone NO</th><th>Email</th></tr>";
    foreach ($result as $row) {
        echo "<tr><td>".$row['employee_name']."</td><td>".$row['employee_id']."</td><td>".$row['employee_phone']."</td><td>".$row['employee_email']."</td></tr>";
    }
    echo "</table>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee details</title>
    <link rel="stylesheet" href="css/view.css">
</head>
<body>
    
    
</body>
</html>