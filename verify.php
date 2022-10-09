<!-- 
    This line of code must be present in all php files containing html "web pages" 
    (except functions and database connection classes) to validate the type of login 
    present and redirect the user to it.
-->

<?php 
session_start();

if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === true){ // check if session loggedin exist
    $type_user = $_SESSION['type_user'];
    if($type_user == 'admin'){            
        header("location: /admin/index.php"); // redirect to admin panel
    } else if ($type_user == 'teacher'){
        header("location: /teacher/index.php"); // redirect to teacher panel
    } else if ($type_user == ' student'){
        header("location: /student/index.php"); // redirect to student panel
    } else {        
        session_destroy(); // destroy session if type_user =! admin && type_user =! teacher && type_user =! student  
    }
}

?>