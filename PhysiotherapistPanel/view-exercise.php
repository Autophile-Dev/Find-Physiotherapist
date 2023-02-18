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
include("../db/conn.php");
if(isset($_GET['view'])){
    $id = $_GET['view'];
    $result = mysqli_query($con, "SELECT * FROM `exercise` WHERE `Exercise_id` = '$id'");
    $resultCheck = mysqli_fetch_array($result);
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
    <link rel="stylesheet" href="./adminstyle/main.css">
    <title>Exercise Info</title>
</head>
<body>
    <section class="Exercise-info">
        <div class="container">
            <div class="row">
                <div class="main-contain">
                <h1 class="Exercise-info-header mb-5"><?php echo $resultCheck['Exercise_name']; ?></h1>
                <div class="Exercise-content mb-4">
                    <label for="" class="Exercise-asset">Exercise Name: </label><p class="profile ms-3"> <?php echo $resultCheck['Exercise_name']; ?>  </p>
                </div>
                <div class="Exercise-content mb-4">
                    <label for="" class="Exercise-asset">Exercise Duration: </label><p class="profile ms-3">
                        <?php echo $resultCheck['Exercise_duration']; ?>
                    </p>
                </div>
                <div class="Exercise-content mb-4">
                    <label for="" class="Exercise-asset">Exercise Link: </label> <a href="<?php echo $resultCheck['Exercise_link']; ?>" class="link profile ms-3" target="_blank"><?php echo $resultCheck['Exercise_link']; ?></a>
                </div>
                <div class="Exercise-content mb-4">
                    <label for="" class="Exercise-asset">Exercise Description: </label>
                    
                </div>
                <br><p class="profile"> <?php echo $resultCheck['Exercise_description']; ?> </p>
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
/* View therapist info */
.Exercise-info{
    padding: 80px 10px 80px 10px;
    width: 100%;
    
}
.Exercise-info-header{
    color: rgb(29, 184, 88);
    font-family: 'Montserrat', sans-serif;
    font-size: 80px; 
    font-weight: bold;
    border-bottom: 4px solid rgb(29, 184, 88);
}
.Exercise-asset{
    color: rgb(29, 184, 88);
    font-family: 'Montserrat', sans-serif;
    font-size: 16px; 
    font-weight: bold;
}
.Exercise-content{
    display: flex;
}
.profile{
    color: #6d6c6cd6;
    font-family: 'Work Sans', sans-serif;
    font-size: 16px;
}
/* View therapist info */
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
    </style>
</body>
</html>