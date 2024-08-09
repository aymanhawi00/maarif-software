<?php 


    //Register Function
    function RegisterFun()
    {
        
        $Message = "";
        if(isset($_GET['Empty']))
        {
            $Message = " Please Fill in the Blanks ";
            echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
        }
       
        if(isset($_GET['characters']))
        {
            $Message = " Please Enter Valid Characters ";
            echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
        }

        if(isset($_GET['ValidEmail']))
        {
            $Message = " Please Enter Valid Email ";
            echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
        }

        if(isset($_GET['UserTaken']))
        {
            $Message = " User Name Already Taken ";
            echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
        }

        if(isset($_GET['EmailTaken']))
        {
            $Message = " Email Already Taken ";
            echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
        }


        if(isset($_GET['Invalid_Format']))
        {
            $Message = " Invalid Format ";
            echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
        }

        if(isset($_GET['Too_Large']))
        {
            $Message = " Image Size Too Large ";
            echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
        }

        if(isset($_GET['success']))
        {
            $Message = " You have Successfully Register Now ";
            echo '<div class="alert alert-success text-center">'.$Message.'
                 <a href="login.php">Login Now</a>
                </div>';
        }
        
    }

    function loginfun()
    {

        $Message = "";
        if(isset($_GET['empty']))
        {
            $Message = " Please Fill in the Blanks ";
            echo ' <div class="alert alert-danger text-center">'.$Message.'</div> ';
        }

        if(isset($_GET['invalid']))
        {
            $Message = " User Name Not Match ";
            echo ' <div class="alert alert-danger text-center">'.$Message.'</div> ';
        }

        if(isset($_GET['pinvalid']))
        {
            $Message = " Password Not Match ";
            echo ' <div class="alert alert-danger text-center">'.$Message.'</div> ';
        }

        if(isset($_SESSION['StudentID']))
        {
            header("location:index.php");
        }

    }
?>