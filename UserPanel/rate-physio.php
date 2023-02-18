<?php
session_start();
if(!isset($_SESSION['pno'])){
    header("location: ../login.php");
}
else{
    $phone_num = $_SESSION['pno'];
}
include("../db/conn.php");
$rateID = $_GET['rate'];
// echo $rateID;
    $checkMeetingForRate = mysqli_query($con, "SELECT * FROM `meeting` WHERE `Request_id` = '$rateID'");
    $resultMeetingForRate = mysqli_fetch_array($checkMeetingForRate);
    $errors = array();
    if(isset($_POST['rate'])){
        $edit = mysqli_real_escape_string($con, $_POST['rte']);
        $physioPhone = mysqli_real_escape_string($con, $_POST['phone']);
        // Receiving input from rate page
        $rateAmount = mysqli_real_escape_string($con, $_POST['rating']);
        echo $rateAmount;
        if(empty($rateAmount)){array_push($errors, "Give Rate to Physiotherapist"); echo '<script>alert("Give rate to physiotherapist")</script>';}
        if(count($errors) == 0){
            $updateRate = "UPDATE `meeting` SET `Physio_rate` = '$rateAmount' WHERE 
            `Request_id` = '$edit'";
            mysqli_query($con, $updateRate);
            // Average query 
            $average = "SELECT AVG(Physio_rate) AS `averagePhysioRating` FROM `meeting`
            WHERE `Physio_phone` = '$physioPhone'";
            $resultAverage = mysqli_query($con, $average);
            $fetchAverage = mysqli_fetch_array($resultAverage);
            $averageRatePhysiotherapist = $fetchAverage['averagePhysioRating'];
            // Update Physiotherapist Table for rate
            $updatePhysiotherapist = "UPDATE `physiotherapist` SET `Physio_rating` = '$averageRatePhysiotherapist' WHERE 
            `Physio_phone` = '$physioPhone'";
            mysqli_query($con, $updatePhysiotherapist);
            header("Location: ../UserPanel/notification-view.php");
            $_SESSION['rated-physio'] = "Rated Successfully";
        }
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
    <title>Rate Patient</title>
</head>
<body>
    <section class="rate-patient">
        <div class="container">
            <div class="row">
                <form action="rate-physio.php" method="post">
                    <div class="star-rate">
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
                    <div class="rate-btn">
                        <input type="hidden" name="rte" value=<?php echo $_GET['rate']; ?>>
                        <input type="hidden" name="phone" value=<?php echo $resultMeetingForRate['Physio_phone']; ?>>
                        <input type="submit" value="Rate" name = "rate" class="rate-button mt-3">
                    </div>
                </form>
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
        .rate-patient{
            padding: 120px 0px;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }
        .star-rate{
            display:flex;
            flex-direction: row-reverse;
            justify-content: center;
        }
        .star-rate > input{
            display:none;
        }
        .star-rate > label {
            position: relative;
            width: 1.1em;
            font-size: 8vw;
            color: #FFD700;
            cursor: pointer;
        }
        .star-rate > label::before{
            content: "\2605";
            position: absolute;
            opacity: 0;
        }
        .star-rate > label:hover:before,
        .star-rate > label:hover ~ label:before {
            opacity: 1 !important;
        }
        .star-rate > input:checked ~ label:before{
            opacity:1;
        }

        .star-rate:hover > input:checked ~ label:before{ 
            opacity: 0.4;
        }
        .rate-button{
            background-color: rgb(29, 184, 88);
            color: white;
            border-radius: 5px;
            border: none;
            width: 280px;
            height: 50px;
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
        }
        .rate-button:hover{
            background-color: rgb(19, 184, 84);
        }
        .rate-btn{
            display:flex;
            flex-direction:row;
            justify-content:center;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
    
</body>
</html>