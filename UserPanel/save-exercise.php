<?php
session_start();
if(!isset($_SESSION['pno'])){
    header("location: ../login.php");
}
else{
    $phone_num = $_SESSION['pno'];
}
?>
<?php
$errors = array();
include("../db/conn.php");

    $id = $_GET['save'];
    $result = mysqli_query($con, "SELECT * FROM `exercise` WHERE `Exercise_id` = '$id'");
    $resultCheck = mysqli_fetch_array($result);

    // Declaring and initializing a variable
    $saveExerciseName = $resultCheck['Exercise_name'];
    $saveExerciseLink = $resultCheck['Exercise_link'];
    $saveExerciseDuration = $resultCheck['Exercise_duration'];
    $saveExerciseDescription = $resultCheck['Exercise_description'];

// Getting data from exercise and insert in user-saved-exercise table
    $checkRecord = "SELECT * FROM `saved-exercise` WHERE `Exercise_id` = '$id' AND `Patient_phone` = '$phone_num'";
    $result = mysqli_query($con, $checkRecord);
    $saved = mysqli_fetch_assoc($result);
    if($saved){
        // array_push($errors, "This item is already exists");
        // echo '<script>alert("This item is already exists")</script>';
        header("Location: ../UserPanel/patient-view-exercise.php");
        $_SESSION['e_message'] = "This item is already existing in your collection";
    }
    else if(count($errors) == 0){
        // $insertQuery = "INSERT INTO `saved-exercise` FROM `exercise`";
        $insertQuery = "INSERT INTO `saved-exercise` (`Save_exercise_name`, `Save_exercise_link`, `Save_exercise_duration`, `Save_exercise_description`, `Patient_phone`, `Exercise_id`)
        VALUES ('$saveExerciseName', '$saveExerciseLink', '$saveExerciseDuration', '$saveExerciseDescription', '$phone_num', '$id')";
        mysqli_query($con, $insertQuery);
        header("Location: ../UserPanel/patient-view-exercise.php");
        $_SESSION['s_message'] =  " Item added in your collection";
    }
    else{
        echo '<script>alert("Something went wrong")</script>';
    }
// }
?>