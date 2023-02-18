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
    <title>Home</title>
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
    <section class="background">
        <img src="../img/background.jpg" alt="">
        <div class="container">
            <div class="row">
                <h1 class="home-head">Find the <label for="" class="home-bold"> Physiotherapist </label></h1>
                <p class="home-content">
                    Affordable solutions such as mobile apps and online exercises therefore have the potential to 
                    supplement the normal physiotherapy process, positively influence a patient's condition, and shorten their 
                    recovery and rehabilitation time. Further, my web app interventions can improve both the patient's mental and 
                    physical health and provide a mechanism for better communication between patient and physiotherapist. My 
                    App used in health care settings have many functions such as information and time management, 
                    communications and consulting, patient management and monitoring, health record maintenance and access, 
                    reference and information gathering, and clinical decision making. The main purpose of them is to make the 
                    therapy process, especially in post-rehabilitation, easier for physiotherapists and patients. Increasing the use of 
                    mobile devices and internet to provide home exercise programs directly to patients is highly desirable. 
                    Reminders and medical follow-up are fundamental in patient treatments and technology can influence and facilitate health care with simple alerts and messages. Changes in lifestyle behavior are remarkable, showing 
                    positive and significant improvements on health conditions.  
                </p>
            </div>
        </div>
    </section>
    <?php
    include("../db/conn.php");
    // Count data of physiotherapist
    $physioData = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `physiotherapist`");
    $physioRow = mysqli_fetch_assoc($physioData);
    $countPhysio = $physioRow['count'];
    // COunt data of patients
    $patientData = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `patient`");
    $patientRow = mysqli_fetch_assoc($patientData);
    $countPatient = $patientRow['count'];
    ?>
    <section class="dashboard">
        <div class="container">
            <div class="row">
                <div class="sub-dashboard">
                    <div class="sub-head">
                        <h1 class="sub-header">
                            Overview
                        </h1>
                    </div>
                    <!-- flex row -->
                <div class="parent-dashboard col-12  mt-4">
                    <!-- flex column -->
                    <div class="child1-dashboard col-12 col-xl-6">
                         <!--flex row  -->
                        <div class="child1-header">
                            <h1 class="head">Total Physiotherapists</h1>
                            <i class="fa-solid mt-2 fa-user-doctor"></i>
                        </div>
                        <!-- flex row -->
                        <div class="child1-content">
                            <p class="child-content"><?php echo $countPhysio; ?></p>
                        </div>
                        <!-- flex-row -->
                        <div class="child1-link">
                            <a href="./admin-view-therapist.php">View</a>
                        </div>
                    </div>
                    <!-- flex column -->
                    <div class="child2-dashboard col-12 col-xl-6">
                        <!--flex row  -->
                        <div class="child2-header">
                            <h1 class="head">Total Patients</h1>
                            <i class="fa-solid mt-2 fa-hospital-user"></i>
                        </div>
                        <!-- flex row -->
                        <div class="child2-content">
                            <p class="child-content"><?php echo $countPatient; ?></p>
                        </div>
                        <!-- flex-row -->
                        <div class="child2-link">
                            <a href="./admin-view-patients.php">View</a>
                        </div>
                    </div>
                </div>
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
        .background img{
        overflow: hidden;
        position: absolute;
        background-size: cover;
        height: 880px;
        width: 100%;
        opacity: 0.1;
        /* filter: blur(4px);
        -webkit-filter: blur(4px); */
        }
        .dashboard{
            margin:70px 0px;
            height:400px;
            background: white;
            position: relative;
            width:100%;
        }
        
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
        .sub-dashboard{
            padding: 80px 0px;
        }
        .sub-head{
            padding: 0px 10px 10px 10px; 
        }
        .sub-header{
            font-size:80px;
            font-family:'Montserrat', sans-serif;
            color: rgb(29, 184, 88);
            font-weight:bold;
        }
        .parent-dashboard{
            display: flex;
            gap:10px;
        }
        .child-content{
            padding: 0px 15px;
            color:white;
            font-family:'Work Sans', sans-serif;
        }
        .head{
            font-size:40px;
        }
        .child1-content, .child2-content{
            font-size:40px;
            padding:0px 12px;
        }
        .child1-dashboard{
            display:flex;
            flex-direction:column;
            background: #20283E;
            border:none;
            padding: 10px;
            gap: 5px;
            box-shadow: 0 0 3px 2px #ccc;
            border-radius:4px;
        }
        .child1-header{
            color:#DADADA;
            display:flex;
            padding: 15px;
            font-family:'Montserrat', sans-serif;
            justify-content:space-between;
        }
        .child1-link{
            padding: 0px 15px;
            display:flex;
            justify-content:center;
        }
        .fa-user-doctor{
            font-size:30px;
        }
        .child2-dashboard{
            background:#488a99;
            display:flex;
            flex-direction:column;
            gap: 5px;
            padding:10px;
            box-shadow: 0 0 3px 2px #ccc;
            border-radius:4px;
        }
        .child2-header{
            display:flex;
            color:#20283E;
            padding: 15px;
            font-family:'Montserrat', sans-serif;
            justify-content:space-between;
        }
        .fa-hospital-user{
            font-size:30px;
        }
        .child2-link{
            display:flex;
            border-radius:4px;
            justify-content:center;
        }
        a{
            color:white;
            text-decoration:none;
        }
        a:hover{
            color:white;
        }
        @media(max-width: 1214px){
            .parent-dashboard{
                flex-direction:column;
                justify-content:center;
            }
            .sub-dashboard{
                padding:40px 0px;
            }
            .footer{
                margin-top: 180px;
            }
        }
        @media(max-width: 1058px){
            .parent-dashboard{
            display: flex;
            gap:15px;
            flex-direction:column;
            }
            .home-head{
                font-size:50px;
            }
            .head{
                font-size:20px;
            }
            .fa-user-doctor, .fa-hospital-user{
                font-size:15px;
            }
            .sub-header{
                font-size:50px;
            }
            .home-content{
                font-size:14px;
                line-height:1.4;
            }
            .dashboard{
                height:350px;
            }
        }
        @media(max-width: 578px){
            .home-head{
                font-size:30px;
            }
            .head{
                font-size:20px;
            }
            .fa-user-doctor, .fa-hospital-user{
                font-size:15px;
            }
            .sub-header{
                font-size:30px;
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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>