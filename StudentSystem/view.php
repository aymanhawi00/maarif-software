<?php 
    require_once('includes/header.php');
    require_once('includes/connection.php');

    if(isset($_SESSION['StudentID']) || isset($_SESSION['admin']))
    {
        $_SESSION['GET']=$GetID = $_GET['success'];
        $query = " select * from student_data where ID='".$GetID."'";
        $result = mysqli_query($con,$query);
     
        while($row=mysqli_fetch_assoc($result))
        {
            $StudentID = $row['ID'];
            $Image = $row['Img'];
            $FName = $row['FName'];
            $LName = $row['LName'];
            $UName = $row['UName'];
            $DOB = $row['DOB'];
            $Gender = $row ['Gender'];
            $Email = $row['Email'];
            $Date = $row['Date'];
        }
    }


    require_once('includes/footer.php');
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card bg-dark text-white mt-3">
                <h3 class="text-center py-3"> Student Personal Details</h3>
            </div>
        </div>
    </div>

    <?php
    
        if(isset($_SESSION['admin']) || $_SESSION['GET']==$_SESSION['StudentID'])
        {
            
    ?>        

    <div class="row">
        <div class="col-lg-3">
            <div class="card mt-3">
                <div class="card-title bg-primary text-white py-2 rounded-top">
                    <h4 class="text-center"><?php echo $FName." ".$LName ?></h4>
                </div>
                <div class="card-body">
                    <img src="images/<?php echo $Image ?>" width="200" height="200" class="rounded-circle">
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card mt-3">
                <table class="table table-striped">
                    <tr>
                        <td>Student ID</td>
                        <td><?php echo $StudentID ?></td>
                    </tr>

                     <tr>
                        <td>First Name</td>
                        <td><?php echo $FName ?></td>
                    </tr>

                     <tr>
                        <td>Last Name</td>
                        <td> <?php echo $LName ?> </td>
                    </tr>

                    <tr>
                        <td>User Name</td>
                        <td> <?php echo $UName ?> </td>
                    </tr>

                    <tr>
                        <td> Date of Birth</td>
                        <td> <?php echo $DOB ?> </td>
                    </tr>

                    <tr>
                        <td> Gender</td>
                        <td> <?php echo $Gender ?> </td>
                    </tr>

                    <tr>
                        <td> Email</td>
                        <td> <?php echo $Email ?> </td>
                    </tr>

                    <tr>
                        <td> Date of Registeration</td>
                        <td> <?php echo $Date ?> </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

    <?php
     }
     else
     {
         $Error = " Something Wrong ";
         echo ' <div class="alert alert-danger text-center">'.$Error.'</div>';
     }
    
    ?>
     
</div>