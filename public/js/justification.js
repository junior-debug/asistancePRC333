function queryUser() {
  const id = $("#id").val();
  $.ajax({
    type: "POST",
    url: "?view=sistema&mode=queryUser",
    dataType: "json",
    data: { id: id },
    statusCode: {
      200: function (data) {
        console.log(data);
        if (data != "") {
          console.log("hola");
        } else if (data == false) {
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

function selectDays() {
  if ($("#daysJustifi").val() == 1) {
    $("#oneDay").show("slow");
    $("#someDays").hide("slow");
  } else if ($("#daysJustifi").val() == 2) {
    $("#someDays").show("slow");
    $("#oneDay").hide("slow");
  }
}
