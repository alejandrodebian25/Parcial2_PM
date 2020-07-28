<div class="alert alert-dismissible alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Nueva Inscrpcion!</strong> LLego una nueva inscripcion. Revise si los documentos estan completos. 
</div>
<table class="table table-hover mt-5">
    <thead>
        <tr>

            <th scope="col">CI</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Cedula</th>
            <th scope="col">Matricula</th>
            <th scope="col">Pago</th>
            <th scope="col">Fecha</th>

        </tr>
    </thead>
    <tbody>
        <tr class="table-active">

            <td><?= $ci ?></td>
            <td><?= $nombres ?></td>
            <td><?= $apellidos ?></td>
            <td><?= $cedula ?></td>
            <td><?= $matricula ?></td>
            <td><?= $pago ?></td>
            <td><?= $fecha ?></td>


        </tr>

    </tbody>
</table>

Documentos  al dia?:
<input type="text" value="" name="condicion" placeholder="si o no"/><br>