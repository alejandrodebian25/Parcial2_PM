<?php
$proAnt = ($this->session->proAnt) ? "si" : "no";

?>
<div class="alert alert-info" role="alert">
    <h3 class="text-center">Motor de Flujo</h3>
    <h4>Usuario: <?= $ci ?> </h4>
    <h4>Rol: <?= ($codRol=="K")?"Kardex":"Estudiante"  ?> </h4>
  
    <!-- en caso de una condicional  -->
    <a href="<?= base_url('workflow/motor/logout'); ?>" class="btn btn-danger">Cerrar Sesion</a>
</div>

<div class="container">

    <br>

    <form action="<?= base_url('workflow/motor/controlador'); ?>" method="GET">
        <hr>
        <?php
        include_once("pantallas/$archivo");
        ?>
        <hr>
        <input type="hidden" value="<?php echo $codFlujo; ?>" name="codflujo" />
        <input type="hidden" value="<?php echo $codProceso; ?>" name="codproceso" />
        <input type="hidden" value="<?php echo $codprocesosiguiente; ?>" name="codprocesosiguiente" />

        <input type="hidden" value="<?php echo $archivo; ?>" name="archivo" />
        <input type="hidden" value="<?php echo $tipo; ?>" name="tipo" />
        <input type="submit" value="Anterior" name="Anterior" class="btn btn-primary" <?= (($proAnt == "si") || ($codRol == $codRolAnt)) ?  (null) : ("disabled") ?>>
        <input type="submit" value="Siguiente" name="Siguiente" class="btn btn-primary" <?= ($codRol == $codRolSig) || $tipo == "C"  ?  (null) : ("disabled") ?>>
        <!-- <input type="submit" value="Siguiente" name="Siguiente" class="btn btn-primary"> -->
    </form>
</div>