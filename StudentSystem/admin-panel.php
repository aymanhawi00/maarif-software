<?php 
    require_once('includes/header.php');
    require_once('includes/connection.php');

    if(isset($_SESSION['admin']))
    {
       
        $query = " select * from student_data";
        $result = mysqli_query($con,$query);
    }
    else
    {
        header("location:admin-login.php");
    }        

?>

  <div class="container">
    <div class="row">
        <div class="col">
            <div class="card bg-dark text-white mt-5">
                <h3 class="text-center py-3"> Admin Panel </h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            
           <div class="card">

                <div class="card-title">
                </div>

                 <div class="card-body">
                    <table class="table table-striped">

                            <tr>
                                <a href="register.php" class="btn btn-primary mb-3">Register Now</a>
                            </tr>
                            <tr>                              
                                <form action="search.php" method="POST">
                                    <div class="form-inline float-right">
                                        <input type="text" placeholder=" Search Records" class="form-control" name="search">
                                        <button class="btn btn-success" name="find">Search</button>
                                    </div>
                                </form>

                            </tr>                               
                            

                            <tr class="bg-success text-white ">
                                <td> User ID </td>
                                <td> User Image </td>
                                <td> User Name </td>
                                <td> User Email </td>
                                <td colspan="7"> Operations </td>
                            </tr>';


                        <?php 
                            
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $UserID = $row['ID'];
                                $UserImage = $row['Img'];
                                $User = $row['UName'];
                                $UEmail = $row['Email'];
                                
                         ?>
                            <tr>
                                <td><?php echo $UserID ?></td>
                                <td><img src="images/<?php echo $UserImage ?>" class="rounded-circle" width="50" height="50"></td>
                                <td><?php echo $User ?></td>
                                <td><?php echo $UEmail ?></td>
                                <td><a href="view.php?success=<?php echo $UserID ?>" class="btn btn-success btn-sm">View</a></td>
                                <td><a href="adminedit.php?edit=<?php echo $UserID ?>" class="btn btn-primary btn-sm">Edit</a></td>
                                <td><a href="delete.php?Del=<?php echo $UserID ?>" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                         
                         <?php 
                            }                          
                         ?>                                                             
                        </table>
                      </div>

               </div>
              
                
            </div>
        </div>
    </div>

    


<?php require_once('includes/footer.php');?>