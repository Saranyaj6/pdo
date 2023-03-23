<?php
// Start the session
session_start();

// Check if the user is already logged in, redirect to the protected page if true
if (isset($_SESSION['username'])) {
  header("Location: protected.php");
  exit();
}


require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Load environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$user = $_ENV['username'];
$password1 = $_ENV['password'];


// Check if the login form has been submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
  // Validate the login credentials, in this example, we're using a simple hardcoded check
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username === $user && $password === $password1) {
    // If the login credentials are valid, set the session variable and redirect to the protected page
    $_SESSION['username'] = $username;
    header("Location: admin.php");
    exit();
  } else {
    // If the login credentials are invalid, show an error message
    $error = "Invalid login credentials";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/login.css">
  <title>Login</title>
</head>
<body>
  <h1>Login Page</h1>

  <?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
  <?php endif; ?>

  <form action="login.php" method="post">
    <div>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username">
    </div>

    <div>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
    </div>

    <button type="submit">Login</button>
  </form>
</body>
</html>
