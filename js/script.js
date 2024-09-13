window.onload=function () {
    // Activar el botón "Siguiente" cuando se acepte la política de privacidad.
    var check = document.querySelector("#check");
    var boton = document.querySelector("#enviar");

    if (check) {
        check.addEventListener("change", function () {
            if (check.checked) {
                boton.disabled = false;
                boton.style.background = "#000"; // Cambiar estilo al botón cuando está habilitado
            } else {
                boton.disabled = true;
                boton.style.background = "#504f4f"; // Cambiar estilo al botón cuando está deshabilitado
            }
        });
    }
}

