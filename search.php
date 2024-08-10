<?php
include("database.php");
ob_start();
session_start();
if (!isset($_SESSION["superid"]) && !isset($_SESSION['admin'])) {
    echo "<script>window.top.location='index.php'</script>";
}
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
 }
    $query = "SELECT * FROM studentsdetail";
    $res = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <script src="https://kit.fontawesome.com/450cf52145.js" crossorigin="anonymous"></script>
    <link rel="icon" type="images/x-icon" href="images/maarifs-logo.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
         min-height: 100vh;
         background: url('images/bridge3.jpg') no-repeat;
         background-size: cover;
         background-position: center;
         transition: 300ms all 0s ease-in-out;
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
      #title {
        background-color: #2691c7 !important;
      }
      .td td {
        padding: 8px;
        /* background-color: #3bb6d9 !important; */
        color: #fff !important;
        border: none !important;
      }
      #card {
         display: flex !important;
         justify-content: center !important;
         align-items: center !important;
      }
      .dropdown-item:hover {
         background-color: #adb5bd;
      }
      .card-body {
        position: relative !important;
      }
      .form-control {
        width: 70% !important;
      }
      #set {
            position: inherit;
            left: -2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: #3bb6d9;
            cursor: pointer;
            transition: 300ms color 0s;
      }

      i:hover {
         color: #A9A9A9;
      }
      .wi {
        width: 70%;
      }
      #homenav {
         position: relative;
      }
      #logout {
            position: absolute !important;
            right: 50px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
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

                    <li class="nav-item active">
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

            <?php
include("database.php");

$row = mysqli_fetch_assoc($res); 

if(isset($_POST['find']))
    {
        $search = $_POST['search'];
        $query = " select * from studentsdetail where email='$search' or first_name='$search' or last_name='$search' or gender='$search' or club_names='$search' or section_no='$search'";
        $res = mysqli_query($conn, $query);

        $userid = is_null($row['student_id']) ? 0 : $row['student_id'];
        $fname = is_null($row['first_name']) ? 0 : $row['first_name'];
        $lname = is_null($row['last_name']) ? 0 : $row['last_name'];
        $img = is_null($row['img']) ? 0 : $row['img'];
        $email = is_null($row['email']) ? 0 : $row['email'];
        $club = is_null($row['club_names']) ? 0 : $row['club_names'];
        $section = is_null($row['section_no']) ? 0 : $row['section_no'];


            if ($search == $fname || $search == $lname || $search == $email || $search == $club || $search == $section) {
                    echo "
                    <div class='container-lg'>
                        <div class='row'>
                            <div class='col'>
                                <div class='card text-white mt-5 mb-1' id='title'>
                                    <h3 class='border-0 text-center pt-3 pb-2'>
                                        Admin Panel
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col'>
                                <div class='card'>
                                    <div class='card-title'>
                                    </div>
                                    <div class='card-body'>
                                    <table class='table table-striped'>

                                    <tr>
                                        <div class='d-flex align-items-start justify-content-between'>
                                            <a href='admin-home.php' class='btn bg-secondary text-white px-3 py-2 mb-3'>Register Now</a>
                                            <form action='search.php' method='POST'>
                                                <div class='d-flex align-items-start justify-content-between'>

                                                    <input type='text' placeholder='Search Records' class='form-control d-inline-block' name='search'>
                                                    <button class='btn btn-dark text-white' name='find'>Search</button>
                                                </div>
                                            </form>

                                            
                                        </div>
                                    </tr>
                                        
                                    <tr class='td table-dark text-white'>
                                            <td class='text-center'>
                                                Image
                                            </td>
                                            <td class='py-8'>
                                                Student Name
                                            </td>
                                            <td>
                                                Club Name
                                            </td>
                                            <td>
                                                Section
                                            </td>
                                            <td colspan='7'>
                                                Operations
                                            </td>
                                        </tr>              


                                    <tr style='border-style: none !important;'>
                                        <td class='text-center'><img src='images/$img' height='60' class='rounded-circle'></td>
                                        <td><span style='text-transform: capitalize'>$fname $lname</span></td>
                                        <td>$club</td> 
                                        <td>$section</td> 
                                        <td><a href='home.php?success= $userid' class='btn btn-success btn-sm'>View</a></td>    
                                        <td><a href='update.php?edit=$userid' class='btn btn-primary btn-sm'>Edit</a></td>    
                                        <td><a href='dash.php?delete' onclick='con()' class='btn btn-danger btn-sm'>Delete</a></td>      
                                    </tr>
                                </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
            } else {
            
            echo "
            <div class='container-lg'>
                <div class='row'>
                    <div class='col'>
                        <div class='card text-white mt-5 mb-1' id='title'>
                            <h3 class='border-0 text-center pt-3 pb-2'>
                                Admin Panel
                            </h3>
                        </div>
                    </div>
                </div>
                
                <div class='row'>
                    <div class='col'>
                    <div class='card'>
                        <div class='card-title'>
                        </div>
                        <div class='card-body'>
                        <table class='table table-striped'>

                        <tr>
                            <div class='d-flex align-items-start justify-content-between'>
                                <a href='admin-home.php' class='btn bg-secondary text-white px-3 py-2 mb-3'>Register Now</a>
                                <form action='search.php' method='POST'>
                                    <div class='d-flex align-items-start justify-content-between'>

                                        <input type='text' placeholder='Search Records' class='form-control d-inline-block' name='search'>
                                        <button class='btn btn-dark text-white' name='find'>Search</button>
                                    </div>
                                </form>
                            </div>
                        </tr>
                            
                        <tr class='td table-dark text-white'>
                                <td>
                                    Image
                                </td>
                                <td class='py-8'>
                                    Student Name
                                </td>
                                <td>
                                    Club Name
                                </td>
                                <td>
                                    Section
                                </td>
                                <td colspan='7'>
                                    Operations
                                </td>
                            </tr> 
                            </table>
                            <div class='alert alert-danger'>No results found! Try another search..</div>
                            <a href='dash.php' class='btn px-3 py-2 text-decoration-none rounded-top rounded-bottom btn-primary border-0 text-white'>Reset search</a>";
            }
    }
?>
    <script>
        function con() {
            var message = confirm('Are you sure you want to delete?');
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