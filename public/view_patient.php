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

            <h5 style="text-align: center;">VIEW PATIENTS</h1>

            <?php 
                
                try{
                    require '../php/db_connection.php';

                    $connection = new Connection();
    
                    $pdo_object = $connection->Open();
            
                    if($pdo_object){
                       // echo"pdo object created";
                       $query = "SELECT * FROM meditech.patients WHERE 1";
                       $stmt = $pdo_object->prepare($query);
                        //executing the query
                       $stmt->execute();
                       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }
                }
                catch(Exception $e){
                    //echo $e->getMessage();
                    echo "The system is currently busy, please try again later";
                }
                catch(Error $e){
                    //echo $e->getMessage();
                    echo "The system is currently busy, please try again later";
                }
            ?>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <th>Patient Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Date created</th>
                </thead>

                <tbody>
                    <?php 
                        //print_r($result);
                        foreach ($result as $patient) {
                            echo "<tr>";

                            echo "<td>". $patient['patient_id']. "</td>";
                            echo "<td>". $patient['first_name']. "</td>";
                            echo "<td>". $patient['last_name']. "</td>";
                            echo "<td>". $patient['email']. "</td>";
                            echo "<td>". $patient['phone']. "</td>";
                            echo "<td>". $patient['location']. "</td>";
                            echo "<td>". $patient['date_created']. "</td>";

                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>