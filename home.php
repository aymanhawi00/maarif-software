<?php
session_start();
if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
   header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="images/x-icon" href="images/maarifs-logo.png">
   <title>Home page</title>
</head>

<body>
   <h1>This is the homepage</h1>
   <a href="logout.php">Logout</a>
</body>

</html>
