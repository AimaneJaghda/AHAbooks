<?php
    session_start();
    if(!isset($_SESSION["idUser"])){
        header("Location: login.php");
    }
    require("cnx.php");


    $re1 = $connexion->prepare("SELECT * FROM ahauser WHERE idUser=?");
    $re1->execute([$_SESSION["idUser"]]);
    $user = $re1->fetch();

    $date = explode("-", $user["birthDate"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="shortcut icon" href="Images/bookFavIcon.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="header.css">
    <style>
        body{
            margin: 0;
            padding-top: 106px;
        }
        .submitBtn{
            color: #EA9571;
            border: 2px solid #EA9571;
            transition: all 200ms linear;
        }
        .submitBtn:hover{
            color: white;
            background-color: #EA9571;
            border: 2px solid #EA9571;
            box-shadow: 0 0 0 0;
            box-shadow: 0 1rem 3rem #ea9571ee !important;
        }
        .submitBtn:active{
            background-color: #aA6541;
            border: 2px solid #aA6541;
            box-shadow: 0 1rem 3rem #ea9571ee !important;
        }
        .dateInp{
            width: 33%;
        }
        .signup{
            background-color: #fefefe;
            box-sizing: border-box;
            padding: 12px 30px;
            width: 500px;
            margin: auto;
            border: 3px solid #f1f1f1;
        }
        .errorInput{
            border-color: #DD0426;
        }
        .errorInput:focus {
            border-color: #F02D3A;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(210, 15, 28, 0.25);
        }
        .errorMsg{
            color: #F02D3A;
            font-size: 12px;
        }
        input, label{
            z-index: 1;
        }
    </style>
</head>
<body>
    <!-- header -->
    <div class="container-fluid mar-0 position-fixed top-0 py-3 w-100 bg-light shadow-lg" style="z-index: 2;">
        <nav class="navbar navbar-expand-lg">
            <!-- Brand logo -->
            <div class="navbar-brand display-1 fs-1 ms-5 fw-semibold blackColor" style="color: #EA9571;">AHA<span class="display-6" style="color: #323031;">books</span>
            </div>

            <!-- Toggle button -->
            <button type="button" class="navbar-toggler me-5" data-bs-toggle="collapse" data-bs-target="#AHAnav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Toggle content -->
            <div class="collapse navbar-collapse mt-5 mt-lg-0" id="AHAnav">

                <!-- First navbar -->
                <div class="navbar-nav mx-auto row align-items-start align-items-lg-center" id="navbar">

                    <!-- Search field -->
                    <div class="nav-item me-3 col my-3 my-lg-0">
                        <form action="search.php" method="post">
                            <input type="text" name="searchInp" id="" class="form-control searchInput" placeholder="Search...">
                            <input type="submit" value="Search" class="searchIcon">
                        </form>
                    </div>

                    <!-- Home page link -->
                    <div class="nav-item nav-elements me-3  col-auto py-2 py-lg-0">
                        <a class="nav-link  fw-semibold ps-3  ps-lg-0" href="homePage.php">Home</a> 
                    </div>

                    <!-- Categories dropdown -->
                    <div class="nav-item nav-elements me-3 col-auto ps-3 ms-1 ms-lg-0 ps-lg-0 py-2 py-lg-0">
                        <div class="dropdown py-2">

                            <!-- Dropdown button -->
                            <button id="categoryBtn" class="categories fw-semibold bg-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </button>
                            <ul class="dropdown-menu">
                                <!-- Category links -->
                                <li><a class="dropdown-item category" href="books.php?category=Fiction">Fiction</a></li>
                                <li><a class="dropdown-item category" href="books.php?category=Fantasy">Fantasy</a></li>
                                <li><a class="dropdown-item category" href="books.php?category=Mystery">Mystery</a></li>
                                <li><a class="dropdown-item category" href="books.php?category=Romance">Romance</a></li>
                                <li><a class="dropdown-item category" href="books.php?category=History">History</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- New releases link -->
                    <div class="nav-item nav-elements me-3 col-auto">
                        <a class="nav-link  fw-semibold  ps-3  ps-lg-0 my-2 my-lg-0" href="newReleases.php">New Releases</a> 
                    </div>
                    <!-- About Us link -->
                    <div class="nav-item nav-elements me-3 col-auto py-2 py-lg-0">
                        <a class="nav-link  fw-semibold  ps-3  ps-lg-0" href="aboutUs.php">About Us</a> 
                    </div>
                </div>
                <!-- Second navbar -->
                <div class="navbar-nav flex-row ps-5 ps-lg-0 me-5 my-3 my-lg-0 align-items-center justify-content-between">
                    <!-- Cart icon -->
                    <div class="nav-item me-3 rounded-circle overflow-hidden profil p-1" title="Cart">
                        <a class="nav-link" style="padding: 0;" href="cart.php" id="cartIcon">
                            <img class="img-fluid" src="Images/cartOrange.png" alt="">
                        </a>
                    </div>
                    <div class="d-block d-lg-none" style="opacity: 0.2; font-size: 40px;">|</div>
                    <div class="nav-item me-3 rounded-circle overflow-hidden profil p-1" title="Account">
                        <a class="nav-link p-0" href="profile.php">
                            <img style="" class="img-fluid profilePic rounded-circle" src="<?php echo $_SESSION["profilePicture"] ?>" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>


    <div class="signup rounded-3 shadow-lg py-4 my-5" id="signupP">
        <form action="editProfileAction.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idUser" value="<?php echo $user["idUser"]; ?>">
            <input type="hidden" name="typeUser" value="<?php echo $user["typeUser"]; ?>">
            <?php
                if($user["typeUser"] == "admin"){
                    $re2 = $connexion->prepare("SELECT idAdmin FROM ahaadmin WHERE email=?");
                    $re2->execute([$user["email"]]);
                    $adm = $re2->fetch();
            ?>
            <input type="hidden" name="idAdmin" value="<?php echo $adm["idAdmin"]; ?>">
            <?php
                }
                elseif($user["typeUser"] == "author"){
                    $re2 = $connexion->prepare("SELECT * FROM ahaauthor WHERE email=?");
                    $re2->execute([$user["email"]]);
                    $aut = $re2->fetch();
            ?>
            <input type="hidden" name="idAuthor" value="<?php echo $aut["idAuthor"]; ?>">
            <?php
                }
            ?>
            <div class="d-flex">
                <div class="form-group w-50 pe-3">
                    <label for="" class="form-label">First name</label>
                    <input type="text" name="AHAfirstName" id="" class="form-control" value="<?php echo $user["firstName"]; ?>">
                    <?php
                        if(isset($_GET["msgfname"])){
                            ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgfname"]; ?>
                    </div>
                    <?php
                        }elseif(isset($_GET['msgfnamelen'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgfnamelen"]; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="form-group w-50">
                    <label for="" class="form-label">Last name</label>
                    <input type="text" name="AHAlastName" id="" class="form-control" value="<?php echo $user["lastName"]; ?>">
                    <?php
                        if(isset($_GET["msglname"])){
                            ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msglname"]; ?>
                    </div>
                    <?php
                        }elseif(isset($_GET['msglnamelen'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msglnamelen"]; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group my-2">
                <label for="" class="form-label">Email address</label>
                <input type="text" name="AHAemail" id="" class="form-control" value="<?php echo $user["email"]; ?>">
                    <?php
                        if(isset($_GET["msgemail"])){
                            ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgemail"]; ?>
                    </div>
                    <?php
                        }elseif(isset($_GET['msgemailpre'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgemailpre"]; ?>
                    </div>
                    <?php } ?>
            </div>
            <div class="form-group my-2">
                <label for="" class="form-label">Password</label>
                <input type="password" name="AHApassword" id="" class="form-control" value="<?php echo $user["passwordUser"]; ?>">
                    <?php
                        if(isset($_GET["msgpass"])){
                            ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgpass"]; ?>
                    </div>
                    <?php
                        }elseif(isset($_GET['msgcpasslen'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgcpasslen"]; ?>
                    </div>
                    <?php } ?>
            </div>
            <div class="d-flex">
                <div class="form-group my-2 dateInp pe-3">
                    <label for="" class="form-label">Day</label>
                    <input type="text" name="AHAday" id="" class="form-control" value="<?php echo $date[2]; ?>">
                    <?php
                        if(isset($_GET["msgday"])){
                            ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgday"]; ?>
                    </div>
                    <?php
                        }elseif(isset($_GET['msgdaylen'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgdaylen"]; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="form-group my-2 dateInp pe-3">
                    <label for="" class="form-label">Month</label>
                    <input type="text" name="AHAmonth" id="" class="form-control" value="<?php echo $date[1]; ?>">
                    <?php
                        if(isset($_GET["msgmonth"])){
                            ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgmonth"]; ?>
                    </div>
                    <?php
                        }elseif(isset($_GET['msgmonthlen'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgmonthlen"]; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="form-group my-2 dateInp">
                    <label for="" class="form-label">Year</label>
                    <input type="text" name="AHAyear" id="" class="form-control" value="<?php echo $date[0]; ?>">
                    <?php
                        if(isset($_GET["msgyear"])){
                            ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgyear"]; ?>
                    </div>
                    <?php
                        }elseif(isset($_GET['msgyearlen'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgyearlen"]; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group w-50 pe-3">
                    <label for="" class="form-label">City</label>
                    <input type="text" name="AHAcity" id="" class="form-control" value="<?php echo $user["city"]; ?>">
                    <?php
                        if(isset($_GET["msgcity"])){
                            ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgcity"]; ?>
                    </div>
                    <?php
                        }elseif(isset($_GET['msgcitylen'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgcitylen"]; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="form-group w-50">
                    <label for="" class="form-label">Country</label>
                    <input type="text" name="AHAcountry" id="" class="form-control" value="<?php echo $user["country"]; ?>">
                    <?php
                        if(isset($_GET["msgcontry"])){
                            ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgcontry"]; ?>
                    </div>
                    <?php
                        }elseif(isset($_GET['msgcontrylen'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET["msgcontrylen"]; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group my-2">
                <label for="" class="form-label">Photo</label>
                <input type="hidden" name="location" value="<?php echo $user["profilePicture"]; ?>">
                <input type="file" name="profilePicture" id="photo" class="form-control" > <!-- -->
            </div>
            <div class="form-group mt-4 text-center">
                <input type="submit" value="Edit" name="signup" class="form-control my-1 submitBtn">
            </div>
    </div>



    <div class="bg-dark p-5 text-center" style="color: #EA9571; margin-top: 120px;">
        &copy; AHAbooks - DEV104
    </div>

    
</body>
</html>