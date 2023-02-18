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
    <title>Schedule Meetings</title>
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
    <section class="schedule-meetings">
        <div class="container">
            <div class="row">
                <?php if(isset($_SESSION['update'])): ?>
                    <div class="upload">
                    <i class="fa-solid fa-check"></i>
                        <?php
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        ?>
                    </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['updated-already'])): ?>
                        <div class="already">
                            <i class="fa-solid fa-circle-info"></i>
                            <?php
                                echo $_SESSION['updated-already'];
                                unset($_SESSION['updated-already']);
                            ?>
                        </div>
                        <?php endif ?>
                        <?php if(isset($_SESSION['rated'])): ?>
                            <div class="rate-msg">
                                <i class="fa-solid fa-check text-start"></i>
                                <?php
                                    echo $_SESSION['rated'];
                                    unset($_SESSION['rated']);
                                ?>
                            </div>
                        <?php endif ?>
                <table class="table mt-5">
                    <tr class="col-12">
                        <th class="table-head col-1 col-lg-1">Sr.no</th>
                        <th class="table-head col-2 col-lg-2">Patient Name</th>
                        <th class="table-head col-2 col-lg-1">Date</th>
                        <th class="table-head col-2 col-lg-2">Time</th>
                        <th class="table-head col-2 col-lg-2 text-center">Upload Info</th>
                        <th class="table-head col-2 col-lg-3 text-center">Rate Physiotherapist</th>
                    </tr>
                    <?php
                    include("../db/conn.php");
                    $meetingResult = mysqli_query($con, "SELECT * FROM `meeting` WHERE `Physio_phone` = '$phone_num'");
                    $i = 0;
                    ?>
                    <?php while($row = mysqli_fetch_array($meetingResult)){ $CheckRow = $row['Meetiind_id']; $i++;?>
                        <tr class="align-middle">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['Patient_name']; ?></td>
                            <td><?php echo $row['Slot_date']; ?></td>
                            <td><?php echo $row['Slot_time']; ?></td>
                            <td class="text-center align-middle">
                                <?php 
                                $myResult = mysqli_query($con, "SELECT * FROM `meeting` WHERE `Meetiind_id` = '$CheckRow' AND `Physio_address` IS NOT NULL");
                                $checkMyResult = mysqli_fetch_array($myResult);
                                if($checkMyResult['Physio_address'] == null): 
                                    $rowID = $row['Meetiind_id'];
                                    echo ('<a href="./physio-request-response.php?response='.$rowID.' "class = "share-response">Upload Meeting Info <i class="fa-solid fa-upload"></i>');
                                ?>
                                <?php else:
                                    echo '<p class="align-middle share-response-p">Uploaded <i class="fa-solid fa-check"></i></p>';
                                ?>
                                <?php endif ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $rateResult = mysqli_query($con, "SELECT * FROM `meeting` WHERE `Meetiind_id` = '$CheckRow' ");
                                $checkRateResult = mysqli_fetch_array($rateResult);
                                if($checkRateResult['Patient_rate'] == 0):
                                    $rateId = $row['Meetiind_id'];
                                    echo ('<a href="./physio-patient-rate.php?rate='.$rateId.'" class = "share-rate">Rate Patient <i class="fa-solid fa-star"></i>');
                                ?>
                                <?php
                                else: echo '<p class="align-middle ms-5 share-rate-p">Rated <i class="fa-solid fa-check"></i></p>';
                                ?>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </section>
    
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
        .share-response{
            color:white;
            font-family:'Work Sans', sans-serif;
            font-size:13px;
            border:2px solid skyblue;
            padding:5px;
            background:skyblue;
            border-radius:4px;
            text-decoration:none;
        }
        .share-response:hover{
            color:white;
            border:2px solid darkblue;
            text-decoration:none;
            background:darkblue;
        }
        
        .rate-msg{
            margin: 30px auto;
            box-shadow: 0 0 3px 2px #ccc;
            padding: 14px 0px;
            border-radius:5px;
            position: relative;
            border-left:6px solid #3c763d;
            background:#dff0d8;
            text-align:center;
            color:#3c763d;
            font-family: 'Work Sans', sans-serif;
            font-size:18px;
            width:50%;
        }
        .share-response-p{
            color:white;
            font-family:'Work Sans', sans-serif;
            font-size:14px;
            font-weight:regular;
            border:2px solid skyblue;
            padding:5px;
            background:skyblue;
            border-radius:4px;
            text-decoration:none;
        }
        .share-rate:hover{
            color:white;
            border:2px solid #e1ad01;
            text-decoration:none;
            background:#e1ad01;
        }
        .share-rate{
            color:white;
            font-family:'Work Sans', sans-serif;
            font-size:13px;
            border:2px solid #f4c430;
            padding:5px;
            background:#f4c430;
            border-radius:4px;
            text-decoration:none;
        }
        .fa-star{
            color:#fff44f;
        }
        .share-rate-p{
            color:white;
            font-family:'Work Sans', sans-serif;
            font-size:14px;
            width:70%;
            font-weight:regular;
            border:2px solid #e1ad01;
            padding:5px;
            background:#e1ad01;
            border-radius:4px;
            text-decoration:none;
        }
        .already{
            margin: 30px auto;
            box-shadow: 0 0 3px 2px #ccc;
            padding: 14px 0px;
            border-radius:5px;
            position: relative;
            border-left:6px solid #3c763d;
            background:#dff0d8;
            text-align:center;
            color:#3c763d;
            font-family: 'Work Sans', sans-serif;
            font-size:18px;
            width:50%;
        }
        .upload{
            margin: 30px auto;
            box-shadow: 0 0 3px 2px #ccc;
            padding: 14px 0px;
            border-radius:5px;
            position: relative;
            border-left:6px solid #5D3C76;
            background:#E0D8F0;
            text-align:center;
            color:#5D3C76;
            font-family: 'Work Sans', sans-serif;
            font-size:18px;
            width:50%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>