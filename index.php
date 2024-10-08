<?php
// Insertamos la cabecera
include "header.php";
?>
<section id="bloque-general">
    <section class="cabecera">
        <div class="iconos-header2">
            <span class="active">1<img src="media/flecha-derecha.svg" alt="flecha"></span>        </div>

        <div class="iconos-header2">
            <span>2<img src="media/flecha-derecha.svg" alt="flecha"></span>
        </div>

        <div class="iconos-header2">
            <span>3</span>
        </div>
    </section>

    <section id="bloque-contenido">
        <h2>Comencemos</h2>
        <p>Por favor, necesitamos estos datos para dar inicio a su proceso de alta:</p>

        <form action="lectura.php" method="POST">
            <div class="contenido-form">
                <div class="bloque-datos">
                    <label for="dni"></label>
                    <input class="datos" type="text" name="dni" id="dni" placeholder="DNI" required>
                    <p class="texto-Gris">Tu DNI (000000000X)</p>
                </div>
                <div class="bloque-datos">
                    <label for="tlfno"></label>
                    <input class="datos" type="text" placeholder="TELÉFONO MÓVIL" id="tlfno" name="tlfno" required>
                    <p>Nº Teléfono (000 000 000)</p>
                </div>
            </div>
            <div class="contenido-form">
                <div class="bloque-datos">
                    <label for="email"></label>
                    <input class="datos" type="email" placeholder="EMAIL" id="email" name="email">
                    <p>Tu email (usuario@dominio.ext)</p>
                </div>
                <div class="bloque-datos">
                    <label for="email2"></label>
                    <input class="datos" type="email" placeholder="CONFIRMAR EMAIL" id="email2" name="email2">
                    <p>Tu email (usuario@dominio.ext)</p>
                </div>
            </div>
            <div class="contenido-form">
                <div class="politicas">
                    <p><input type="checkbox" id="check">Acepta las <a href="https://agpd.es" class="verde">Políticas de Privacidad</a></p>
                </div>
                <div>
                    <?php
                    if (isset($_GET["mensaje"])) {
                        $mensaje = $_GET["mensaje"];
                        echo "<p>$mensaje</p>";
                    }
                    ?>
                </div>
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
