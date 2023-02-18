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
    <link rel="stylesheet" href="./adminstyle/main.css">
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
                            <a href="./index.php" class="me-0 me-xl-3">Home</a>
                            <a href="./admin-aboutus.php" class="me-0 me-xl-3">About Us</a>
                            <a href="./admin-contactus.php" class=" me-0 me-xl-3">Contact Us</a>
                            <a href="./admin-terms&condition.php" class="me-0 me-xl-3">Terms & Conditions</a>
                            <a href="./add-therapist.php" class="me-0 me-xl-3">Add Physiotherapist</a>
                            <a href="./admin-view-therapist.php" class="me-0 me-xl-3">View Physiotherapists</a>
                            <a href="./admin-profile.php" class="me-0 me-xl-3">Profile</a>
                            <a href="./admin-logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- sELECTING from admin table -->
    <?php 
        include("../db/conn.php");
        $admin_profile = mysqli_query($con, "SELECT * FROM `admin` WHERE `Admin_phone` = '$phone_num'");
        $admin_profile_Check = mysqli_fetch_array($admin_profile);
    ?>
    <section class="admin-profile">
        <div class="container">
            <div class="row">
            <div class="profile-content mb-4">
                <label for="" class="proile-asset">Name: </label><p class="profile ms-3"> <?php echo $admin_profile_Check['Admin_name']; ?> </p>
                </div>
                <div class="profile-content mb-4">
                    <label for="" class="proile-asset">Address: </label><p class="profile ms-3">
                        <?php echo $admin_profile_Check['Admin_address']; ?>
                    </p>
                </div>
                <div class="profile-content mb-4">
                    <label for="" class="proile-asset">Phone.No: </label><p class="profile ms-3"> <?php echo $admin_profile_Check['Admin_phone']; ?> </p>
                </div>
                <div class="profile-content mb-4">
                    <label for="" class="proile-asset">Email: </label><p class="profile ms-3"> <?php echo $admin_profile_Check['Admin_email']; ?> </p>
                </div>
                <div class="profile-content mb-4">
                    <label for="" class="proile-asset">Gender: </label><p class="profile ms-3"> <?php echo $admin_profile_Check['Admin_gender'] ?> </p>
                </div>
                <div class="profile-content mb-4">
                    <label for="" class="proile-asset">Role: </label><p class="profile ms-3">Admin</p>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
            <div class="col-12 col-xxl-2">
                    <div class="footer-navigation-logo text-center text-xxl-start mt-xl-2 mt-0">
                        <h1 class="footer-logo">FAPT</h1>
                    </div>
                </div>
                <div class="col-12 col-xxl-10">
                    <div class="nav-select">
                        <div class="footer-navigation-menu text-center text-xxl-center mt-xl-2 mt-0">
                            <a href="./index.php" class="me-0 me-xl-3">Home</a>
                            <a href="./admin-aboutus.php" class="me-0 me-xl-3">About Us</a>
                            <a href="./admin-contactus.php" class=" me-0 me-xl-3">Contact Us</a>
                            <a href="./admin-terms&condition.php" class="me-0 me-xl-3">Terms & Conditions</a>
                            <a href="./add-therapist.php" class="me-0 me-xl-3">Add Physiotherapist</a>
                            <a href="./admin-view-therapist.php" class="me-0 me-xl-3">View Physiotherapists</a>
                            <a href="./admin-profile.php">Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <style>
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
        .profile{
            max-width: 450px;
            color: #6d6c6cd6;
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>