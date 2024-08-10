<?php
ob_start();
session_start();
// if (isset($_SESSION['id'])) {
//     header('Location: home.php');
//  } else if (isset($_SESSION['admin'])) {
//     header('Location: admin-home.php');
//  } else if (isset($_SESSION['superid'])) {
//     header('Location: settings.php');
//  }

include("database.php");

if (isset($_POST['login'])) {

   $username = $_POST["username"];
   $password = $_POST["password"];

   $sqlpass = "SELECT * FROM admins WHERE username = '$username' && pass = '$password'";

   $res = mysqli_query($conn, $sqlpass);

   


   $sqlpassword = "SELECT * FROM studentsdetail WHERE email = '$username'";

   $result = mysqli_query($conn, $sqlpassword);




   $sqlsuper = "SELECT * FROM superadmins WHERE username = '$username' AND password = '$password'";

   $resultsuper = mysqli_query($conn, $sqlsuper);





   $sqltrack = "SELECT * FROM attendance_trackers WHERE tracker_username = '$username' AND tracker_password = '$password'";

   $resulttrack = mysqli_query($conn, $sqltrack);




   if (mysqli_num_rows($res) === 1) {
      $row = mysqli_fetch_assoc($res);
      if ($row['username'] == $username && $row['pass'] == $password) {
         $_SESSION["username"] = $row['username'];
         $_SESSION["password"] = $row['pass'];
         $_SESSION["admin"] = $row['admin_name'];
         
         echo "<script>window.top.location='admin-home.php'</script>";
      }
   } else

   if ($studentrow = mysqli_fetch_assoc($result)) {

        $hash = password_verify($password, $studentrow['pass']);

        if ($hash == TRUE) {
        $_SESSION["id"] = $studentrow['student_id'];
        $studentid = $studentrow['student_id'];
        echo "<script>window.top.location='home.php?success=$studentid'</script>";
        }
        
    } else if ($superrow = mysqli_fetch_assoc($resultsuper)) {
        if ($superrow['username'] == $username && $superrow['password'] == $password) {

            $_SESSION['superid'] = $superrow['id'];
            echo "<script>window.top.location='addadmins.php'</script>";
        }
    } else if ($trackrow = mysqli_fetch_assoc($resulttrack)) {
      if ($trackrow['tracker_username'] == $username && $trackrow['tracker_password'] == $password) {

         $_SESSION['trackid'] = $trackrow['tracker_id'];
         echo "<script>window.top.location='trackattendance.php'</script>";
     }
    } else
    {
        echo "<script>window.top.location='index.php?IncorrectPassword'</script>";
    }
}
?>