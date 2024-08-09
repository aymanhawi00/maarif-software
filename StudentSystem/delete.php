<?php 

    require_once('includes/connection.php');

    if(isset($_GET['Del']))
    {
        $DelID = $_GET['Del'];
        $query = " select * from student_data where ID = '".$DelID."'";
        $result = mysqli_query($con,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            $Img = $row['Img'];
        }

        $delquery = " delete from student_data where ID = '".$DelID."'";
        $resultquery = mysqli_query($con,$delquery);
        if($resultquery)
        {   
            unlink("images/$Img");
            header("location:admin-panel.php");
        }
        else
        {
            echo ' Something Wrong ';
        }
        
    }



?>