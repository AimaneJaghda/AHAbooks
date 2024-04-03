<?php
    session_start();
    
    if($_SESSION["typeUser"] == "admin"){
        unset($_SESSION["idAdmin"]);
        unset($_SESSION["typeAdmin"]);
    }
    elseif($_SESSION["typeUser"] == "author"){
        unset($_SESSION["idAuthor"]);
    }
    unset($_SESSION["idUser"]);
    unset($_SESSION["profilePicture"]);
    unset($_SESSION["typeUser"]);

    session_destroy();

    header("Location: login.php");
?>