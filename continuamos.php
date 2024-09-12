<?php
// Insertamos la cabecera
include "header.php";
?>
<section id="bloque-general">
    <section class="cabecera">
        <div class="iconos-header">
            <a href="">1<img src="media/flecha-derecha.svg" alt="flecha"></a>
        </div>
        <div class="icono-naranja">
            <a href="">2<img src="media/flecha-derecha.svg" alt="flecha"></a>
        </div>
        <div class="iconos-header">
            <a href="">3</a>
        </div>
    </section>

    <section id="bloque-contenido2">
        <h2>Continuemos</h2>
        <p>Por favor, necesitamos más datos para completar el proceso:</p>

        <form action="lectura.php">
            <div class="contenido-form">
                <div class="bloque-datos">
                    <label for="nombre"></label>
                    <input class="datos" type="text" placeholder="NOMBRE" id="" name="" required>
                    <p>Tu nombre</p>
                </div>

                <div class="bloque-datos">
                    <label for="apellido1"></label>
                    <input class="datos" type="text" placeholder="PRIMER APELLIDO" id="apellido1" name="apellido1" required>
                    <p>Tu primer apellido (Ej: Sánchez)</p>
                </div>
            </div>

            <div class="contenido-form">
                <div class="bloque-datos">
                    <label for="edad"></label
                    ><input class="datos" type="number" placeholder="EDAD" id="edad" name="edad">
                    <p>Tu edad (minimo tener 18 años)</p>
                </div>

                <div class="bloque-datos">
                    <label for="apellido2"></label>
                    <input class="datos" type="text" placeholder="SEGUNDO APELLIDO" id="apellido2" name="apellido2">
                    <p>Tu segundo apellido (Ej: García)</p>
                </div>
            </div>

            <div class="politicas">
                <!-- Cambiar el estado del submit, dependiendo si acepta la política de privacidad-->
                <p><input type="checkbox" id="check">Acepta las <a href="htttps://agpd.es">Políticas de Privacidad</a></p>
            </div>

            <div>
                <input class="boton" type="submit" value="Siguiente" disabled id="enviar">
                <input type="reset" value="Limpiar" class="boton">
            </div>
        </form>
    </section>
</section>
</body>
</html>