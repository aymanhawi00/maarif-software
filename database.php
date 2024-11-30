<?php

$db_server = "localhost";
$db_pass = "";
$conn = "";
$db_name = "studentsdb";
$db_user = "root";

try {

   $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

} 
catch (mysqli_sql_exception) {

   echo "<p style='font-weight: bold; color: #fff; position: fixed;text-align: center;bottom: 15%;font-size: 23px;background-color: #cc7c6c;border: none;outline: none;border-radius: 13px;padding: 3px 7px;box-shadow: 0 0 5px rgba(0, 0, 0, .2)'>Error connecting to database</p>";
   
}

?>