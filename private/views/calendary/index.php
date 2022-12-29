<link rel="stylesheet" href="public/css/estilosCalendary.css" type="text/css">

<div class="topSeparation"></div>

<div class="menu">
    <select id="selectMonth" name="select" onchange="selectMonth()" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option value="">Seleccione mes</option>
        <option value="enero">enero</option>
        <option value="febrero">febrero</option>
        <option value="marzo">marzo</option>
        <option value="abril">abril</option>
        <option value="mayo">mayo</option>
        <option value="junio">junio</option>
        <option value="julio">julio</option>
        <option value="agosto">agosto</option>
        <option value="septiembre">septiembre</option>
        <option value="octubre">octubre</option>
        <option value="noviembre">noviembre</option>
        <option value="diciembre">diciembre</option>
    </select>
</div>

<div class="card cardCont">
    <button class="btn btn-primary" style="width: 20%;" onclick="download()">Descargar Excel</button>
</div>

<div id="calendar" class="collectonme">
    <div class="monthCont" style="display: flex;
  justify-content: center;
  align-items: center;">
        <h2 id="month"></h2>
    </div>
    <div class="calendaryCont">
        <table id="table" class="table table-striped" style="width: 100%">
            <thead class="table-dark">
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