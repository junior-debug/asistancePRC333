const months = [
  "",
  "enero",
  "febrero",
  "marzo",
  "abril",
  "mayo",
  "junio",
  "julio",
  "agosto",
  "septiembre",
  "octubre",
  "noviembre",
  "diciembre",
];
const week = [
  "dom",
  "lun",
  "mar",
  "mie",
  "jue",
  "vie",
  "sab",
  "dom",
  "lun",
  "mar",
  "mie",
  "jue",
  "vie",
  "sab",
  "dom",
  "lun",
  "mar",
  "mie",
  "jue",
  "vie",
  "sab",
  "dom",
  "lun",
  "mar",
  "mie",
  "jue",
  "vie",
  "sab",
  "dom",
  "lun",
  "mar",
  "mie",
  "jue",
  "vie",
  "sab",
  "dom",
  "lun",
  "mar",
  "mie",
  "jue",
  "vie",
  "sab",
];
const daysMonth = [
  1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,
  23, 24, 25, 26, 27, 28, 29, 30, 31,
];
let newDate = new Date();
const year = newDate.getFullYear();
const month = newDate.getMonth() + 1;

$("#month").html(months[month]);

const dataDays = document.getElementsByClassName("dataDay");
const day = document.getElementsByClassName("day");

function changeMonth(firstDayWeek, totalDaysMonth, selectedMonth) {
  let weekIterator = firstDayWeek - 1;
  for (let i = 0; i < totalDaysMonth; i++) {
    $("#day-labels").append('<th class="titleDays"></th>');
    $("#one").append(
      '<th class ="monthDays"><span class="dataDay"></span></th>'
    );
  }
  for (let i = 0; i < $(".dataDay").length; i++) {
    dataDays[i].textContent = "" + daysMonth[i];
  }
  const titleDays = document.getElementsByClassName("titleDays");
  for (let i = 0; i < totalDaysMonth; i++) {
    weekIterator++;
    titleDays[i].textContent = week[weekIterator];
  }
  queryCalendary(firstDayWeek, totalDaysMonth, selectedMonth);
}
changeMonth(
  new Date(year, month - 1, 1).getDay(),
  new Date(year, month, 0).getDate(),
  month
);

function selectMonth() {
  $("#month").html($("#selectMonth").val());
  for (let i = 0; i < $(".dataDay").length; i++) {
    $(".monthDays").remove();
    $(".titleDays").remove();
  }

  switch ($("#selectMonth").val()) {
    case "enero":
      changeMonth(
        new Date(year, 1 - 1, 1).getDay(),
        new Date(year, 1, 0).getDate(),
        01
      );
      break;
    case "febrero":
      changeMonth(
        new Date(year, 2 - 1, 1).getDay(),
        new Date(year, 2, 0).getDate(),
        02
      );
      break;
    case "marzo":
      changeMonth(
        new Date(year, 3 - 1, 1).getDay(),
        new Date(year, 3, 0).getDate(),
        03
      );
      break;
    case "abril":
      changeMonth(
        new Date(year, 4 - 1, 1).getDay(),
        new Date(year, 4, 0).getDate(),
        04
      );
      break;
    case "mayo":
      changeMonth(
        new Date(year, 5 - 1, 1).getDay(),
        new Date(year, 5, 0).getDate(),
        05
      );
      break;
    case "junio":
      changeMonth(
        new Date(year, 6 - 1, 1).getDay(),
        new Date(year, 6, 0).getDate(),
        06
      );
      break;
    case "julio":
      changeMonth(
        new Date(year, 7 - 1, 1).getDay(),
        new Date(year, 7, 0).getDate(),
        07
      );
      break;
    case "agosto":
      changeMonth(
        new Date(year, 8 - 1, 1).getDay(),
        new Date(year, 8, 0).getDate(),
        08
      );
      break;
    case "septiembre":
      changeMonth(
        new Date(year, 9 - 1, 1).getDay(),
        new Date(year, 9, 0).getDate(),
        09
      );
      break;
    case "octubre":
      changeMonth(
        new Date(year, 10 - 1, 1).getDay(),
        new Date(year, 10, 0).getDate(),
        10
      );
      break;
    case "noviembre":
      changeMonth(
        new Date(year, 11 - 1, 1).getDay(),
        new Date(year, 11, 0).getDate(),
        11
      );
      break;
    case "diciembre":
      changeMonth(
        new Date(year, 12 - 1, 1).getDay(),
        new Date(year, 12, 0).getDate(),
        12
      );
      break;
  }
}

function setIdDays(dayPosition, firstDayWeek) {
  let weekIterator = firstDayWeek - 1;
  for (let i = 0; i < $(".dataDay").length; i++) {
    weekIterator++;
    dayPosition[i].id = week[weekIterator];
  }
}

