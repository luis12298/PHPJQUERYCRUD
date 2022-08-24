//function para buscar y cargar

$(document).ready(function () {
  load_data();
  function load_data(query) {
    $.ajax({
      url: "buscar.php",
      method: "POST",
      data: { query: query },
      success: function (data) {
        $("#dgvDatos").html(data);
      },
    });
  }
  $("#txtbuscar").keyup(function () {
    var search = $(this).val();
    if (search != "") {
      load_data(search);
    } else {
      load_data();
    }
  });
});
//funcion para guardar
$("#Guardar").on("submit", function (e) {
  e.preventDefault();
  var data = $("#Guardar").serialize();
  $.ajax({
    url: "procesos.php",
    type: "POST",
    data: data,
    success: function (response) {
      // console.log(data);
      response = $.parseJSON(response);
      if (response.status == "success") {
        alert("Guardado");
        $("#txtusuario").val("");
        $("#txtpass").val("");
      } else {
        alert("No Guardado");
      }
      var popup = (window.opener.location.href = "inicio.php");
      if (popup) {
        popup.onclose = function () {
          window.location.reload;
        };
        window.close();
      }
    },
  });
});
//abrir formulario en ventana
$(document).ready(function () {
  $("#btn1").click(function (e) {
    e.preventDefault();
    var w = 500;
    var h = 600;
    var left = Number(screen.width / 2 - w / 2);
    var tops = Number(screen.height / 2 - h / 2);

    window.open(
      "agregar.php",
      "Agregar Usuario",
      "toolbar=no, location=no,resizable=no,width=" + w + ", height=" + h + ", top=" + tops + ", left=" + left
    );
  });
});
//login
$("#form").on("submit", function (e) {
  e.preventDefault();
  var data = $("#form").serialize();
  $.ajax({
    url: "procesos.php",
    type: "POST",
    data: data,
    success: function (response) {
      // console.log(data);
      response = $.parseJSON(response);
      if (response.status == "success") {
        alert("Datos Correctos");
        $("#txtusuario").val("");
        $("#txtpass").val("");
        window.location.href = "inicio.php";
      } else {
        alert("Datos Incorrectos");
      }
    },
  });
});

// obtner primer valor de una fila
$("#dgvDatos").on("click", "tr", function () {
  var indice = $(this).closest("tr");
  var valor = indice.find("td:eq(0)").text();
  $("#txtvalor").val(valor);
});

//eliminar
function eliminar() {
  if ($("#txtvalor").val() == 0) {
    alert("Seleccione un registro");
  } else {
    var r = window.confirm("Desea eliminar este registro?");
    if (r) {
      $.ajax({
        type: "GET",
        url: "procesos.php",
        data: {
          me: $("#txtvalor").val(),
        },
        success: function (response) {
          response = $.parseJSON(response);
          if (response.status == "success") {
            alert("Registro Eliminado");
          }
          // alert(response);
        },
      });
    } else {
      return;
    }
  }
}

//actualizar

$(document).ready(function () {
  $("#url1").click(function (e) {
    e.preventDefault();
    var w = 500;
    var h = 600;
    var left = Number(screen.width / 2 - w / 2);
    var tops = Number(screen.height / 2 - h / 2);
    var valor = $("#txtvalor").val();
    if ($("#txtvalor").val() == 0) {
      alert("Seleccione un registro");
    } else {
      window.open(
        "editar.php?id=" + valor,
        "Editar Usuario",
        "toolbar=no, location=no,resizable=no,width=" + w + ", height=" + h + ", top=" + tops + ", left=" + left
      );
    }
  });
});
$("#Editar").on("submit", function (e) {
  e.preventDefault();
  var data = $("#Editar").serialize();
  $.ajax({
    url: "procesos.php",
    type: "POST",
    data: data,
    success: function (response) {
      // console.log(data);
      response = $.parseJSON(response);
      if (response.status == "success") {
        alert("Actualizado");
        $("#txtusuario").val("");
        $("#txtpass").val("");
      } else {
        alert("No se pudo actualizar");
      }
      var popup = (window.opener.location.href = "inicio.php");
      if (popup) {
        popup.onclose = function () {
          window.location.reload;
        };
        window.close();
      }
    },
  });
});
