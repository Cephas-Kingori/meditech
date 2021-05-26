<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("Location: http://localhost/meditech/public/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit = no">
    <meta name="description" content="MediTech-webapp">
    <meta name="author" content="Cephas_Kingori">
    <title>MediTech</title>
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container-fluid">

        <div class="jumbotron"style="background-color: #6f5499; align-content: center; text-align: center;">
            <p style="font-weight: bolder;" ><h3 style="color: white;">MEDITECH INFORMATION SYSTEM</h3></p>
        </div>

        <div class="container">

            <p class="error"><?php if(isset($_POST['submit'])){ include_once('../php/add_patient.php'); } ?></p>

            <form action="" name= "add-patient" id="add-patient" method="post">
                <!-- signup form-->
                <h5 style="text-align: center;">ADD PATIENTS</h1>

                <div>
                    <label class="form-label" for="first_name">First Name:</label class="form-label"><br>
                    <input placeholder="First Name" class ="form-control" type="text" name="firstname" id="firstname">
                </div>

                <div>
                    <label class="form-label" for="last_name">Last Name:</label class="form-label"><br>
                    <input placeholder="Last Name" class ="form-control" type="text" name="lastname" id="lastname">
                </div>

                <div>
                    <label class="form-label" for="email">Email:</label class="form-label"><br>
                    <input placeholder="Enter your email" class ="form-control" type="text" name="email" id="email">
                </div>

                <div>
                    <label class="form-label" for="phone">Phone Number:</label class="form-label"><br>
                    <input placeholder="Phone" class ="form-control" type="text" name="phone" id="phone">
                </div>

                <div>
                    <label class="form-label" for="last_name">Location:</label class="form-label"><br>
                    <input placeholder="Location" class ="form-control" type="text" name="location" id="location">
                    <br>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" name="submit" class="btn-lg btn-block btn-success">Add Patient</button>
                    </div>
                    <div class="col-md-6">
                        <button type="reset" class="btn-lg btn-block btn-danger">Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Form validation using Jquery -->
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script type="text/javascript" src="../js/add_patient.js"></script>
</body>
</html>