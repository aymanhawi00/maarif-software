<?php
ob_start();
session_start();
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if (!isset($_SESSION["superid"]) && !isset($_SESSION['admin'])) {
   echo "<script>window.top.location='index.php'</script>";
}
include("database.php"); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin - Add Student</title>
   <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
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

         #prev-img {
            height: 200px;
            width: 200px;
            outline: none;
            border: none;
            overflow: hidden;
            background: url(images/png-clipart-computer-icons-avatar-icon-design-avatar-heroes-computer-wallpaper.png);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            z-index: -1;
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

            .dropdown-item:hover {
               background-color: #adb5bd;
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
         padding: 25px 35px 45px;
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
            margin: 10px 0;
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

      <div id="preloader"></div>

      <nav class="navbar navbar-expand-lg bg-body-tertiary" id="home-nav">
       <div class="container-fluid">
         <a class="navbar-brand" href="admin-home.php"><img src="images/navlogo.png" width="250px"></a>
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
                 Activities
              </a>
              <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="activity.php">Club Activity</a></li>
                 <li><a class="dropdown-item" href="trackattendance.php">Track Attendance</a></li>
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
                  <li><a class="dropdown-item active" href="admin-home.php">Add Student</a></li>
               </ul>
            </li>
            
            <li class="nav-item" id="logout">
               <a href="settings.php" target="_blank" id="set"><i class="fa-solid fa-gear"></i></a>
               <a class="link" onclick="con()" href="logout-admin.php">Logout</a>
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

                  <?php  
                   include("database.php");
                     if (isset($_GET['EmailRegistered'])) 
                     {
                     echo "<div class='alert alert-danger text-center'>Email already registered!</div>";
                     } else if (isset($_GET['Too_Large'])) {
                        echo "<div class='alert alert-danger text-center'>Image size too large!</div>";
                     }  else if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success text-center'>Successfully registered!</div>";
                     } else if (isset($_GET['Empty'])) {
                        echo "<div class='alert alert-danger text-center'>Fill in the blanks!</div>";
                     }
                  ?>             

                  <div class="d-flex justify-content-center">
                     <div class="d-flex justify-content-center rounded-circle mt-3" id="prev-img">
                        <div id="prev-prev"></div>
                     </div>
                  </div>

                  <div class="mt-3">
                     <label class="btn btn-primary d-flex align-items-center justify-content-center" style="width: 25% !important;" >
                     Upload Image
                     <input type="file" name="studentpic" accept=".jpg, .jpeg, .png" id="studentpic" onchange="getimgpreview(event)" style="display: none;" >
                     </label>
                  </div>

                  <div class="input-box">
                     <div id="emailfield" class="input-field">
                        <input type="email" name="email" placeholder="Email" >
                     </div>
                  </div>

                  <div class="input-box">
                     <div class="input-field">
                        <input type="text" name="firstname" placeholder="First Name" >
                     </div>
                     <div class="input-field">
                        <input type="text" name="lastname" placeholder="Last Name" >
                     </div>
                  </div>

                  <div class="input-box">
                     <div class="input-field">
                        <select id="secsel" name="section" >
                           <option value="" selected disabled>Select Section</option>
                           <?php
                              include('database.php');
                              $mysection = mysqli_query($conn, "select distinct section from sections");
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
                                 $myclubs = mysqli_query($conn, "select distinct clubs from club");
                                 while($c = mysqli_fetch_array($myclubs)) {
                              ?>
                              <option><?php echo $c['clubs']; ?></option>
                              <?php } ?>
                        </select>
                     </div>
                  </div>

                  <div class="input-box">
                     <div class="input-field" id="emailfield">
                        <input type="text" name="dob" placeholder="Date of Birth (DD/MM/YY)" >
                     </div>
                  </div>

                  <div class="input-radio">
                     <label id="gender" >Gender: </label>
                     <label class="radio">
                        <input type="radio" name="gender" value="male" >Male
                        <span></span>
                     </label>
                     <label class="radio">
                        <input type="radio" name="gender" value="female" >Female
                        <span></span>
                     </label>
                  </div>

                  <button type="submit" name="register" class="btn mt-0">Register</button>
            </form>
         </div>

         </div>
         <div class="butn"><button><a href="clubreg.php">Register Clubs Here<i id="down" class="fa-solid fa-link"></i></a></button></div>
      </div>
   
      <script>

         function con() {
            var message = confirm('Are you sure you want to logout?');
            if (message == false) {
               event.preventDefault();
            }
         }
         function getimgpreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById("prev-prev");
            var img = document.getElementById("preview-img");
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            newimg.style.objectFit = "cover";
            newimg.style.width = "100%";
            imagediv.appendChild(newimg);
            document.getElementById("prev-img").style.background = "transparent";

         }

         var loader = document.getElementById("preloader");

         window.addEventListener("load", function(){
            loader.style.display = "none";
         });

      </script>
