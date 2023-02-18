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
    <title>Notification</title>
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

    <section class="view-notification">
        <div class="container">
            <div class="row">
                <?php if(isset($_SESSION['rated-physio'])): ?>
                    <div class="rate-msg">
                        <i class="fa-solid fa-check text-start"></i>
                        <?php
                            echo $_SESSION['rated-physio'];
                            unset($_SESSION['rated-physio']);
                        ?>
                    </div>
                    <?php endif ?>
                <table class="table mt-4">
                    <tr class="col-12">
                        <th class="table-head col-3 col-xxl-2">Notification.no</th>
                        <th class="table-head col-3 col-xxl-2 ">Physiotherapist Name</th>
                        <th class="table-head col-3 col-xxl-3 text-center">Response</th>
                        <th class="table-head col-3 col-xxl-2 text-center">View Details</th>
                        <th class="table-head col-3 col-xxl-3 text-center">Feedback</th>
                    </tr>
                    <?php 
                        include("../db/conn.php");
                        $resultCheck = mysqli_query($con, "SELECT * FROM `request-response` WHERE 
                        `Patient_phone` = '$phone_num' ");
                        $resultMeeting = mysqli_query($con, "SELECT * FROM `meeting` WHERE `Patient_phone` = '$phone_num'");
                        $i=0;
                    ?>
                    <?php while($row = mysqli_fetch_array($resultCheck)){ $CheckRow = $row['Request_id']; $i++;
                        if($row['Request_status'] === 'Accepted'){
                            $accept = "Your Request has been accepted";
                        }
                        elseif($row['Request_status'] === 'Rejected'){
                            $reject = "Your request has been rejected";
                        }
                        else{
                            echo '<script>alert("Error 404")</script>';
                        }
                        ?>
                        <tr>
                            <td class="align-middle"><?php echo $i; ?></td>
                            <td><?php echo $row['Physio_name']; ?></td>
                            <td class="text-center">
                                <?php if($row['Request_status'] === 'Rejected'): ?>
                                    <div class="t-reject"><i class="fa-solid fa-xmark me-2"></i>
                                        <?php echo $reject; ?>
                                    </div>
                                <?php elseif($row['Request_status'] === 'Accepted'): ?>
                                    <div class="t-accept"><i class = "fa-solid fa-check me-2"></i>
                                        <?php echo $accept; ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="text-center align-middle">
                                <a href="./response.php?view=<?php echo $row['Response_id']; ?>" class="view-rec"><i class="fa-solid fa-eye"></i></a>
                            </td>
                            <td class="text-center">
                                <?php
                                // Selecting request id from request-response table
                                
                                $rateResult = mysqli_query($con, "SELECT * FROM `meeting` WHERE `Request_id` = '$CheckRow'");
                                $checkRateResult = mysqli_fetch_array($rateResult);
                                if($row['Request_status'] === 'Accepted'):
                                if($checkRateResult['Physio_rate'] == 0):
                                    $rateId = $row['Request_id'];
                                    echo ('<a href="./rate-physio.php?rate='.$rateId.'" class = "share-rate">Rate Physiotherapist <i class="fa-solid fa-star"></i>');
                                    ?>
                                <?php
                                else: 
                                    echo '<p class="align-middle ms-5 share-rate-p">Rated <i class="fa-solid fa-check"></i></p>'; 
                                ?>
                                <?php endif ?>
                                <?php
                                else: echo '<input type="hidden">';
                                ?>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </section>
    <style>
        .t-accept{
            width:100%;
            background:#dff0d8;
            color:#3c763d;
            border-radius:5px;
            padding:5px 0px;
        }
        .t-reject{
            border-radius:5px;
            width:100%;
            background:#f2dede;
            color:#a94442;
            padding:5px 0px;
        }
        .view-rec{
            color: #FFCC00;
            font-family: 'Work Sans', sans-serif;
            font-size: 20px;
            border: 2px solid #FFCC00;
            padding: 8px;
            transition-duration: 0.4s;
            border-radius: 100%;
        }
        .view-rec:hover{
            background-color: rgb(255, 238, 0);
            color: white;
            border: 2px solid rgb(255, 238, 0);
            border-radius: 100%;
        }
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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>