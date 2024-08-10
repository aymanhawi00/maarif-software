<?php
   ob_start();
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Attendance</title>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
      <script src="https://kit.fontawesome.com/450cf52145.js" crossorigin="anonymous"></script>
      <link rel="icon" type="images/x-icon" href="images/maarifs-logo.png">
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <style>
    *, *::after, *::before {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }
    #home-nav {
         position: relative;
      }
      #set {
            position: inherit;
            left: -2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: #5ab5c7;
            cursor: pointer;
            transition: 300ms color 0s;
        }
      #logout {
            position: absolute !important;
            right: 50px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
         }
         i:hover {
         color: #A9A9A9;
      }
      .contain-all {
         min-height: 100vh;
         background: url('images/coming.jpg') no-repeat;
         background-size: cover;
         background-position: center;
         backdrop-filter: blur(10px);
         display: flex;
         justify-content: center;
         align-items: center;
         transition: 300ms all 0s ease-in-out;
      }
      i {
            position: inherit;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: #5ab5c7;
            cursor: pointer;
            transition: 300ms color 0s;
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
   </style>
</head>
<body>
    <div id="preloader"></div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="home-nav">
         <div class="container-fluid">
            <a class="navbar-brand" href="clubreg.php"><img src="images/navlogo.png" width="250px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav">

               <li class="nav-item">
                  <a class="nav-link" href="dash.php">Dashboard</a>
               </li>

               <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                            Activities
                    </a>
                    <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href='activity.php'>Club Activity</a></li>
                            <li><a class='dropdown-item' href='trackattendance.php'>Track Attendance</a></li>
                    </ul>
                </li>

               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     School Registration
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="clubreg.php">Club Registration</a></li>
                     <li><a class="dropdown-item" href="sectionreg.php">Section Registration</a></li>
                  </ul>
               </li>

               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Student Registration
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="admin-home.php">Add Student</a></li>
                  </ul>
               </li>
               <li class="nav-item" id="logout">
                  <a href="settings.php" id="set"><i class="fa-solid fa-gear"></i></a>
                  <a class="nav-link" href="logout-super.php">Logout</a>
               </li>
               </ul>
            </div>
         </div>
    </nav>

    <div class="contain-all">


    </div>

    <script>
      function con() {
         var message = confirm('Are you sure you want to logout?');
         if (message == false) {
            event.preventDefault();
         }
      }
      var loader = document.getElementById("preloader");
      window.addEventListener("load", function(){
         loader.style.display = "none";
      });
   </script>
</body>
</html>