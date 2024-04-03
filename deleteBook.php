<?php
    $idBook = $_POST["idBook"];
    echo $idBook;

    require("cnx.php");
    $re1 = $connexion->prepare("DELETE FROM ahabook WHERE idBook=?");
    $re1->execute([$idBook]);

    header("Location: profile.php");
?>