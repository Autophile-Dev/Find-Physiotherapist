<?php
session_start();
// Initializing variables
$name = "";
$email = "";
$phone_num = "";
$errors = array();
// Connecting to database
include('db/conn.php');
// Register user/patient
if(isset($_POST['reg_user'])){
    // Now we're receiving all input values from the registration form
    $name = mysqli_real_escape_string($con, $_POST['pname']);
    $email = mysqli_real_escape_string($con, $_POST['pmail']);
    $phone_num = mysqli_real_escape_string($con, $_POST['patient_phone']);
    $address = mysqli_real_escape_string($con, $_POST['paddress']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $password_1 = mysqli_real_escape_string($con, $_POST['ppassword']);
    $password_2 = mysqli_real_escape_string($con, $_POST['cpassword']);
    // Registration form validation: ensure that the form is correctly filled...
    // by adding (array_push()) corresponding error into $errors array
    if(empty($name)){array_push($errors, "Patient name is required");echo '<script>alert("Patient name is required... Please enter the patient name")</script>';}
    if(empty($email)){array_push($errors, "Email is required");echo '<script>alert("Email is required... Please enter the valid email")</script>';}
    if(empty($phone_num)){array_push($errors, "Phone Number is required");echo '<script>alert("Phone number is required... Please enter the valid phone number")</script>';}
    if(empty($address)){array_push($errors, "Patient address is required");echo '<script>alert("Patient address is required... Please enter the patient address")</script>';}
    if(empty($gender)){array_push($errors, "Patient gender is required");echo '<script>alert("Patient gender is required... Please select the patient gender")</script>';}
    if(empty($password_1)){array_push($errors, "Password is required");echo '<script>alert("Password is required... Please enter the Password")</script>';}
    if($password_1 != $password_2){array_push($errors, "Your password didn't match with confirm password... plz re-type your both passwords");}
    // Check database for make sure a user/patient does not exist with same phone number 
    $user_check = "SELECT * FROM patient WHERE Patient_phone = '$phone_num' LIMIT 1";
    $result = mysqli_query($con, $user_check);
    $patient = mysqli_fetch_assoc($result);
    if($patient){
        // If patient exists
        if($patient['Patient_phone'] === $phone_num){
            array_push($errors, "This phone number is already exists");
            echo '<script>alert("This phone number is already exists try another phone number")</script>';
        }
        // header("location: registration.php");
    }
    // Register patient if there are no errors
    if(count($errors) == 0){
        $password = md5($password_1); // encrypt the password before saving in database
        $register_query = "INSERT INTO patient (Patient_name, Patient_address, Patient_email, Patient_gender, Patient_password, Patient_phone)
        VALUES ('$name', '$address', '$email', '$gender', '$password', '$phone_num')";
        mysqli_query($con, $register_query);
        // header("location: registration.php");
        echo '<script>alert("You are registered successfully")</script>';
    }

}

?>