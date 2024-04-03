<?php

    require("cnx.php");

    try{

        $fname = trim($_POST['AHAfirstName']);
        $lname = trim($_POST['AHAlastName']);
        $email = trim($_POST['AHAemail']);
        $password = trim($_POST['AHApassword']);
        $day = trim($_POST['AHAday']);
        $month = trim($_POST['AHAmonth']);
        $year = trim($_POST['AHAyear']);
        $datenaissance = $year ."-". $month ."-". $day;
        $city = trim($_POST['AHAcity']);
        $contry = trim($_POST['AHAcountry']);
        $date = date("Y");

        $requite = $connexion -> prepare("SELECT * FROM AHAuser WHERE email=?");
        $requite -> execute([$email]);
        $line = $requite -> fetch();

        $errHandling = false;

        $heade = "location: login.php?switchIn=signUp&";
        if(empty($fname) || empty($lname) || empty($email) || empty($password) || 
           empty($day) || empty($month) || empty($year) || empty($city) || empty($contry)){

            if(empty($fname)){
                $heade .= "msgfname=First name is required !&";
            }
            if(empty($lname)){
                $heade .= "msglname=Last name is required !&";
            }
            if(empty($email)){
                $heade .= "msgemail=Email is required !&";
            }
            if(empty($password)){
                $heade .= "msgpass=Password is required !&";
            }
            if(empty($day)){
                $heade .= "msgday=Day is required !&";
            }
            if(empty($month)){
                $heade .= "msgmonth=Month is required !&";
            }
            if(empty($year)){
                $heade .= "msgyear=Year is required !&";
            }
            if(empty($city)){
                $heade .= "msgcity=City is required !&";
            }
            if(empty($contry)){
                $heade .= "msgcontry=Contry is required !&";
            }
            $errHandling = true;
        }

        if((strlen($fname) < 3 || strlen($fname) > 30) || (strlen($lname) < 3 || strlen($lname) > 30) || ($requite->rowCount() > 1) || (strlen($password) < 3 || strlen($password) > 30) ||
        ($day < 1 || $day > 31) || ($month < 1 || $month > 12) || ($year < 1000 || $year > $date) || (strlen($city) < 3 || strlen($city) > 30) || (strlen($contry) < 3 || strlen($contry) > 30)){

            if(strlen($fname) < 3 || strlen($fname) > 30){
                $heade .= "msgfnamelen=Between 3 AND 30!&";
            }
            if(strlen($lname) < 3 || strlen($lname) > 30){
                $heade .= "msglnamelen=Between 3 AND 30!&";
            }
            if($requite->rowCount() > 0){
                $heade .= "msgemailpre=Account already exists!&";
            }
            if(strlen($password) < 3 || strlen($password) > 30){
                $heade .= "msgcpasslen=Between 3 AND 30!&";
            }
            if($day < 1 || $day > 31){
                $heade .= "msgdaylen=Between 1 AND 31!&";
            }
            if($month < 1 || $month > 12){
                $heade .= "msgmonthlen=Between 1 AND 12!&";
            }
            if($year < 1000 || $year > $date){
                $heade .= "msgyearlen=Between 1000 AND $date!&";
            }
            if(strlen($city) < 3 || strlen($city) > 30){
                $heade .= "msgcitylen=Between 3 AND 30!&";
            }
            if(strlen($contry) < 3 || strlen($contry) > 30){
                $heade .= "msgcontrylen=Between 3 AND 30!&";
            }
            $errHandling = true;
        }
        if($errHandling){
            header($heade);
        }
        else{
            if(file_exists($_FILES["profilePicture"]["tmp_name"])){
                $typeFichierSelection = $_FILES['AHAprofilePicture']['type'];
                $exts=array("image/png","image/jpeg");
                if(in_array($typeFichierSelection,$exts)){
        
                    $nomfichier = $_FILES['AHAprofilePicture']['name'];
                    $tempFichier = $_FILES['AHAprofilePicture']['tmp_name'];
                    $location="users/ProfilePicture/".$nomfichier;
                    move_uploaded_file($tempFichier,$location);
                }
                
            }
            else{
                $location = $_POST["location"];
            }
            
                
            $requite = $connexion -> prepare("UPDATE AHAuser SET email=?, passwordUser=?, lastName=?, firstName=?, birthDate=?, city=?, country=?, profilePicture=? WHERE idUser=?");
            $requite -> execute(array($email, $password, $lname, $fname, $datenaissance, $city, $contry, $location, $_POST["idUser"]));

            if($_POST["typeUser"] == "admin"){
                $requite2 = $connexion -> prepare("UPDATE AHAadmin SET email=?, passwordAdmin=?, lastName=?, firstName=?, birthDate=?, city=?, country=?, profilePicture=? WHERE idAdmin=?");
                $requite2 -> execute(array($email, $password, $lname, $fname, $datenaissance, $city, $contry, $location, $_POST["idAdmin"]));
            }
            elseif($_POST["typeUser"] == "author"){
                $requite = $connexion -> prepare("UPDATE AHAauthor SET email=?, passwordAuthor=?, lastName=?, firstName=?, birthDate=?, city=?, country=?, profilePicture=? WHERE idAuthor=?");
                $requite -> execute(array($email, $password, $lname, $fname, $datenaissance, $city, $contry, $location, $_POST["idAuthor"]));
                echo $_POST["typeUser"];
            }
                
            header("location:profile.php");
        }

            

        
    }catch(Exception $erreur){
        echo "Erreur :", $erreur -> getMessage();
    }
    
    echo "<br>";
    ?>