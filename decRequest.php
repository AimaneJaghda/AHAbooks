<?php
    require("cnx.php");

    $re1 = $connexion->prepare("DELETE FROM request WHERE idUser=?");
    $re1->execute([$_POST["idUser"]]);
    header("Location: profile.php");
?>