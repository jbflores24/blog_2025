<?php 

    include("includes/header_front.php");
    include "./config/Mysql.php";
    include "./modelos/Usuario.php";
    $base = new Mysql();
    $conexion = $base->connect();
    $usuario = new Usuario($conexion);
    if (isset($_POST['registrarse'])){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmar_password = $_POST['confirmar_password'];
        if (empty($nombre) || $nombre=="" || empty($email) || $email=="" || empty($password) || $password=="" || empty($confirmar_password) || $confirmar_password==""){
            $error = "Algunos campos están vacíos";
        } else {
            if ($password != $confirmar_password){
                $error = "Las contraseñas no coinciden";
            } else {
                if ($usuario->validaEmail($email)) {
                    $error = "Ese correo ya existe";
                } else {
                    if ($usuario->registro($nombre, $email, $password)) {
                        $mensaje = "Registro exitoso";
                    } else {
                        $error = "No se pudo registrar";
                    }
                }
            }
        }
        
    }
?>

    <div class="row">
        <div class="col-sm-12">
            <?php if (isset($error)):?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?=$error?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php if (isset($mensaje)):?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?=$mensaje?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif;?>
        </div>
    </div>

    <div class="container-fluid">
        <h1 class="text-center">Registro de Usuarios</h1>
        <div class="row">
            <div class="col-sm-6 offset-3">
                <div class="card">
                   <div class="card-header">
                        Regístrate para poder comentar
                   </div>
                    <div class="card-body">
                    <form method="POST" action="">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre">               
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Ingresa el email">               
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Ingresa el password">               
                    </div>

                    <div class="mb-3">
                        <label for="confirmarPassword" class="form-label">Confirmar password:</label>
                        <input type="password" class="form-control" name="confirmar_password" placeholder="Ingresa la confirmación del password">            
                    </div>                    

                    <br />
                    <button type="submit" name="registrarse" class="btn btn-primary w-100"><i class="bi bi-person-bounding-box"></i> Registrarse</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>  
         
    </div>
<?php include("includes/footer.php") ?>
       