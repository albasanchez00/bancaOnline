<?php
//Validamos los datos introducidos en Continuamos.php
if (!empty($_POST["nombre"]) && !empty($_POST["edad"]) && !empty($_POST["apellido1"]) && !empty($_POST["apellido2"])) {
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $edad = $_POST["edad"];
    $errores = array();

    //Validamos que el usuario sea mayor de edad.
    if ($edad < 18) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> No eres mayor de edad.</p>";
    }

    // Validamos que el nombre y apellidos no contengan números
    if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El nombre solo puede contener letras.</p>";
    }

    if (!preg_match("/^[a-zA-Z\s]+$/", $apellido1)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El primer apellido solo puede contener letras.</p>";
    }

    if (!preg_match("/^[a-zA-Z\s]+$/", $apellido2)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El segundo apellido solo puede contener letras.</p>";
    }

    // Si hay errores, los mostramos en continuamos.php
    if (count($errores) > 0) {
        $cadenaErrores = implode("<br>", $errores); // Concatenamos todos los errores
        header("Location: continuamos.php?mensaje=" . urlencode($cadenaErrores));
        exit();
    } else {
        // Si no hay errores, guardamos los datos en la sesión y redirigimos a terminamos.php
        $_SESSION["nombre"] = $nombre;
        $_SESSION["apellido1"] = $apellido1;
        $_SESSION["apellido2"] = $apellido2;
        $_SESSION["edad"] = $edad;
        header('Location: terminamos.php');
        exit();
    }
} else {
    // Si algún campo está vacío, mostramos un error general
    $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> Todos los datos son requeridos.</p>";
    $cadenaErrores = implode("<br>", $errores);
    header("Location: continuamos.php?mensaje=" . urlencode($cadenaErrores));
    exit();
}