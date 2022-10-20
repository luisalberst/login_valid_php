<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Jquery librery -->
    <script src="jquery/jquery.min.js"></script>
    <!-- Wrapper Css -->
    <style>
        .wrapper{ width: 400px; padding: 20px; margin: auto; text-align: center;}
    </style>
</head>
<body>
    <main>
        <div class="wrapper">
            <div class="card shadow mb-4 my-5">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Inicia Sesion</h6>
                </div>
                <div class="card-body">
                    <form class="user" id="loginform" action="" method="POST">                                                                          
                        <div class="form-group mb-3">
                            <input type="text" id="username" name="username" placeholder="Ingresa tu usuario" class="form-control form-control-user"
                                autocomplete="off" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" class="form-control form-control-user" 
                                autocomplete="off" required>
                        </div> 
                        <input type="submit" class="btn btn-primary btn-user btn-block" id="login" value="Login">                    
                    </form>
                    <a class="my-2" href="#">Registrarse</a>
                    <br>
                    <a class="my-2" href="#">Recuperar contraseña</a>
                </div>
            </div>
        </div>
    </main>
    <!-- End #main -->
    <script>
        $(function(){
            $('#login').on('click',function(e){
                e.preventDefault();                
                var username = $('#username').val();
                var password = $('#password').val();
                $.ajax({
                    type: "POST",
                    url: "valid_login.php",
                    data: ('username='+username+'&password='+password),
                    success: function(response){
                        if (response == 1 || response == 11){                            
                            alert('Se debe ingresar usuario y/o contraseña');
                        } else if (response == 3){
                            location.replace('pages/teacher/index.php'); 
                        }  else if (response == 4){
                            location.replace('pages/student/index.php'); 
                        } else if (response == 5) {
                            location.replace('pages/admin/index.php'); 
                        } else if (response == 6 || response == 7) {                                                                               
                            alert('Usuario y/o Contraseña invalidos o no existen');                     
                        } else if (response == 0) {
                            alert('Algo salió mal, por favor vuelve a intentarlo');
                        }
                    }
                });
            });
        });
    </script>
    <!-- Vendor JS -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>