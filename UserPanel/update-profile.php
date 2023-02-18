<?php
session_start();
if(!isset($_SESSION['pno'])){
    header("location: ../login.php");
}
else{
    $phone_num = $_SESSION['pno'];
}
?>
<?php
include("includes/update-user.php");
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
    <title>Update Profile</title>
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
        $fetch_var = mysqli_query($con, "SELECT * FROM `patient` WHERE `Patient_phone` = '$phone_num'");
        $fetch = mysqli_fetch_array($fetch_var);
    ?>
    <section class="update-profile">
        <div class="container">
            <div class="row">
                <div class="main-contain">
                <!-- Update in User/Patient table -->
                <form action="update-profile.php" method = "post">
                    <div class="errors">
                    <?php include("includes/errors.php"); ?>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="username" class="form-label input-labels">Patient name</label>
                        <input type="text" name="user-name" value = "<?php echo $fetch['Patient_name']; ?>"  class="form-control input-text" >
                    </div> -->
                    <div class="mb-3">
                        <label for="userdiagnosis" class="form-label input-labels">Diagnosis</label>
                        <input type="text" name="user-diagnosis" class="form-control  input-text" value="<?php echo $fetch['Patient_diagnosis']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="useraddress" class="form-label input-labels">Address</label>
                        <input type="text" name="user-address" class="form-control  input-text" value="<?php echo $fetch['Patient_address']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="userphone" class="form-label input-labels">Phone</label>
                        <input type="text" name="user-phone" class="form-control  input-text" value = "<?php echo $fetch['Patient_phone']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label input-labels">Email</label>
                        <input type="email" name="user-email" class="form-control  input-text" value = "<?php echo $fetch['Patient_email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label input-labels">Password</label>
                        <input type="password" name="user-pass" class="form-control  input-text" placeholder="Enter password">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label input-labels">New password</label>
                        <input type="password" name="user-new-pass" class="form-control  input-text" placeholder="Enter new password">
                    </div>
                    <div class="mb-2">
                        <label for="username" class="form-label input-labels">Confirm new password</label>
                        <input type="password" name="user-c-new-pass" class="form-control  input-text" placeholder="Confirm new password">
                    </div>
                    <div class="my-button">
                        <div class="d-flex update-btn mt-3">
                            <input type="submit" value="Update" name = "update_profile" class="update-button">
                        </div>
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
        body{
            background:#fff;
        }
        .my-button{
            display:flex;
            flex-direction:row;
            justify-content:center;
        }
        .update-button{
            width: 260px;
            border-radius:5px;
            height: 60px;
            background-color: rgb(29, 184, 88);
            color: white;
            text-align: center;
            font-size: 18px;
            font-family: 'Work Sans', sans-serif;
            border: none;
        }
        .input-text{
            color: #6d6c6cd6;
            padding: 15px 5px;
        }
        .update-button:hover{
            background-color: rgb(69, 206, 11);
        }
        .form-inp{
            width: 100%;
            border-radius: 4px;
            padding: 15px 8px;
            color: #6d6c6cd6;
            border: 1px solid #6d6c6cd6;
            outline:none;
        }
        .form-inp::placeholder{
            color: #202020;
        }
        .main-contain{
            /* background:white; */
            padding: 20px;
            border-radius:5px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
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