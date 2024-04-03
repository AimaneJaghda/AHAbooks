<?php
    session_start();

    $idUser = $_SESSION["idUser"];
    $idBook = $_POST["idBook"];

    require("cnx.php");
    $re1 = $connexion->prepare("DELETE FROM ahacart WHERE idUser=? AND idBook=?");
    $re1->execute([$idUser, $idBook]);
    header("Location: cart.php?msgSuccess=1");

?>
