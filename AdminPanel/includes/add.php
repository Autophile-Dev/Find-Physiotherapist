<?php
// Connecting to database
    include("../db/conn.php");
    // Initializing variables 
    $errors = array();
    if(isset($_POST['reg_physio'])){
        // Receiving all inputs from add-therapist.php page
        $physioName = mysqli_real_escape_string($con, $_POST['pname']);
        $physioMail = mysqli_real_escape_string($con, $_POST['pmail']);
        $physioAddress = mysqli_real_escape_string($con, $_POST['paddress']);
        $physioPhone = mysqli_real_escape_string($con, $_POST['physiotherapist_phone']);
        $physioQualification = mysqli_real_escape_string($con, $_POST['pqualification']);
        $physioExperience = mysqli_real_escape_string($con, $_POST['pexperience']);
        $physioPassword_1 = mysqli_real_escape_string($con, $_POST['ppassword']);
        $physioPassword_2 = mysqli_real_escape_string($con, $_POST['cpassword']);
        $physioGender = mysqli_real_escape_string($con, $_POST['gender']);
        // Update form validation: ensure that the form is correctly filled...
        // by adding (array_push()) corresponding error into $errors array
        if(empty($physioName)){array_push($errors, "Physiotherapist name is required"); echo '<script>alert("Name is required... Please enter the name")</script>';}
        if(empty($physioMail)){array_push($errors, "Physiotherapist email is required");echo '<script>alert("Email is required... Please enter the valid email")</script>';}
        if(empty($physioAddress)){array_push($errors, "Physiotherapist address is required");echo '<script>alert("Address is required... Please enter the address")</script>';}
        if(empty($physioPhone)){array_push($errors, "Physiotherapist phone is required");echo '<script>alert("Phone number is required... Please enter the valid Phone number")</script>';}
        if(empty($physioQualification)){array_push($errors, "Physiotherapist qualification is required");echo '<script>alert("Qualification is required... Please enter the qualification")</script>';}
        if(empty($physioExperience)){array_push($errors, "Physiotherapist Experience is required");echo '<script>alert("Experience is required... Please enter the Experience")</script>';}
        if(empty($physioPassword_1)){array_push($errors, "Password is required");echo '<script>alert("Password is required... Please enter the Password")</script>';}
        if(empty($physioGender)){array_push($errors, "Physiotherapist gender name is required");echo '<script>alert("Gender is required... Please select the gender")</script>';}
        if($physioPassword_1 != $physioPassword_2){array_push($errors, "Password is not match with confirm password");echo '<script>alert("Password is not matched with confirm password")</script>';}
        // Check database for make sure a physiotherapist does not exist with same phone number 
        $physio_check = "SELECT * FROM `physiotherapist` WHERE `Physio_phone` = '$physioPhone' LIMIT 1";
        $result = mysqli_query($con, $physio_check);
        $physio = mysqli_fetch_assoc($result);
        if($physio){
            // If physiotherapist exists
            if($physio['Physio_phone'] === $physioPhone){
                array_push($errors, "This phone number is already exists");
                echo '<script>alert("This phone number is already exists try another phone number")</script>';
            }
        }
        if(count($errors) == 0){
            $password = md5($physioPassword_1); //encrypt the password
            $addQuery = "INSERT INTO physiotherapist (Physio_name, Physio_address, Physio_email, Physio_gender, Physio_qualification, Physio_experience, Physio_password, Physio_phone)
            VALUES ('$physioName', '$physioAddress', '$physioMail', '$physioGender', '$physioQualification', '$physioExperience', '$password', '$physioPhone')";
            mysqli_query($con, $addQuery);
            $_SESSION['message'] = "Record Added Successfully";
            
        }
    }
?>