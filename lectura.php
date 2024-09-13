<?php
session_start();

// Validamos los datos introducidos en index.php
if (!empty($_POST["email"]) && !empty($_POST["tlfno"]) && !empty($_POST["email2"]) && !empty($_POST["dni"])) {
    $dni = $_POST["dni"];
    $tlfno = $_POST["tlfno"];
    $email = $_POST["email"];
    $email2 = $_POST["email2"];
    $errores = array();

    // Validamos el teléfono con formato correcto
    if (!preg_match("/^(?:(?:\+|00)?34)?[679]\d{8}$/", $tlfno)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El número de teléfono no es válido (XXXXXXXXX)</p>";
    }

    // Validamos el DNI
    $expRegDNI = "/^[0-9]{8}[A-Za-z]{1}$/";
    if (!preg_match($expRegDNI, $dni)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El DNI no es válido</p>";
    } else {
        if (!validarLetra($dni)) {
            $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> La letra del DNI no es correcta</p>";
        }
    }

    // Validamos el email y su confirmación
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El email no es válido</p>";
    } elseif (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> Confirme el email</p>";
    } elseif ($email !== $email2) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> Ambos emails deben coincidir</p>";
    }

    // Si hay errores, los mostramos en index.php
    if (count($errores) > 0) {
        $cadenaErrores = implode("<br>", $errores); // Concatenamos todos los errores
        header("Location: index.php?mensaje=" . urlencode($cadenaErrores));
        exit();
    } else {
        // Si no hay errores, guardamos los datos en la sesión y redirigimos a continuamos.php
        $_SESSION["dni"] = $dni;
        $_SESSION["tlfno"] = $tlfno;
        $_SESSION["email"] = $email;
        header('Location: continuamos.php');
        exit();
    }
} else {
    // Si algún campo está vacío, mostramos un error general
    $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> Todos los datos son requeridos</p>";
    $cadenaErrores = implode("<br>", $errores);
    header("Location: index.php?mensaje=" . urlencode($cadenaErrores));
    exit();
}

// Función que valida la letra del DNI
function validarLetra($dni) {
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    $numeroDNI = substr($dni, 0, 8); // Extraemos la parte numérica
    $letraDNI = strtoupper(substr($dni, -1)); // Extraemos la letra del DNI
    $resto = $numeroDNI % 23; // Calculamos el índice de la letra
    return ($letras[$resto] == $letraDNI); // Comparamos la letra calculada con la proporcionada
}