function newRotTwo(first, second, dayPosition, totalDaysMonth) {
  const currentMonth = new Date(year, month, 0).getDate();
  for (let i = totalDaysMonth; i < currentMonth; i++) {
    if (dayPosition[i].id == first || dayPosition[i].id == second) {
      dayPosition[i].textContent = "DL";
    }
  }
}

function newRotation(totalDaysMonth, newRot, dayPosition) {
  switch (newRot) {
    case "L-V":
      newRotTwo("sab", "dom", dayPosition, totalDaysMonth);
      break;
    case "M-S":
      newRotTwo("dom", "lun", dayPosition, totalDaysMonth);
      break;
    case "M-D":
      newRotTwo("lun", "mar", dayPosition, totalDaysMonth);
      break;
    case "J-L":
      newRotTwo("mar", "mie", dayPosition, totalDaysMonth);
      break;
    case "V-M":
      newRotTwo("mie", "jue", dayPosition, totalDaysMonth);
      break;
    case "S-MI":
      newRotTwo("lun", "mar", dayPosition, totalDaysMonth);
      break;
    case "D-J":
      newRotTwo("vie", "sab", dayPosition, totalDaysMonth);
      break;
  }
}

function twoDays(first, second, dayPosition, totalDaysMonth, newRot = null) {
  for (let i = 0; i < totalDaysMonth; i++) {
    dayPosition[i].textContent = "";
    if (dayPosition[i].id == first || dayPosition[i].id == second) {
      dayPosition[i].textContent = "DL";
    }
  }
  if (newRot) {
    newRotation(totalDaysMonth, newRot, dayPosition);
  }
}

function threeDays(days, dayPosition, totalDaysMonth) {
  if (days.length == 3) {
    for (let i = 0; i < totalDaysMonth; i++) {
      if (
        dayPosition[i].id != days[0] &&
        dayPosition[i].id != days[1] &&
        dayPosition[i].id != days[2]
      ) {
        dayPosition[i].textContent = "DL";
      }
    }
  } else if (days.length == 4) {
    for (let i = 0; i < totalDaysMonth; i++) {
      if (
        dayPosition[i].id != days[0] &&
        dayPosition[i].id != days[1] &&
        dayPosition[i].id != days[2] &&
        dayPosition[i].id != days[3]
      ) {
        dayPosition[i].textContent = "DL";
      }
    }
  }
}

function twoHolidays(rotacion, dayPosition, totalDaysMonth, newRot = null) {
  switch (rotacion) {
    case "L-V":
      twoDays("sab", "dom", dayPosition, totalDaysMonth, newRot);
      break;
    case "M-S":
      twoDays("dom", "lun", dayPosition, totalDaysMonth, newRot);
      break;
    case "M-D":
      twoDays("lun", "mar", dayPosition, totalDaysMonth, newRot);
      break;
    case "J-L":
      twoDays("mar", "mie", dayPosition, totalDaysMonth, newRot);
      break;
    case "V-M":
      twoDays("mie", "jue", dayPosition, totalDaysMonth, newRot);
      break;
    case "S-MI":
      twoDays("lun", "mar", dayPosition, totalDaysMonth, newRot);
      break;
    case "D-J":
      twoDays("vie", "sab", dayPosition, totalDaysMonth, newRot);
      break;
  }
}

function fourHolidays(rotation, dayPosition, totalDaysMonth) {
  let days = [];
  for (let i = 0; i < rotation.length; i++) {
    switch (rotation[i]) {
      case "L":
        days.push("lun");
        break;
      case "M":
        days.push("mar");
        break;
      case "MI":
        days.push("mie");
        break;
      case "J":
        days.push("jue");
        break;
      case "V":
        days.push("vie");
        break;
      case "S":
        days.push("sab");
        break;
      case "D":
        days.push("dom");
        break;
    }
  }
  threeDays(days, dayPosition, totalDaysMonth);
}

function forData(data) {
  for (let x = 0; x < data.length; x++) {
    let just = data[0].justificacion;
    return just;
  }
}

function queryDays(id, dataDay, i, dayPosition) {
  $.ajax({
    type: "POST",
    url: "?view=calendary&mode=asistance",
    dataType: "json",
    data: { id: id, dataDay: dataDay },
    success: function (data) {
      if (data != false) {
        let just = forData(data);
        if (data != "" && just == "") {
          dayPosition[i].textContent = "AP";
        } else if (
          data != "" &&
          just != "" &&
          dayPosition[i].textContent == ""
        ) {
          dayPosition[i].textContent = just;
        }
      } else if (data == false) {
        if (dayPosition[i].textContent == "") {
          dayPosition[i].textContent = "E";
        }
      }
    },
  });
}

