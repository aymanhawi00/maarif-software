<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin - Login</title>
   <meta name="author" content="Ayman">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Lilita+One&family=Nosifer&family=Playpen+Sans:wght@300&family=Poppins:wght@400;600&family=Roboto+Slab&family=Signika:wght@300;500&display=swap" rel="stylesheet">
   <link rel="icon" type="images/x-icon" href="images/maarifs-logo.png">
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

      #log:hover {
         color: #000;
         background-color: #a0a0a0 !important;
      }

      #seluser {
         width: 100%;
         height: 100%;
         position: relative;
         background: transparent;
         border: 2px solid rgba(255, 255, 255, .2);
         outline: none;
         font-size: 16px;
         cursor: pointer;
         color: #fff;
         border-radius: 7px;
         padding: 0 15px;
      }

      #seluser option {
         color: black;
         background: transparent;
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
         padding: 30px 40px 30px 40px;
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
         justify-content: center;
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
   <div id="preloader"></div>
   <div class="wrapper">

      <form action="login.php" method="post">
         <h1 class="fw-bold">Login</h1>

         <?php  
                   include("database.php");
                     if (isset($_GET['IncorrectPassword'])) 
                     {
                     echo "<div class='mt-3 alert alert-danger text-center'>Invalid credentials!</div>";
                     }
         ?>

         <div class="login-details">
            <input type="text" name="username" placeholder="Username" required>
         </div>

         <div class="login-details">
            <input type="password" name="password" placeholder="Password" id="pass" required>
            <img src="images/hide.png" id="pass-icon">
         </div>

         <div class="remember">
            <a href="change-password-admin.php" name="change" target="_blank">Forgot Password?</a>
         </div>

         <input type="submit" style="background-color: #fff;" id='log' name="login" class="btn" value="Login">

      </form>

   </div>
   <script>
      var loader = document.getElementById("preloader");
      window.addEventListener("load", function(){
         loader.style.display = "none";
      });
   </script>
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
