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


    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO employee_details (employee_name, employee_id, employee_phone, employee_email) VALUES (:name, :id, :phone, :email)");

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);

    // Set parameters and execute the statement
    $name = $_POST['name'];
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $stmt->execute();

    header("Location: admin.php");

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  header("Location: admin.php");
}
$conn = null;
?>
