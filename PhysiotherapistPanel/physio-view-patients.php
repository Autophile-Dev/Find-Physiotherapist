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
    <title>View Patients</title>
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
    <section class="view-patient-rec">
        <div class="container">
            <div class="row">
            <?php if(isset($_SESSION['already-reject'])): ?>
                    <div class="already-reject mb-3">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <?php
                            echo $_SESSION['already-reject'];
                            unset($_SESSION['already-reject']);
                        ?>
                    </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['already'])): ?>
                    <div class="already-reject mb-3">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <?php
                            echo $_SESSION['already'];
                            unset($_SESSION['already']);
                        ?>
                    </div>
                    <?php endif ?>
                <?php if(isset($_SESSION['accept-req'])): ?>
                    <div class="accept-request mb-3">
                        <i class="fa-solid fa-check text-start"></i>
                        <?php
                            echo $_SESSION['accept-req'];
                            unset($_SESSION['accept-req']);
                        ?>
                    </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['reject-req'])): ?>
                    <div class="reject-request mb-3">
                        <i class="fa-solid fa-xmark text-start"></i>
                        <?php
                            echo $_SESSION['reject-req'];
                            unset($_SESSION['reject-req']);
                        ?>
                    </div>
                    <?php endif ?>
                  <!-- Request table -->
                  <table class="table mt-5">
                    <tr class="col-12">
                        <th class="table-head col-2 col-lg-2">Patient Name</th>
                        <th class="table-head col-2 col-lg-2">Contact</th>
                        <th class="table-head col-2 col-lg-2">Date</th>
                        <th class="table-head col-2 col-lg-2">Time</th>
                        <th class="table-head col-3 col-lg-2 text-center">Patient Info</th>
                        <th class="table-head col-2 col-lg-2 text-center">Actions</th>
                    </tr>
                    <?php 
                    include("../db/conn.php");
                    $requestResult = mysqli_query($con, "SELECT * FROM `request` WHERE 1 AND `Physio_phone` = '$phone_num'");
                    ?>
                    <?php while($row = mysqli_fetch_array($requestResult)){ $id = $row['Request_id'];?>
                        <tr>
                            <td><?php echo $row['Patient_name']; ?></td>
                            <td><?php echo $row['Patient_phone']; ?></td>
                            <td><?php echo $row['Slot_date']; ?></td>
                            <td><?php echo $row['Slot_time']; ?></td>
                            <td class="align-middle text-center"><a href="./patient-info.php?view=<?php echo $row['Request_id']; ?>" title="View" class="view-rec"><i class="fa-solid fa-eye"></i></a></td>
                            <td class="align-middle text-center">
                                <?php
                                $checkInResponse = "SELECT * FROM `request-response` WHERE `Request_id` = '$id'";
                                ?>
                                <a href="./response.php?accept=<?php echo $row['Request_id']; ?>" title = "Accept" class = "accept-req"><i class="fa-solid fa-check"></i></a>
                                <a href="./response.php?reject=<?php echo $row['Request_id']; ?>" title = "Reject" class = "reject-req"><i class="fa-sharp fa-solid fa-xmark"></i></a>
                            </td>
                        </tr>
                    <?php }?>
                    
                  </table>
            </div>
        </div>
    </section>
    <style>
        .view-rec{
            color:#FFCC00;
            font-family:'Work Sans', sans-serif;
            font-size:20px;
            border:2px solid #FFCC00;
            padding:8px;
            border-radius:100%;
        }
        .view-rec:hover{
            background-color:rgb(255,238,0);
            color:white;
            border:2px solid rgb(255,238,0);
            border-radius:100%;
        }
        .accept-req{
            color:#14C38E;
            font-family:'Work Sans', sans-serif;
            font-size:20px;
            border:2px solid #14C38E;
            padding:8px;
            transition-duration:0.2s;
            border-radius:100%;
        }
        .accept-req:hover{
            background-color:#5FD068;
            color:white;
            border:2px solid #5FD068;
            border-radius:100%;
        }
        .reject-req{
            color:red;
            font-family:'Work Sans', sans-serif;
            font-size:20px;
            border:2px solid red;
            padding:8px 10px;
            transition-duration:0.2s;
            border-radius:100%;
        }
        .reject-req:hover{
            background-color:maroon;
            color:white;
            border:2px solid maroon;
            border-radius:100%;
        }
        .accept-request{
            margin:30px auto;
            box-shadow:0 0 3px 2px #ccc;
            padding:14px 0px;
            border-radius:5px;
            position: relative;
            border-left:6px solid #3c763d;
            background:#dff0d8;
            text-align:center;
            color:#3c763d;
            font-family:'Work Sans', sans-serif;
            font-size:18px;
            width:50%;
        }
        .reject-request{
            margin:30px auto;
            box-shadow:0 0 3px 2px #ccc;
            padding:14px 0px;
            border-radius:5px;
            position: relative;
            border-left:6px solid #a94442;
            background:#f2dede;
            text-align:center;
            color:#a94442;
            font-family:'Work Sans', sans-serif;
            font-size:18px;
            width:50%;
        }
        .already-reject{
            margin:30px auto;
            box-shadow:0 0 3px 2px #ccc;
            padding:14px 0px;
            border-radius:5px;
            position: relative;
            border-left:6px solid #00529B;
            background:#BDE5F8;
            text-align:center;
            color:#00529B;
            font-family:'Work Sans', sans-serif;
            font-size:18px;
            width:50%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>