<?php
    require("inc-dbconnect.php");
    $nombre             = $_POST["nombre"];
    $telefono           = $_POST["telefono"];
    $email              = $_POST["email"];
    $asunto             = $_POST["asunto"];
    $mensaje            = $_POST["mensaje"];

    $sql = "INSERT INTO contacto (nombre, telefono, email, asunto, mensaje) VALUES (:nombre, :telefono, :email, :asunto, :mensaje)";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':mensaje', $mensaje);
        $stmt->execute();
        echo "ok";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>
