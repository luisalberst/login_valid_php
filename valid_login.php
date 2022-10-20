<?php
        // Include config file
        // $_SERVER['DOCUMENT_ROOT'] get server path / route
        require_once ($_SERVER['DOCUMENT_ROOT']."/bd/config.php"); // Conexión File
    
        // Define variables and initialize with empty values
        $username = $password = "";
        $username_err = $password_err = "";
        
        // Processing form data when form is submitted
            // Check if username is empty
            if(empty(trim($_POST["username"]))){
                echo $username_err = "1";
            } else{
                $username = trim($_POST["username"]);
            }
                    
            // Check if password is empty
            if(empty(trim($_POST["password"]))){
                echo $password_err = "1";
            } else{
                $password = trim($_POST["password"]);
            }
            
            // Validate credentials
            if(empty($username_err) && empty($password_err)){
                // Prepare a select statement
                $sql = "SELECT id, name, username, password, type_user FROM users WHERE username = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_username);
                    
                    // Set parameters
                    $param_username = $username;
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        // Store result
                        mysqli_stmt_store_result($stmt);
                        
                        // Check if username exists, if yes then verify password
                        if(mysqli_stmt_num_rows($stmt) == 1){                    
                            // Bind result variables
                            mysqli_stmt_bind_result($stmt, $id, $name, $username, $hashed_password, $type_user);
                            if(mysqli_stmt_fetch($stmt)){
                                if(password_verify($password, $hashed_password)){
                                        // Initialize the session
                                        session_start();
                                        // Store data in session variables
                                        $_SESSION["loggedin"] = true; // session data to verify if login exist
                                        $_SESSION["id"] = $id;
                                        $_SESSION["name"] = $name;  
                                        $_SESSION["username"] = $username;     
                                        $_SESSION["type_user"] = $type_user; // session data of var (get bd type_user)
                                        
                                        //---- TEACHER / USER / ADMIN ---
                                        if ($type_user === 'teacher'){
                                            echo 3;
                                        } else if ($type_user === 'student'){
                                            echo 4;
                                        } else if ($type_user === 'admin'){
                                            echo 5;
                                        }                                        
                                        
                                } else{
                                    // Display an error message if password is not valid (Password invalid)
                                    echo $password_err = "6";
                                }
                            }
                        } else{
                            // Display an error message if username doesn't exist (Username invalid)
                           echo $username_err = "7";
                        }
                    } else{
                        // Database error
                        echo "0";
                    }
                }            
                // Close statement
                mysqli_stmt_close($stmt);
            }        
            // Close connection
            mysqli_close($link);

?>
