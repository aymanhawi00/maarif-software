<?php

    ob_start();
    session_start();

    include("database.php"); 

    if (!isset($_SESSION["superid"])) {
        echo "<script>window.top.location='settings.php?actionnotallowed'</script>";
    }

    if (!isset($_SESSION["superid"]) || !isset($_SESSION['admin'])) {
        echo "<script>window.top.location='index.php'</script>";
    }

    if (isset($_POST['trackerregister'])) {

        $trackeremail = $_POST['trackeremail'];
        $trackerusername = $_POST['trackerusername'];
        $trackername = $_POST['trackerfullname'];
        $trackerpassword = $_POST['trackerpassword'];

        $trackquery = "SELECT * FROM attendance_trackers";
        $trackerres = mysqli_query($conn, $trackquery);
        $row = mysqli_fetch_assoc($trackerres);


        if ($trackeremail != $row['tracker_email'] || $trackerusername != $row['tracker_username']) {

            $trackersql = "INSERT INTO attendance_trackers (tracker_email, tracker_username, tracker_name, tracker_password) VALUES ('$trackeremail', '$trackerusername', '$trackername', '$trackerpassword')";
            mysqli_query($conn, $trackersql);

        } else
        if ($trackerusername == $row['tracker_username'] && $trackeremail == $row['tracker_email']) {

            echo "<script>window.top.location='attendancetracker.php?bothexists_track'</script>";

        } else if ($trackeremail == $row['tracker_email']) {
            echo "<script>window.top.location='attendancetracker.php?emailexists_track'</script>";
        } else if ($trackerusername == $row['tracker_username']) {
            echo "<script>window.top.location='attendancetracker.php?usernametaken_track'</script>";
        }
    }
?>
<?php

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    include("database.php");

    $adminquery = "SELECT * FROM admins";
    $adminres = mysqli_query($conn, $adminquery);

    if (isset($_POST['reset'])) {

        function generateRandomString() {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 16; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            return $randomString;
            
        }

        $newpass = generateRandomString();
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail-> isSMTP();
        $mail-> Host = 'smtp.gmail.com';
        $mail-> SMTPAuth = true;
        $mail-> Username = 'aymexbusy2022@gmail.com';
        $mail-> Password = 'rhoohobzrztafafj';
        $mail-> SMTPSecure = 'ssl';
        $mail-> Port = 465;
        $mail-> setFrom('aymexbusy2022@gmail.com');
        $mail-> addAddress($_POST['email']);
        $mail-> isHTML(true);
        $mail-> Subject = 'Reset Password';
        $mail-> Body = "
        <div style='width: 700px; height:700px; padding: 50px 40px 0; box-sizing: border-box; color: #fff; background: #1b2b3b;  box-shadow: 0 0 0 10px rgba(255,255,255,1); border-radius: 10px; overflow: hidden;'>
        <div style='font-weight: 450; position:relative; color: #fff !important; box-sizing: border-box; height: 100%; font-size: 17px;'>

            <div style='display: flex; justify-content: center;'><center><img src='https://i.ibb.co/SKSKJYT/navlogo-removebg-preview.png' style='margin: 0 auto !important;' alt='Maarif Logo' height='50px'></center></div>
                <br><br><br>
                <span style='color: #fff !important;'>Hello there,</span><br><br>
                <span style='color: #fff !important;'>Your new password is as follows, please don't share it with anyone.</span>
                <br><br>

                <div style='position: relative; background-color: #3bb6d9; max-height: 60px !important; padding: 10px 20px; width: 400px; font-size: 25px; margin:auto; text-align:center; border-radius: 7px;' id='passcopy'>$newpass
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


        $hashkey = password_hash($newpass, PASSWORD_DEFAULT);
        $query = "UPDATE studentsdetail SET pass = '".$hashkey."' WHERE email = '".$_POST['email']."'";
        mysqli_query($conn, $query);

        $mail-> send();

        echo "
            <script>
                window.top.location='settings.php?successful';
            </script>
        ";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendace Tracker - Settings</title>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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

    #setting:hover {
        background: #fff !important;
    }

    body {
        background: url(images/bridge3.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        backdrop-filter: blur(10px);
        min-height: 100vh !important;
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


     #home-nav {
        position: relative !important;
     }

    .ui-w-80 {
        width : 80px !important;
        height: auto;
    }

    .btn-default {
        border-color: rgba(24, 28, 33, 0.1);
        background  : rgba(0, 0, 0, 0);
        color       : #4E5155;
    }

    label.btn {
        margin-bottom: 0;
    }

    .btn-outline-primary {
        border-color: #26B4FF;
        background  : transparent;
        color       : #26B4FF;
    }

    .btn {
        cursor: pointer;
    }

    .text-light {
        color: #babbbc !important;
    }

    .btn-facebook {
        border-color: rgba(0, 0, 0, 0);
        background  : #3B5998;
        color       : #fff;
    }

    .btn-instagram {
        border-color: rgba(0, 0, 0, 0);
        background  : #000;
        color       : #fff;
    }

    .card {
        background-clip: padding-box;
        box-shadow     : 0 1px 4px rgba(24, 28, 33, 0.012);
    }

    .row-bordered {
        overflow: hidden;
    }

    .account-settings-fileinput {
        position  : absolute;
        visibility: hidden;
        width     : 1px;
        height    : 1px;
        opacity   : 0;
    }

    .account-settings-links .list-group-item.active {
        font-weight: bold !important;
    }

    html:not(.dark-style) .account-settings-links .list-group-item.active {
        background: transparent !important;
    }

    .account-settings-multiselect~.select2-container {
        width: 100% !important;
    }

    .light-style .account-settings-links .list-group-item {
        padding     : 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }

    .light-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }

    .material-style .account-settings-links .list-group-item {
        padding     : 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }

    .material-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }

    .dark-style .account-settings-links .list-group-item {
        padding     : 0.85rem 1.5rem;
        border-color: rgba(255, 255, 255, 0.03) !important;
    }

    .dark-style .account-settings-links .list-group-item.active {
        color: #fff !important;
    }

    .light-style .account-settings-links .list-group-item.active {
        color: #4E5155 !important;
    }

    .light-style .account-settings-links .list-group-item {
        padding     : 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
    nav {
        position: fixed !important;
        top: 0 !important;
        width: 100% !important;
        z-index: 10;
    }
    #logout {
        position: absolute !important;
        right: 50px !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
    }
    .table-dark td {
        background-color: black !important;
    }

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

