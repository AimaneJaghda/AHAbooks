<?php

    require("cnx.php");

    try{

        $typeFichierSelection = $_FILES['bookPicture']['type'];
        $exts=array("image/png","image/jpeg");
    
        if(in_array($typeFichierSelection,$exts)){
    
            $nomfichier = $_FILES['bookPicture']['name'];
            $tempFichier = $_FILES['bookPicture']['tmp_name'];
            $location="Books/bookPicture/".$nomfichier;
            move_uploaded_file($tempFichier,$location);
    
            $requite = $connexion -> prepare('UPDATE  AHAbook SET titreBook=?, price=?, numberPages=?, editorBook=?, ISBN=?, publicationDate=?, categoryBook=?, langueBook=?, bookPicture=?, bookDescription=? WHERE idBook=?');
            $requite -> execute(array($_POST['titreBook'], $_POST['prixBook'], $_POST['NpageBook'], $_POST['editorBook'], $_POST['isbnBook'], $_POST['DPBook'], isset($_POST["category"])?implode(" " ,$_POST['category']):"", $_POST['langue'], $location, $_POST['descriptionBook'], $_POST["idBook"]));
    
            header("Location: profile.php");
        }

    }catch(Exception $erreur){

        echo "Erreur :", $erreur -> getMessage();

    }


?>