function dataLog(id, selectedMonth, x) {
  $.ajax({
    type: "POST",
    url: "?view=calendary&mode=userChanges",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      for (let i = 0; i < data.length; i++) {
        let arr = data[i].fecha.split("-");
        if (selectedMonth == arr[1] && data[i].antigua_nomina != "") {
          $(`#payRoll${x}`).text(`${data[i].antigua_nomina}`);
        }
        if (selectedMonth == arr[1] && data[i].antiguo_cargo != "") {
          $(`#position${x}`).text(`${data[i].antiguo_cargo}`);
        }
        if (selectedMonth == arr[1] && data[i].antiguo_turno != "") {
          $(`#turn${x}`).text(`${data[i].antiguo_turno}`);
        }
      }
    },
  });
}

function rotationLog(
  id,
  selectedMonth,
  iterator,
  dayPosition,
  totalDaysMonth,
  oldRot
) {
  let month = "";
  if (selectedMonth < 9) {
    month = "0" + selectedMonth;
  } else {
    month = selectedMonth;
  }
  const date = year + "-" + month;
  $.ajax({
    type: "POST",
    url: "?view=calendary&mode=rotationLog",
    dataType: "json",
    data: { id: id, date: date },
    success: function (data) {
      if (data == false) {
        let rotacion = oldRot;
        let rotation = oldRot;
        rotation = rotation.split("-");
        holyDays(rotation, rotacion, dayPosition, totalDaysMonth, "");
      } else {
        for (let i = 0; i < data.length; i++) {
          if (data[i].rotacion == "" && data[i].antigua_rotacion == "") {
            $(`#rotation${iterator}`).text(`${oldRot}`);
            let rotacion = oldRot;
            let rotation = oldRot;
            rotation = rotation.split("-");
            holyDays(rotation, rotacion, dayPosition, totalDaysMonth, "");
          } else if (data[i].rotacion == "" && data[i].antigua_rotacion != "") {
            $(`#rotation${iterator}`).text(`${data[i].antigua_rotacion}`);
            let rotacion = data[i].antigua_rotacion;
            let rotation = data[i].antigua_rotacion;
            rotation = rotation.split("-");
            holyDays(rotation, rotacion, dayPosition, totalDaysMonth, "");
          } else if (data[i].rotacion != "" && data[i].antigua_rotacion != "") {
            $(`#rotation${iterator}`).text(`${data[i].rotacion}`);
            let rotacion = data[i].rotacion;
            let rotation = data[i].rotacion;
            rotation = rotation.split("-");
            let oldRotation = data[i].antigua_rotacion;
            let dateOldRotation = data[i].fecha;
            dateOldRotation = dateOldRotation.split("-");
            dateOldRotation = dateOldRotation[2];
            holyDays(
              rotation,
              rotacion,
              dayPosition,
              totalDaysMonth,
              oldRotation,
              dateOldRotation
            );
          }
        }
      }
    },
  });
}

function holyDays(
  rotation,
  rotacion,
  dayPosition,
  totalDaysMonth,
  oldRotation,
  dateOldRotation = null
) {
  if (oldRotation == "") {
    if (rotation.length == 2) {
      twoHolidays(rotacion, dayPosition, totalDaysMonth);
    } else if (rotation.length > 2) {
      fourHolidays(rotation, dayPosition, totalDaysMonth);
    }
  } else if (oldRotation != "") {
    if (rotation.length == 2) {
      twoHolidays(oldRotation, dayPosition, dateOldRotation, rotacion);
    } else if (rotation.length > 2) {
      fourHolidays(rotation, dayPosition, dateOldRotation);
    }
  }
}

