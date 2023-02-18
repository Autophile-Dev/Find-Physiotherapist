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
    <title>View Exercise</title>
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
    <section class="view-exercise">
        <div class="container">
            <div class="row">
                <form class="d-flex mt-5" role="search">
                    <input class="form-control me-2" name="search" placeholder="Enter Exercise Name" aria-label="Search">
                    <input type="submit" value = "Search" class = "btn btn-outline-success" name = "save">
                  </form>
                  <?php if(isset($_SESSION['message'])): ?> 
                        <div class="msg mb-3">
                            <?php 
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            ?>
                        </div>
                    <?php endif ?>
                  <!-- Exercise Table Print from database-->
                  <table class="table mt-4">
                    <tr class="col-12">
                        <th class="table-head col-2 col-lg-3">Exercise Name</th>
                        <th class="table-head col-2 col-lg-3">Duration</th>
                        <th class="table-head col-2 col-lg-3">Link</th>
                        <th class="table-head text-start text-md-center col-6 col-lg-3">Actions</th>
                    </tr>
                    <?php 
                    include("../db/conn.php");
                    $condition = '';
                    if(isset($_REQUEST['search']) and $_REQUEST['search'] != ""){
                        $condition .='AND `Exercise_name` LIKE "%'.$_REQUEST['search'].'%"';
                    }  
                    $exerciseResult = mysqli_query($con, "SELECT * FROM `exercise` WHERE 1 AND `Physio_phone` = '$phone_num' ".$condition."");
                    $row = mysqli_query($con, "SELECT * FROM `exercise` WHERE 1  AND `Physio_phone` = '$phone_num' ".$condition." ORDER BY `Exercise_id` DESC");
                    ?>
                    <?php while($row = mysqli_fetch_array($exerciseResult)){ ?>
                    <tr>
                        <td class = "align-middle"> <?php echo $row['Exercise_name']; ?> </td>
                        <td class = "align-middle"><?php echo $row['Exercise_duration']; ?></td>
                        <td class = "align-middle"><a href="<?php echo $row['Exercise_link']; ?>" class="link" target="_blank"><?php echo $row['Exercise_link']; ?></a></td>
                        <td class = "text-center align-middle">
                            <a href="./view-exercise.php?view=<?php echo $row['Exercise_id'];  ?>" title = "View" class = "view-rec"><i class = "fa-solid fa-eye"></i></a>
                            <a href="./edit-exercise.php?edit=<?php echo $row['Exercise_id'];  ?>" title = "Edit" class = "edt-rec"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="./delete-exercise.php?del=<?php echo $row['Exercise_id'];  ?>" title = "Delete" class = "del-rec"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <!-- <tr>
                        <td>2</td>
                        <td>Thigh Sqeeze</td>
                        <td>Daily</td>
                        <td><a href="https://youtu.be/aMW8-IIHw08" class="link" target="_blank">https://youtu.be/aMW8-IIHw08	</a></td>
                        <td> <a href=""> <input type="submit" value="Edit" class="edt-rec"></a></td>
                        <td><a href=""><input type="submit" value="Delete" class="del-rec"> </a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Heel Slides(knee replacement)</td>
                        <td>Daily</td>
                        <td><a href="https://youtu.be/Bz0wSFRjH2c" class="link" target="_blank">https://youtu.be/Bz0wSFRjH2c</a></td>
                        <td> <a href=""> <input type="submit" value="Edit" class="edt-rec"></a></td>
                        <td><a href=""><input type="submit" value="Delete" class="del-rec"> </a></td>
                    </tr> -->
                  </table>
            </div>
        </div>
    </section>
    <style>
    .error{
    width: 100%;
    padding: 10px;
    border: 1px solid #a94442;
    background: #f2dede;
    border-radius: 5px;
    text-align: left;
    }
    .msg{
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
    .del-rec{
    background: none;
    color: red;
    font-family: 'Work Sans', sans-serif;
    font-size: 20px;
    border: 2px solid red;
    padding: 8px;
    border-radius: 100%;
}
.del-rec:hover{
    background: maroon;
    color:white;
    border-radius: 100%;
    border: 2px solid maroon;
}
.edt-rec{
    color: darkblue;
    font-family: 'Work Sans', sans-serif;
    font-size: 20px;
    border: 2px solid darkblue;
    padding: 8px;
    background: none;
    border-radius: 100%;
}
.edt-rec:hover{
    background-color: skyblue;
    color: white;
    border: 2px solid skyblue;
    border-radius: 100%;
}
    .view-rec{
    color: #FFCC00;
    font-family: 'Work Sans', sans-serif;
    font-size: 20px;
    border: 2px solid #FFCC00;
    padding: 8px;
    border-radius: 100%;
}
.view-rec:hover{
    background-color: rgb(255, 238, 0);
    color: white;
    border: 2px solid rgb(255, 238, 0);
    border-radius: 100%;
}
@media(max-width: 1400px){
    .edt-rec{
        padding: 5px;
        font-size: 16px;
    }
    .del-rec{
        padding: 5px;
        font-size: 16px;
    }
    .view-rec{
        padding: 5px;
        font-size: 16px;
    }
}
@media(max-width: 768px){
    .edt-rec{
        padding: 5px;
        font-size: 12px;
    }
    .del-rec{
        padding: 5px;
        font-size: 12px;
    }
    .view-rec{
        padding: 5px;
        font-size: 12px;
    }
}
@media(max-width: 502px){
    /* .actions{
        display: flex;
        flex-direction: column;
    } */
    .edt-rec{
        
        font-size: 10px;
    }
    .del-rec{
        
        font-size: 10px;
    }
    .view-rec{
        
        font-size: 10px;
    }
}
@media(max-width: 362px){
    .edt-rec{
        
        font-size: 10px;
    }
    .del-rec{
        
        font-size: 10px;
    }
    .view-rec{
        
        font-size: 10px;
    }
}
.error{
    width: 100%;
    padding: 10px;
    border: 1px solid #a94442;
    background: #f2dede;
    border-radius: 5px;
    text-align: left;
    }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>