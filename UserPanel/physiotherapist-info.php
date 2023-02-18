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
$view = $_GET['view'];
$result = mysqli_query($con, "SELECT * FROM `physiotherapist` WHERE `Physio_id` = '$view'");
$check = mysqli_fetch_assoc($result);}
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
    <title>Physiotherapist Info</title>
</head>
<body>
    <section class="physio-info">
        <div class="container">
            <div class="row">
                <h1 class="Physio-info-header mb-5"><?php echo $check['Physio_name']; ?></h1>
                <p><label for="" class="input-labels">Physiotherapist Name: </label><?php echo $check['Physio_name']; ?></p>
                <p><label for="" class="input-labels">Address: </label>
                    <?php echo $check['Physio_address']; ?>
                </p>
                <p><label for="" class="input-labels">Qualification: </label><?php echo $check['Physio_qualification']; ?></p>
                <p><label for="" class="input-labels">Experience: </label><?php echo $check['Physio_experience']; ?></p>
                <!-- Rate the physiotherapist -->
                <p><label for="" class="input-labels">Physiotherapist Rating: </label><?php echo $check['Physio_rating']; ?> <i class="fa-solid fa-star"></i></p>
                
                <p><label for="" class="input-labels mt-4">Select Time for checkup from below:</label></p>
                <!-- added time slot by physiotherapist -->
                <!-- <?php if(isset($_SESSION['sent'])): ?>
                    <div class="sent-msg mb-3">
                        <i class="fa-solid fa-check text-start"></i>
                        <?php
                            echo $_SESSION['sent'];
                            unset($_SESSION['sent']);
                        ?>
                    </div>
                    <?php endif ?> -->
                <table class="table mt-4">
                    <tr class="col-12">
                        <th class="table-head col-3 col-xxl-3">Slot.no</th>
                        <th class="table-head col-3 col-xxl-3">Date</th>
                        <th class="table-head col-3 col-xxl-3">Time</th>
                        <th class="table-head col-3 col-xxl-3">Action</th>
                    </tr>
                    <?php 
                    $timeResult = mysqli_query($con, "SELECT * FROM `time-slots` WHERE `Physio_id` = '$view'");
                    $i = 1;
                    ?>
                    <?php while($row = mysqli_fetch_array($timeResult)){   ?>
                    <tr>
                        
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['Slot_date']; ?></td>
                        <td><?php echo $row ['Slot_time']; ?></td>
                        <td class="align-middle"> 
                            <a href="./request.php?request=<?php echo $row['Slot_id']; ?>" class="request">Request
                        </td>
                    </tr>

                    <?php $i++;} ?>
                    
                </table>
            </div>
        </div>
    </section>
    <style>
.Physio-info-header{
    color: rgb(29, 184, 88);
    font-family: 'Montserrat', sans-serif;
    font-size: 80px; 
    font-weight: bold;
    border-bottom: 4px solid rgb(29, 184, 88);
}
.request{
    padding:8px 12px;
    text-decoration: none;
}
.request:hover{
    color: white;
}
.sent-msg{
    margin: 30px auto;
    box-shadow: 0 0 30px 2px #ccc;
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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>