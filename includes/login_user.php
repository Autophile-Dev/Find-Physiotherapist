<?php
session_start();
// Initializing variables
$phone_num = "";
$role = "";
$errors = array();
// Connecting to database 
include('db/conn.php');
// Login Patient/Physiotherapist/Admin
if(isset($_POST['login'])){
    $phone_num = mysqli_real_escape_string($con, $_POST['pno']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    if(empty($phone_num)){array_push($errors, "Phone number is required"); echo '<script>alert("Phone number is required... Please enter the valid phone number")</script>';}
    if(empty($password)){array_push($errors, "Password is required");echo '<script>alert("Password is required... Please enter the password")</script>';}
    if(empty($role)){array_push($errors, "Select the following role");echo '<script>alert("Select the following role")</script>';}
    if(count($errors) == 0){
        // Admin password is without encryption
        $adminPassword = $password;
        // Physiotherapist and Patient password with encryption
        $password = md5($password);
        if($role === 'admin'){
            $admin_query = "SELECT * FROM `admin` WHERE `Admin_phone` = '$phone_num' AND `Admin_password` = '$adminPassword'";
            $admin_result = mysqli_query($con, $admin_query);
            if(mysqli_num_rows($admin_result) == 1){
                $_SESSION['pno'] = $phone_num;
                header('location: AdminPanel/index.php');
            }
            else{
                echo '<script>alert("Wrong input regarding to admin login")</script>';
            }
        }
        else if($role === 'physiotherapist'){
            $physio_query = "SELECT * FROM `physiotherapist` WHERE `Physio_phone` = '$phone_num' AND `Physio_password` = '$password'";
            $physio_result = mysqli_query($con, $physio_query);
            if(mysqli_num_rows($physio_result) == 1){
                $_SESSION['pno'] = $phone_num;
                header('location: PhysiotherapistPanel/physiotherapist-home.php');
            }
            else{
                echo '<script>alert("Wrong input regarding to physiotherapist login")</script>'; 
            }
        }
        else if($role === 'patient'){
            $patient_query = "SELECT * FROM `patient` WHERE `Patient_phone` = '$phone_num' AND `Patient_password` = '$password'";
            $patient_result = mysqli_query($con, $patient_query);
            if(mysqli_num_rows($patient_result) == 1){
                $_SESSION['pno'] = $phone_num;
                header('location: UserPanel/home.php');
            }
            else{
                echo '<script>alert("Wrong input regarding to Patient login")</script>'; 
            }
        }
        else{
            echo '<script>alert("Wrong Selection")</script>'; 
        }
    }
}
?>