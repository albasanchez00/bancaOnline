<?php
// Insertamos la cabecera
include "header.php";

?>
<section id="bloque-general">
    <section class="cabecera">
        <div class="iconos-header2">
            <span>1<img src="media/flecha-derecha.svg" alt="flecha"></span>
        </div>

        <div class="iconos-header2">
            <span class="active">2<img src="media/flecha-derecha.svg" alt="flecha"></span>
        </div>

        <div class="iconos-header2">
            <span>3</span>
        </div>
    </section>

    <section id="bloque-contenido2">
        <h2>Continuemos</h2>
        <p>Por favor, necesitamos más datos para completar el proceso:</p>

        <form action="lectura2.php" method="POST">
            <div class="contenido-form">
                <div class="bloque-datos">
                    <label for="nombre"></label>
                    <input class="datos" type="text" placeholder="NOMBRE" id="nombre" name="nombre" required>
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
                    <label for="edad"></label>
                    <input class="datos" type="number" placeholder="EDAD" id="edad" name="edad" required>
                    <p>Tu edad (mínimo 18 años)</p>
                </div>

                <div class="bloque-datos">
                    <label for="apellido2"></label>
                    <input class="datos" type="text" placeholder="SEGUNDO APELLIDO" id="apellido2" name="apellido2">
                    <p>Tu segundo apellido (Ej: García)</p>
                </div>
            </div>

            <div class="contenido-politicas">
                <div class="error-message">
                    <?php
                    if (isset($_GET["mensaje"])) {
                        echo urldecode($_GET["mensaje"]); // Muestra los errores enviados desde PHP
                    }
                    ?>
                </div>
            </div>

            <div>
                <input class="boton" type="submit" value="Siguiente" id="enviar">
                <input type="reset" value="Limpiar" class="boton">
            </div>
        </form>
    </section>
</section>
</body>
</html>
