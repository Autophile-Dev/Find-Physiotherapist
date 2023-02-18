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
    <title>Collection</title>
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
    <section class="view-exercise">
        <div class="container">
            <div class="row">
                <form class="d-flex mt-5" role="search">
                    <input class="form-control me-2" name="search" placeholder="Enter Exercise Name" aria-label="Search">
                    <input type="submit" class = "btn btn-outline-success" name = "save">
                </form>
                <?php if(isset($_SESSION['del-message'])): ?>
                    <div class="del-msg mb-3">
                    <i class="fa-regular fa-trash-can"></i>
                        <?php
                            echo $_SESSION['del-message'];
                            unset($_SESSION['del-message']);
                        ?>
                    </div>
                    <?php endif ?>
                <table class="table mt-5">
                    <tr class="col-12">
                        <th class="table-head col-2 col-lg-2">Exercise Name</th>
                        <th class="table-head col-2 col-lg-3">Time Duration</th>
                        <th class="table-head col-3 col-lg-4">Link</th>
                        <th class="table-head text-start text-md-center col-6 col-lg-3">Actions</th>
                    </tr>
                    <?php
                        include("../db/conn.php");
                        $condition = '';
                        if(isset($_REQUEST['search']) and $_REQUEST['search'] != ""){
                            $condition .='AND `Save_exercise_name` LIKE "%'.$_REQUEST['search'].'%"';
                        }
                        $exerciseResult = mysqli_query($con, "SELECT * FROM `saved-exercise` WHERE 1 AND `Patient_phone` = '$phone_num'  ".$condition."");
                        $row = mysqli_query($con, "SELECT * FROM `saved-exercise` WHERE 1 AND `Patient_phone` = '$phone_num'".$condition." ORDER BY `Save_id` DESC");
                    ?>
                    <?php while($row = mysqli_fetch_array($exerciseResult)){ ?>
                        <tr>
                        <td class = "align-middle"> <?php echo $row['Save_exercise_name']; ?> </td>
                        <td class = "align-middle"><?php echo $row['Save_exercise_duration']; ?></td>
                        <td class = "align-middle"><a href="<?php echo $row['Save_exercise_link']; ?>" class="link" target="_blank"><?php echo $row['Save_exercise_link']; ?></a></td>
                        <td class = "text-center align-middle">
                            <a href="./collection-view.php?view=<?php echo $row['Save_id'];  ?>"  title = "View" class = "view-rec"><i class = "fa-solid fa-eye"></i></a>
                            <a href="./delete-exercise.php?del=<?php echo $row['Save_id'];  ?>"  title = "Delete" class = "del-rec"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
            </div>
        </div>
    </section>
    <style>
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
.del-rec{
    background: none;
    color: red;
    font-family: 'Work Sans', sans-serif;
    font-size: 20px;
    border: 2px solid red;
    padding: 8px;
    transition-duration: 0.4s;
    border-radius: 100%;
}
.del-rec:hover{
    background: maroon;
    color:white;
    border-radius: 100%;
    border: 2px solid maroon;
}
.del-msg{
    margin: 30px auto;
    padding: 14px 0px;
    border-radius: 5px;
    position:relative;
    border-left:6px solid #a94442;
    background:#f2dede;
    text-align: center;
    color: #a94442;
    font-family: 'Work Sans', sans-serif;
    font-size:18px;
    width:50%;
    box-shadow:0 0 3px 2px #ccc;
}
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>