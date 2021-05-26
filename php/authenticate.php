<?php
    //print_r($_POST);
    $errors = array(); // Initialize an error array.
    
    // Backend validation incase the front end validation is disabled by a malicious user

    // validate email

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL)))
    {
        $errors[] = 'You forgot to enter your email address';
        $errors[] = ' or the e-mail format is incorrect.';
    }
    // password
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    if(empty($password)){
        $errors[] = 'You forgot to enter your password';
    }
    if (empty($errors))
    {
        //get the database connection file 
        try{
            require 'db_connection.php';

            $connection = new Connection();
    
            $pdo_object = $connection->Open();
    
            if($pdo_object){
               // echo"pdo object created";
    
                $query = "SELECT password FROM meditech.users WHERE email = :email";
    
                $stmt = $pdo_object->prepare($query);
    
                $stmt->bindvalue(':email', $email, PDO::PARAM_STR);
                
                //executing the query
                $stmt->execute();

                //getting the stored password from the database
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //print_r($result);

                if(empty($result)){
                    echo "There is no user with that email.";
                }else{
                    $stored_password = $result[0]['password'];
                    //comparing the entered
                    if (password_verify($password, $stored_password)){
                        session_start();
                        $_SESSION = array();
                        $_SESSION['email'] = $email;
                        echo "<p style ='color: green; font-size: bolder; tex-align:centre;'>Success!<p>";
                        echo "<script>alert('Success')</script>";
                        header("Location: http://localhost/meditech/public/create_patient_record.php");
                        exit();
                    }else{
                        echo "Password is incorrect.";
                    }
                }
            }
        }
        catch(Exception $e){
            //hiding errors from users
            //echo $e->getMessage();
            echo "The system is currently busy, please try again later";
        }
        catch(Error $e){
            //hiding errors from users
            //echo $e->getMessage();
            echo "The system is currently busy, please try again later";
        }
    
    }
    else
    {
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