<div class="container-md light-style flex-grow-1 container-p-y" id="contain">

    <div class="card overflow-hidden" style="margin-top: 10% !important; background-color: #f9f9f9;">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <span class="list-group-item fs-4 list-group-item-action active"
                         id="setting" style="font-weight: 600 !important;">Settings</span>
                         <a class="list-group-item list-group-item-action"
                        href="settings.php">Manage Activities</a>
                    <a class="list-group-item list-group-item-action" 
                        href="superadmins.php">Add Super-Admin</a>
                    <a class="list-group-item list-group-item-action" 
                        href="addadmins.php">Add Admin</a>
                    <a class="list-group-item list-group-item-action"
                        href="manageadmins.php">Manage Admin</a>
                        <a class="list-group-item list-group-item-action active"
                        href="attendancetracker.php">Add Attendance Tracker</a>
                        <a class="list-group-item list-group-item-action"
                        href="managetrackers.php">Manage Trackers</a>
                    <a class="list-group-item list-group-item-action"
                        href="managestudents.php">Manage Students</a>
                </div>
            </div>

            <div class="col-md-9" style="min-height: 700px;">
                <div class="tab-content">

                        <div class="tab-pane fade show" id="activities">
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <form action="settings.php" method="post">
                                    <div class="form-group fw-light" style="font-family: 'Poppins', sans-serif;">
                                        <label for="title" class="d-block text-capitalize fs-5">title</label>
                                        <input  name='title' style="height: 50px !important; width: 700px; border-radius: 10px; font-size: 1rem; border: 1px solid #a0a0a0; padding: 10px;" maxlength="50"; type="text">
                                    </div>
                                    <div class="form-group fw-light" style="font-family: 'Poppins', sans-serif;">
                                    <label for="parone" class="d-block text-capitalize fs-5">Paragraph 1</label>
                                        <textarea  name='parone' style="height: 200px !important; width: 700px; border: 1px solid #a0a0a0; border-radius: 10px; font-size: 1rem; padding: 10px;" maxlength="450";></textarea>
                                    </div>
                                    <div class="form-group fw-light" style="font-family: 'Poppins', sans-serif;">
                                        <label for="partwo" class="d-block text-capitalize fs-5">Paragraph 2</label>
                                        <textarea  name='partwo' style="height: 200px !important; width: 700px; border: 1px solid #a0a0a0; border-radius: 10px; font-size: 1rem;  padding: 10px;" maxlength="600";></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn-md fs-5 border-0 bg-primary px-4 py-2 text-white" style="border-radius: 10px;" name="save">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="send-link">
                            <div class="card-body pb-2">
                                <form action="settings.php" method="post" style="font-family: 'Poppins', sans-serif;">
                                    <?php
                                        if(isset($_GET['successful'])) {
                                            echo "<div class='alert alert-success text-center'>Sent successfully!</div>";
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label class="form-label">Student Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Reset password</label>
                                        <button class="bg-success d-block btn btn-md text-white" name="reset">Send link</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane fade show" id="add-admins">
                            <div class="card-body pb-2">
                                <form action="addadmins.php" method="post" style="font-family: 'Poppins', sans-serif;" class="mt-1">
                                <?php
                                    if(isset($_GET['adminusernametaken'])) {
                                        echo "<div class='alert alert-danger text-center'>Username already taken!</div>";
                                    } else if(isset($_GET['adminemailexists'])) {
                                        echo "<div class='alert alert-danger text-center'>Email already taken!</div>";
                                    } else if(isset($_GET['bothexists'])) {
                                        echo "<div class='alert alert-danger text-center'>Email & username exists!</div>";
                                    }
                                ?>
                                    <div class="form-group">
                                        <label class="form-label">Admin Email</label>
                                        <input type="text" name="email" class="form-control w-50">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Admin Name</label>
                                        <input type="text" name="name" class="form-control w-50">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Admin Username</label>
                                        <input type="text" name="username" class="form-control w-50">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Admin Password</label>
                                        <input type="text" name="password" class="form-control w-50">
                                    </div>

                                    <div class="form-group">
                                        <button class="bg-success d-block btn btn-md text-white" name="register">Register</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane fade show active">
                            <div class="card-body pb-2">
                                <form action="attendancetracker.php" method="post" style="font-family: 'Poppins', sans-serif;" class="mt-1">
                                <?php
                                    if(isset($_GET['usernametaken_track'])) {
                                        echo "<div class='alert alert-danger text-center'>Username already taken!</div>";
                                    } else if(isset($_GET['emailexists_track'])) {
                                        echo "<div class='alert alert-danger text-center'>Email already taken!</div>";
                                    } else if(isset($_GET['bothexists_track'])) {
                                        echo "<div class='alert alert-danger text-center'>Email & username exists!</div>";
                                    }
                                ?>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="trackeremail" class="form-control w-50">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tracker Name</label>
                                        <input type="text" name="trackerfullname" class="form-control w-50">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="trackerusername" class="form-control w-50">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="text" name="trackerpassword" class="form-control w-50">
                                    </div>

                                    <div class="form-group">
                                        <button class="bg-success d-block btn btn-md text-white" name="trackerregister">Register</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane fade show" id="add-super-admins">
                            <div class="card-body pb-2">
                                <form action="superadmins.php" method="post" style="font-family: 'Poppins', sans-serif;" class="mt-1">
                                    <?php
                                        if(isset($_GET['superusernametaken'])) {
                                            echo "<div class='alert alert-danger text-center'>Username already taken!</div>";
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label class="form-label">Nick Name</label>
                                        <input type="text" name="name" class="form-control w-50">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control w-50">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="text" name="password" class="form-control w-50">
                                    </div>

                                    <div class="form-group">
                                        <button class="bg-success d-block btn btn-md text-white" name="register">Register</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane fade show" id="manage-admins">
                            <div class="card-body pb-2">
                                <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-title">
                                                </div>
                                                <div class="card-body">
                                                <?php
                                                if (isset($_GET['delete'])) {

                                                    $delid = $_GET['delete'];
                                                    $deletequery = "select * from admins where id = '$delid'";
                                                    $resultt = mysqli_query($conn, $deletequery);
                                                    
                                                    $delquery = "delete from admins where id = '$delid';";

                                                    mysqli_query($conn, $delquery);
                                                    
                                                } 
                                                ?>
                                                <table class="table table-striped">

                                                    <tr>
                                                        <div class="d-flex align-items-start justify-content-start mb-4">

                                                            <form action="searchadmin.php" method="POST">
                                                                <div class="d-flex align-items-start justify-content-between">
                                                                    <input type="text" placeholder="Search Records" class="form-control d-inline-block" name="search">
                                                                    <button class="btn btn-dark text-white ms-1" name="find">Search</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </tr>
                                                        
                                                    <tr class="td table-dark text-white">
                                                            <td>
                                                                Name
                                                            </td>
                                                            <td>
                                                                Username
                                                            </td>
                                                            <td>
                                                                Password
                                                            </td>
                                                            <td>
                                                                Email
                                                            </td>
                                                            <td colspan="5">
                                                                Operations
                                                            </td>
                                                        </tr>
                                                            <?php
                                                            while($row=mysqli_fetch_assoc($adminres)) {
                                                                $adminid = $row['id'];
                                                                $adminname = $row['admin_name'];
                                                                $adminemail = $row['admin_email'];
                                                                $adminpass = $row['pass'];
                                                                $adminusername = $row['username'];                 
                                                            ?>
                                                            <tr style="border-style: none !important;">
                                                                <td><?php echo "<span style='text-transform: capitalize'>$adminname</span>"; ?></td>
                                                                <td><?php echo $adminusername; ?></td> 
                                                                <td><?php echo $adminpass; ?></td>  
                                                                <td><?php echo $adminemail; ?></td>  
                                                                <td><a href="adminupdate.php?edit=<?php echo $adminid; ?>" class="btn btn-primary btn-sm">Edit</a></td>    
                                                                <td><a href="settings.php?delete=<?php echo $adminid; ?>" onclick="con()" class="btn btn-danger btn-sm">Delete</a></td>      
                                                            </tr>
                                                            <?php } ?>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function(){
        loader.style.display = "none";
    });
</script>
</body>

</html>
<?php
include("database.php");
try {
if (isset($_POST['save'])) {

    $newpar1 = $_POST['parone'];
    $newpar2 = $_POST['partwo'];
    $newtitle = $_POST['title'];

    $updatequery = "UPDATE activities SET title = '$newtitle', par_one = '$newpar1', par_two = '$newpar2' WHERE id = 0";
    mysqli_query($conn, $updatequery);
}
} catch (Exception $e) {
    echo $e->getMessage();
}
?>