function queryCalendary(firstDayWeek, totalDaysMonth, selectedMonth) {
  $.ajax({
    url: "?view=calendary&mode=asistanceData",
    type: "post",
    processData: false,
    contentType: false,
    statusCode: {
      200: function (data) {
        const res = JSON.parse(data);
        const today = newDate.getDate();
        for (let i = 0; i < res.length; i++) {
          $(`.tableAsistance${i}`).remove();
          $(`.day${i}`).remove();
          let id = res[i].cedula;
          $("#tableBody").append(
            `<tr class='tableAsistance${i}'><td id="payRoll${i}">${res[i].nomina_cliente}</td><td>${res[i].cedula}</td><td>${res[i].ficha}</td><td>${res[i].nombre_apellido}</td><td>${res[i].fecha_ingreso}</td><td>${res[i].finalizacion_contrato}</td><td id="position${i}">${res[i].cargo}</td><td id="turn${i}">${res[i].turno}</td><td id="rotation${i}">${res[i].rotacion}</td></tr>`
          );
          for (let x = 0; x < $(".dataDay").length; x++) {
            $(`.tableAsistance${i}`).append(
              `<td class ="day${i}" style="border: 1px solid rgba(128, 128, 128, 0.342);text-align: center;"></td>`
            );
          }
          let dayPosition = document.getElementsByClassName(`day${i}`);

          setIdDays(dayPosition, firstDayWeek);
          if (res[i].estatus_cambios == 1) {
            dataLog(id, selectedMonth, i);
            rotationLog(
              id,
              selectedMonth,
              i,
              dayPosition,
              totalDaysMonth,
              res[i].rotacion
            );
          } else {
            let rotacion = res[i].rotacion;
            let rotation = res[i].rotacion;
            rotation = rotation.split("-");
            holyDays(rotation, rotacion, dayPosition, totalDaysMonth, "");
          }
          if (selectedMonth == month) {
            for (let t = 0; t < today; t++) {
              let day = 1 + t;
              if (day < 10) {
                day = "0" + day;
              }
              let dataDay = `${year}-${selectedMonth}-${day}`;
              queryDays(id, dataDay, t, dayPosition);
            }
          } else if (selectedMonth != month) {
            for (let t = 0; t < totalDaysMonth; t++) {
              let day = 1 + t;
              if (day < 10) {
                day = "0" + day;
              }
              let dataDay = `${year}-${selectedMonth}-${day}`;
              queryDays(id, dataDay, t, dayPosition);
            }
          }
        }
      },
      400: function () {
        alert("Error en la solicitud");
      },
      500: function () {
        alert("Error en el Servidor");
      },
    },
  });
}

function download() {
  $("#table").table2excel({
    exclude: ".noExl",
    name: "Excel Document Name",
    filename: "calendario" + new Date().toISOString() + ".xls",
    fileext: ".xls",
    exclude_img: true,
    exclude_links: true,
    exclude_inputs: true,
    preserveColors: true,
  });
}

function payrollUpdate(value, id, update) {
  $.ajax({
    type: "POST",
    url: `?view=calendary&mode=${update}`,
    dataType: "json",
    data: { value: value, id: id },
    statusCode: {
      200: function () {},
      400: function () {
        alert("Error en la solicitud");
      },
      500: function () {
        alert("Error en el Servidor");
      },
    },
  });
}

function userUpdate(requestDate, id, oldRotation) {
  $.ajax({
    type: "POST",
    url: `?view=calendary&mode=userUpdate`,
    dataType: "json",
    data: { requestDate: requestDate, id: id, oldRotation: oldRotation },
    statusCode: {
      200: function () {},
      400: function () {
        alert("Error en la solicitud");
      },
      500: function () {
        alert("Error en el Servidor");
      },
    },
  });
}

function userData(requestDate, id) {
  $.ajax({
    type: "POST",
    url: `?view=calendary&mode=userData`,
    dataType: "json",
    data: { id: id },
    statusCode: {
      200: function (data) {
        userUpdate(requestDate, id, data[0].rotacion);
      },
      400: function () {
        alert("Error en la solicitud");
      },
      500: function () {
        alert("Error en el Servidor");
      },
    },
  });
}

function dayValidation(requestDate, opt, updateValue, id, identifier) {
  let arr = requestDate.split("-");
  const requestYear = parseInt(arr[0]);
  const requestMonth = parseInt(arr[1]);
  const requestDay = parseInt(arr[2]);
  const today = year + month + newDate.getDate();
  const date = requestYear + requestMonth + requestDay;
  if (today == date) {
    userData(requestDate, id);
    switch (opt) {
      case "nomina":
        payrollUpdate(updateValue, id, "payrollUpdate", identifier);
        break;
      case "cargo":
        payrollUpdate(updateValue, id, "positionUpdate", identifier);
        break;
      case "turno":
        payrollUpdate(updateValue, id, "turnUpdate", identifier);
        break;
      case "rotacion":
        payrollUpdate(updateValue, id, "rotationUpdate", identifier);
        break;
      default:
        break;
    }
  }
}

function setChanges() {
  $.ajax({
    type: "POST",
    url: "?view=calendary&mode=queryChanges",
    dataType: "json",
    data: {},
    success: function (data) {
      for (let i = 0; i < data.length; i++) {
        if (data[i].nomina != "") {
          dayValidation(
            data[i].fecha,
            "nomina",
            data[i].nomina,
            data[i].cedula,
            data[i].id
          );
        } else if (data[i].cargo != "") {
          dayValidation(
            data[i].fecha,
            "cargo",
            data[i].cargo,
            data[i].cedula,
            data[i].id
          );
        } else if (data[i].turno != "") {
          dayValidation(
            data[i].fecha,
            "turno",
            data[i].turno,
            data[i].cedula,
            data[i].id
          );
        } else if (data[i].rotacion != "") {
          dayValidation(
            data[i].fecha,
            "rotacion",
            data[i].rotacion,
            data[i].cedula,
            data[i].id
          );
        }
      }
    },
  });
}

setChanges();
