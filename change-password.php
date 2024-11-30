<?php
   include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Student - Forgot Password</title>
   <meta name="author" content="Ayman">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Lilita+One&family=Nosifer&family=Playpen+Sans:wght@300&family=Poppins:wght@400;600&family=Roboto+Slab&family=Signika:wght@300;500&display=swap" rel="stylesheet">
   <link rel="icon" type="images/x-icon" href="images/maarifs-logo.png">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
         background: url('images/maarif.webp') no-repeat center;
         background-size: cover;
         backdrop-filter: blur(10px);
         transition: 300ms all 0s ease-in-out;
      }

      .wrapper {
         background: transparent;
         width: 420px;
         color: #fff;
         border-radius: 10px;
         padding: 50px 40px 30px 40px;
         box-shadow: 0 0 10px rgba(0, 0, 0, .2);
         border: 2px solid rgba(255, 255, 255, .2);
         backdrop-filter: blur(50px);
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
         bottom: 30.3%;
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
         margin: 50px 0 15px;
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
   <div class="wrapper">

      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
         <h1>Change Password</h1>

         <div class="login-details">
            <input type="email" name="email" placeholder="Email" required>
         </div>

         <div class="login-details">
            <input type="password" name="newpass" id="pass" placeholder="New Password" required>
            <img src="images/hide.png" class="pass-icon">
         </div>

         <div class="login-details">
            <input type="password" name="confirmpass" id="secondpass" placeholder="Confirm Password" required>
            <img src="images/hide.png" class="pass-icon" id="passicon">
         </div>

         <input type="submit" name="change" class="btn" value="Change Password">

         <div class="login">
            <p>Go back to login? <a href="index.php">Login</a></p>
            <span id="msg">
               <p></p>
            </span>
         </div>

         <div class="forgot-email">
            <p><a href="forgot-email.php">Forgot email?</a></p>
         </div>

      </form>

   </div>
</body>

</html>
<script>
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
      $email = $_POST['email'];
      $user = "SELECT * FROM studentsdetail WHERE email = '$email'";
      $res = mysqli_query($conn, $user);

      if (mysqli_num_rows($res) == 1) {
         $row = mysqli_fetch_assoc($res);

         if ($change == $confirm && $email == $row['email']) {

            $query = "UPDATE studentsdetail SET pass='$confirm' WHERE email='$email'";
            mysqli_query($conn, $query);
   
            echo "<p class='echstyle'>Password successfully updated!</p>";
   
         } else if ($change != $confirm && $email == $row['email']) {
            echo "<p class='echstyle'>The passwords don't match!</p>";
         } else {
            echo "<script>alert('Invalid credentials!');</script>";
         }

      mysqli_close($conn);
      }
   }
?>