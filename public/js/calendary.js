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

function twoDays(first, second, dayPosition, totalDaysMonth) {
  for (let i = 0; i < totalDaysMonth; i++) {
    if (dayPosition[i].id == first || dayPosition[i].id == second) {
      dayPosition[i].textContent = "DL";
    }
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

function twoHolidays(rotacion, dayPosition, totalDaysMonth) {
  switch (rotacion) {
    case "L-V":
      twoDays("sab", "dom", dayPosition, totalDaysMonth);
      break;
    case "M-S":
      twoDays("dom", "lun", dayPosition, totalDaysMonth);
      break;
    case "M-D":
      twoDays("lun", "mar", dayPosition, totalDaysMonth);
      break;
    case "J-L":
      twoDays("mar", "mie", dayPosition, totalDaysMonth);
      break;
    case "V-M":
      twoDays("mie", "jue", dayPosition, totalDaysMonth);
      break;
    case "S-MI":
      twoDays("lun", "mar", dayPosition, totalDaysMonth);
      break;
    case "D-J":
      twoDays("vie", "sab", dayPosition, totalDaysMonth);
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

function queryDays(id, dataDay, i, dayPosition) {
  $.ajax({
    type: "POST",
    url: "?view=calendary&mode=asistance",
    dataType: "json",
    data: { id: id, dataDay: dataDay },
    success: function (data) {
      if (data != "") {
        dayPosition[i].textContent = "AP";
      } else if (data == false && dayPosition[i].textContent == "") {
        dayPosition[i].textContent = "E";
      }
    },
  });
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
          let rotacion = res[i].rotacion;
          let id = res[i].cedula;
          let rotation = res[i].rotacion;
          rotation = rotation.split("-");
          $("#tableBody").append(
            `<tr class='tableAsistance${i}'><td>${res[i].nomina_cliente}</td><td>${res[i].cedula}</td><td>${res[i].nombre_apellido}</td><td>${res[i].fecha_ingreso}</td><td>${res[i].finalizacion_contrato}</td><td>${res[i].cargo}</td><td>${res[i].turno}</td><td>${res[i].rotacion}</td></tr>`
          );
          for (let x = 0; x < $(".dataDay").length; x++) {
            $(`.tableAsistance${i}`).append(
              `<td class ="day${i}" style="border: 1px solid rgba(128, 128, 128, 0.342);text-align: center;"></td>`
            );
          }
          let dayPosition = document.getElementsByClassName(`day${i}`);
          setIdDays(dayPosition, firstDayWeek);
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
          if (rotation.length == 2) {
            twoHolidays(rotacion, dayPosition, totalDaysMonth);
          } else if (rotation.length > 2) {
            fourHolidays(rotation, dayPosition, totalDaysMonth);
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
