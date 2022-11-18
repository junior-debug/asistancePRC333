<link rel="stylesheet" href="public/css/individualInsert.css">
<div class="topSeparation"></div>
<div class="formCont">
    <form class="formIndividual" method="POST" id="individualInsert">
        <div class="formColumn">
            <div class="imgCont"></div>
            <input type="text" class="formInput" id="business" name="business" placeholder="Empresa" onchange="enableBut()">
            <input type="text" class="formInput" name="payroll" placeholder="Nomina/Cliente">
            <input type="text" class="formInput" name="id" placeholder="Cedula">
            <input type="text" class="formInput" name="birthDate" placeholder="Fecha de Nacimiento" onfocus="(this.type='date')" onblur="(this.type='text')">
            <input type="text" class="formInput" name="email" placeholder="Correo Electronico">
            <input type="text" class="formInput" name="name" placeholder="Nombre y Apellido">
            <input type="text" class="formInput" name="dateAdmission" placeholder="Fecha de Ingreso" onfocus="(this.type='date')" onblur="(this.type='text')">
            <input type="text" class="formInput" name="dueDate" placeholder="Fecha de Culminacion de Contrato" onfocus="(this.type='date')" onblur="(this.type='text')">
        </div>
        <div class="formColumn">
            <input type="text" class="formInput" name="position" placeholder="Cargo" style="margin-top: 1.1em;">
            <input type="text" class="formInput" name="campus" placeholder="Unidad Organizativa/Sede">
            <input type="text" class="formInput" name="turn" placeholder="Turno">
            <select name="rotation" class="formInput" style="margin-bottom: 21px;" id="rotation" onchange="setColor()">
                <option disabled selected>Selecciona una Rotacion</option>
                <?php
                foreach ($data as $res) { ?>
                    <option value="<?= $res["rotacion"]; ?>"><?= $res["rotacion"]; ?></option>
                <?php } ?>
            </select>
            <input type="text" class="formInput" name="workingHours" placeholder="Horario de Trabajo">
            <input type="text" class="formInput" name="exceptionLevel" placeholder="Nivel de Excepcion">
            <input type="text" class="formInput" name="file" placeholder="Ficha">
            <input type="text" class="formInput" name="bank" placeholder="Entidad Bancaria">
            <input type="text" class="formInput" name="accType" placeholder="Tipo de cuenta">
        </div>
        <div class="formColumn">
            <input type="text" class="formInput" name="accNumber" placeholder="Numero de Cuenta" style="margin-top: 1.1em;">
            <input type="text" class="formInput" name="salary" placeholder="Sueldo">
            <input type="text" class="formInput" name="manualDexterity" placeholder="Destreza Manual">
            <input type="text" class="formInput" name="address" placeholder="Direccion">
            <input type="text" class="formInput" name="phone1" placeholder="Telefono 1">
            <input type="text" class="formInput" name="phone2" placeholder="Telefono Fijo 2">
            <input type="text" class="formInput" name="feeding" placeholder="% Tickets Alimentacion">
            <input type="text" class="formInput" name="vacationBonus" placeholder="Bono Vacacional">
            <input type="text" class="formInput" name="utilities" placeholder="Utilidades">
            <button type="button" class="sendForm" style="display: none" id="sendForm" onclick="uploadEmployees();">Finish</button>
        </div>
    </form>
</div>

<script src="public/js/individualInsert.js"></script>