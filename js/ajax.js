$(document).on("submit", "#adminLoginFrm", function () {  
  $.post("query/login.php", $(this).serialize(), function (data) { 
    if (data.res == "invalid") {
      Swal.fire(
        'Inválido', 
        'Ingrese un nombre de usuario / contraseña válidos',
        'error'
      );
    } else if (data.res == "success") {
      $('body').fadeOut();
      window.location.href = 'direcciones.php';
    }
  }, 'json');

  return false;
});
