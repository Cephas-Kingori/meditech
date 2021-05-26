<?php
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
    
    // Check for a password and match against the confirmed password:
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $confirm = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);

    if (!empty($password) && !empty($confirm))
    {
        if ($password !== $confirm)
        {
            $errors[] = 'Your two password did not match.';
        }
    }
    else
    {
        $errors[] = 'You forgot to enter your password.';
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
    
                $query = "INSERT INTO meditech.users (first_name, last_name, email, password, role) VALUES (:fname, :lname, :email, :password, :role)";
    
                $stmt = $pdo_object->prepare($query);
    
                $stmt->bindvalue(':email', $email, PDO::PARAM_STR);
                $stmt->bindvalue(':fname', $first_name, PDO::PARAM_STR);
                $stmt->bindvalue(':lname', $last_name, PDO::PARAM_STR);
    
                //hashing the password using php PASSWORD_DEFAULT
                $password = password_hash($password, PASSWORD_DEFAULT);
                $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    
                //default user role is assumed to be 1
                $role = 1;
                $stmt->bindvalue(':role', $role, PDO::PARAM_INT);
    
                //executing the query
                $stmt->execute();
    
                if ($stmt->rowCount() == 1){
                    echo "<p style ='color: green; font-size: bolder; tex-align:centre;'>Success!<p>";
                    echo "<script>alert('Success')</script>";
                    session_start();
                    $_SESSION = array();
                    $_SESSION['email'] = $email;
                    header("Location: http://localhost/meditech/public/login.php");
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