const year = new Date().getFullYear();

function changeOption(value) {
  switch (value) {
    case "nomina":
      $("#nomina").show("slow");
      $("#reason").show("slow");
      $("#cargo").hide("slow");
      $("#turno").hide("slow");
      $("#rotation").hide("slow");
      break;
    case "cargo":
      $("#cargo").show("slow");
      $("#reason").hide("slow");
      $("#turno").hide("slow");
      $("#rotation").hide("slow");
      $("#nomina").hide("slow");
      break;
    case "turno":
      $("#turno").show("slow");
      $("#reason").hide("slow");
      $("#rotation").hide("slow");
      $("#nomina").hide("slow");
      $("#cargo").hide("slow");
      break;
    case "rotation":
      $("#rotation").show("slow");
      $("#reason").hide("slow");
      $("#nomina").hide("slow");
      $("#cargo").hide("slow");
      $("#turno").hide("slow");
      break;
  }
  $("#dataDay").show("slow");
}

function sendQuery(
  date,
  nomina,
  oldPayroll,
  cargo,
  oldPosition,
  oldTurn,
  turno,
  oldRotation,
  rotation
) {
  const id = $("#id").val();
  const reason = $("#reason").val();
  $.ajax({
    type: "POST",
    url: "?view=sistema&mode=queryChangeRot",
    dataType: "json",
    data: {
      id: id,
      nomina: nomina,
      oldPayroll: oldPayroll,
      reason: reason,
      cargo: cargo,
      oldPosition: oldPosition,
      turno: turno,
      oldTurn: oldTurn,
      rotation: rotation,
      oldRotation: oldRotation,
      date: date,
    },
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

function validationQuery(array) {
  let dataDay = $("#day").val();
  dataDay = dataDay.split("-");
  let dataDayInt = parseInt(dataDay[1]);
  dataDayInt = dataDayInt + 1;
  const last = array[array.length - 1];
  let lastInt = parseInt(last);
  lastInt = lastInt + 1;
  for (let i = lastInt; i < dataDayInt; i++) {
    if (i < 10) {
      i = "0" + i;
    }
    let date = year + "-" + i + "-" + dataDay[2];
    if (i < dataDayInt - 1) {
      switch ($("#selectData").val()) {
        case "nomina":
          const oldPayroll = $("#oldPayroll").val();
          sendQuery(date, "", oldPayroll, "", "", "", "", "", "");
          break;
        case "cargo":
          const oldPosition = $("#position").val();
          sendQuery(date, "", "", "", oldPosition, "", "", "", "");
          break;
        case "turno":
          const oldTurn = $("#oldTurn").val();
          sendQuery(date, "", "", "", "", oldTurn, "", "", "");
          break;
        case "rotation":
          const oldRotation = $("#oldRotation").val();
          sendQuery(date, "", "", "", "", "", "", oldRotation, "");
          break;
      }
    } else if (i == dataDayInt - 1) {
      switch ($("#selectData").val()) {
        case "nomina":
          const nomina = $("#nomina").val();
          sendQuery(date, nomina, nomina, "", "", "", "", "", "");
          break;
        case "cargo":
          const position = $("#cargo").val();
          sendQuery(date, "", "", position, position, "", "", "", "");
          break;
        case "turno":
          const turno = $("#turno").val();
          sendQuery(date, "", "", "", "", turno, turno, "", "");
          break;
        case "rotation":
          const rotation = $("#rotation").val();
          const oldRotation = $("#oldRotation").val();
          sendQuery(date, "", "", "", "", "", "", oldRotation, rotation);
          break;
      }
    }
    if (i == dataDayInt - 1) {
      alert("solicitud procesada");
      location.reload();
    }
  }
}

function validator(condition, data) {
  const array = [];
  if (condition == undefined || condition == "") {
    array.push(0);
    validationQuery(array);
  } else if (condition != undefined || condition != "") {
    for (let i = 0; i < data.length; i++) {
      switch ($("#selectData").val()) {
        case "nomina":
          if (data[i].antigua_nomina != "" || data[i].nomina != "") {
            let str = data[i].fecha;
            str = str.split("-");
            str = str[1];
            str = array.push(str);
          }
          break;
        case "cargo":
          if (data[i].antiguo_cargo != "" || data[i].cargo != "") {
            let str = data[i].fecha;
            str = str.split("-");
            str = str[1];
            str = array.push(str);
          }
          break;
        case "turno":
          if (data[i].antiguo_turno != "" || data[i].turno != "") {
            let str = data[i].fecha;
            str = str.split("-");
            str = str[1];
            str = array.push(str);
          }
          break;
        case "rotation":
          if (data[i].antigua_rotacion != "" || data[i].rotacion != "") {
            let str = data[i].fecha;
            str = str.split("-");
            str = str[1];
            str = array.push(str);
          }
          break;
      }
    }
    validationQuery(array);
  }
}

function sendData() {
  const id = $("#id").val();
  $.ajax({
    type: "POST",
    url: "?view=calendary&mode=queryChanges",
    dataType: "json",
    data: {
      id: id,
    },
    statusCode: {
      200: function (data) {
        switch ($("#selectData").val()) {
          case "nomina":
            for (let i = 0; i < data.length; i++) {
              if (data[i].antigua_nomina == "" && data[i].nomina) {
                if (i + 1 == data.length) {
                  validator(data[i].antigua_nomina, data);
                }
              } else if (data[i].antigua_nomina != "") {
                validator(data[i].antigua_nomina, data);
                break;
              } else {
                validator(data[i].antigua_nomina, data);
              }
            }
            break;
          case "cargo":
            for (let i = 0; i < data.length; i++) {
              if (data[i].antigua_cargo == "" && data[i].turno == "") {
                if (i + 1 == data.length) {
                  validator(data[i].antiguo_turno, data);
                }
              } else if (data[i].antigua_cargo != "") {
                validator(data[i].antigua_cargo, data);
                break;
              } else {
                validator(data[i].antigua_cargo, data);
              }
            }
            break;
          case "turno":
            for (let i = 0; i < data.length; i++) {
              if (data[i].antiguo_turno == "" && data[i].turno == "") {
                if (i + 1 == data.length) {
                  validator(data[i].antiguo_turno, data);
                }
              } else if (data[i].antiguo_turno != "") {
                validator(data[i].antiguo_turno, data);
                break;
              } else {
                validator(data[i].antiguo_turno, data);
              }
            }
            break;
          case "rotation":
            for (let i = 0; i < data.length; i++) {
              if (data[i].antigua_rotacion == "" && data[i].rotacion == "") {
                if (i + 1 == data.length) {
                  validator(data[i].antigua_rotacion, data);
                }
              } else if (data[i].antigua_rotacion != "") {
                validator(data[i].antigua_rotacion, data);
                break;
              } else {
                validator(data[i].antigua_rotacion, data);
              }
            }
            break;
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

function user() {
  const id = $("#id").val();
  $.ajax({
    type: "POST",
    url: "?view=sistema&mode=queryUser",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      if (data != "") {
        $("#success").show("slow");
        $("#warning").hide("slow");
        for (let i = 0; i < data.length; i++) {
          $("#user").text(`${data[i].nombre_apellido}`);
          $("#oldPayroll").val(`${data[i].nomina_cliente}`);
          $("#position").val(`${data[i].cargo}`);
          $("#oldTurn").val(`${data[i].turno}`);
          $("#oldRotation").val(`${data[i].rotacion}`);
        }
        $("#selectData").removeAttr("disabled");
      } else if (data == false) {
        $("#warning").show("slow");
        $("#success").hide("slow");
      }
    },
  });
}

function showButton() {
  $("#button").show("slow");
}
