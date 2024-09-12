<?php
session_start();
//Validamos los datos introducidos en index.php
if (!empty($_GET["email"]) && !empty($_GET["tlfno"]) && !empty($_GET["email2"]) && !empty($_GET["dni"])) {
    $dni = $_GET["dni"];
    $tlfno = $_GET["tlfno"];
    $email = $_GET["email"];
    $email2 = $_GET["email2"];
    $errores = array();

    //Validamos que el telefono tenga el formato +0034 que comience por 679 y luego contenga 8 digitos más
    if (!preg_match("/^(?:(?:\+|00)?34)?[679]\d{8}$/", $tlfno)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El numero de telefono no es valido (XXXXXXXXX)</p>";
    }

    //Validamos el dni
    if(!empty($_GET['dni'])){
        $dni = $_GET['dni'];
        $expReg= "/^[0-9]{8}[A-Za-z]{1}$/";
        if(preg_match($expReg,$dni)){
            $mensaje="EL DNI es valido -> ".substr($dni,0,8);
        }else{
            $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El dni no es válido</p>";        }
    }else{
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El dni es obligatorio</p>";    }

    // Validamos que el formato del dni introducido es correcto.
    if(isset($_POST['dni'])){
        $dni = $_POST['dni'];
        $expReg= "/^[0-9]{8}[A-Za-z]{1}$/";
        if(preg_match($expReg,$dni)){
            $mensaje="EL DNI es valido -> ".substr($dni,0,8);
        }else{
            $mensaje="EL DNI no es valido";
        }
    }else{
        $mensaje="El campo DNI es obligatorio";
    }


    // Validamos y confirmamos el email introducido.
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> Verifique el email</p>";
    } elseif (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> Confirme el email</p>";
    }elseif ($email !== $email2) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> Ambos email deben coincidir.</p>";
    }

    if (count($errores) > 0) {
        for ($x = 0; $x < count($errores); $x++) {
            $cadena = $errores[$x];
        }
        header("Location: index.php?cadena=" . $cadena);
    } else {
        $_SESSION["nombre"] = $email2;
        $_SESSION["apellido1"] = $dni;
        $_SESSION["email"] = $email;
        $_SESSION["tlfno"] = $tlfno;
        header('Location: continuamos.php');
    }

} else {
    $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> Todos los datos son requeridos.</p>";
}

//Validamos los datos introducidos en Continuamos.php
if (!empty($_GET["nombre"]) && !empty($_GET["edad"]) && !empty($_GET["apellido1"]) && !empty($_GET["apellido2"])) {
    $nombre = $_GET["nombre"];
    $apellido1 = $_GET["apellido1"];
    $apellido2 = $_GET["apellido2"];
    $edad = $_GET["edad"];
    $errores = array();

    //Validamos que el usuario sea mayor de edad.
    if ($edad >=18) {
        echo "eres mayor de edad";
    }else {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> No eres mayor de edad.</p>";
    }

    // Validamos que el nombre y apellidos no contengan números.
    if(empty($_POST["nombre"]) || !is_string($_POST["nombre"])){
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El nombre no es correcto.</p>";
    }
    if (!is_string($apellido1) || preg_match("/[0-9]/", $apellido1)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El apellido solo permite texto</p>";
    }
    if (!is_string($apellido2) || preg_match("/[0-9]/", $apellido2)) {
        $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> El apellido solo permite texto</p>";
    }


    if (count($errores) > 0) {
        for ($x = 0; $x < count($errores); $x++) {
            $cadena = $errores[$x];
        }
        header("Location: index.php?cadena=" . $cadena);
    } else {
        $_SESSION["nombre"] = $edad;
        $_SESSION["apellido1"] = $apellido2;
        $_SESSION["email"] = $apellido1;
        $_SESSION["tlfno"] = $nombre;
        header('Location: terminamos.php');
    }
}else{
    $errores[] = "<p style='color: darkred'><strong>ERROR:</strong> Todos los datos son requeridos.</p>";
}


// Creamos la funcion que se encargará de realizar la validacion de la letra del dni.
function validarLetra($dni){ //Ejemplo -> 06254254M
    $letras="TRWAGMYFPDXBNJZSQVHLCKE";
    //Extrae la parte numérica
    $enteroDNI=strstr($dni,0,8);
    // Calculamos el resto, el cual nos indicará la posición de la letra correcta de la cadena $letras.
    $resto=$enteroDNI%23;

    if($letras[$resto]==strtoupper(substr($dni,9,1))){
        var_dump($letras);
        return true;
    }else{
        return false;
    }
}