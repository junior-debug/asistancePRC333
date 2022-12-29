<?php $dateActualy = date('Y-m-d');
echo $dateActualy;
?>

<link rel="stylesheet" href="public/css/changeRotation.css">
<div class="topSeparation"></div>

<div class="cardCont">
    <div class="card" style="width: 90%;top: 1em;">
        <div class="card-body">
            <h5 class="card-title">Seleccione Dato a Cambiar</h5>
            <div class="options">
                <input type="text" id="id" placeholder="cedula" class="form-control inputData" aria-label="cedula" aria-describedby="basic-addon1" onchange="user()">
                <select class="form-select inputData inputData" id="selectData" onchange="changeOption(value)" disabled>
                    <option value="" disabled selected>seleccione</option>
                    <option value="nomina">nomina</option>
                    <option value="cargo">cargo</option>
                    <option value="turno">turno</option>
                    <option value="rotation">rotacion</option>
                </select>
                <input type="text" style="display: none" id="nomina" placeholder="nomina" class="form-control inputData" aria-label="nomina" aria-describedby="basic-addon1">
                <input type="text" style="display: none" id="reason" placeholder="motivo" class="form-control inputData" aria-label="nomina" aria-describedby="basic-addon1">
                <input type="text" style="display: none" id="cargo" placeholder="cargo" class="form-control inputData" aria-label="cargo" aria-describedby="basic-addon1">
                <input type="text" style="display: none" id="turno" placeholder="turno" class="form-control inputData" aria-label="turno" aria-describedby="basic-addon1">
                <select class="form-select inputData" style="display: none" id="rotation">
                    <option value="" disabled selected>Seleccione Rotacion</option>
                    <?php foreach ($data as $res) { ?>
                        <option value="<?= $res["rotacion"]; ?>"><?= $res["rotacion"]; ?></option>
                    <?php }; ?>
                </select>
                <input type="text" id="oldPayroll" class="form-control inputData" style="display: none">
                <input type="text" id="position" class="form-control inputData" style="display: none">
                <input type="text" id="oldTurn" class="form-control inputData" style="display: none">
                <input type="text" id="oldRotation" class="form-control inputData" style="display: none">
            </div>
            <div style="display: none" id="dataDay">
                <h5 class="card-title">Fecha a efectuar el cambio</h5>
                <input id="day" type="date" class="form-control inputData" onchange="showButton()">
            </div>
            <div id="success" class="success" style="display: none;">
                <h4 style="color: white;" id="user"></h4>
            </div>
            <div id="warning" class="warning" style="display: none;">
                <h4 style="color: white;">Usuario no Existe</h4>
            </div>
            <button id="button" href="#" class="btn btn-primary" style="display: none;margin-top: 1em;" onclick="sendData()">Go somewhere</button>

        </div>
    </div>
</div>

<script src="public/js/changeRotation.js"></script>