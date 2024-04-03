<?php
    session_start();
    
    require("cnx.php");

    try{

    $titre = $_POST['titreBook'];
    $prix = $_POST['prixBook'];
    $Npage = $_POST['NpageBook'];
    $editor = $_POST['editorBook'];
    $isbn = $_POST['isbnBook'];
    $categorie = isset($_POST["category"])?implode(" " ,$_POST['category']):"";
    $description = $_POST['descriptionBook'];
    $langue = $_POST['langue'];

    $header = "location:addBook.php?&";
    $errorH = false;
    if(empty($titre) || empty($prix) || empty($Npage) || empty($editor) || empty($isbn)
    || empty($date) || empty($categorie) || empty($description) || empty($langue)){
        $errorH = true;
        if(empty($titre)){
            $header .= "msgtitre=Titre important !&";
        }
        if(empty($prix)){
            $header .= "msgprix=prix important !&";
        }
        if(empty($Npage)){
            $header .= "msgNpage=Nombre des pages important !&";
        }
        if(empty($editor)){
            $header .= "msgeditor=Editeur important !&";
        }
        if(empty($isbn)){
            $header .= "msgisbn=ISBN important !&";
        }
        if(empty($categorie)){
            $header .= "msgcategorie=categorie important !&";
        }
        if(empty($langue)){
            $header .= "msglangue=Langue de livre important !&";
        }
        header($header);

    }
    
    // if((gettype($prix) != "integer") || (gettype($isbn) != "integer") || (gettype($Npage) != "integer")){
    //     if(gettype($prix) != "integer"){
    //         $header .= "msgprix=Price must be a number!&";
    //     }
    //     if(gettype($isbn) != "integer"){
    //         $header .= "msgisbn=ISBN must be number!&";
    //     }
    //     if(gettype($Npage) != "integer"){
    //         $header .= "msgNpage=Number of pages must be a number!&";
    //     }
    // }
    
    $typeFichierSelection = $_FILES['photoBook']['type'];
    $exts=array("image/png","image/jpeg");
    
    if(in_array($typeFichierSelection,$exts)){
    
        $nomfichier = $_FILES['photoBook']['name'];
        $tempFichier = $_FILES['photoBook']['tmp_name'];
        $location="Books/bookPicture/".$nomfichier;
        move_uploaded_file($tempFichier,$location);
    
        $requite = $connexion -> prepare("INSERT INTO AHAbook(titreBook, price, numberPages, editorBook, ISBN, publicationDate, categoryBook, langueBook, bookPicture, bookDescription, idAuthor) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $requite -> execute(array($titre, $prix, $Npage, $editor, $isbn, date("Y-m-d"), $categorie, $langue, $location, $description, $_SESSION["idAuthor"]));
    
        header("Location: profile.php");
    }
    

    


    }catch(Exception $erreur){
        echo "Erreur : ", $erreur -> getMessage();
    }

?>