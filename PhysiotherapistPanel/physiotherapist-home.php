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
    <title>Physiotherapist Home</title>
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
                            <a href="./physio-add-time-slots.php">Add Time Slots</a>
                            <a href="./physio-view-patients.php">Notification</a>
                            <a href="./physio-schedule-meetings.php">Schedule Meetings</a>
                            <a href="./physio-profile.php">Profile</a>
                            <a href="./logout.php">Logout</a>
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
    // Total physiotherapist exercises
    $exerciseData = mysqli_query($con, "SELECT COUNT(*) AS `count_exercise` FROM `exercise` 
    WHERE `Physio_phone` = '$phone_num'");
    $exerciseRow = mysqli_fetch_assoc($exerciseData);
    $countExercise = $exerciseRow['count_exercise'];
    // Count pending requests
    $pendingRequestsData = mysqli_query($con, "SELECT COUNT(*) AS `count_pending` FROM `request`
    WHERE `Physio_phone` = '$phone_num'");
    $pendingRow = mysqli_fetch_assoc($pendingRequestsData);
    $countPending = $pendingRow['count_pending'];
    // Count Accepted Requests
    $acceptedRequestsData = mysqli_query($con, "SELECT COUNT(*) AS `count_accept` FROM `request-response`
    WHERE `Physio_phone` = '$phone_num' AND `Request_status` = 'Accepted'");
    $acceptedRow = mysqli_fetch_assoc($acceptedRequestsData);
    $countAccept = $acceptedRow['count_accept'];
    // Count Rejected Requests
    $rejectedRequestsData = mysqli_query($con, "SELECT COUNT(*) AS `count_reject` FROM `request-response`
    WHERE `Physio_phone` = '$phone_num' AND `Request_status` = 'Rejected'");
    $rejectedRow = mysqli_fetch_assoc($rejectedRequestsData);
    $countReject = $rejectedRow['count_reject'];
    // Count Pending Meetings
    $pendingMeetingData = mysqli_query($con, "SELECT COUNT(*) AS `count_pending_meeting` FROM `meeting` 
    WHERE `Physio_phone` = '$phone_num' AND `Patient_rate` = '0'");
    $pendingMeetingRow = mysqli_fetch_assoc($pendingMeetingData);
    $countPendingMeeting = $pendingMeetingRow['count_pending_meeting'];
    // Count Time Schedules by each physiotherapist
    $scheduleTime = mysqli_query($con, "SELECT COUNT(*) AS `count_schedule` FROM `time-slots`
    WHERE `Physio_phone` = '$phone_num'");
    $scheduleRow = mysqli_fetch_assoc($scheduleTime);
    $countSchedule = $scheduleRow['count_schedule'];
    // Count Treated Patients
    $treatedData = mysqli_query($con, "SELECT COUNT(*) AS `count_treat` FROM `meeting` 
    WHERE `Physio_phone` = '$phone_num' AND `Patient_rate` != '0'");
    $treatedRow = mysqli_fetch_assoc($treatedData);
    $countTreat = $treatedRow['count_treat'];
    // Retrieve rating from physiotherapist table
    $rateData = mysqli_query($con, "SELECT * FROM `physiotherapist` WHERE `Physio_phone` = '$phone_num'");
    $rateData = mysqli_fetch_assoc($rateData);
    $actualRate = $rateData['Physio_rating'];
    ?>
    <section class="dashboard">
        <div class="container">
            <div class="row">
                <div class="sub-dashboard">
                    <div class="sub-head">
                        <h1 class="sub-header">Overview</h1>
                    </div>
                    <div class="row">
                            <!-- flex column -->
                        <div class="parent-dashboard mt-2 d-flex flex-column gap-2">
                            <!-- flex-row -->
                            <div class="row">
                                <div class="sub-row-1 col-4 col-md-6 col-lg-12">
                                <div class="sub-parent-dashboard-1  d-flex flex-xl-row flex-col gap-2">
                                    <!-- flex-row -->
                                    <div class="child1-dashboard  col-md-6 col-xl-3 col-lg-3 col-12">
                                        <div class="child1-header d-flex">
                                            <h1 class="head">Total Exercises</h1>
                                            <i class="fa-solid fa-kit-medical mt-1"></i>
                                        </div>
                                        <div class="child1-content text-center">
                                            <p class="child-content"><?php echo $countExercise; ?></p>
                                        </div>
                                    </div>
                                    <div class="child2-dashboard col-md-6 col-xl-3 col-lg-3 col-12">
                                        <div class="child2-header d-flex">
                                            <h1 class="head">Pending Requests</h1>
                                            <i class="fa-solid fa-bell mt-1"></i>
                                        </div>
                                        <div class="child2-content text-center">
                                            <p class="child-content"><?php echo $countPending; ?></p>
                                        </div>
                                    </div>
                                    <div class="child3-dashboard col-md-6 col-xl-3 col-lg-3 col-12">
                                        <div class="child3-header d-flex">
                                            <h1 class="head">Accepted Requests</h1>
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                        <div class="child3-content text-center">
                                            <p class="child-content"><?php echo $countAccept; ?></p>
                                        </div>
                                    </div>
                                    <div class="child4-dashboard col-md-6 col-xl-3 col-lg-3 col-12">
                                        <div class="child4-header d-flex">
                                            <h1 class="head">Rejected Requests</h1>
                                            <i class="fa-solid fa-xmark"></i>
                                        </div>
                                        <div class="child4-content text-center">
                                            <p class="child-content"><?php echo $countReject; ?></p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="sub-row-2 col-4 col-md-6 col-lg-12">
                                <div class="sub-parent-dashboard-2 d-flex flex-xl-row flex-col gap-2">
                                    <!-- flex-row -->
                                    <div class="child5-dashboard col-md-6 col-xl-3 col-lg-3 col-12">
                                        <div class="child5-header d-flex">
                                            <h1 class="head">Pending Meetings</h1>
                                            <i class="fa-solid fa-handshake"></i>
                                        </div>
                                        <div class="child5-content text-center">
                                            <p class="child-content"><?php echo $countPendingMeeting; ?></p>
                                        </div>
                                    </div>
                                    <div class="child6-dashboard col-md-6 col-xl-3 col-lg-3 col-12">
                                        <div class="child6-header d-flex">
                                            <h1 class="head">Time Schedules</h1>
                                            <i class="fa-regular fa-clock"></i>
                                        </div>
                                        <div class="child6-content text-center">
                                            <p class="child-content"><?php echo $countSchedule; ?></p>
                                        </div>
                                    </div>
                                    <div class="child7-dashboard col-md-6 col-xl-3 col-lg-3 col-12">
                                        <div class="child7-header d-flex">
                                            <h1 class="head">Treated Patients</h1>
                                            <i class="fa-solid fa-house-medical-circle-check"></i>
                                        </div>
                                        <div class="child7-content text-center">
                                            <p class="child-content"><?php echo $countTreat; ?></p>
                                        </div>
                                    </div>
                                    <div class="child8-dashboard col-md-6 col-xl-3 col-lg-3 col-12">
                                        <div class="child8-header d-flex">
                                            <h1 class="head">My Rating</h1>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <div class="child8-content text-center">
                                            <p class="child-content"><?php echo $actualRate; ?></p>
                                        </div>
                                    </div>
                                </div>
                                </div>
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
        /* Dashboard */
        @media(max-width:1058px){
            .home-head{
                font-size:50px;
            }
            .home-content{
                font-size:14px;
                line-height:1.4;
            }
        }
        @media(max-width: 578px){
            .home-head{
                font-size:30px;
            }
        }
        /* Dashboard */
        .sub-head{
            padding: 0px 10px 10px 10px; 
        }
        .sub-header{
            font-size:80px;
            font-family:'Montserrat', sans-serif;
            color: rgb(29, 184, 88);
            font-weight:bold;
        }
        .dashboard{
            margin:70px 0px;
            height:400px;
            padding: 80px 0px;
            background: white;
            position: relative;
            width:100%;
        }
        .child1-dashboard{
            background: #20283E;
            border:none;
            padding: 10px;
            box-shadow: 0 0 3px 2px #ccc;
            border-radius:4px;
        }
        .child2-dashboard{
            background: #3D1074;
            border:none;
            padding: 10px;
            box-shadow: 0 0 3px 2px #ccc;
            border-radius:4px;
        }
        .child3-dashboard{
            background: #09833C;
            border:none;
            padding: 10px;
            box-shadow: 0 0 3px 2px #ccc;
            border-radius:4px;
        }
        .child4-dashboard{
            background: #d32d41;
            border:none;
            padding: 10px;
            box-shadow: 0 0 3px 2px #ccc;
            border-radius:4px;
        }
        .child5-dashboard{
            background: #BA8B34;
            border:none;
            padding: 10px;
            box-shadow: 0 0 3px 2px #ccc;
            border-radius:4px;
        }
        .child6-dashboard{
            background: #4cb5f5;
            border:none;
            padding: 10px;
            box-shadow: 0 0 3px 2px #ccc;
            border-radius:4px;
        }
        .child7-dashboard{
            background: #54003C;
            border:none;
            padding: 10px;
            box-shadow: 0 0 3px 2px #ccc;
            border-radius:4px;
        }
        .child8-dashboard{
            background: #E6A52D;
            border:none;
            padding: 10px;
            box-shadow: 0 0 3px 2px #ccc;
            border-radius:4px;
        }
        .child1-header{
            color:#DADADA;
            padding: 15px;
            font-size:18px;
            font-family:'Montserrat', sans-serif;
            justify-content:space-between;
        }
        .child2-header{
            color:#DADADA;
            padding: 15px;
            font-size:18px;
            font-family:'Montserrat', sans-serif;
            justify-content:space-between;
        }
        .child3-header{
            color:#DADADA;
            padding: 15px;
            font-size:18px;
            font-family:'Montserrat', sans-serif;
            justify-content:space-between;
        }
        .child4-header{
            color:#DADADA;
            padding: 15px;
            font-size:18px;
            font-family:'Montserrat', sans-serif;
            justify-content:space-between;
        }
        .child5-header{
            color:#DADADA;
            padding: 15px;
            font-size:18px;
            font-family:'Montserrat', sans-serif;
            justify-content:space-between;
        }
        .child6-header{
            color:#DADADA;
            padding: 15px;
            font-size:18px;
            font-family:'Montserrat', sans-serif;
            justify-content:space-between;
        }
        .child7-header{
            color:#DADADA;
            padding: 15px;
            font-size:18px;
            font-family:'Montserrat', sans-serif;
            justify-content:space-between;
        }
        .child8-header{
            color:#DADADA;
            padding: 15px;
            font-size:18px;
            font-family:'Montserrat', sans-serif;
            justify-content:space-between;
        }
        .child1-header .head{
            font-size:16px;
            color:#DADADA;
        }
        .child2-header .head{
            font-size:16px;
            color:#DADADA;
        }
        .child3-header .head{
            font-size:16px;
            color:#DADADA;
        }
        .child4-header .head{
            font-size:16px;
            color:#DADADA;
        }
        .child5-header .head{
            font-size:16px;
            color:#DADADA;
        }
        .child6-header .head{
            font-size:16px;
            color:#DADADA;
        }
        .child7-header .head{
            font-size:16px;
            color:#DADADA;
        }
        .child8-header .head{
            font-size:16px;
            color:#DADADA;
        }
        .child1-content, .child2-content, .child3-content,
        .child4-content, .child5-content, .child6-content,
        .child7-content, .child8-content{
            padding:0px 12px;
            font-family:'Work Sans', sans-serif;
        }
        .child-content{
            font-size:26px;
            color:#DADADA;
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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>
