window.onload = function () {
    check = document.querySelector("#check");
    boton = document.querySelector("#enviar");
    check.addEventListener("change", function () {
        if (check.checked) {
            boton.disabled = false;
            boton.style.background = "#000";
        } else {
            boton.disabled = true;
            boton.style.background = "#504f4f";
        }
    });


}