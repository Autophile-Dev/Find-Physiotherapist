<?php
// session_start();
if(!isset($_SESSION['pno'])){
    header("location: ../login.php");
}
else{
    $phone_num = $_SESSION['pno'];
}
?>
<?php
// Connecting to database 
include("../db/conn.php");
// Initializing error variable
$errors = array();
if(isset($_POST['add-exercise'])){
    // Receiving all inputs from physio-add-therapist.php
    $exerciseName = mysqli_real_escape_string($con, $_POST['exercise-name']);
    $duration = mysqli_real_escape_string($con, $_POST['duration']);
    $link = mysqli_real_escape_string($con, $_POST['link']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    // update from validation ensure that the form is correctly filled.....
    // by adding (array_push()) corresponding error into $errors array
    if(empty($exerciseName)){array_push($errors, "Exercise name is required"); echo '<script>alert("Exercise name is required")</script>';}
    if(empty($duration)){array_push($errors, "Time duration of the particular exercise is required");echo '<script>alert("Time duration of the particular exercise is required")</script>';}
    if(empty($link)){array_push($errors, "Youtube links are required for particular exercise");echo '<script>alert("Youtube links are required for particular exercise")</script>';}
    if(empty($description)){array_push($errors, "Description is required for the particular exercise");echo '<script>alert("Description is required for the particular exercise")</script>';}
    if(count($errors) == 0){
        $addExerciseQuery = "INSERT INTO `exercise` (`Exercise_name`, `Exercise_duration`, `Exercise_link`, `Exercise_description`, `Physio_phone`)
        VALUES ('$exerciseName', '$duration', '$link', '$description', '$phone_num')";
        mysqli_query($con, $addExerciseQuery);
        $_SESSION['message'] = "Record Added Successfully";
    }
}
?>