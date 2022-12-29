let newDate = new Date();
const year = newDate.getFullYear();
const month = newDate.getMonth() + 1;
const today = newDate.getDate();

function modalFunction(id, selection) {
  if (selection == "update") {
    $("#modalUpd").show("slow");
  } else if (selection == "delete") {
    $("#modalDel").show("slow");
  }

  let dateJus = document.getElementsByClassName("date");
  id = id - 1;
  const val = dateJus[id].textContent;
  $("#updDate").val(`${val}`);
}

function queryJustification() {
  const id = $("#id").val();
  let idBut = 0;
  for (let t = 0; t < today; t++) {
    let day = 1 + t;
    if (day < 10) {
      day = "0" + day;
    }
    let dataDay = `${year}-${month}-${day}`;
    $.ajax({
      type: "POST",
      url: "?view=calendary&mode=asistance",
      dataType: "json",
      data: { id: id, dataDay: dataDay },
      success: function (data) {
        if (data != false) {
          $("#updateCont").show("slow");
          for (let i = 0; i < data.length; i++) {
            idBut++;
            let date = data[i].fecha_hora_aut;
            date = date.slice(0, -16);
            $("#body").append(
              `<div class="data"><h4 class="date">${date}</h4><h4>${data[i].justificacion}</h4><button type="button" id="${idBut}" class="btn btn-warning updJustification" onclick="modalFunction(id,'update')">Actualizar</button><button type="button" id="${idBut}" class="btn btn-danger" onclick="modalFunction(id,'delete')">Eliminar</button></div>`
            );
          }
        }
      },
    });
  }
}

function queryUser() {
  const id = $("#id").val();
  $.ajax({
    type: "POST",
    url: "?view=sistema&mode=queryUser",
    dataType: "json",
    data: { id: id },
    statusCode: {
      200: function (data) {
        if (data != "") {
          $("#success").show("slow");
          $("#warning").hide("slow");
          for (let i = 0; i < data.length; i++) {
            $("#user").text(`${data[i].nombre_apellido}`);
            $("#dataName").text(`${data[i].nombre_apellido}`);
            $("#dataId").text(`${data[i].cedula}`);
            $("#dataStatus").text(`${data[i].estatus}`);
            if (data[i].estatus == "activo") {
              $("#on").show("slow");
            } else if (data[i].estatus == "inactivo") {
              $("#off").show("slow");
            }
          }
          $("#daysJustifi").removeAttr("disabled");
          $("#justification").removeAttr("disabled");
          queryJustification();
        } else if (data == false) {
          $("#warning").show("slow");
          $("#success").hide("slow");
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

function sendJustification() {
  const id = $("#id").val();
  const justification = $("#justification").val();
  if ($("#daysJustifi").val() == 1) {
    if (justification == null) {
      alert("seleccione justificacion");
    } else if (justification != null) {
      const date = $("#oneDate").val();
      $.ajax({
        type: "POST",
        url: "?view=sistema&mode=queryJustification",
        dataType: "json",
        data: { id: id, date: date, justification: justification },
        statusCode: {
          200: function () {
            alert("solicitud procesada");
            location.reload();
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
  } else if ($("#daysJustifi").val() == 2) {
    if (justification == null) {
      alert("seleccione justifiacion");
    } else if (justification != null) {
      const initDay = $("#initDay").val();
      let arrI = initDay.split("-");
      const init = parseInt(arrI[2]);
      const year = arrI[0];
      const month = arrI[1];
      const finalDay = $("#finalDay").val();
      let arrF = finalDay.split("-");
      arrF = parseInt(arrF[2]);
      arrF = arrF + 1;
      const justificationFinal = init + 1;
      for (let i = init; i < arrF; i++) {
        let date = year + "-" + month + "-" + `${i}`;
        if (i < justificationFinal) {
          $.ajax({
            type: "POST",
            url: "?view=sistema&mode=queryJustification",
            dataType: "json",
            data: {
              id: id,
              date: date,
              justification: justification,
              finalDay: finalDay,
            },
            statusCode: {
              200: function () {
                alert("solicitud procesada");
                location.reload();
              },
              400: function () {
                alert("Error en la solicitud");
              },
              500: function () {
                alert("Error en el Servidor");
              },
            },
          });
        } else if (i >= justificationFinal) {
          $.ajax({
            type: "POST",
            url: "?view=sistema&mode=queryJustification",
            dataType: "json",
            data: {
              id: id,
              date: date,
              justification: justification,
            },
            statusCode: {
              200: function () {
                alert("solicitud procesada");
                location.reload();
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
      }
    }
  }
}

function selectDays() {
  if ($("#daysJustifi").val() == 1) {
    $("#oneDay").show("slow");
    $("#someDays").hide("slow");
  } else if ($("#daysJustifi").val() == 2) {
    $("#someDays").show("slow");
    $("#oneDay").hide("slow");
  }
}

function button(selectedDays) {
  if (selectedDays == "1dia") {
    $("#but").show("slow");
  } else if (selectedDays == "dias" && $("#initDay").val() != "") {
    $("#but").show("slow");
  }
}

function queryUpdate() {
  const id = $("#id").val();
  const date = $("#updDate").val();
  const justification = $("#justificationUpd").val();
  if (justification == null) {
    alert("seleccione justificacion");
  } else if (justification != null) {
    $.ajax({
      type: "POST",
      url: "?view=sistema&mode=queryUpdate",
      dataType: "json",
      data: { id: id, date: date, justification: justification },
      statusCode: {
        200: function () {
          alert("solicitud procesada");
          location.reload();
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
}

function queryDelete() {
  const id = $("#id").val();
  const date = $("#updDate").val();
  $.ajax({
    type: "POST",
    url: "?view=sistema&mode=queryDelete",
    dataType: "json",
    data: { id: id, date: date },
    statusCode: {
      200: function () {
        alert("solicitud procesada");
        location.reload();
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

function closeModal(selection) {
  if (selection == "update") {
    $("#modalUpd").hide("slow");
  } else if (selection == "delete") {
    $("#modalDel").hide("slow");
  }
}
