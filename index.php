<?php
    include("includes/header_front.php");
    include "./includes/slider.php";
    include "./config/Mysql.php";
    include "./modelos/Articulo.php";
    include "./helpers/helpers_formato.php";
    $base = new Mysql();
    $cx = $base->connect();
    $articulos = new Articulo($cx);
?>
<div class="container mt-5">
    <div class="container-fluid">
        <h1 class="text-center">Artículos</h1>
        <div class="row">
            <?php foreach ($articulos->listar(0,1) as $articulo):?>
            <div class="col-sm-4">
                <div class="card">
                    <img src="img/articulos/<?=$articulo->imagen?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?=$articulo->titulo?></h5>
                        <p><strong><?=formatearFecha($articulo->fecha_creacion)?></strong></p>
                        <p class="card-text"><?=textoCorto($articulo->texto,400)?></p>
                        <a href="detalle.php" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>

        </div>
    </div>
    <?php include("includes/footer.php") ?>