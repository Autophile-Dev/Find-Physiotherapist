<?php
session_start();
if(!isset($_SESSION['pno'])){
    header("location: ../login.php");
}
else{
    $phone_num = $_SESSION['pno'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./physiotherapist-style/style.css">
    <title>Add Exercise</title>
</head>
<body>
<nav>
        <div class="container">
            <div class="row">
                <div class="col-12 col-xxl-2">
                    <div class="navigation-logo text-center text-xxl-start">
                        <h1 class="logo">FAPT</h1>
                    </div>
                </div>
                <div class="col-12 col-xxl-10">
                    <div class="nav-select">
                        <div class="navigation-menu text-center text-xxl-center mt-xl-2 mt-0">
                            <a href="./physiotherapist-home.php">Home</a>
                            <a href="./physio-about-us.php">About Us</a>
                            <a href="./physio-contact-us.php">Contact Us</a>
                            <a href="./physio-terms-and-condition.php">Terms & Conditions</a>
                            <a href="./physio-add-exercise.php">Add Exercise</a>
                            <a href="./physio-view-exercise.php">View Exercises</a>
                            <a href="./physio-view-patients.php">View Patients</a>
                            <a href="./physio-add-time-slots.php">Add Time Slots</a>
                            <a href="./physio-schedule-meetings.php">Schedule Meetings</a>
                            <a href="./physio-profile.php">Profile</a>
                            <a href="./logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?php
    include_once("../db/conn.php");
    if(isset($_POST['edt-exercise'])){
    $edit = mysqli_real_escape_string($con, $_POST['edit']);
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
        $updateExercise = "UPDATE `exercise` SET `Exercise_name` = '$exerciseName', `Exercise_duration` = '$duration',
        `Exercise_link` = '$link', `Exercise_description` = '$description' WHERE `Exercise_id` = '$edit'";
        mysqli_query($con, $updateExercise);
        header("location: ../PhysiotherapistPanel/physio-view-exercise.php");
        $_SESSION['message'] = "Record Updated Successfully";
    }   
}
    ?>
    <?php
        // echo $_GET['edit'];
        $id = $_GET['edit'];
        // Fetch user data based on id
        $result = mysqli_query($con, "SELECT * FROM `exercise` WHERE `Exercise_id` = '$id'");
        $resultCheck = mysqli_fetch_array($result);
    ?>
    <section class="add-exercise">
        <div class="container">
            <div class="row">
                <div class="main-contain">
                    <!-- Add in Exercise Table -->
                    <form method = "post" action="edit-exercise.php" class="add-form">
                        <div class="mb-3">
                            <label for="exer-phy" class="form-label input-labels">Exercise Name</label>
                            <input type="text" name="exercise-name" class="form-control input-text" value = "<?php echo $resultCheck['Exercise_name']; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="duration-phy" class="form-label input-labels">Time Duration</label>
                            <input type="text" name="duration" class="form-control input-text" value="<?php echo $resultCheck['Exercise_duration']; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="exercise-link-phy" class="form-label input-labels">Exercise Link</label>
                            <input type="text" name="link" class="form-control input-text" value = "<?php echo $resultCheck['Exercise_link']; ?>">
                          </div>
                          <div class="mb-3">
                          <label for="exercise-link-phy" class="form-label input-labels">Exercise Description</label>
                            <div class="form-floating">
                                <textarea class="form-control" name = "description" value = "<?php echo $resultCheck['Exercise_description']; ?> " id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Description</label>
                            </div>
                          </div>
                          <div class="d-flex add-btn">
                            <input type="hidden" name="edit" value=<?php echo $_GET['edit'];?>>
                            <input type="submit" name = "edt-exercise" value="Edit Exercise Record" class="add-exer-button">
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xxl-2">
                    <div class="footer-navigation-logo text-center text-xxl-start">
                        <h1 class="footer-logo">FAPT</h1>
                    </div>
                </div>
                <div class="col-12 col-xxl-10">
                    <div class="footer-nav-select">
                        <div class="footer-navigation-menu text-center text-xxl-center mt-xl-2 mt-0">
                            <a href="./physiotherapist-home.php">Home</a>
                            <a href="./physio-about-us.php">About Us</a>
                            <a href="./physio-contact-us.php">Contact Us</a>
                            <a href="./physio-terms-and-condition.php">Terms & Conditions</a>
                            <a href="./physio-add-exercise.php">Add Exercise</a>
                            <a href="./physio-view-exercise.php">View Exercises</a>
                            <a href="./physio-add-time-slots.php">Add Time Slots</a>
                            <a href="./physio-view-patients.php">Notification</a>
                            <a href="./physio-schedule-meetings.php">Schedule Meetings</a>
                            <!-- <a href="./physio-profile.php">Profile</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <style>
        .main-contain{
            padding: 20px;
            border-radius:5px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .input-text{
            color: #6d6c6cd6;
            padding: 10px 8px;
        }
        /* Footer */
        .footer-navigation-menu a{
            font-size: 14px;
            padding: 15px 10px;
            text-decoration: none;
            font-family: 'Work Sans', sans-serif;
            color: #fff;
        }
        .footer{
            position: absolute;
            margin:80px 0px;
            width:100%;
            padding:20px 0px;
            background: #20283E;
        }
        .footer-logo{
            color:white;
        }
        @media(max-width: 1214px){
            .footer{
                margin-top: 150px;
            }
        }
        @media(max-width: 1200px)
        {
            .footer .footer-navigation-menu{
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        }
        /* Footer */
        .add-btn{
            margin:5px 0px 0px 0px;
        }
        .add-exer-button:hover{
            background-color: rgb(69, 206, 11);
            color: white;
        }
        .error{
            width: 100%;
            padding:10px;
            border: 1px solid #a94442;
            background: #f2dede;
            boder-radius: 5px;
            text-align: left;
        }
        .msg{
            margin: 30px auto;
            padding: 10px;
            border-radius:5px;
            color: #3c763d;
            background: #dff0d8;
            border: 1px solid #3c763d;
            width: 100%;
            font-family: 'Work Sans', sans-serif;
            font-size:16px;
            text-align:center;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>