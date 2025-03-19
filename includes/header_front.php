<?php
  include "./config/config.php";
  session_start();
  if (!isset($_SESSION['auth'])){
    $_SESSION['auth']=false;
  }
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-icons-1.2.1/font/bootstrap-icons.css">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Blog</title>
  </head>
  <body>
    
  <?php
    include "menu.php";
  ?>  

    <!--
    <div class="container mt-5">
-->   