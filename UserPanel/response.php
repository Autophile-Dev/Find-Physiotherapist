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
    <title>Response</title>
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
        $responseID = $_GET['view'];
        // echo $responseID;
        $viewCheck = mysqli_query($con, "SELECT * FROM `request-response` WHERE 
        `Response_id` = '$responseID'");
        $fetchResponse = mysqli_fetch_array($viewCheck);
        $requestID = $fetchResponse['Request_id'];
        $patientID = $fetchResponse['Patient_id'];
        $physioID = $fetchResponse['Physio_id'];
        $slotID = $fetchResponse['Slot_id'];
        $success = "Your Request is Accepted";
        $unsuccess = "Your Request is Rejected";
        $viewMeeting = mysqli_query($con, "SELECT * FROM `meeting` WHERE `Patient_id` = '$patientID' AND
        `Request_id` = '$requestID' AND `Physio_id` = '$physioID' AND `Slot_id` = '$slotID'");
        $fetchMeeting = mysqli_fetch_array($viewMeeting);
    ?>
    <section class="response mt-5">
        <div class="container">
            <div class="row">
                <?php if($fetchResponse['Request_status'] === 'Accepted'): ?>
                <div class="main-head">
                <div class="main-success pb-3">
                    <div class="success-logo text-center ps-3 pe-3">
                        <i class="fa-regular fa-circle-check mt-3"></i>
                        <h2 class="check-head mt-3"><?php echo $success; ?></h2>
                    </div>
                    <div class="success-content mt-4">
                        <div class="ps-3 pe-3 response-content">
                            <label for="" class= "response-asset">Request Status: </label><p class="response-status ms-1"><?php echo $fetchResponse['Request_status']; ?></p>
                        </div>
                        <h2 class="ps-3 pe-3 forPhysical">For Physical Check-up</h2>
                        <div class="response-content ps-3 pe-3">
                            <label for="" class = "response-asset">Physiotherapist Address: </label><p class="response-answer ms-1"><?php echo $fetchMeeting['Physio_address']; ?></p>
                        </div>
                        <h2 class="forVirtual ps-3 pe-3">For Virtual Check-up</h2>
                        <div class="response-content ps-3 pe-3">
                            <label for="" class="response-asset">Zoom Meeting Link: </label><a href="<?php echo $fetchMeeting['Virtual_address']; ?>" class="response-answer ms-1" target="_blank"><?php echo $fetchMeeting['Virtual_address']; ?></a>
                        </div>
                        <div class="response-content ps-3 pe-3">
                            <label for="" class="response-asset">Zoom Meeting Password: </label><p class="response-answer ms-1"><?php echo $fetchMeeting['Virtual_password']; ?></p>
                        </div>
                    </div>
                </div>
                </div>
                <?php elseif($fetchResponse['Request_status'] === 'Rejected'): ?>
                <div class="main-head">
                <div class="main-unsuccess pb-3">
                    <div class="unsuccess-logo text-center ps-3 pe-3">
                            <i class="fa-regular fa-circle-xmark mt-3"></i>
                            <h2 class="mark-head"><?php echo $unsuccess; ?></h2>
                    </div>
                    <div class="unsuccess-content mt-4">
                        <div class="response-content ps-3 pe-3">
                            <label for="" class= "response-asset">Request Status: </label><p class="response-status-reject ms-1"><?php echo $fetchResponse['Request_status']; ?></p>
                        </div>
                    </div>
                </div>
                </div>
                <?php endif ?>
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
        .main-head{
            display:flex;
            flex-direction:column;
            align-items:center;
        }
        .main-success{
            border-radius:6px;
            box-shadow:0 0 3px 2px #ccc;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }
        .success-logo{
            background:#dff0d8;
            gap:15px;
            display:flex;
            justify-content:center;
            align-item:center;
            flex-direction:column;
            border-bottom:6px solid rgb(29,184,88);
            border-radius:6px;
        }
        .fa-circle-check{
            font-size:80px;
            color:rgb(29,184,88);
            text-align:center;
            
        }
        .check-head{
            font-weight:bold;
            font-size:30px;
            font-family:'Montserrat', sans-serif;
            color:rgb(29,184,88);
        }
        @media(max-width:1190px){
            .fa-check{
                font-size:24px;
            }
        }
        @media(max-width:426px){
            .check-head{
                font-size:24px;
            }
        }
        @media(max-width:346px){
            .check-head{
                font-size:18px;
            }
            .fa-check{
                font-size: 14px;
            }
        }
        .success-content{
            display:flex;
            flex-direction:column;
            gap:15px;
        }
        .response-content{
            display:flex;
        }
        .response-asset{
            color: #474e68;
            font-family:'Montserrat', sans-serif;
            font-size:16px;
        }
        .response-status{
            color: rgb(29,184,88);
            font-size:16px;
            font-family:'Work Sans', sans-serif;
        }
        .forPhysical, .forVirtual{
            color: rgb(29,184,88);
            font-size:18px;
            font-family:'Montserrat', sans-serif;
        }
        .response-answer{
            color: #6d6c6cd6;
            font-size:16px;
            font-family:'Work Sans', sans-serif;   
        }
        .main-unsuccess{
            border-radius:6px;
            box-shadow:0 0 3px 2px #ccc;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }
        .unsuccess-logo{
            background:#f2dede;
            gap:15px;
            display:flex;
            justify-content:center;
            align-item:center;
            flex-direction:column;
            border-bottom:6px solid #a94442;
            border-radius:6px;
        }
        .mark-head{
            font-weight:bold;
            font-size:30px;
            font-family:'Montserrat', sans-serif;
            color:#a94442;
        }
        .fa-circle-xmark{
            font-size:80px;
            color:#a94442;
            text-align:center;
        }
        .unsuccess-content{
            display:flex;
            flex-direction:column;
            gap:15px;
            justify-content:center;
            align-item:center;
        }
        .response-status-reject{
            color: #a94442;
            font-size:16px;
            font-family:'Work Sans', sans-serif;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>