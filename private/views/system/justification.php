<link rel="stylesheet" href="public/css/justification.css">
<div class="topSeparation"></div>
<div class="cardCont">
    <div class="card" style="width: 90%;">
        <div class="card-body">
            <h5 class="card-title">Justificacion de dias ausentes</h5>
            <p class="card-text">Introduza la cedula del usuario, la justificacion del usuario y en el rango de fecha</p>
            <div class="dataCont">
                <input type="text" id="id" class="form-control inputData" placeholder="Cedula" aria-label="Cedula" aria-describedby="basic-addon1" onchange="queryUser()">
                <select id="daysJustifi" class="form-select selectData" onchange="selectDays()" disabled>
                    <option selected>Justificar</option>
                    <option value="1">1 Dia</option>
                    <option value="2">Varios Dias</option>
                </select>
                <select class="form-select selectData" disabled>
                    <option selected>Justificacion</option>
                    <option value="J">Inasistencia Justificada</option>
                    <option value="PNR">Permiso No Remunerado</option>
                    <option value="R">Retiro</option>
                    <option value="SSO">Reposo IVSS</option>
                    <option value="RPN">Reposo Pre-Post Natal</option>
                    <option value="NC">No Contratado</option>
                    <option value="V">Vacaciones</option>
                    <option value="F">Feriado Trabajado</option>
                </select>
            </div>
            <div class="warning">
                <h4 style="color: white;">Usuario no Existe</h4>
            </div>
            <div class="dataCont" id="oneDay" style="margin-top: 1em; display: none;">
                <div class="input-group mb-3" style="width: 40%;">
                    <span class="input-group-text" id="basic-addon1">Seleccione el dia</span>
                    <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="dataCont" id="someDays" style="margin-top: 1em; display: none;">
                <div class="input-group mb-3" style="width: 40%;margin-right: 1em;">
                    <span class="input-group-text" id="basic-addon1">Desde</span>
                    <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3" style="width: 40%;">
                    <span class="input-group-text" id="basic-addon1">Hasta</span>
                    <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>

            <button href="#" class="btn btn-primary" style="margin-top: 1em;">Go somewhere</button>
        </div>
    </div>
</div>

<script src="public/js/justification.js"></script>