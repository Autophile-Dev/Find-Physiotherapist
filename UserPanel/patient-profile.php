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
    <link rel="stylesheet" href="./patientStyle/patient.css">
    <title>Profile</title>
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
                            <a href="./home.php">Home</a>
                            <a href="./about-us.php">About Us</a>
                            <a href="./contact-us.php">Contact Us</a>
                            <a href="./termsandconditions.php">Terms & Conditions</a>
                            <a href="./physiotherapist-view.php">Physiotherapists</a>
                            <a href="./notification-view.php">Notification</a>
                            <a href="./patient-view-exercise.php">View Exercise</a>
                            <a href="./patient-view-collection.php">View Collection</a>
                            <a href="./patient-profile.php">Profile</a>
                            <a href="./logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?php
        include("../db/conn.php");
        $patientProfile_Check = mysqli_query($con, "SELECT * FROM `patient` WHERE `Patient_phone` = '$phone_num'");
        $profile = mysqli_fetch_assoc($patientProfile_Check);
    ?>
    <section class="patient-profile">
        <div class="container">
            <div class="row">
                
                <div class="profile-content mb-4">
                    <label for="" class="profile-asset">Name: </label><p class="profile"> <?php echo $profile['Patient_name']; ?> </p>
                </div>
                <div class="profile-content mb-4">
                    <label for="" class="profile-asset">Address: </label><p class="profile ">
                        <?php echo $profile['Patient_address']; ?>
                    </p>
                </div>
                <div class="profile-content mb-4">
                    <label for="" class="profile-asset">Phone.No: </label><p class="profile "> <?php echo $profile['Patient_phone']; ?> </p>
                </div>
                <div class="profile-content mb-4">
                    <label for="" class="profile-asset">Email: </label><p class="profile "> <?php echo $profile['Patient_email']; ?> </p>
                </div>
                <div class="profile-content mb-4">
                    <label for="" class="profile-asset">Diagnosis: </label><p class="profile "> <?php echo $profile['Patient_diagnosis']; ?> </p>
                </div>
                <div class="profile-content mb-4">
                    <label for="" class="profile-asset">Gender: </label><p class="profile"> <?php echo $profile['Patient_gender'] ?> </p>
                </div>
                <div class="profile-content mb-4">
                    <label for="" class="profile-asset">Role: </label><p class="profile">Patient</p>
                </div>
            </div>
            <div class="my-update">
                <div class="my-button-update text-center ">
                    <a href="./update-profile.php" class="edit-profile">Edit Profile</a>
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
                            <a href="./home.php">Home</a>
                            <a href="./about-us.php">About Us</a>
                            <a href="./contact-us.php">Contact Us</a>
                            <a href="./termsandconditions.php">Terms & Conditions</a>
                            <a href="./physiotherapist-view.php">Physiotherapists</a>
                            <a href="./notification-view.php">Notification</a>
                            <a href="./patient-view-exercise.php">View Exercise</a>
                            <a href="./patient-view-collection.php">View Collection</a>
                            <a href="./patient-profile.php">Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <style>
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
        .my-update{
            display:flex;
            justify-content:center;
        }
        .my-button-update{
            padding: 15px 60px;
            cursor:pointer;
            border-radius:4px;
            background-color:rgb(29, 184, 88);
        }
        .edit-profile{
            color:white;
            text-decoration: none;
            font-family: 'Work Sans', sans-serif;
        }
        .edit-profile:hover{
            color:white;
        }
        .my-button-update:hover{
            background-color: rgb(69, 206, 11);
            color: white;
        }
        
        .profile-asset{
            color:rgb(29,184,88);
            font-family:'Montserrat', sans-serif;
            font-size:16px;
            font-weight:bold;
        }
        .profile-content{
            display:flex;
            flex-direction:column;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>