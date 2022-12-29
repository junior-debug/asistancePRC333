<link rel="stylesheet" href="public/css/justification.css">
<div class="topSeparation"></div>
<div id="modalUpd" class="notice card" style="display: none;">
    <div class="inputsCont">
        <input id="updDate" type="date" class="form-control" readonly="readonly" style="width: 30%;margin-right: 30px;">
        <select id="justificationUpd" class="form-select selectData" style="margin-right: 0px;">
            <option selected disabled>Justificacion</option>
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
    <div class="buttonsCont">
        <button type="button" class="btn btn-success" style="margin-right: 20px;" onclick="queryUpdate()">Actualizar</button>
        <button type="button" class="btn btn-danger" style="margin-right: 20px;" onclick="closeModal('update')">Cerrar</button>
    </div>
</div>
<div id="modalDel" class="notice card" style="display: none;">
    <div class="titleCont">
        <h4 class="card-title">Desea Eliminar Justificacion?</h4>
    </div>
    <div class="buttonsCont">
        <button type="button" class="btn btn-success" style="margin-right: 20px;" onclick="queryDelete()">Actualizar</button>
        <button type="button" class="btn btn-danger" style="margin-right: 20px;" onclick="closeModal('delete')">Cerrar</button>
    </div>
</div>
<div class="cardCont">
    <div class="card" style="width: 90%;margin-top: 25px;">
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
                <select id="justification" class="form-select selectData" disabled>
                    <option selected disabled value="">Justificacion</option>
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
            <div id="success" class="success" style="display: none;">
                <h4 style="color: white;" id="user"></h4>
            </div>
            <div id="warning" class="warning" style="display: none;">
                <h4 style="color: white;">Usuario no Existe</h4>
            </div>
            <div class="dataCont" id="oneDay" style="margin-top: 1em; display: none;">
                <div class="input-group mb-3" style="width: 40%;">
                    <span class="input-group-text" id="basic-addon1">Seleccione el dia</span>
                    <input type="date" id="oneDate" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" onchange="button('1dia')">
                </div>
            </div>
            <div class="dataCont" id="someDays" style="margin-top: 1em; display: none;">
                <div class="input-group mb-3" style="width: 40%;margin-right: 1em;">
                    <span class="input-group-text" id="basic-addon1">Desde</span>
                    <input type="date" id="initDay" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3" style="width: 40%;">
                    <span class="input-group-text" id="basic-addon1">Hasta</span>
                    <input type="date" id="finalDay" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" onchange="button('dias')">
                </div>
            </div>

            <button id="but" class="btn btn-primary" style="margin-top: 1em;display: none;" onclick="sendJustification()">Justificar</button>
        </div>
    </div>

    <div id="updateCont" class="card" style="width: 90%;margin-top: 25px;display: none;">
        <div class="card-body">
            <div class="top">
                <h5 id="dataName" class="card-title"></h5>
                <h5 id="dataId" class="card-title"></h5>
                <h5 id="dataStatus" class="card-title"></h5>
                <img id="off" style="display: none; width: 2em;" src="public/images/power-on.png" alt="off">
                <img id="on" style="display: none; width: 2em;" src="public/images/power.png" alt="on">
            </div>
            <div id="body" class="body">

            </div>
        </div>
    </div>
</div>


<script src="public/js/justification.js"></script>