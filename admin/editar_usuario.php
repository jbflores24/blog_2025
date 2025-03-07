<?php 
    include("../includes/header.php");
    include "../config/Mysql.php";
    include "../modelos/Usuario.php";
    $base = new Mysql();
    $cx = $base->connect();
    $user = new Usuario($cx);  
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $u = $user->getUsuario($id);
    }

    if (isset($_POST['editarUsuario'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $rol_id = $_POST['rol_id'];
        if (empty($nombre) || $nombre=="" || empty($email) || $email=="" || $rol_id==0){
            $error = "Todos los campos son obligatorios";
        } else {
            if ($user->editarUsuario($id, $nombre, $email, $rol_id)){
                $mensaje = "Usuario editado con éxito";
                header('location: usuarios.php?mensaje='.urlencode($mensaje));
            } else {
                $error = "No se pudo actualizar el usuario!!";
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


    <div class="row">
        <div class="col-sm-6">
            <h3>Editar Usuario</h3>
        </div>            
    </div>
    <div class="row">
        <div class="col-sm-6 offset-3">
        <form method="POST" action="">

            <input type="hidden" name="id" value="<?=$u->id?>">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa el nombre" value="<?=$u->nombre?>" >              
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa el email" value="<?=$u->email?>" readonly>               
            </div>
            <div class="mb-3">
            <label for="rol" class="form-label">Rol:</label>
            <select class="form-select" aria-label="Default select example" name="rol_id">
                <option value="0">--Selecciona un rol--</option>
                <option value="1" <?=($u->rol_id==1?'selected':'')?>>Administrador</option>  
                <option value="2" <?=($u->rol_id==2?'selected':'')?>>Registrado</option>
                             
            </select>             
            </div>          
        
            <br />
            <button type="submit" name="editarUsuario" class="btn btn-success float-left"><i class="bi bi-person-bounding-box"></i> Editar Usuario</button>

            <button type="submit" name="borrarUsuario" class="btn btn-danger float-right"><i class="bi bi-person-bounding-box"></i> Borrar Usuario</button>
            </form>
        </div>
    </div>
<?php include("../includes/footer.php") ?>
       