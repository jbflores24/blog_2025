<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed">
        <div class="container">
            <a class="navbar-brand" href="index.php">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
                    
                    <?php if ($_SESSION['auth']):?>  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administración
                        </a>
                       
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                            <a class="dropdown-item" href="<?=$ruta_admin?>articulos.php">Artículos</a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="<?=$ruta_admin?>comentarios.php">Comentarios</a>
                            </li>                        
                        </ul>
                       
                    </li> 

                   
                     <?php if ($_SESSION['rol_id']==1):?>
                     <li class="nav-item">
                            <a class="nav-link" href="<?=$ruta_admin?>usuarios.php">Usuarios</a>
                      </li>
                     <?php endif;?>
                <?php endif;?>       
                </ul>  

                <ul class="navbar-nav mb-2 mb-lg-0">                       
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$ruta?>index.php">Inicio</a>
                        </li> 
                            <?php if ($_SESSION['auth']==false):?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=$ruta?>registro.php">Registrarse</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=$ruta?>acceder.php">Acceder</a>
                            </li>
                            <?php endif;?>
                   

                       
                        <?php if ($_SESSION["auth"]):?>
                          <li class="nav-item">
                              <p class="text-white mt-2"><i class="bi bi-person-circle"></i> <?=$_SESSION['nombre']?> </p>
                          </li>
                          <li class="nav-item">
                                <a class="nav-link" href="<?=$ruta?>salir.php">Salir</a>
                            </li>  
                          <?php endif;?>  
                                 
                    </ul>    
            </div>
        </div>
    </nav>