</body>
</html>
<?php
   function generateRandomString() {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 16; $i++) {
         $randomString .= $characters[random_int(0, $charactersLength - 1)];
      }
      return $randomString;
      
   }

   if(isset($_POST['register'])) {

      $clubname = $_POST['clubname'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];
      $dateofb = $_POST['dob'];
      $password = generateRandomString();
      $section = $_POST['section'];

      $filename = $_FILES['studentpic']['name'];
      $file = $_FILES['studentpic'];
      $type = $_FILES['studentpic']['type'];
      $temp = $_FILES['studentpic']['tmp_name'];
      $size = $_FILES['studentpic']['size'];

      $ext = explode('.', $filename);
      $trueext = strtolower(end($ext));
      $allowedext = array('jpg', 'jpeg', 'png');
      $target = "images/".$filename;
      
      $queryy = "select * from studentsdetail where email = '$email'";
      $result = mysqli_query($conn, $queryy);
         
         if (mysqli_num_rows($result) > 0) {
            echo "<script>window.top.location='admin-home.php?EmailRegistered'</script>";
         }
         else
         {
            if(in_array($trueext, $allowedext) && !empty($_POST['email']) && !empty($_POST['clubname']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['gender']) && !empty($_POST['dob']) && !empty($_POST['section'])) {

               if ($size < 7000000) {

                  $hash = password_hash($password, PASSWORD_DEFAULT);
                  date_default_timezone_set('Africa/Addis_Ababa');
                  $date = date("d/m/Y");

                  $query = mysqli_query($conn, "INSERT INTO studentsdetail (first_name, last_name, club_names, section_no, gender, date_of_birth, email, pass, reg_date, img) VALUES ('$firstname', '$lastname', '$clubname', '$section', '$gender', '$dateofb', '$email', '$hash', '$date', '$filename')");


                  move_uploaded_file($temp, $target);

                  $mail = new PHPMailer\PHPMailer\PHPMailer();

                  $mail-> isSMTP();
                  $mail-> Host = 'smtp.gmail.com';
                  $mail-> SMTPAuth = true;
                  $mail-> Username = 'aymexbusy2022@gmail.com';
                  $mail-> Password = 'rhoohobzrztafafj';
                  $mail-> SMTPSecure = 'ssl';
                  $mail-> Port = 465;
                  $mail-> setFrom('aymexbusy2022@gmail.com');
                  $mail-> addAddress($email);
                  $mail-> isHTML(true);
                  $mail-> Subject = 'Login Password';
                  $mail-> Body = "
                  <div style='width: 700px; height:800px; padding: 50px 40px 0; box-sizing: border-box; color: #fff; background: #1b2b3b;  box-shadow: 0 0 0 10px rgba(255,255,255,1); border-radius: 10px; overflow: hidden;'>
            <div style='font-weight: 450; position:relative; color: #fff !important; box-sizing: border-box; height: 100%; font-size: 17px;'>
    
                <div style='display: flex; justify-content: center;'><center><img src='https://i.ibb.co/SKSKJYT/navlogo-removebg-preview.png' style='margin: 0 auto !important;' alt='Maarif Logo' height='50px'></center></div>
                    <br><br><br>
                    <span style='color: #fff !important;'>Hello $firstname,</span><br><br>
                    <span style='color: #fff !important;'>Your login password is as follows, please don't share it with anyone.</span>
                    <br><br>

                    <div style='position: relative; background-color: #3bb6d9; max-height: 60px !important; padding: 10px 20px; width: 400px; font-size: 25px; margin:auto; text-align:center; border-radius: 7px;' id='passcopy'>$password
                    <div style='font-size: 13px; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%);'>(Click to copy!)</div>
                    </div>
    
                    <br>
                    <span style='color: #fff !important;'>You can use this link to login...</span> <a href='localhost/teknofest/index.php' style='color: white;'>Login Now!</a>
    
                    
                    <br><br>
                    <br><br>
                    <span style='color: #fff !important;'>Regards,</span> <br>
                    <span style='color: #fff !important;'>Maarif School</span>
                    <br><br>
                    <center><span style='font-size: 12px; color: #fff !important;'>This is auto-generated email address please do not respond to this email address!</span></center>
                    
                    <p style='text-align:center; position: absolute; bottom: 0; left: 50%; font-size: 11px; color: #fff !important; transform: translateX(-50%); width: 100%;'> Maarif International Schools of Ethiopia &copy; 2024 | All rights reserved </p>
                </div>
                  </div>
                  <div style='border-bottom: 1px solid rgba(255,255,255,.1); position: absolute; bottom: 20px; z-index: 100; width:100%; margin-left: -70px !important;'></div>
                  <script>

                  var copyText = document.getElementById('passcopy');

                  function myFunction() {
                     
                        document.execCommand('copy');
                  }
                     
                  </script>
                  ";

                  $mail-> send();

                  echo "<script>window.top.location='admin-home.php?success'</script>";

               } else {
                  echo "<script>window.top.location='admin-home.php?Too_Large'</script>";
               }
            }
            else
            {
               echo "<script>window.top.location='admin-home.php?Empty'</script>";
            }

      }
   }

?>