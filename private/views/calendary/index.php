<link rel="stylesheet" href="public/css/estilosCalendary.css" type="text/css">

<div class="topSeparation"></div>

<div class="menu navbar navbar-expand-lg">
    <div class="opt">
        <select id="selectMonth" name="select" onchange="selectMonth()" style="margin-left: 50px;" class="form-select inputData" aria-label=".form-select-lg example">
            <option value="">Seleccione mes</option>
            <option value="enero">Enero</option>
            <option value="febrero">Febrero</option>
            <option value="marzo">Marzo</option>
            <option value="abril">Abril</option>
            <option value="mayo">Mayo</option>
            <option value="junio">Junio</option>
            <option value="julio">Julio</option>
            <option value="agosto">Agosto</option>
            <option value="septiembre">Septiembre</option>
            <option value="octubre">Octubre</option>
            <option value="noviembre">Noviembre</option>
            <option value="diciembre">Diciembre</option>
        </select>
        <input type="text" id="search" placeholder="Buscar" class="form-control inputData">
        <button class="btn btn-primary" style="width: 100%;" onclick="download()">Descargar Excel</button>
    </div>
    <div class="monthCont">
        <h2 id="month"></h2>
    </div>
</div>

<div class="topSeparation"></div>

<div id="calendar" class="collectonme card" style="margin-left: 1em;margin-right: 1em;">
    <div class="calendaryCont">
        <table id="table" class="table" style="width: 100%">
            <thead class="">
                <tr id="day-labels">
                    <th rowspan="2" class="dataDays">nomina</th>
                    <th rowspan="2" class="dataDays">cedula</th>
                    <th rowspan="2" class="dataDays">ficha</th>
                    <th rowspan="2" class="dataDays">nombres - apellidos</th>
                    <th rowspan="2" class="dataDays">f.ingreso</th>
                    <th rowspan="2" class="dataDays">f.contrato</th>
                    <th rowspan="2" class="dataDays">cargo</th>
                    <th rowspan="2" class="dataDays">turno</th>
                    <th rowspan="2" class="dataDays">rotacion</th>
                </tr>
                <tr id="one">
                </tr>
            </thead>
            <tbody id="tableBody">

            </tbody>
        </table>
    </div>
</div>
<div id="bottom" class="collectonme"></div>
<script src="bower_components\jquery\dist\jquery.min.js"></script>
<script src="bower_components\jquery-table2excel\dist\jquery.table2excel.min.js"></script>
<script src="public/js/calendary.js"></script>