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
    <title>View Exercises</title>
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
                  <?php if(isset($_SESSION['e_message'])): ?>
                    <div class="e-msg mb-3">
                    <i class="fa-solid fa-xmark text-start"></i>
                        <?php
                            echo $_SESSION['e_message'];
                            unset($_SESSION['e_message']);
                        ?>
                    </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['s_message'])): ?>
                    <div class="s-msg mb-3">
                    <i class="fa-solid fa-check text-start"></i>
                        <?php
                            echo $_SESSION['s_message'];
                            unset($_SESSION['s_message']);
                        ?>
                    </div>
                    <?php endif ?>
                  <!-- Exercise Table Print from database-->
                  <table class="table back-table mt-5">
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
                            $condition .='AND `Exercise_name` LIKE "%'.$_REQUEST['search'].'%"';
                        }
                        $exerciseResult = mysqli_query($con, "SELECT * FROM `exercise` WHERE 1 ".$condition."");
                        $row = mysqli_query($con, "SELECT * FROM `exercise` WHERE 1 ".$condition." ORDER BY `Exercise_id` DESC");
                    ?>
                    <?php while($row = mysqli_fetch_array($exerciseResult)){ ?>
                        <tr>
                        <td class = "align-middle"> <?php echo $row['Exercise_name']; ?> </td>
                        <td class = "align-middle"><?php echo $row['Exercise_duration']; ?></td>
                        <td class = "align-middle"><a href="<?php echo $row['Exercise_link']; ?>" class="link" target="_blank"><?php echo $row['Exercise_link']; ?></a></td>
                        <td class = "text-center align-middle">
                            <a href="./view-exercise.php?view=<?php echo $row['Exercise_id'];  ?>"  title = "View" class = "view-rec"><i class = "fa-solid fa-eye"></i></a>
                            <a href="./save-exercise.php?save=<?php echo $row['Exercise_id'];  ?>"  title = "Save" class = "save-rec"><i class="fa-sharp fa-solid fa-plus"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <!-- <tr>
                        <td>1</td>
                        <td>Ankle Pumps</td>
                        <td>Twice a Week</td>
                        <td><a href="https://youtu.be/KxfFzSOAT7g" class="link" target="_blank">https://youtu.be/KxfFzSOAT7g</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Thigh Sqeeze</td>
                        <td>Daily</td>
                        <td><a href="https://youtu.be/aMW8-IIHw08" class="link" target="_blank">https://youtu.be/aMW8-IIHw08	</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Heel Slides(knee replacement)</td>
                        <td>Daily</td>
                        <td><a href="https://youtu.be/Bz0wSFRjH2c" class="link" target="_blank">https://youtu.be/Bz0wSFRjH2c</a></td>
                    </tr> -->
                  </table>
            </div>
        </div>
    </section>
<style>
.save-rec{
    color: #14C38E;
    font-family: 'Work Sans', sans-serif;
    font-size: 20px;
    border: 2px solid #14C38E;
    padding: 8px;
    transition-duration: 0.4s;
    border-radius: 100%;
}
.save-rec:hover{
    background-color: #5FD068;
    color: white;
    border: 2px solid #5FD068;
    border-radius: 100%;
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
i{
    font-weight:bold;
}
.e-msg{
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
.s-msg{
    margin: 30px auto;
    box-shadow:0 0 3px 2px #ccc;
    padding: 14px 0px;
    border-radius: 5px;
    position:relative;
    border-left:6px solid #3c763d;
    background:#dff0d8;
    text-align: center;
    color: #3c763d;
    font-family: 'Work Sans', sans-serif;
    font-size:18px;
    width:50%;
}
</style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>