<?php
    require("cnx.php");
    session_start();


    $re1 = $connexion->prepare("INSERT INTO request(idUser, dateRequest, typeRequest) VALUES (?, ?, ?)");
    $re1->execute([$_SESSION["idUser"], date("Y-m-d"), $_POST["typeRequest"]]);

    header("Location: profile.php");
?>