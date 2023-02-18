<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "ftpt";
// Check Connection
$con = new mysqli($servername, $username, $password, $db);
if(!$con){
    die("Error on the Connection..." . $con->conect_error);
}
// else{
//     echo '<script>alert("Database Connected")</script>';
// }
?>