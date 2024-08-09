<?php

    require_once('includes/connection.php');
    if(isset($_POST['register']))
    {

        $Image = $_FILES['image']['name'];
        $Type = $_FILES['image']['type'];
        $Temp = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];

        
        $Ext = explode('.',$Image);
        $TrueExt = (strtolower(end($Ext)));
        $AllowImg = array('jpg','jpeg','png');
        $Target = "images/".$Image;
        
        $FirstName = mysqli_real_escape_string($con,$_POST['FName']);
        $LastName = mysqli_real_escape_string($con,$_POST['LName']);
        $UserName = mysqli_real_escape_string($con,$_POST['UName']);
        $DOB = mysqli_real_escape_string($con,$_POST['DOB']);
        $Gender = mysqli_real_escape_string($con,$_POST['Gender']);
        $Email = mysqli_real_escape_string($con,$_POST['Email']);
        $Pass = mysqli_real_escape_string($con,$_POST['Password']);

        if(empty($Image) || empty($FirstName) || empty($LastName) || empty($UserName) || empty($DOB) || empty($Gender) || empty($Email) || empty($Pass))
        {
            header("location:register.php?Empty");
            exit();
        }
        else
        {
            if(!preg_match("/^[a-z,A-Z]*$/",$FirstName) || !preg_match("/^[a-z,A-Z]*$/",$LastName) || !preg_match("/^[a-z,A-Z]*$/",$UserName))
            {
                header("location:register.php?characters");
                exit();
            }
            else
            {
                if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
                {
                    header("location:register.php?ValidEmail");
                    exit();
                }
                else
                {
                    $query = " select * from student_data where UName='".$UserName."'";
                    $result = mysqli_query($con,$query);

                    if(mysqli_fetch_assoc($result))
                    {
                        header("location:register.php?UserTaken");
                        exit();
                    }
                    else
                    {
                        $query = " select * from student_data where Email='".$Email."'";
                        $result = mysqli_query($con,$query);

                        if(mysqli_fetch_assoc($result))
                        {
                            header("location:register.php?EmailTaken");
                            exit();
                        }
                        else
                        {
                            $HashPass = password_hash($Pass,PASSWORD_DEFAULT);
                            date_default_timezone_set('Asia/Karachi');
                            $date = date("d/m/Y");

                            if(in_array($TrueExt,$AllowImg))
                            {

                                if($size<1000000)
                                {
                                    $query = " insert into student_data (img,FName,LName,UName,DOB,Gender,Email,Password,Date) values ('$Image','$FirstName','$LastName','$UserName','$DOB','$Gender','$Email','$HashPass','$date')";
                                    mysqli_query($con,$query);
                                    move_uploaded_file($Temp,$Target);
                                    header("location:register.php?success");
                                    exit();

                                }
                                else
                                {
                                    header("location:register.php?Too_Large");
                                    exit();
                                }

                            }
                            else
                            {
                                header("location:register.php?Invalid_Format");
                                exit();
                            }


                        }
                        
                    }
                }
            }
        }
        

    }
    else
    {
        header("location:register.php");
    }


?>