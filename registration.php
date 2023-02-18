<?php  include("includes/register_patient.php"); ?>
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
    <link rel="stylesheet" href="index.css">
    <title>Registration</title>
</head>
<body>
    <style>
        body{
           
        }
    </style>
    <div class="form-main">
        <div class="container">
            <div class="main-contain">
            <div class="form-contain">
                <div class="header">
                    Patient Registration
                </div>
                <br>
                <form method="post" action="registration.php" >
                    <div class="errors">
                    <?php include('includes/errors.php') ?>
                    </div>
                    
                    
                    <div class="row mt-2">
                    <div class="col">
                        <label for="" class="labels mb-1">Patient Name</label>
                        <input type="text"  name = "pname" class="form-control form-inp" placeholder="Patient name">
                    </div>
                    <div class="col">
                        <label for="" class="labels mb-1">Patient Email</label>
                        <input type="mail" name = "pmail" class="form-control form-inp" placeholder="Patient email">
                    </div>
                    </div>
                    <div class="row mt-2">
                    <div class="col">
                        <label for="" class="labels mb-1">Patient Phone.No</label>
                        <input type="text"  name="patient_phone" class="form-control form-inp" placeholder="Patient phone.no">
                    </div>
                    <div class="col">
                        <label for="" class="labels mb-1">Patient Address</label>
                        <input type="text" name = "paddress" class="form-control form-inp" placeholder="Patient address">
                    </div>
                    </div>
                    <div class="row mt-2">
                    <div class="col">
                        <label for="" class="labels mb-1">Password</label>
                        <input type="password" name="ppassword" class="form-control form-inp" placeholder="Password">
                    </div>
                    <div class="col">
                        <label for="" class="labels mb-1">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control form-inp" placeholder="Confirm Password">
                    </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                        <label for="" class="labels mb-1">Gender</label><br>
                        <input type="radio" name="gender" value="Male"/><label for="" class="gender-labels ms-1">Male</label><br>
                        <input type="radio" name="gender" value="Female"/><label for="" class="gender-labels ms-1">Female</label>
                        </div>
                    </div>
                    <div class="btn-sbmt mt-3">
                    <input type="submit" name = "reg_user" class = "btn-reg" value="Register">
                    </div>
                    
                </form>
                <div class="link mt-1">
                    <p class="link-text">Already have an account? <a href="login.php" >Login here</a></p>
                </div>
            </div>
            </div>
            
        </div>
    </div>
    <style>
        
        form select{
            width: 100%;
            border-radius: 4px;
            padding: 15px 8px;
            color: #6d6c6cd6;
            border: 1px solid #6d6c6cd6;
        }
        .btn-reg{
            width: 610px;
            border-radius:5px;
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
            display:flex;
            align-items:center;
            flex-direction:column;
        }
        .form-main{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center
        }
        .form-contain{
            width:50%;
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
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="AdminPanel/js/form.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1c3b6cdb.js" crossorigin="anonymous"></script>
</body>
</html>