<?php
print_r($_POST);
    $errors = array(); // Initialize an error array.
    
    // Backend validation incase the front end validation is disabled by a malicious user

    // validate email

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL)))
    {
        $errors[] = 'You forgot to enter your email address';
        $errors[] = ' or the e-mail format is incorrect.';
    }

    // Check for a first name:
    $first_name = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    if (empty($first_name))
    {
        $errors[] = 'You forgot to enter your first name.';
    }

    // Check for a last name:
    $last_name = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    if (empty($last_name))
    {
        $errors[] = 'You forgot to enter your last name.';
    }
    // check for a location 
    $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
    if (empty($location))
    {
        $errors[] = 'You forgot to enter your location.';
    }
    // phone
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    if (empty($location))
    {
        $errors[] = 'You forgot to enter your location.';
    }
    if(empty($errors)){
        try{
            require 'db_connection.php';

            $connection = new Connection();
    
            $pdo_object = $connection->Open();
    
            if($pdo_object){
               // echo"pdo object created";
    
                $query = "INSERT INTO meditech.patients (first_name, last_name, email, phone, location) VALUES (:fname, :lname, :email, :phone, :location)";
    
                $stmt = $pdo_object->prepare($query);
    
                $stmt->bindvalue(':email', $email, PDO::PARAM_STR);
                $stmt->bindvalue(':fname', $first_name, PDO::PARAM_STR);
                $stmt->bindvalue(':lname', $last_name, PDO::PARAM_STR);
                $stmt->bindvalue(':phone', $phone, PDO::PARAM_INT);
                $stmt->bindvalue(':location', $location, PDO::PARAM_STR);
                //executing the query
                $stmt->execute();
    
                if ($stmt->rowCount() == 1){
                    echo "<p style ='color: green; font-size: bolder; tex-align:centre;'>Success!<p>";
                    echo "<script>alert('Success')</script>";
                    session_start();
                    $_SESSION = array();
                    $_SESSION['email'] = $email;
                    header("Location: http://localhost/meditech/public/view_patient.php");
                    exit();
                }else{
                    echo "Please try again later.";
                }
            }
        }
        catch(Exception $e){
            //hiding errors from users
            //echo $e->getMessage();
            $errs = $stmt->errorInfo();
            if ($errs[1] == 1062)
            {
                echo "***The email address is already registered. Please enter another of your email to continue.***<br>";
            }

            echo "The system is currently busy, please try again later";

        }catch(Error $e){
            //echo $e->getMessage();
            echo "The system is currently busy, please try again later";
        }
    }else{
        /***************************
         * printing validation errors errors to the user
         * *************************** */
        echo "<p class='error'>The following errors occured: <br>";
        foreach ($errors as $mistake)
        {
            echo "***" . $mistake . "****<br>";
        }
        echo "</p>";
    }
?>