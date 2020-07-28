<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Parcial2</title>
    <link rel="stylesheet" href=<?= base_url() . "assets/bootstrap/css/bootstrap.min.css" ?>>
</head>

<body>
    <div class="container mt-2">
        <div class="jumbotron">
            <h1 class="display-3 text-center">Examen 2do Parcial</h1>
            <p class="lead">Cree un repositorio Github, dándole acceso a msilva@fcpn.edu.bo, en ella cree el proyecto </p>
            <hr class="my-4">
            <div class="d-flex justify-content-between">

                <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                    <div class="card-body">
                        <h4 class="card-title text-center">WORKFLOW </h4>
                        <hr>
                        <p class="card-text">Realice un motor de workflow en codeigniter (ejemplo realizado en clases con PHP simple).</p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('motor?codflujo=F1&codproceso=P1') ?>" class="btn btn-success btn-block">Ir</a>
                    </div>
                </div>

                <!--  -->
                <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                    <div class="card-body">
                        <h4 class="card-title text-center">IMAGENES </h4>
                        <hr>
                        <p class="card-text">Obtenga los contornos de una imagen cualquiera.</p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('imagen') ?>" class="btn btn-success btn-block">Ir</a>
                    </div>
                </div>
                <!--  -->
                <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                    <div class="card-body">
                        <h4 class="card-title text-center">WebGL </h4>
                        <hr>
                        <p class="card-text">Dibuje un muñeco de nieve mediante WebGL.</p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('webgl') ?>" class="btn btn-success btn-block">Ir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>