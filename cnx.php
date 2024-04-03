<?php
    try{
        $connexion=new PDO("mysql:host=localhost;dbname=AHAbooks;port=3306","root","password");
    }
    catch(Exception $e){
        echo "ERREUR::",$e->getMessage();
    }
?>