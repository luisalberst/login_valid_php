<?php 
session_start();

// Ceck if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login.php");
    exit;
} else if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === true){ // check if session loggedin exist
    $type_user = $_SESSION['type_user'];
    if($type_user == 'admin'){            
        header("location: pages/admin/index.php"); // redirect to admin panel
    } else if ($type_user == 'teacher'){
        header("location: pages/teacher/index.php"); // redirect to teacher panel
    } else {        
        session_destroy(); // destroy session if type_user =! admin && type_user =! teacher && type_user =! student  
        header("location: /login.php");
    }
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Page</title>
</head>
<body>
    <h6>Hello, <?php echo $name; ?></h6>
    <h5>This Student Page</h5>
    <a href="/logout.php" class="btn btn-primary">Cerrar Sesión</a>
</body>
</html>