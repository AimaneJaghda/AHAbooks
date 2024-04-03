<?php
    session_start();
    
    require("cnx.php");
    $idUser = $_SESSION["idUser"];
    $idBook = $_POST["idBook"];


    $re1 = $connexion->prepare("SELECT * FROM ahacart WHERE idUser=? AND idBook=?");
    $re1->execute([$idUser, $idBook]);

    if($re1->rowCount() > 0){
        header("Location: bookPage.php?idBook=$idBook&msgExist=This book already exists in your cart.");
    }
    else{
        $re2 = $connexion->prepare("INSERT INTO ahacart(idUser, idBook, purchaseDate) VALUES(?, ?, ?)");
        $re2->execute([$idUser, $idBook, date("Y-m-d")]);
        header("Location: bookPage.php?idBook=$idBook&msgSuccess=has been added to your cart");
    }
?>