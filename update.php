<?php
ob_start();
session_start();
include("database.php");
if (!isset($_SESSION["superid"]) && !isset($_SESSION['admin'])) {
   echo "<script>window.top.location='index.php'</script>";
}

if (isset($_GET['edit']) || isset($_SESSION['admin'])) {
    $getid = $_GET['edit'];
    $query = "select * from studentsdetail where student_id = '$getid'";
    $res = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($res)) {
        $userid = $row['student_id'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $img = $row['img'];
        $email = $row['email'];
        $pass = $row['pass'];
        $dob = $row['date_of_birth'];
        $gender1 = $row['gender'];
        $clubname = $row['club_names'];
        $section = $row['section_no'];
        $date = $row['reg_date'];
    }
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

         #gender {
            margin-right: 15px;
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
            cursor: pointer;
            
         }
         .radio + .radio {
            margin-left: 20px;
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

         #set {
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
         min-height: 100vh;
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

         .wrapper form > label {
            height: 200px;
            width: 200px;
            border-radius: 7px;
            justify-content: center;
            align-items: center;
            background: transparent;
            border: 1px dashed rgba(255, 255, 255, .2);
            color : #fff;
            display: flex;
            cursor: pointer;
            overflow: hidden;
            margin: 30px auto;
            position: relative;
         }

         .wrapper form > input {
            display: none;
         }

         #home-nav {
            position: relative;
         }
         nav {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            z-index: 1000 !important;
            transition: 300ms all 0s ease-in-out;
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
                  <a href="settings.php" target="_blank" id="set"><i class="fa-solid fa-gear"></i></a>
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

               <input type="file" id="studentpic" name="studentpic" accept="jpg, jpeg, png" >
               <label for="studentpic"><img src="images/<?php echo $img;?>" style="z-index: -1; position: absolute; left: 50%; top: 50%;  transform: translateX(-50%) translateY(-50%); width: 100%;" height="200" width="200" alt="Student Image"></label>
               <div class="input-box">
                     <div style="width: 100%;" class="input-field">
                        <input type="email" name="email" value="<?php echo $email; ?>">
                     </div>
               </div>

               <div class="input-box">
                  <div class="input-field">
                     <input type="text" name="firstname" value="<?php echo $fname; ?>" >
                  </div>
                  <div class="input-field">
                     <input type="text" name="lastname" value="<?php echo $lname; ?>">
                  </div>
               </div>

               <div class="input-box">
                  <div class="input-field">
                     <select name="section" >
                        <?php echo "<option>$section</option>" ?>
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
                  <select name="clubname" >
                        <?php echo "<option>$clubname</option>" ?>
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
                     <div class="input-field d-flex align-itmes-center justify-content-start" style='width: 15%;'>
                        <div class="d-flex align-items-center" style="font-size: 15px;">
                           Date of birth:
                        </div>
                     </div>
                     <div class="input-field" style='width: 85%;'>
                        <input type="text" name="dob" value="<?php echo $dob; ?>" >
                     </div>
                  </div>

                  <div class="input-box">
                     <div style="width: 100%;" class="input-field">
                     <select name="gender">
                     <?php 
                     $GetID = $_GET['edit'];
                     $querygen = " select * from studentsdetail where student_id ='".$GetID."'";
                     $resultgen = mysqli_query($conn, $querygen);
                     while($row=mysqli_fetch_assoc($resultgen))
                     {
                        $gen = $row['gender'];
                     }
                            if($gen=="Male")
                            {
                                echo ' <option value="Male">Male</option>
                                       <option value="Female">Female</option>';
                            }
                            else 
                            {
                                echo ' <option value="Female">Female</option>
                                        <option value="Male">Male</option>';
                            }
                           
                           ?>
                     </select>
                     </div>
               </div>

               <button type="submit" name="update" class="btn bg-white">Update Student</button>

         </form>
      </div>

    </div>
    <script>
      var loader = document.getElementById("preloader");
      window.addEventListener("load", function(){
         loader.style.display = "none";
      });
    </script>
</body>
</html>
<?php
   if(isset($_POST['update'])) {

      $clubname = $_POST['clubname'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];
      $dateofb = $_POST['dob'];
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

      $GetID = $_GET['edit'];
      $queryimg = " select * from studentsdetail where student_id ='".$GetID."'";
      $resultimg = mysqli_query($conn,$queryimg);

      if ($size < 7000000 && in_array($trueext, $allowedext)) {

         while($row=mysqli_fetch_assoc($resultimg))
         {
            $Oldimg = $row['img'];
         }
         
         unlink("images/$Oldimg");
         $upquery = " update studentsdetail set img='$filename', first_name='$firstname', last_name='$lastname', email='$email', date_of_birth='$dateofb', section_no= '$section' , gender='$gender', club_names='$clubname' where student_id =$GetID ";
         
         mysqli_query($conn, $upquery);

         move_uploaded_file($temp, $target);
         echo "<script>window.top.location='update.php?edit=$GetID'</script>";



      } else {
         $upquery = " update studentsdetail set first_name='$firstname', last_name='$lastname', email='$email', date_of_birth='$dateofb', section_no= '$section' , gender='$gender', club_names='$clubname' where student_id =$GetID ";
         
      mysqli_query($conn, $upquery);
      echo "<script>window.top.location='update.php?edit=$GetID'</script>";
      }

   }
?>