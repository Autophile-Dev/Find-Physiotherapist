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
    <title>Physiotherapists</title>
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
    <section class="view-therapist">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <form class="d-flex mt-5" role="search">
                    <input class="form-control me-2" name="search" placeholder="Enter Physiotherapist Name" aria-label="Search">
                    <input type="submit" value="Search" class = "btn btn-outline-success" name = "save">
                  </form>
                      <?php 
                            include("../db/conn.php");
                            $condition = '';
                            if(isset($_REQUEST['search']) and $_REQUEST['search'] != ""){
                                $condition .= 'AND `Physio_name` LIKE "%'.$_REQUEST['search'].'%"';
                            }
            
                            $physioResult = mysqli_query($con, "SELECT * FROM `physiotherapist` WHERE 1 ".$condition."");
                            $row = mysqli_query($con, "SELECT * FROM `physiotherapist` WHERE 1 ".$condition." ORDER BY `Physio_id` DESC")
                        ?>
                        <?php if(isset($_SESSION['sent'])): ?>
                            <div class="sent-msg mb-3">
                                <i class="fa-solid fa-check text-start"></i>
                            <?php
                                echo $_SESSION['sent'];
                                unset($_SESSION['sent']);
                            ?>
                            </div>
                        <?php endif ?>
                        <?php if(isset($_SESSION['exist'])): ?>
                            <div class="exist-msg mb-3">
                                <i class="fa-solid fa-xmark text-start"></i>
                            <?php
                                echo $_SESSION['exist'];
                                unset($_SESSION['exist']);
                            ?>
                            </div>
                        <?php endif ?>
                      <!-- Physiotherapist Table -->
                      <table class="table mt-5">
                          <tr class="col-12">
                              
                              <th class="table-head col-3 col-xxl-3">Physiotherapist Name</th>
                              <th class="table-head col-5 col-xxl-4">Address</th>
                              <th class="table-head col-1 col-xxl-1">Contact No</th>
                              <th class="table-head col-1 col-xxl-2 text-center">Ratings</th>
                              <th class="table-head col-2 col-xxl-2 text-center">Action</th>
                            </tr>
                            <?php while($row = mysqli_fetch_array($physioResult)){ ?>
                                <tr>
                                    <td class="align-middle"><?php echo $row['Physio_name']; ?></td>
                                    <td class="align-middle"><?php echo $row['Physio_address']; ?></td>
                                    <td class="text-center align-middle"><?php echo $row['Physio_phone']; ?></td>
                                    <td class="text-center align-middle"><?php echo $row['Physio_rating']; ?></td>
                                    <td class="text-center actions align-middle"> 
                                        <a href="physiotherapist-info.php?view=<?php echo $row['Physio_id']; ?>" title= "View" class="view-rec"> <i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                        <!-- <tr>
                            <td class="">1</td>
                            <td>Dr. Shahzad Ahmad</td>
                            <td>SPARC, 53-K phase 1 dha lahore, National Hospital and medical center DHA Lahore, Lahore, 54792, Pakistan
                            </td>
                            <td>03200043934</td>
                            <td>4.9</td>
                            <td><a href="./physiotherapist-info.php"><input type="submit" value="Select" class="select"></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Dr. Sang Mailin</td>
                            <td>	
                                R1 Block
                                Johar Town Lahore</td>
                                <td>03136368888</td>
                                <td>4.7</td>
                                <td><a href="./physiotherapist-info.php"><input type="submit" value="Select" class="select"></a></td>
                        </tr> -->
                    </table>
                </div>
            </div>
        </div>
    </section>
    <style>
.view-therapist, .physio-info{
    padding: 40px 10px 40px 10px;
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
.sent-msg{
    margin: 30px auto;
    box-shadow: 0 0 3px 2px #ccc;
    padding:14px 0px;
    border-radius:5px;
    position:relative;
    border-left:6px solid #3c763d;
    background:#dff0d8;
    text-align:center;
    color:#3c763d;
    font-family: 'Work Sans', sans-serif;
    font-size:18px;
    width:50%;
}
.exist-msg{
    margin: 30px auto;
    box-shadow: 0 0 30px 2px #ccc;
    padding:14px 0px;
    border-radius:5px;
    position:relative;
    border-left:6px solid #a94442;
    background:#f2dede;
    text-align:center;
    color:#a94442;
    font-family: 'Work Sans', sans-serif;
    font-size:18px;
    width:50%;
}
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>