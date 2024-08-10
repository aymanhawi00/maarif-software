<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin - Change Password</title>
   <meta name="author" content="Ayman">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Lilita+One&family=Nosifer&family=Playpen+Sans:wght@300&family=Poppins:wght@400;600&family=Roboto+Slab&family=Signika:wght@300;500&display=swap" rel="stylesheet">
   <link rel="icon" type="images/x-icon" href="images/maarifs-logo.png">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <style>
      * {
         box-sizing: border-box;
         margin: 0;
         padding: 0;
         font-family: 'Poppins', sans-serif;
      }

      .btn {
            transition: 300ms background 0s ease-in-out;
         }

      .wrapper .btn:hover {
            background-color: #adb5bd;
         }

      body {
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 100vh;
         background: url('images/bridge3.jpg') no-repeat center;
         background-size: cover;
         transition: 300ms all 0s ease-in-out;
      }

      .wrapper {
         background: transparent;
         width: 420px;
         color: #fff;
         border-radius: 10px;
         padding: 30px 40px 15px;
         box-shadow: 0 0 10px rgba(0, 0, 0, .2);
         border: 2px solid rgba(255, 255, 255, .2);
         backdrop-filter: blur(50px);
      }

      #preloader {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100vh;
         background: rgba(0,0,0,.8) url(images/Coffee@1x-1.0s-200px-200px\ \(4\).gif) no-repeat center center;
         background-size: 7%;
         z-index: 9999;
         display: flex;
         justify-content: center;
         align-items: center;
      }

      h1 {
         font-size: 30px;
         text-align: center;
         padding-bottom: 15px;
      }

      .login-details {
         width: 100%;
         height: 50px;
         margin: 30px 0;
         position: relative;
      }

      .echstyle {
         font-weight: bold;
         color: #fff;
         position: fixed;
         text-align: center;
         bottom: 28.7%;
         font-size: 14px;
         background-color: #cc7c6c;
         border: none;
         outline: none;
         border-radius: 13px;
         padding: 3px 7px;
         box-shadow: 0 0 5px rgba(0, 0, 0, .2);
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

      .login {
         text-align: center;
         font-size: 14.5px;
         margin: 15px 0;
      }

      .login a {
         font-weight: bold;
      }

      .forgot-email {
         text-align: center;
         font-size: 14.5px;
         margin: 15px 0 15px;
      }

      .login-details .pass-icon
      {
         position: absolute;
         top: 50%;
         right: 15px;
         width: 24px;
         transform: translateY(-50%);
         cursor: pointer;
      }
   </style>
</head>

<body>
   <div id="preloader"></div>
   <div class="wrapper">

      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
         <h1>Change Password</h1>

         <?php
         include("database.php");
         if (isset($_GET['IncorrectPassword'])) 
         {
         echo "<div class='alert alert-danger text-center' style='margin-bottom: -8px;'>Incorrect password!</div>";
         } else if (isset($_GET['success'])) 
         {
         echo "<div class='alert alert-success text-center' style='margin-bottom: -8px;'>Passwords successfully updated!</div>";
         } else if (isset($_GET['Invalid'])) 
         {
         echo "<div class='alert alert-danger text-center' style='margin-bottom: -8px;'>Invalid credentials!</div>";
         }
         ?>

         <div class="login-details">
            <input type="text" name="username" placeholder="Username" required>
         </div>

         <div class="login-details">
            <input type="password" name="newpass" id="pass" placeholder="New Password" required>
            <img src="images/hide.png" class="pass-icon">
         </div>

         <div class="login-details">
            <input type="password" name="confirmpass" id="secondpass" placeholder="Confirm Password" required>
            <img src="images/hide.png" class="pass-icon" id="passicon">
         </div>

         <input type="submit" name="change" style="background-color: #fff !important;" class="btn" value="Change Password">

         <div class="login">
            <p>Go back to login? <a href="admin.php">Login</a></p>
            <span id="msg">
               <p></p>
            </span>
         </div>

      </form>

   </div>
</body>

</html>
<script>
   var loader = document.getElementById("preloader");
      window.addEventListener("load", function(){
         loader.style.display = "none";
   });
   var loader = document.getElementById("preloader");
      window.addEventListener("load", function(){
         loader.style.display = "none";
   });
   var hideimg = document.querySelector(".pass-icon");
   var hide = document.getElementById('passicon');
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
         var secondpass = document.getElementById('secondpass');
         
         hide.onclick = function() {
            if (secondpass.type = 'password') {
               secondpass.type = 'text';
               hide.src = 'images/visual.png';
            } else {
               secondpass.type = 'password';
               hide.src = 'images/hide.png';
            }
         }
</script>
<?php

   if(isset($_POST['change'])) {

      $change = $_POST['newpass'];
      $confirm = $_POST['confirmpass'];
      $username = $_POST['username'];
      $user = "SELECT * FROM admins WHERE username = '$username'";
      $res = mysqli_query($conn, $user);

      if (mysqli_num_rows($res) == 1) {
         $row = mysqli_fetch_assoc($res);

         if ($change == $confirm && $username == $row['username']) {

            $query = "UPDATE admins SET pass='$confirm' WHERE username='$username'";
            mysqli_query($conn, $query);
   
            echo "<script>window.top.location='change-password-admin.php?success'</script>";
   
         } else if ($change != $confirm && $username == $row['username']) {
            echo "<script>window.top.location='change-password-admin.php?IncorrectPassword'</script>";
         } else {
            echo "<script>window.top.location='change-password-admin.php?Invalid'</script>";
         }

      mysqli_close($conn);
      }
   }
?>