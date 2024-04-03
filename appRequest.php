<?php
    session_start();
    require("cnx.php");
    $re1 = $connexion->prepare("UPDATE request SET idAdmin=?, dateApproved=? WHERE idUser=?");
    $re1->execute([$_SESSION["idAdmin"], date("Y-m-d"), $_POST["idUser"]]);


    $re2 = $connexion->prepare("SELECT * FROM ahauser WHERE idUser=?");
    $re2->execute([$_POST["idUser"]]);
    $user = $re2->fetch();
    

    $re5 = $connexion->prepare("SELECT * FROM request WHERE idUser=?");
    $re5->execute([$_POST["idUser"]]);
    $request = $re5->fetch();

    if($request["typeRequest"] == "admin"){
        $re3 = $connexion->prepare("INSERT INTO ahaadmin(email, passwordAdmin, lastName, firstName, birthDate, creationDate, city, country, typeAdmin, profilePicture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $re3->execute([$user["email"], $user["passwordUser"], $user["lastName"], $user["firstName"], $user["birthDate"], $user["creationDate"], $user["city"], $user["country"], "moderator", $user["profilePicture"]]);
    }
    else{
        $re3 = $connexion->prepare("INSERT INTO ahaauthor(email, passwordAuthor, lastName, firstName, birthDate, creationDate, city, country, dateActive, profilePicture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $re3->execute([$user["email"], $user["passwordUser"], $user["lastName"], $user["firstName"], $user["birthDate"], $user["creationDate"], $user["city"], $user["country"], date("Y-m-d"), $user["profilePicture"]]);
    }
    
    
    $re4 = $connexion->prepare("UPDATE ahauser SET typeUser=? WHERE idUser=?");
    $re4->execute([$request["typeRequest"], $_POST["idUser"]]);




    header("Location: profile.php");
    ?>