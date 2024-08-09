<?php 
    require_once('includes/header.php');
    require_once('includes/connection.php');;

    if(isset($_GET['edit']) || isset($_SESSION['admin']))
    {
        $GetID = $_GET['edit'];
        $query = " select * from student_data where ID = '".$GetID."'";
        $result = mysqli_query($con,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            $ID = $row['ID'];
            $Img = $row['Img'];
            $FName = $row['FName'];
            $LName = $row['LName'];
            $UName = $row['UName'];
            $DOB = $row['DOB'];
            $Gen = $row['Gender'];
            $Email = $row['Email'];
            $Pass = $row['Password'];
        }
    }
?>

 <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="mt-5">
                    <img src="images/login.png" wdith="150" height="150" class="d-flex m-auto">
                </div>
                <div class="card">
                    <div class="card-title bg-dark rounded-top">
                        <h3 class="text-center text-white py-3">Update Registration System</h3>
                    </div>
                  
                    <div class="card-body">

                    <form action="update.php?S_ID=<?php echo $ID ?>" method="POST" enctype="multipart/form-data">
                    
                        <label class="btn btn-primary">
                           Upload Image Now <input type="file" style="display:none" name="image">
                        </label>
                        <img src="images/<?php echo $Img ?>" width="50" height="50" class="rounded-circle mb-2">

                        <input type="text" placeholder=" First Name " name="FName" class="form-control mb-2" value="<?php echo $FName ?>">
                        <input type="text" placeholder=" Last Name " name="LName" class="form-control mb-2" value="<?php echo $LName ?>">
                        <input type="text" placeholder=" User Name " name="UName" class="form-control mb-2" value="<?php echo $UName ?>">
                        <input type="text" placeholder=" DOB DD/MM/YYYY " name="DOB" class="form-control mb-2" value="<?php echo $DOB ?>">
                        
                        <select name="Gender" class="form-control mb-2">
                           
                           <?php 
                            if($Gen=="Male")
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

                        <input type="email" placeholder=" Email " name="Email" class="form-control mb-2" value="<?php echo $Email ?>">
                        <input type="password" placeholder=" Passowrd " name="Password" class="form-control mb-3" value="<?php echo $Pass ?>">
                        <button class="btn btn-success" name="update">Update Now</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once('includes/footer.php');?>
