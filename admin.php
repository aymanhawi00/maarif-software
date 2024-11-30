<?php
session_start();
ob_start();
?>
<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin - Login</title>
   <meta name="author" content="Ayman">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Lilita+One&family=Nosifer&family=Playpen+Sans:wght@300&family=Poppins:wght@400;600&family=Roboto+Slab&family=Signika:wght@300;500&display=swap" rel="stylesheet">
   <link rel="icon" type="images/x-icon" href="images/maarifs-logo.png">
   <style>
      * {
         box-sizing: border-box;
         margin: 0;
         padding: 0;
         font-family: 'Poppins', sans-serif;
      }

      .wrapper .btn:hover {
            background-color: #adb5bd;
         }

         body{
            transition: 300ms all 0s ease-in-out;
         }

      .login-details #pass-icon
      {
         position: absolute;
         top: 50%;
         right: 15px;
         width: 24px;
         transform: translateY(-50%);
         cursor: pointer;
      }

      .btn {
            transition: 300ms background 0s ease-in-out;
         }

      body {
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 100vh;
         background: url('images/bridge3.jpg') no-repeat center;
         background-size: cover;
      }

      .container {
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 100vh;
         background: url('images/admin.jpg') no-repeat center;
         background-size: cover;
      }

      .wrapper {
         background: transparent;
         width: 420px;
         color: #fff;
         border-radius: 10px;
         padding: 30px 40px 70px 40px;
         box-shadow: 0 0 10px rgba(0, 0, 0, .2);
         border: 2px solid rgba(255, 255, 255, .2);
         backdrop-filter: blur(50px);
      }

      h1 {
         font-size: 36px;
         text-align: center;
      }

      .login-details {
         width: 100%;
         height: 50px;
         margin: 30px 0;
         position: relative;
      }

      .login-details input {
         width: 100%;
         height: 100%;
         border: none;
         outline: none;
         border-radius: 40px;
         border: 2px solid rgba(255, 255, 255, .2);
         background-color: transparent;
         color: #fff;
         font-size: 16px;
         padding: 20px 45px 20px 20px;
      }

      .login-details input::placeholder {
         color: #fff;
      }

      .remember input {
         accent-color: white;
         margin-right: 5px;
      }

      .register a {
         font-weight: bold;
      }

      a {
         text-decoration: none;
         color: #fff;
      }

      a:hover {
         text-decoration: underline;
      }

      .btn {
         width: 100%;
         height: 45px;
         border-radius: 40px;
         border: none;
         outline: none;
         border: 2px solid rgba(255, 255, 255, .2);
         font-size: 16px;
         cursor: pointer;
         box-shadow: 0 0 10px rgba(0, 0, 0, .1);
         font-weight: bold;
      }

      .remember {
         display: flex;
         margin: -15px 0 15px;
         font-size: 14.5px;
         justify-content: space-between;
      }

      .register {
         text-align: center;
         font-size: 14.5px;
         margin: 50px 0 15px;
      }

      .echstyle {
         font-weight: bold;
         color: #fff;
         position: fixed;
         text-align: center;
         bottom: 30%;
         font-size: 14px;
         background-color: #cc7c6c;
         border: none;
         outline: none;
         border-radius: 13px;
         padding: 3px 7px;
         box-shadow: 0 0 5px rgba(0, 0, 0, .2);
      }
   </style>
   
</head>

<body>
   <div class="wrapper">

      <form action="admin.php" method="post">
         <h1>Login Admin</h1>

         <div class="login-details">
            <input type="text" name="username" placeholder="Username" required>
         </div>

         <div class="login-details">
            <input type="password" name="password" placeholder="Password" id="pass" required>
            <img src="images/hide.png" id="pass-icon">
         </div>

         <div class="remember">
            <a href="index.php">User's site?</a> <a href="change-password-admin.php" name="change" target="_blank">Forgot Password?</a>
         </div>

         <input type="submit" name="login" class="btn" value="Login">

      </form>

   </div>
   <script>
         var hideimg = document.getElementById('pass-icon');
         var pass = document.getElementById('pass');

         hideimg.onclick = function() {
            if (pass.type = 'password') {
               pass.type = 'text';
               hideimg.src = 'images/visual.png';
            } else {
               pass.type = 'password';
               hideimg.src = 'images/hide.png';
            }
         }
   </script>
</body>
</html>
<?php
if (isset($_POST['login'])) {

   $username = $_POST["username"];
   $password = $_POST["password"];

   $sqlpass = "SELECT * FROM admins WHERE username = '$username' && pass = '$password'";

   $res = mysqli_query($conn, $sqlpass);

   if (mysqli_num_rows($res) === 1) {
      $row = mysqli_fetch_assoc($res);
      if ($row['username'] == $username && $row['pass'] == $password) {
         $_SESSION["username"] = $row['username'];
         $_SESSION["password"] = $row['pass'];
         header("Location: admin-home.php.php");
         ob_end_flush();
      }
   } else {
      echo "<p class='echstyle'>Incorrect email or password!</p>";
   }
   mysqli_close($conn);
}
?>