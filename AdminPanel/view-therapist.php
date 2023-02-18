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
include("../db/conn.php");
if(isset($_GET['view'])){
    $id = $_GET['view'];
    $result = mysqli_query($con, "SELECT * FROM `physiotherapist` WHERE `Physio_id` = '$id'");
    $resultCheck = mysqli_fetch_array($result);
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
    <title>Physiotherapist Info</title>
</head>
<body>
    <section class="physio-info">
        <div class="container">
            <div class="row">
                <div class="main-contain">
                <h1 class="physio-info-header mb-5"><?php echo $resultCheck['Physio_name']; ?></h1>
                <div class="physio-content mb-4">
                    <label for="" class="physio-asset">Name: </label><p class="profile ms-3"> <?php echo $resultCheck['Physio_name']; ?> </p>
                </div>
                <div class="physio-content mb-4">
                    <label for="" class="physio-asset">Address: </label><p class="profile ms-3">
                        <?php echo $resultCheck['Physio_address']; ?>
                    </p>
                </div>
                <div class="physio-content mb-4">
                    <label for="" class="physio-asset">Phone.No: </label><p class="profile ms-3"> <?php echo $resultCheck['Physio_phone']; ?> </p>
                </div>
                <div class="physio-content mb-4">
                    <label for="" class="physio-asset">Email: </label><p class="profile ms-3"> <?php echo $resultCheck['Physio_email']; ?> </p>
                </div>
                <div class="physio-content mb-4">
                    <label for="" class="physio-asset">Qualification: </label><p class="profile ms-3"> <?php echo $resultCheck['Physio_qualification']; ?> </p>
                </div>
                <div class="physio-content mb-4">
                    <label for="" class="physio-asset">Experience: </label><p class="profile ms-3"> <?php echo $resultCheck['Physio_experience']; ?> </p>
                </div>
                <div class="physio-content mb-4">
                    <label for="" class="physio-asset">Gender: </label><p class="profile ms-3"> <?php echo $resultCheck['Physio_gender'] ?> </p>
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
/* View therapist info */
.physio-info{
    padding: 80px 10px 80px 10px;
    width: 100%;
    
}
.physio-info-header{
    color: rgb(29, 184, 88);
    font-family: 'Montserrat', sans-serif;
    font-size: 80px; 
    font-weight: bold;
    border-bottom: 4px solid rgb(29, 184, 88);
}
.physio-asset{
    color: rgb(29, 184, 88);
    font-family: 'Montserrat', sans-serif;
    font-size: 16px; 
    font-weight: bold;
}
.physio-content{
    display: flex;
}
.profile{
    color: #6d6c6cd6;
    font-family: 'Work Sans', sans-serif;
    font-size: 16px;
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
/* View therapist info */
    </style>
</body>
</html>