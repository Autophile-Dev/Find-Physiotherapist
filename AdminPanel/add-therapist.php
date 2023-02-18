<?php
session_start();
if(!isset($_SESSION['pno'])){
    header("location: ../login.php");
}
else{
    $phone_num = $_SESSION['pno'];
}
?>
<?php include("includes/add.php"); ?>
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
    <link rel="stylesheet" href="adminstyle/main.css">
    <title>Add Therapist</title>
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
    <section class="add-therapist-rec">
        <div class="container">
            <div class="row">
            <div class="main-contain">
            <div class="header mb-4">
                    Add Physiotherspit
                </div>
                <?php if(isset($_SESSION['message'])): ?> 
                  <div class="msg mb-3">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
                </div>
                <?php endif ?>
                <form method="post" action="add-therapist.php" >
                    <!-- <div class="errors mb-3">
                    <?php include('includes/errors.php') ?>
                    </div> -->
                    <div class="row mt-3">
                    <div class="col">
                        <label for="" class="labels mb-1">Physiotherapist Name</label>
                        <input type="text"  name = "pname" class="form-control input-text" placeholder="Physiotherapist name">
                    </div>
                    <div class="col">
                        <label for="" class="labels mb-1">Physiotherapist Email</label>
                        <input type="mail" name = "pmail" class="form-control input-text" placeholder="Physiotherapist email">
                    </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                          <label for="" class="labels mb-1">Physiotherapist Phone.No</label>
                          <input type="text"  name="physiotherapist_phone" class="form-control input-text" placeholder="Physiotherapist phone.no">
                        </div>
                        <div class="col">
                          <label for="" class="labels mb-1">Physiotherapist Address</label>
                          <input type="text" name = "paddress" class="form-control input-text" placeholder="Physiotherapist address">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                          <label for="" class="labels mb-1">Physiotherapist Qualification</label>
                          <input type="text"  name="pqualification" class="form-control input-text" placeholder="Physiotherapist Qualification">
                        </div>
                        <div class="col">
                          <label for="" class="labels mb-1">Physiotherapist Experience</label>
                          <input type="text" name = "pexperience" class="form-control input-text" placeholder="Physiotherapist Experience">
                        </div>
                    </div>
                    <div class="row mt-3">
                    <div class="col">
                        <label for="" class="labels mb-1">Password</label>
                        <input type="password" name="ppassword" class="form-control input-text" placeholder="Password">
                    </div>
                    <div class="col">
                        <label for="" class="labels mb-1">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control input-text" placeholder="Confirm Password">
                    </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                        <label for="" class="labels mb-1">Gender</label><br>
                        <input type="radio" name="gender" value="Male"/><label for="" class="gender-labels ms-1">Male</label><br>
                        <input type="radio" name="gender" value="Female"/><label for="" class="gender-labels ms-1">Female</label>
                        </div>
                    </div>
                    <div class="btn-sbmt mt-2">
                    <input type="submit" name = "reg_physio" class = "btn-reg" value="Add Record">
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
        .input-text{
            color: #6d6c6cd6;
            padding: 10px 8px;
        }
        .btn-reg{
            border-radius: 4px;
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
      /* Add Record */
      .add-therapist-rec
{
    padding: 80px 10px 80px 10px;
}

.add-therapist-rec .header{
    text-align: center;
    font-size: 50px;
    font-weight: bold;
    color: rgb(29, 184, 88);
    font-family: 'Montserrat', sans-serif;
}
.add-therapist-rec .labels{
    color: rgb(29, 184, 88);
    font-family: 'Montserrat', sans-serif;
    font-size: 16px; 
    margin-right: 15px;
    font-weight: bold;
}
.add-therapist-rec .gender-labels{
    font-family: 'Work Sans', sans-serif;
    font-size: 16px;   
    margin-right: 15px;
    color: #6d6c6cd6;   
}
.form-control{
    color: #6d6c6cd6;
    font-size: 16px;
}
.btn-sbmt{
    width: 100%;
    display: flex;
    justify-content: center;
}
.btn-reg{
    width: 300px;
    height: 60px;
    background-color: rgb(29, 184, 88);
    color: white;
    text-align: center;
    font-size: 18px;
    font-family: 'Work Sans', sans-serif;
    border: none;
}
.btn-reg:hover{
    background-color: rgb(69, 206, 11);
}
.link{
    display: flex;
    width: 100%;
    justify-content: center;
}
.link-text{
    font-family: 'Work Sans', sans-serif;
    font-size: 16px;
    color: #6d6c6cd6;
}
a{
    font-family: 'Work Sans', sans-serif;
    font-size: 16px;
    text-decoration: none;
    color: rgb(29, 184, 88);
}
a:hover{
    color: rgb(29, 184, 88);
}
form select
{
    width: 100%;
    border-radius: 4px;
    padding: 8px;
    color: #6d6c6cd6;
}
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
  padding: 14px 0px;
  border-radius: 5px;
  box-shadow:0 0 3px 2px #ccc;
  color: #3c763d;
  box-shadow:0 0 3px 2px #ccc;
  position:relative;
  background: #dff0d8;
  border-left: 6px solid #3c763d;
  width:50%;
  font-family: 'Work Sans', sans-serif;
  font-size: 18px;
  text-align: center;
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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>