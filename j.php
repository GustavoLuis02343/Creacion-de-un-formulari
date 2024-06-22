<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $password = $_POST["password"];
    $edad = $_POST["edad"];
    $errors = [];

    // Verificar que todos los campos estén llenos
    if (empty($user) || empty($password) || empty($edad)) {
        $errors[] = "<br><h2>Debe llenar todos los campos<h2>";
    }

    // Validar que la edad sea un número
    if (!is_numeric($edad)) {
        $errors[] = "La edad debe ser un número.";
    } else if ($edad < 18) {
        $errors[] = "<br><h3>Debe tener mas de 18 años.<h3>";
    }

    // Verificar que el usuario sea "luis" y la contraseña "mendoza"
    if ($user != "luis"){
        $errors[] = "Usuario incorrecto!!! Intentalo de nuevo";
    } 
    if($password != "mendoza"){
        $errors[] = "Tu contraseña es incorrecta!!! Intantalo de nuevo";
    }

    // Mostrar mensajes de error si los hay
    if (!empty($errors)) {  //verifica si error no esa vacio
        foreach ($errors as $error) { //si esta vacio le manda un mensaje de error
            echo "<p>$error</p>";
        }

    } else {
        echo "<center><p><h2>Login exitoso. Bienvenido, $user!</p><h2><center>"; //si pasa en todas las anteriores  entonces el logeo es exitoso
    }
}
?>