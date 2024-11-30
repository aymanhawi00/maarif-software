<?php
session_start();
include("database.php");
if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
   header('Location: admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin - Register Club</title>
   <link rel="icon" type="images/x-icon" href="images/maarifs-logo.png">
   <script src="https://kit.fontawesome.com/450cf52145.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

         * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: "Poppins", sans-serif;
         }

         select:after {
            content: "";
         }

         #float {
            display: none;
         }

         i {
            position: inherit;
            left: -1.7rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: #5ab5c7;
            cursor: pointer;
            transition: 300ms color 0s;
         }

         i:hover {
            color: #A9A9A9;
         }

         .dropdown-item:hover {
            background-color: #adb5bd;
         }

         .form-container {
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 91.5vh;
         background: url('images/bridge3.jpg') no-repeat;
         background-size: cover;
         background-position: center;
         }

         .wrapper {
         width: 500px;
         background: rgba(255, 255, 255, .1);
         border: 2px solid rgba(255, 255, 255, .2);
         box-shadow: 0 0 10px rgba(0, 0, 0, .2);
         backdrop-filter: blur(50px);
         border-radius: 0 0 10px 10px;
         color: #fff;
         padding: 75px 35px;
         margin: 0 10px;
         position: relative;
         }

         .wrapper h1 {
         font-size: 37px;
         text-align: center;
         margin-bottom: 20px;
         }

         .wrapper .input-box {
         display: flex;
         justify-content: center;
         flex-wrap: wrap;
         }

         .input-box .input-field {
         position: relative;
         width: 90%;
         height: 50px;
         margin: 17px 0;
         }

         .input-box .input-field input {
         width: 100%;
         height: 100%;
         background: transparent;
         border: 2px solid rgba(255, 255, 255, .2);
         outline: none;
         font-size: 17px;
         color: #fff;
         border-radius: 35px;
         padding: 0 25px;
         }

         .input-box .input-field input::placeholder {
         color: #fff;
         }

         .wrapper .btn {
         width: 75%;
         height: 50px;
         border: none;
         outline: none;
         border-radius: 21px;
         box-shadow: 0 0 10px rgba(0, 0, 0, .1);
         cursor: pointer;
         font-size: 17px;
         color: #fff;
         font-weight: 550;
         margin-top: 15px;
         background-color: #fff;
         color: black;
         }

         .wrapper .btn:hover {
            background-color: #adb5bd;
         }

         #home-nav {
            position: relative;
         }

         #logout {
            position: absolute !important;
            right: 50px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
         }

         .regcontain {
            display: flex;
            justify-content: center;
         }

         .regcon {
            position: absolute;
            top: -3rem;
            left: -0.5%;
            height: 3rem;
            width: 15rem;
            cursor: default;
            backdrop-filter: blur(50px);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 25px;
            transition: 300ms background 0s;
            font-weight: 400;
            background-color: #adb5bd;
            border-top: 2px solid rgba(255, 255, 255, .2);
            border-right: 2px solid rgba(255, 255, 255, .2);
            border-left: 2px solid rgba(255, 255, 255, .2);
            outline: none;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
         }

         ::selection{
            background-color: #adb5bd;
         }

         .remcon {
            position: absolute;
            top: -3rem;
            height: 3rem;
            right: -0.5%;
            width: 15rem;
            backdrop-filter: blur(50px);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 25px;
            cursor: pointer;
            font-weight: 400;
            border-top: 2px solid rgba(255, 255, 255, .2);
            border-right: 2px solid rgba(255, 255, 255, .2);
            border-left: 2px solid rgba(255, 255, 255, .2);
            outline: none;
            border-radius: 10px 10px 0 0;
            background-color: transparent;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
         }

         .wrapper .input-box .input-field select {
         width: 100%;
         height: 100%;
         position: relative;
         background: transparent;
         border: 2px solid rgba(255, 255, 255, .2);
         outline: none;
         font-size: 16px;
         cursor: pointer;
         position: relative;
         color: #fff;
         border-radius: 7px;
         padding: 0 15px;
         }

         .wrapper .input-box .input-field select option {
            color: black;
            background: transparent;
         }

         .remcon:hover {
            background-color: #0d6efd;
         }

         #remcon {
            background-color: #adb5bd !important;
            cursor: default !important;
         }

         #register2 {
            background-color: transparent !important;
            cursor: pointer;
         }

         #register2:hover {
            background-color: #0d6efd !important;
         }
         
         .btn {
            transition: 300ms background 0s ease-in-out;
         }

         body{
            transition: 300ms all 0s ease-in-out;
         }

         .regcon a {
            text-decoration: none;
            color: #fff;
         }

         @media (max-width: 576px) {
         .input-box .input-field {
            width: 100%;
            margin: 10px 0;
         }
         }
   </style>
</head>

<body>

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

            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               School Registration
               </a>
               <ul class="dropdown-menu">
                  <li><a class="dropdown-item active" href="clubreg.php">Club Registration</a></li>
                  <li><a class="dropdown-item" href="sectionreg.php">Section Registration</a></li>
               </ul>
            </li>

            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Student Registration
               </a>
               <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="admin-home.php">Add Student</a></li>
                  <li><a class="dropdown-item" href="update.php">Update Student</a></li>
               </ul>
            </li>
            
            <li class="nav-item" id="logout">
               <i class="fa-solid fa-gear"></i>
               <a class="nav-link" href="logout-admin.php">Logout</a>
            </li>
            </ul>
         </div>
          </div>
      </nav>

   <div class="form-container">

      <div class="wrapper">

         <a href="clubreg.php"><div id="register2" class="regcon">Register</div></a>

         <div class="remcon" id="remcon">Remove</div>

            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">

                  <h1>Remove Club</h1>

                  <div class="input-box">
                     <div class="input-field">
                        <select id="clubname" name="clubname">
                           <option value="" selected disabled>Select Club</option>
                              <?php
                                 include('database.php');
                                 $myclubs = mysqli_query($conn, "select * from club");
                                 while($c = mysqli_fetch_array($myclubs)) {
                              ?>
                              <option><?php echo $c['clubs']; ?></option>
                              <?php } ?>
                        </select>
                     </div>
                  </div>

                  <div class="regcontain">
                  <button type="submit" name="delete" class="btn">Remove</button>
                  </div>

            </form>
      </div>

    </div>
</body>
</html>
<?php
   if(isset($_POST['delete'])) {
      $clubremove = $_POST['clubname'];

      $remove = "DELETE FROM club WHERE clubs = '$clubremove'";

      mysqli_query($conn, $remove);
   }
?>