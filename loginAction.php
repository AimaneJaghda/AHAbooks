<?php

    $email = $_POST["AHAemail"];
    $password = $_POST["AHApassword"];

    if(empty($email) || empty($password) || strlen($password) > 30 || strlen($password) < 8){
        $headTo = "Location: login.php?";
        if(empty($email)){
            $headTo .= "msgEmail=Email is required&";
        }

        if(empty($password)){
            $headTo .= "msgPassword=Password is required&";
        }
        elseif(strlen($password) > 30 || strlen($password) < 8){
            $headTo .= "msgPassword=Password should be between 8 and 30 characters&";
        }
        header($headTo);
    }
    else{
        //Sorry, we could not find your account.
        require("cnx.php");

        $re1 = $connexion->prepare("SELECT * FROM AHAuser WHERE email=?");
        $re1->execute([$email]);

        if($re1->rowCount() == 0){
            header("Location: login.php?msgEmail=Sorry, we could not find your account.");
        }
        else{
            $user = $re1->fetch();
            if($user["passwordUser"] != $password){
                session_start();
                $_SESSION["email"] = $email;
                header("Location: login.php?msgPassword=Wrong password!");
            }
            else{
                session_start();
                $_SESSION["idUser"] = $user["idUser"];
                $_SESSION["profilePicture"] = $user["profilePicture"];
                $_SESSION["typeUser"] = $user["typeUser"];
                if($_SESSION["typeUser"] == "admin"){
                    $re2 = $connexion->prepare("SELECT typeAdmin, idAdmin FROM AHAadmin WHERE email=?");
                    $re2->execute([$email]);
                    $adm = $re2->fetch();
                    $_SESSION["idAdmin"] = $adm["idAdmin"];
                    $_SESSION["typeAdmin"] = $adm["typeAdmin"];
                }
                elseif($_SESSION["typeUser"] == "author"){
                    $re3 = $connexion->prepare("SELECT idAuthor FROM ahaauthor WHERE email=?");
                    $re3->execute([$email]);
                    $aut = $re3->fetch();
                    $_SESSION["idAuthor"] = $aut["idAuthor"];
                }
                header("Location: homePage.php");
            }
        }
    }

?>