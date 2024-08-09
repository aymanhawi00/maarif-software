<?php 
require_once('includes/header.php');
require_once('includes/function.php');
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="mt-5">
                    <img src="images/login.png" wdith="150" height="150" class="d-flex m-auto">
                </div>
                <div class="card">
                    <div class="card-title bg-dark rounded-top">
                        <h3 class="text-center text-white py-3">Student Login System</h3>
                    </div>                   
                    
                    <?php 
                      loginfun();
                    ?>

                    
                    <div class="card-body">

                    <form action="loginphp.php" method="POST">
                        <input type="text" placeholder=" Email " name="email" class="form-control mb-2">
                        <input type="password" placeholder=" Passowrd " name="password" class="form-control mb-3">
                        <button class="btn btn-success" name="login">Login Now</button>
                        <a href="register.php" class="card-link float-right">Register Now</a>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require_once('includes/footer.php');?>