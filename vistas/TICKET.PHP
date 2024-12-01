<!DOCTYPE html>
<html>
<head>
    <title>Generar Ticket</title>
</head>
<body>
    <h2>Generar Ticket</h2>
    <?php
    // Verificamos si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recopilamos los datos del formulario
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $asunto = $_POST["asunto"];
        $mensaje = $_POST["mensaje"];

        // Generamos el ticket
        $ticket = "Nombre: $nombre\n";
        $ticket .= "Email: $email\n";
        $ticket .= "Asunto: $asunto\n";
        $ticket .= "Mensaje: $mensaje\n";

        // Guardamos el ticket en un archivo (podrías almacenarlo en una base de datos en lugar de un archivo)
        $archivo = 'tickets/' . uniqid() . '.txt'; // Generamos un nombre de archivo único
        file_put_contents($archivo, $ticket);

        // Mostramos un mensaje de éxito al usuario
        echo "¡Ticket generado correctamente!";
    } else {
        // Si no se han enviado datos por el formulario, mostramos el formulario
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre"><br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="asunto">Asunto:</label><br>
            <input type="text" id="asunto" name="asunto"><br>
            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje"></textarea><br><br>
            <input type="submit" value="Generar Ticket">
        </form>
        <?php
    }
    ?>
</body>
</html>
