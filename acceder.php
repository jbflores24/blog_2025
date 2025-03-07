<?php 
    include("includes/header_front.php");
    include "config/Mysql.php";
    include "modelos/Usuario.php";
    $base = new Mysql();
    $cx = $base->connect();
    $user = new Usuario($cx);
    if (isset($_POST["acceder"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        if ($email=='' || empty($email) || $password=='' || empty ($password)){
            $error = "Todos los campos son obligatorios";
        } else {
            if ($user->login($email, $password)) {
                $mensaje ="Acceso concedido";
                $u = $user->consultaEmail($email);
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $u->id;
                $_SESSION['nombre'] = $u->nombre;
                $_SESSION['email'] = $u->email;
                $_SESSION['rol_id'] = $u->rol_id;
                header ('Location:index.php');
            } else {
                $error = "Usuario o contraseña incorrecto";
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
        <h1 class="text-center">Acceso de Usuarios</h1>
        <div class="row">
            <div class="col-sm-6 offset-3">
                <div class="card">
                   <div class="card-header">
                        Ingresa tus datos para acceder
                   </div>
                    <div class="card-body">
                    <form method="POST" action="">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Ingresa el email">               
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Ingresa el password">               
                    </div>

                    <br />
                    <button type="submit" name="acceder" class="btn btn-primary w-100"><i class="bi bi-person-bounding-box"></i> Acceder</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>  
         
    </div>
<?php include("includes/footer.php") ?>
       