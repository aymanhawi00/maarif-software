<?php 
    session_start();
    require_once('includes/connection.php');
    if(isset($_POST['login']))
    {
        if(empty($_POST['email']) || empty($_POST['password']))
        {
            header("location:login.php?empty");
            exit();
        }
        else
        {
            $User = mysqli_real_escape_string($con,$_POST['email']);
            $Pass = mysqli_real_escape_string($con,$_POST['password']);

            $query = " select * from student_data where UName='".$User."' or Email='".$User."'";
            $result = mysqli_query($con,$query);

            if($row = mysqli_fetch_assoc($result))
            {
                //De Hasing Password
                $Hash = password_verify($Pass,$row['Password']);

                if($Hash==false)
                {
                    header("location:login.php?pinvalid");
                    exit();
                }
                elseif($Hash==true)
                {
                    $_SESSION['StudentID']=$row['ID'];
                    $StudentID=$row['ID'];
                    header("location:view.php?success=$StudentID");
                }

            }
            else
            {
                header("location:login.php?invalid");
                exit();
            }

        }
    }
    else
    {
        header("location:login.php");
        exit();
    }
    
?>