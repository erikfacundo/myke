$(document).ready(function () {
  $("#botonenviar").click(function (e) {
    e.preventDefault();
    if (validarFormulario()) {
      $.post("ajax/enviar.php", $("#formdata").serialize(), function (res) {
        if (res == 1) {
          // Si el envío es exitoso, muestra SweetAlert de éxito
          mostrarMensajeExito();
           // Recarga la página después de 2 segundos
           setTimeout(function() {
            location.reload();
          }, 2000);
        } else {
          // Si hay un error en el envío, muestra SweetAlert de error
          mostrarMensajeError('Ocurrió un error al enviar el formulario. Por favor, inténtelo nuevamente.');
        }
      }).fail(function (xhr, status, error) {
        // Manejo de errores AJAX
        console.error("Error en la solicitud AJAX:", status, error);
        mostrarMensajeError('Ocurrió un error al enviar el formulario. Por favor, inténtelo nuevamente.');
      });
    }else{
      mostrarMensajeError('Complete todo los campos del formulario');
    }
  });

  function mostrarMensajeExito() {
    Swal.fire({
      title: '¡Mensaje enviado con éxito!',
      text: 'Good job! You clicked the button!',
      icon: 'success',
      confirmButtonText: 'Cerrar'
    });
  }

  function mostrarMensajeError(mensaje) {
    Swal.fire({
      title: 'Error',
      text: mensaje,
      icon: 'error',
      confirmButtonText: 'Cerrar'
    });
  }
});

function validarFormulario() {
  // Obtiene los valores de los campos del formulario
  var comentarios = document.getElementById('comentarios').value;

  // Verifica si al menos uno de los campos obligatorios está lleno
  if (comentarios === '') {
    return false
  } else {
    return true
  }
}


function scrollToForm() {
  var formulario = document.getElementById('miFormulario');
  formulario.scrollIntoView({ behavior: 'smooth' });
}
