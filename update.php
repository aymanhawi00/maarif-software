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
   <title>Admin - Update Student</title>
   <script src="https://kit.fontawesome.com/450cf52145.js" crossorigin="anonymous"></script>
   <link rel="icon" type="images/x-icon" href="images/maarifs-logo.png">
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

         body{
            transition: 300ms all 0s ease-in-out;
         }

         .dropdown-item {
            transition: 300ms background 0s;
         }

         .wrapper button {
            color: black !important;
         }

         .nav-link {
            transition: 300ms color 0s;
         }

         ::selection{
            background-color: #adb5bd;
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

         .btn {
            transition: 300ms background 0s ease-in-out;
         }

         i:hover {
            color: #A9A9A9;
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

         .dropdown-item:hover {
            background-color: #adb5bd;
         }

         .wrapper {
         width: 750px;
         background: rgba(255, 255, 255, .1);
         border: 2px solid rgba(255, 255, 255, .2);
         box-shadow: 0 0 10px rgba(0, 0, 0, .2);
         backdrop-filter: blur(50px);
         border-radius: 10px;
         color: #fff;
         padding: 40px 35px 45px;
         margin: 0 10px;
         }

         .wrapper h1 {
         font-size: 36px;
         text-align: center;
         margin-bottom: 20px;
         }

         .wrapper .input-box {
         display: flex;
         justify-content: space-between;
         flex-wrap: wrap;
         }

         .input-box .input-field {
         position: relative;
         width: 48%;
         height: 50px;
         margin: 13px 0;
         }

         .input-box .input-field input {
         width: 100%;
         height: 100%;
         background: transparent;
         border: 2px solid rgba(255, 255, 255, .2);
         outline: none;
         font-size: 16px;
         color: #fff;
         border-radius: 7px;
         padding: 15px;
         }

         .input-box .input-field select {
         width: 100%;
         height: 100%;
         position: relative;
         background: transparent;
         border: 2px solid rgba(255, 255, 255, .2);
         outline: none;
         font-size: 16px;
         color: #fff;
         border-radius: 7px;
         padding: 0 15px;
         }

         .input-box .input-field select option {
            color: #fff;
            background: #5ab5c7;
         }

         .input-box .input-field input::placeholder {
         color: #fff;
         }

         .wrapper .btn {
         width: 100%;
         height: 45px;
         border: none;
         outline: none;
         border-radius: 7px;
         box-shadow: 0 0 10px rgba(0, 0, 0, .1);
         cursor: pointer;
         font-size: 16px;
         color: #fff;
         font-weight: 600;
         margin-top: 15px;
         }

         .wrapper form > label {
            height: 300px;
            width: 325px;
            border-radius: 7px;
            justify-content: center;
            align-items: center;
            background: transparent;
            border: 1px dashed rgba(255, 255, 255, .2);
            color : #fff;
            display: flex;
            cursor: pointer;
            font-size: 35px;
            font-weight: 500;
            margin: 0 auto 30px;
         }

         .wrapper form > input {
            display: none;
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
                  <li><a class="dropdown-item active" href="update.php">Update Student</a></li>
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
         <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
               <h1>Edit Details</h1>

               <input type="file" id="studentpic" name="studentpic" accept="jpg, jpeg, png" required>
               <label for="studentpic">Upload File</label>

               <div class="input-box">
                  <div class="input-field">
                     <input type="text" name="firstname" placeholder="Student First Name" required>
                  </div>
                  <div class="input-field">
                     <input type="text" name="lastname" placeholder="Student Last Name" required>
                  </div>
               </div>

               <div class="input-box">
                  <div class="input-field">
                     <select name="section" required>
                        <option value="">Student Section</option>
                     </select>
                  </div>
                  <div class="input-field">
                  <select name="clubname" required>
                        <option value="">Club Name</option>
                     </select>
                  </div>
               </div>

               <button type="submit" name="update" class="btn bg-white">Update Student</button>

         </form>
      </div>

    </div>
</body>
</html>
<?php
   if(isset($_POST['update'])) {

      $clubname = $_POST['clubname'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $section = $_POST['section'];
      $filename = $_FILES['studentpic']['name'];
      $tempname = $_FILES['studentpic']['tmpname'];
      $folder = 'images/'.$filename;

      $query = mysqli_query($conn, "INSERT INTO clubreg (club_name, first_name,last_name, section, images) VALUES ('$clubname', '$firstname', '$lastname', '$section', '$filename')");
      
      
   }
?>