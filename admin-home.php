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
   <title>Admin - Add Student</title>
   <script src="https://kit.fontawesome.com/450cf52145.js" crossorigin="anonymous"></script>
   <link rel="icon" type="images/x-icon" href="images/maarifs-logo.png">
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

         * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: "Poppins", sans-serif;
         }

         .wrapper #picture {
            padding: 10px 0;
            color: #fff;
            border: none;
            background-color: #32afd9;
            outline: none;
            cursor: pointer;
            transition: 300ms background 0s ease-in-out;
            border-radius: 7px;
         }

         .wrapper #picture:hover {
            background-color: #adb5bd;
         }

         #studentpic {
            display: none;
         }

         body{
            transition: 300ms all 0s ease-in-out;
         }

         #down{
            color: black;
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
         }

         .btn {
            transition: 300ms background 0s ease-in-out;
         }

         #date {
            cursor: pointer;
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
            backdrop-filter: blur(50px);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 25px;
            font-weight: 400;
            background-color: transparent;
            border-top: 2px solid rgba(255, 255, 255, .2);
            border-right: 2px solid rgba(255, 255, 255, .2);
            border-left: 2px solid rgba(255, 255, 255, .2);
            outline: none;
            border-radius: 10px 10px 0 0;
            background-color: #adb5bd;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
         }
   

      .dropdown-item {
         transition: 300ms background 0s;
      }

      .nav-link {
         transition: 300ms color 0s;
      }
      
      ::selection{
         background-color: #adb5bd;
      }

         .remcon {
            position: absolute;
            top: -3rem;
            height: 3rem;
            transition: 300ms background 0s;
            right: -0.5%;
            width: 15rem;
            backdrop-filter: blur(50px);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 25px;
            font-weight: 400;
            background-color: transparent;
            border-top: 2px solid rgba(255, 255, 255, .2);
            border-right: 2px solid rgba(255, 255, 255, .2);
            border-left: 2px solid rgba(255, 255, 255, .2);
            outline: none;
            border-radius: 10px 10px 0 0;
            background-color: transparent;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
         }

         .wrapper2 a .remcon:hover {
            background-color: #0d6efd;
         }

         #club-container{
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('images/bridge3.jpg') no-repeat;
            background-size: cover;
            background-position: center;
         }

         #section-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('images/bridge3.jpg') no-repeat;
            background-size: cover;
            background-position: center;
         }

         .echstyle {
         font-weight: bold;
         color: #fff;
         position: fixed;
         text-align: center;
         bottom: 24.1%;
         font-size: 14px;
         background-color: #cc7c6c;
         border: none;
         outline: none;
         border-radius: 13px;
         padding: 3px 7px;
         box-shadow: 0 0 5px rgba(0, 0, 0, .2);
      }

         .dropdown-item:hover {
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

      .dropdown-item {
         transition: 300ms background 0s;
      }

      ::selection{
         background-color: #adb5bd;
      }

      .nav-link {
         transition: 300ms color 0s;
      }

      nav {
         position: fixed !important;
         top: 0 !important;
         width: 100% !important;
         z-index: 2;
      }

         i:hover {
            color: #A9A9A9;
         }

         .form-container {
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 100vh;
         background: url('images/bridge3.jpg') no-repeat;
         background-size: cover;
         background-position: center;
         transition: 300ms all 0s ease-in-out;
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

         .wrapper2 .input-box {
         display: flex;
         justify-content: space-between;
         flex-wrap: wrap;
         }

         .wrapper2 .input-box .input-field {
         position: relative;
         width: 90%;
         height: 50px;
         margin: 17px 0;
         }

         #emailfield {
            width: 100%;
         }

         .wrapper .input-box .input-field {
         position: relative;
         width: 48%;
         height: 50px;
         margin: 13px 0;
         }

         .wrapper2 h1 {
         font-size: 37px;
         text-align: center;
         margin-bottom: 20px;
         }

         .wrapper2 .input-box {
         display: flex;
         justify-content: center;
         flex-wrap: wrap;
         }

         .wrapper .input-box .input-field input {
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

         .wrapper2 .input-box .input-field input {
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

         .wrapper .input-box .input-field select {
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

         .wrapper .input-box .input-field select option {
            color: black;
            background: transparent;
         }

         .input-box .input-field input::placeholder {
         color: #fff;
         }

         .wrapper .btn {
         width: 100%;
         height: 45px;
         background: #fff;
         border: none;
         outline: none;
         border-radius: 7px;
         box-shadow: 0 0 10px rgba(0, 0, 0, .1);
         cursor: pointer;
         font-size: 16px;
         color: #333;
         font-weight: 600;
         margin-top: 15px;
         }

         

         #pic {
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
            display: block;
         }

         .wrapper2 {
         width: 500px;
         background: rgba(255, 255, 255, .1);
         border: 2px solid rgba(255, 255, 255, .2);
         box-shadow: 0 0 10px rgba(0, 0, 0, .2);
         border-radius: 0 0 10px 10px;
         color: #fff;
         background: transparent;
         backdrop-filter: blur(50px);
         padding: 75px 35px;
         margin: 0 10px;
         position: relative;
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

         .wrapper2 .btn:hover {
            background-color: #adb5bd;
         }
         

         .wrapper .btn:hover {
            background-color: #adb5bd;
         }
         

         .radio input[type="radio"] {
            display: none;
         }

         .radio input[type="radio"]:checked ~ span:after{
            transform: translateX(-50%) translateY(-50%) scale(1);
         }

         .radio span{
            height: 20px;
            width: 20px;
            border-radius: 50%;
            position: absolute;
            top: 4px;
            cursor: pointer;
            left: 0;
            border: 3px solid #fff;
            display: block;
         }

         .radio span:after {
            content: "";
            height: 8px;
            width: 8px;
            background-color: #fff;
            diplay: block;
            position: absolute;
            left: 50%;
            border-radius: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%) scale(0);
            transition: 230ms ease-in-out 0s;
         }

         .input-radio {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 15px 0;
            font-size: 21px;
         }

         .radio{
            font-size: 19px;
            display: inline-block;
            vertical-align: middle;
            position: relative;
            padding-left: 27px;
            
         }
         .radio + .radio {
            margin-left: 20px;
         }

         .wrapper2 .btn {
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

         .relative {
            position: relative;
         }

         .butn {
            position: absolute;
            bottom: 3.5%;
            left: 50%;
            transform: translateX(-50%);
         }

         html {
            scroll-behavior: smooth !important;
         }

         .butn button {
            height: 50px;
            width: 300px;
            position: relative;
            border-radius: 25px;
            background: #fff;
            color: black;
            cursor: pointer;
            border: none;
            box-shadow: 0 0 25px rgba(0, 0, 0, .1);
            outline: none;
            transition: 300ms background 0s ease-in-out;
         }

         .butn a {
            text-decoration: none;
            color: black;
            font-size: 17.9px;
            margin-right: -23px;
            font-weight: 450;
         }

         .butn button:hover {
            background-color: #adb5bd;
         }

         #gender {
            margin-right: 15px;
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
                        <li><a class="dropdown-item active" href="admin-home.php">Add Student</a></li>
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


      <div class="relative">
         <div class="form-container">

         <div class="wrapper">
            <form action="admin-home.php" method="post" enctype="multipart/form-data">
                  <h1>Registration</h1>

                  <input type="file" name="studentpic" id="studentpic" accept="jpg, jpeg, png" >

                  <?php/*
                     $res = mysqli_query($conn, "select images from clubreg");
                     while($row = mysqli_fetch_assoc($res)) {
                        */
                  ?>

                  <?php/*<img id="pic" src="images/<?php/* echo $row['images']*/ ?>

                  <?php // } ?>

                  <label for="studentpic" class="btn" id="picture">Upload Student Picture</label>

                  <div class="input-box">
                     <div id="emailfield" class="input-field">
                        <input type="text" name="email" placeholder="Email" required>
                     </div>
                  </div>

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
                        <select id="secsel" name="section" required>
                           <option value="" selected disabled>Select Section</option>
                           <?php
                              include('database.php');
                              $mysection = mysqli_query($conn, "select * from sections");
                              while($c = mysqli_fetch_array($mysection)) {
                           ?>
                           <option><?php echo $c['section']; ?></option>
                           <?php } ?>
                        </select>
                     </div>
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

                  <div class="input-box">
                     <div class="input-field">
                        <input type="password" name="password" placeholder="Password" required>
                     </div>
                     <div class="input-field">
                        <input type="text" onfocus="(this.type='date')" id="date" name="dob" placeholder="Date of Birth" required>
                     </div>
                  </div>

                  <div class="input-radio">
                     <label id="gender">Gender: </label>
                     <label class="radio">
                        <input type="radio" name="gender" value="male">Male
                        <span></span>
                     </label>
                     <label class="radio">
                        <input type="radio" name="gender" value="female">Female
                        <span></span>
                     </label>
                  </div>

                  <button type="submit" name="register" class="btn">Register</button>
            </form>
         </div>

         </div>
         <div class="butn"><button><a href="clubreg.php">Register Clubs Here<i id="down" class="fa-solid fa-link"></i></a></button></div>
      </div>

</body>
</html>
<?php
   if(isset($_POST['register'])) {

      $clubname = $_POST['clubname'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];
      $dateofb = $_POST['dob'];
      $password = $_POST['password'];
      $section = $_POST['section'];
      $filename = $_FILES['studentpic'];

      $query = "INSERT INTO studentsdetail (first_name,	last_name, club_names, section_no, gender, date_of_birth, email, pass, img) VALUES ('$firstname', '$lastname', '$clubname', '$section', '$gender', '$dateofb', '$email', '$password', '$filename')";

      // $mysql_run = 
      mysqli_query($conn, $query);
      
      /* if (move_uploaded_file($tempname, $folder)) {
         echo "<p class='echstyle'>Successfully uploaded file!</p>";
      } else {
         echo "<p class='echstyle'>File not uploaded!</p>";
      }
      */
      if ($mysql_run) {
         header("Location: admin-home.php");
      } else {
         header("Location: admin-home.php");
      }
   }
?>