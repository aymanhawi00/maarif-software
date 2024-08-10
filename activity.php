<?php
    include("database.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://kit.fontawesome.com/450cf52145.js" crossorigin="anonymous"></script>
    <link rel="icon" type="images/x-icon" href="images/maarifs-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Club Activity</title>
    <style>
        *, *::after, *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        .first {
            height: 100vh;
            position: relative;
            background: url(images/GHXk2DpXcAAmahM.jpeg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .second {
            height: 100vh;
            position: relative;
            background: url(images/is.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .first::after {
            content: '';
            position: absolute;
            width: 100%;
            bottom: 0;
            z-index: 2;
            height: 100vh;
            background-image: linear-gradient(transparent,20%, #3bb6d9);
        }
        .title {
            position: relative;
            height: 100vh;
            color: #fff;
            z-index: 3;
        }
        .title h2{
            font-size: 100px;
            font-weight: 400;
            margin-top: -20vh;
            font-family: "Montserrat", "Helvetica Neue", sans-serif;
        }
        /* #set {
            position: inherit;
            left: -2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: #5ab5c7;
            cursor: pointer;
            transition: 300ms color 0s;
        } */
        #home-nav {
            position: relative;
        }
        .activity {
            background-color: #fff;
            padding: 10px 15px;
            border-radius: 10px;
            border: none;
            outline: none;
            width: 350px;
            text-align: center;
            text-decoration: none;
            color: #121212;
            margin-top: -90vh;
            z-index: 5;
            font-size: 19px;
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
        html {
            scroll-behavior: smooth;
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
        
    </style>
</head>
<body>
    <div id="preloader"></div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="home-nav">
            <div class="container-fluid">
            <a class="navbar-brand" href="activity.php"><img src="images/navlogo.png" width="250px"></a>
            <ul class="navbar-nav">
            
            <!-- <li class="nav-item" id="logout">
               <a href="settings.php" target="_blank" id="set"><i class="fa-solid fa-gear"></i></a>
               <a class="link" onclick="con()" href="logout.php">Logout</a>
            </li> -->
            </ul>

         </div>
    </nav>

    <section class="first">
        <div class="d-flex justify-content-center align-items-center title">
            <h2 class="text-center">Maarif Schools<br>of Ethiopia</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center" style="width: 100%;">
                <a href="#activity" class="activity">
                    See activities here below     
                </a>
        </div>
    </section>
    <section class="second" id="activity" style="background: #3bb6d9;">
        <div class="container">

        <form action="updateactivity.php" method="post">
            <div class="row" style="padding-top: 15vh; padding-bottom: 5vh; z-index: 50; position:relative;">
                <h4 class="text-white text-center fs-1" name="title1">
                    <!-- Announcements -->
                    <?php 
                        $selectquery = "SELECT * FROM activities ORDER BY id DESC LIMIT 1";
                        $result = mysqli_query($conn, $selectquery);
                
                        while ($row = mysqli_fetch_array($result)) {
                            $title = $row['title'];
                            $paragraph1 = $row['par_one'];
                            $paragraph2 = $row['par_two'];
                        }
                        echo $title;
                    ?>
                </h4>
            </div>

            <div class="row gap-2" style="z-index: 50; position:relative;">
                <div class="col-5">
                    <p class="fs-4 text-white" name="par1">
                        <?php echo $paragraph1; ?>
                        <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, eaque culpa delectus perspiciatis laudantium consequuntur alias sapiente quos quasi doloribus tempore iusto, a ut, vero ullam! In numquam quidem architecto! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, eaque culpa delectus perspiciatis laudantium consequuntur alias sapiente quos quasi doloribus tempore iusto, a ut, vero ullam! In numquam quidem architecto!  -->
                    </p>
                </div>
                <div class="col-5">
                    <img src="images/GHXk2DpXcAAmahM.jpeg" width="700" alt="Students" class="rounded-top rounded-bottom">
                </div>
            </div>

            <div class="row" style="z-index: 50; position:relative;">
                <div class="col-12">
                    <p class="fs-4 text-white pt-5" name="par2">
                    <?php echo $paragraph2; ?>
                    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis earum ut dolore alias enim ipsa ipsum libero odit modi, accusantium, itaque laborum facere? Dolore delectus sequi eaque deleniti a provident. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis earum ut dolore alias enim ipsa ipsum libero odit modi, accusantium, itaque laborum facere? Dolore delectus sequi eaque deleniti a provident. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis earum ut dolore alias enim ipsa ipsum libero odit modi, accusantium, itaque laborum facere? Dolore delectus sequi eaque deleniti a provident. -->
                    </p>
                </div>
            </div>
        </form>
        </div>
    </section>
    <script>
        var loader = document.getElementById("preloader");
      window.addEventListener("load", function(){
         loader.style.display = "none";
});
    </script>
</body>
</html>