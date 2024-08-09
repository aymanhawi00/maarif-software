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
                        <h3 class="text-center text-white py-3">Student Registration System</h3>
                    </div>
                    <?php 
                        RegisterFun();                        
                    ?>
                    <div class="card-body">

                    <form action="registerphp.php" method="POST" enctype="multipart/form-data">
                        <label class="btn btn-primary">
                           Upload Image Now <input type="file" style="display:none" name="image">
                        </label>
                        <input type="text" placeholder=" First Name " name="FName" class="form-control mb-2">
                        <input type="text" placeholder=" Last Name " name="LName" class="form-control mb-2">
                        <input type="text" placeholder=" User Name " name="UName" class="form-control mb-2">
                        <input type="text" placeholder=" DOB DD/MM/YYYY " name="DOB" class="form-control mb-2">
                        
                        <select name="Gender" class="form-control mb-2">
                            <option value="null"></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                        <input type="email" placeholder=" Email " name="Email" class="form-control mb-2">
                        <input type="password" placeholder=" Passowrd " name="Password" class="form-control mb-3">
                        <button class="btn btn-success" name="register">Register Now</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require_once('includes/footer.php');?>