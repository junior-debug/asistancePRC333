<link rel="stylesheet" href="public/css/updateEmployee.css">
<div class="topSeparation"></div>
<div id="myModal" class="modalCont" style="display: none;">
    <div class="card cardModal">
        <div class="contModal">
            <h5 class="modal-title" style="padding-left: 1em;">Fecha de Egreso</h5>
        </div>
        <div class="contModal">
            <input type="date" id="disqualificationDate" style="margin-bottom: 0px; width:40%; height:3em;">
        </div>
        <div class="contModal">
            <button type="button" class="btn btn-secondary" style="margin-right: 1em;" onclick="closeModal('close');">Close</button>
            <button type="button" class="btn btn-primary" style="margin-right: 1em;" onclick="updateEmployee('disableEmployee');">Actualizar Estatus</button>
        </div>
    </div>
</div>
<div class="formCont">
    <form id="queryEmployee">
        <div class="card cardCont">
            <input type="text" name="id" class="form-control" style="margin-bottom: 0px; width: 70%; height:3em;" placeholder="cedula" aria-label="Username" aria-describedby="basic-addon1">
            <button type="button" class="btn btn-primary" style="height:3em;" onclick="searchEmployee();">buscar</button>
        </div>
    </form>
    <form class="formIndividual" method="POST" id="updateEmployee">

        <div class="formColumn">
            <div style="width: 100%;display:flex;justify-content:center;">
                <div class="imgCont"></div>
            </div>
            <div class="statusCont">
                <select name="statusActual" id="statusActual" name="status" onchange="inactive(value);" class="status" disabled>
                    <option value="">Estatus</option>
                    <option id="activo" value="activo">Activo</option>
                    <option id="inactivo" value="inactivo">Inactivo</option>
                </select>
                <div class="statusImg" id="imgSleep"></div>
                <div class="statusImg" id="imgOff" style="display: none"></div>
                <div class="statusImg" id="imgOn" style="display: none"></div>
            </div>
            <label for="empresa">Empresa</label>
            <input type="text" class="formInput" id="empresa" name="business">
            <label for="payroll">Nomina/Cliente</label>
            <input type="text" class="formInput" id="payroll" name="payroll">
            <label for="id">Cedula</label>
            <input type="text" class="formInput" id="id" name="id">
            <label for="birthDate">Fecha de Nacimiento</label>
            <input type="text" class="formInput" id="birthDate" name="birthDate" onfocus="(this.type='date')" onblur="(this.type='text')">
            <label for="email">Correo Electronico</label>
            <input type="text" class="formInput" id="email" name="email">
            <label for="name">Nombre y Apellido</label>
            <input type="text" class="formInput" id="name" name="name">
            <label for="dateAdmission">Fecha de Ingreso</label>
            <input type="text" class="formInput" id="dateAdmission" name="dateAdmission" onfocus="(this.type='date')" onblur="(this.type='text')">
            <label for="dueDate">Fecha de Culminacion de Contrato</label>
            <input type="text" class="formInput" id="dueDate" name="dueDate" onfocus="(this.type='date')" onblur="(this.type='text')">
        </div>
        <div class="formColumn">
            <label for="position">Cargo</label>
            <input type="text" class="formInput" id="position" name="position" style="margin-top: 1.1em;">
            <label for="campus">Unidad Organizativa/Sede</label>
            <input type="text" class="formInput" id="campus" name="campus">
            <label for="turn">Turno</label>
            <input type="text" class="formInput" id="turn" name="turn">
            <label for="rotation">Rotacion</label>
            <input type="text" class="formInput" id="rotation" name="rotation">
            <label for="workingHours">Horario de Trabajo</label>
            <input type="text" class="formInput" id="workingHours" name="workingHours">
            <label for="exceptionLevel">Nivel de Excepcion</label>
            <input type="text" class="formInput" id="exceptionLevel" name="exceptionLevel">
            <label for="file">Ficha</label>
            <input type="text" class="formInput" id="file" name="file">
            <label for="bank">Entidad Bancaria</label>
            <input type="text" class="formInput" id="bank" name="bank">
            <label for="accType">Tipo de cuenta</label>
            <input type="text" class="formInput" id="accType" name="accType">
            <input type="hidden" id="realData" name="disqualificationDate">
            <div id="contEgress" style="display:none;">
                <label for="dateEgress">Fecha de Egreso</label>
                <input type="text" class="formInput" id="dateEgress" onfocus="(this.type='date')" onblur="(this.type='text')">
            </div>
        </div>
        <div class="formColumn">
            <label for="accNumber">Numero de Cuenta</label>
            <input type="text" class="formInput" id="accNumber" name="accNumber" style="margin-top: 1.1em;">
            <label for="salary">Sueldo</label>
            <input type="text" class="formInput" id="salary" name="salary">
            <label for="manualDexterity">Destreza Manual</label>
            <input type="text" class="formInput" id="manualDexterity" name="manualDexterity">
            <label for="address">Direccion</label>
            <input type="text" class="formInput" id="address" name="address">
            <label for="phone1">Telefono 1</label>
            <input type="text" class="formInput" id="phone1" name="phone1">
            <label for="phone2">Telefono Fijo 2</label>
            <input type="text" class="formInput" id="phone2" name="phone2">
            <label for="feeding">% Tickets Alimentacion</label>
            <input type="text" class="formInput" id="feeding" name="feeding">
            <label for="vacationBonus">Bono Vacacional</label>
            <input type="text" class="formInput" id="vacationBonus" name="vacationBonus">
            <label for="utilities">Utilidades</label>
            <input type="text" class="formInput" id="utilities" name="utilities">
            <div style="width: 100%;display:flex;justify-content:flex-end;">
                <button type="button" onclick="updateEmployee();" id="button" class="sendForm" style="display: none">actualizar</button>
            </div>
        </div>
    </form>
</div>

<script src="public/js/updateEmployee.js"></script>