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
    <title>Response</title>
</head>
<body>
    <?php
    include("../db/conn.php");
    $id = $_GET['response'];
    // echo $id;
    $checkMeeting = mysqli_query($con, "SELECT * FROM `meeting` WHERE `Meetiind_id` = '$id'");
    $resultMeeting = mysqli_fetch_array($checkMeeting);
    $errors = array();
    if(isset($_POST['res'])){
        $edit = mysqli_real_escape_string($con, $_POST['response']);
        // Receiving all inputs from physio-request-response
        $physioAddress = mysqli_real_escape_string($con, $_POST['paddress']);
        $virtualAddress = mysqli_real_escape_string($con, $_POST['vlink']);
        $virtualPassword = mysqli_real_escape_string($con, $_POST['vpass']);
        if(empty($physioAddress)){array_push($errors, "Address is required"); echo '<script>alert("Address is required")</script>';}
        if(empty($virtualAddress)){array_push($errors, "Zoom meeting link is required"); echo '<script>alert("Zoom meeting link is required")</script>';}
        if(empty($virtualPassword)){array_push($errors, "Zoom meeting password is required"); echo '<script>alert("Zoom meeting password is required")</script>';}
        if(count($errors) == 0){
            $updateMeeting = "UPDATE `meeting` SET `Physio_address` = '$physioAddress',
            `Virtual_address` = '$virtualAddress', `Virtual_password` = '$virtualPassword' WHERE `Meetiind_id` = '$edit'";
            mysqli_query($con, $updateMeeting);
            header("Location: ../PhysiotherapistPanel/physio-schedule-meetings.php");
            $_SESSION['update'] = "Meeting information is uploaded";
        }
    }
    elseif($resultMeeting && $resultMeeting['Physio_address'] != null){
        header("Location: ../PhysiotherapistPanel/physio-schedule-meetings.php");
        $_SESSION['updated-already'] = "Already uploaded information";
}
?>
    <section class="response">
    <div class="container">
        <div class="row">
            <div class="main-contain">
                <form method="post" action="physio-request-response.php">
                    <div class="mb-3">
                        <label for="add" class="form-label input-labels">Address for Physical Checkup</label>
                        <input type="text" name="paddress" class="form-control input-text" placeholder="Enter Address">
                      </div>
                      <hr>
                      <div class="mb-3">
                        <label for="meet" class="form-label input-labels">Link for Virtual Checkup</label>
                        <input type="text" name="vlink" class="form-control input-text" placeholder="Enter Meeting Link">
                      </div>
                      <div class="mb-3">
                        <label for="pass" class="form-label input-labels">Password for Virtual Checkup</label>
                        <input type="password" name="vpass" class="form-control input-text" placeholder="Enter Meeting Password">
                      </div>
                      <div class="d-flex res-btn">
                        <input type="hidden" name="response" value=<?php echo $_GET['response']; ?>>
                        <input type="submit" value="Response" name = "res" class="response-button">
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
        .response-button:hover{
            background-color: rgb(69, 206, 11);
            color: white;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>