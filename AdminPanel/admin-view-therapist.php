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
    <link rel="stylesheet" href="./adminstyle/main.css">
    <title>View Physiotherapists</title>
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
                            <a href="./index.php" class="me-0 me-xl-3">Home</a>
                            <a href="./admin-aboutus.php" class="me-0 me-xl-3">About Us</a>
                            <a href="./admin-contactus.php" class=" me-0 me-xl-3">Contact Us</a>
                            <a href="./admin-terms&condition.php" class="me-0 me-xl-3">Terms & Conditions</a>
                            <a href="./add-therapist.php" class="me-0 me-xl-3">Add Physiotherapist</a>
                            <a href="./admin-view-therapist.php" class="me-0 me-xl-3">View Physiotherapists</a>
                            <a href="./admin-profile.php" class="me-0 me-xl-3">Profile</a>
                            <a href="./admin-logout.php">Logout</a>
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
                    <form class="d-flex mt-4" role="search">
                        <input class="form-control me-2" name = "search" placeholder="Enter Physiotherapist info" aria-label="Search">
                        <input type="submit" class="btn btn-outline-success" name = "save">
                      </form>
                    <?php if(isset($_SESSION['edt-message'])): ?> 
                        <div class="msg mb-3">
                            <?php 
                                echo $_SESSION['edt-message'];
                                unset($_SESSION['edt-message']);
                            ?>
                        </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['del-message'])): ?> 
                        <div class="del-msg mb-3">
                            <?php 
                                echo $_SESSION['del-message'];
                                unset($_SESSION['del-message']);
                            ?>
                        </div>
                    <?php endif ?>
                    <table class="table mt-5">
                        <tr class="col-12">
                            <th class="table-head col-2 col-xxl-2">Physiotherapist Name</th>
                            <th class="table-head col-4 col-xxl-4">Address</th>
                            <th class="table-head col-3 col-xxl-3 text-center">Contact No</th>
                            <th class="table-head col-3 col-xxl-3 text-start text-md-center">Actions</th>
                        </tr>
                        <?php 
                            include("../db/conn.php");
                            $condition = '';
                            if(isset($_REQUEST['search']) and $_REQUEST['search'] != ""){
                                $condition .= 'AND `Physio_name` LIKE "%'.$_REQUEST['search'].'%"';
                            }
            
                            $physioResult = mysqli_query($con, "SELECT * FROM `physiotherapist` WHERE 1 ".$condition."");
                            $row = mysqli_query($con, "SELECT * FROM `physiotherapist` WHERE 1 ".$condition." ORDER BY `Physio_id` DESC")
                        ?>
                        <?php while($row = mysqli_fetch_array($physioResult)){ ?>
                        <tr>
                            <td class="align-middle"><?php echo $row['Physio_name']; ?></td>
                            <td class="align-middle"><?php echo $row['Physio_address']; ?></td>
                            <td class="text-center align-middle"><?php echo $row['Physio_phone']; ?></td>
                            <td class="text-center actions align-middle"> 
                                <a href="./view-therapist.php?view=<?php echo $row['Physio_id']; ?>" title= "View" class="view-rec"> <i class="fa-solid fa-eye"></i></a>
                                <a href="./edit-therapist.php?edit=<?php echo $row['Physio_id']; ?>" title= "Edit" class="edt-rec"> <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="./delete-therapist.php?del=<?php echo $row['Physio_id']; ?>" title= "Delete" class="del-rec"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                            
                            
                        </tr>
                        <?php } ?>
                        <!-- <tr>
                            <td>2</td>
                            <td>Dr. Sang Mailin</td>
                            <td>	
                                R1 Block
                                Johar Town Lahore</td>
                                <td>03136368888</td>
                                <td> <a href="./edit-therapist.php"> <input type="submit" value="Edit" class="edt-rec"></a></td>
                                <td><input type="submit" value="Delete" class="del-rec"> </td>
                        </tr> -->
                    </table>
                </div>
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
    .del-msg{
    margin: 30px auto;
    padding: 14px 0px;
    box-shadow: 0 0 3px 2px #ccc;
    position: relative;
    border-radius: 5px;
    color: #a94442;
    background: #f2dede;
    border-left: 6px solid #a94442;
    width:50%;
    font-family: 'Work Sans', sans-serif;
    font-size: 18px;
    text-align: center;    
    }
    .msg{
    margin: 30px auto;
    padding: 14px 0px;
    box-shadow: 0 0 3px 2px #ccc;
    position: relative;
    border-radius: 5px;
    color: #3c763d;
    background: #dff0d8;
    border-left: 6px solid #3c763d;
    width:50%;
    font-family: 'Work Sans', sans-serif;
    font-size: 18px;
    text-align: center;
    }
    .del-rec{
    background-color: none;
    color: red;
    font-family: 'Work Sans', sans-serif;
    font-size: 20px;
    border: 2px solid red;
    padding: 8px;
    border-radius: 100%;
}
.del-rec:hover{
    background-color: maroon;
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
    .actions{
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
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
    </style>                       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>