<div class="topSeparation"></div>

<table class="table table-striped" style="width: 160em;">
    <thead class="table-dark">
        <tr style="text-align: center;">
            <th scope="col">Empresa</th>
            <th scope="col">Nomina/Cliente</th>
            <th scope="col">Cedula</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Correo Electronico</th>
            <th scope="col">Nombre y Apellido</th>
            <th scope="col">Fecha de Ingreso</th>
            <th scope="col">Fecha de Culminacion de Contrato</th>
            <th scope="col">Cargo</th>
            <th scope="col">Unidad Organizativa/Sede</th>
            <th scope="col">Turno</th>
            <th scope="col">Rotacion</th>
            <th scope="col">Horario de trabajo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < count($data); $i++) {
        ?>
            <tr style="text-align: center;">
                <th scope="row"><?= $data[$i]['empresa']; ?></th>
                <td><?= $data[$i]['nomina_cliente']; ?></td>
                <td><?= $data[$i]['cedula']; ?></td>
                <td><?= $data[$i]['fecha_nacimiento']; ?></td>
                <td><?= $data[$i]['correo']; ?></td>
                <td><?= $data[$i]['nombre_apellido']; ?></td>
                <td><?= $data[$i]['fecha_ingreso']; ?></td>
                <td><?= $data[$i]['finalizacion_contrato']; ?></td>
                <td><?= $data[$i]['cargo']; ?></td>
                <td><?= $data[$i]['unidad_organizativa']; ?></td>
                <td><?= $data[$i]['turno']; ?></td>
                <td><?= $data[$i]['rotacion']; ?></td>
                <td><?= $data[$i]['horario']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php

?>
<style>
    .topSeparation {
        height: 56px;
    }
</style>