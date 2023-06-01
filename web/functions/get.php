<?php
    require_once ("inc-dbconnect.php");
    $dataBanner = $db->prepare("SELECT * FROM bbdd");
    $dataBanner->execute();
    $dataBanner = $dataBanner->fetchAll(PDO::FETCH_ASSOC);
?>
