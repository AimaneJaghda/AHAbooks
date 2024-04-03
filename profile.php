<?php
    session_start(); // Start the session
    if(!isset($_SESSION["idUser"])){
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AHAbooks</title>
    <link rel="shortcut icon" href="Images/bookFavIcon.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="profile.css">
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

    <?php
        require("cnx.php");
        if($_SESSION["typeUser"] == "admin"){
            $re1 = $connexion->prepare("SELECT * FROM ahaadmin WHERE idAdmin=?");
            $re1->execute([$_SESSION["idAdmin"]]);
            $user1 = $re1->fetch();
        }
        elseif($_SESSION["typeUser"] == "author"){
            $re1 = $connexion->prepare("SELECT * FROM ahaauthor WHERE idAuthor=?");
            $re1->execute([$_SESSION["idAuthor"]]);
            $user1 = $re1->fetch();
        }
        else{
            $re1 = $connexion->prepare("SELECT * FROM ahauser WHERE idUser=?");
            $re1->execute([$_SESSION["idUser"]]);
            $user1 = $re1->fetch();
        }
        $bDate = explode("-", $user1["birthDate"]);
        $year1 = $bDate[0];
        $month1 = $bDate[1];
        $day1 = $bDate[2];
        switch($month1){
            case 1 : $month1 = "January"; break;
            case 2 : $month1 = "February"; break;
            case 3 : $month1 = "March"; break;
            case 4 : $month1 = "April"; break;
            case 5 : $month1 = "May"; break;
            case 6 : $month1 = "June"; break;
            case 7 : $month1 = "July"; break;
            case 8 : $month1 = "August"; break;
            case 9 : $month1 = "September"; break;
            case 10 : $month1 = "October"; break;
            case 11 : $month1 = "November"; break;
            case 12 : $month1 = "December"; break;
        }
        
        $cDate = explode("-", $user1["creationDate"]);
        $year2 = $cDate[0];
        $month2 = $cDate[1];
        $day2 = $cDate[2];
        switch($month2){
            case 1 : $month2 = "January"; break;
            case 2 : $month2 = "February"; break;
            case 3 : $month2 = "March"; break;
            case 4 : $month2 = "April"; break;
            case 5 : $month2 = "May"; break;
            case 6 : $month2 = "June"; break;
            case 7 : $month2 = "July"; break;
            case 8 : $month2 = "August"; break;
            case 9 : $month2 = "September"; break;
            case 10 : $month2 = "October"; break;
            case 11 : $month2 = "November"; break;
            case 12 : $month2 = "December"; break;
        }
    ?>

    <div class="container mt-5">
        <div class="row profile shadow-lg">
            <div class="col-12 col-lg-4 sections">
                <div class="imageContainer">
                    <img src="<?php echo $_SESSION["profilePicture"]; ?>" alt="" class="img-fluid rounded-circle mt-5">
                </div>
            </div>
            <div class="col-12 col-lg-8 sections">
                <h1 class="mt-5 mb-5">
                    <?php echo $user1["firstName"] . " " . $user1["lastName"]; 
                        if($_SESSION["typeUser"] == "admin"){
                    ?>
                    <span class="badgeAdmin text-muted"><?php echo $user1["typeAdmin"] ?></span>
                    <?php
                        }
                        elseif($_SESSION["typeUser"] == "author"){
                    ?>
                    <span class="badgeAdmin text-muted">Author</span>
                    <?php
                        }
                    ?>
                </h1>
                <div class="my-5">
                    <h3>Day of birth</h3>
                    <p><?php echo $month1 . " " . $day1 . ", " . $year1; ?></p>
                </div>
                <div class="my-5">
                    <h3>Location</h3>
                    <p>from <?php echo $user1["city"] . ", " . $user1["country"]; ?></p>
                </div>
                <div class="my-5">
                    <h3>Member since</h3>
                    <p><?php echo $month2 . " " . $day2 . ", " . $year2; ?></p>
                </div>
                <?php
                    if(isset($user1["dateActive"])){

                ?>
                <div class="my-5">
                    <h3>Active since</h3>
                    <p>
                        <?php 
                            echo $user1["dateActive"] . " to ";
                            if($user1["dateFin"]){
                        
                                echo $user["dateActive"];
                            }
                            else{
                        ?>
                        <span class="text-danger">
                        <?php
                                echo '"ongoing"';
                            }
                        ?>
                        </span>
                    </p>
                </div>
                <?php
                    }
                ?>
                <div class="my-5 d-flex justify-content-evenly">
                    <form action="editProfile.php" method="post">
                        <input type="submit" value="Edit Profile" class="ahaBtn rounded-pill shadow-lg">
                    </form>
                    <?php
                        if($_SESSION["typeUser"] == "user"){
                            $re10 = $connexion->prepare("SELECT * FROM request WHERE idUser=?");
                            $re10->execute([$_SESSION["idUser"]]);
                            if($re10->rowCount() == 0){
                    ?>
                        <form action="addRequest.php" method="post">
                            <input type="submit" value="Request" class="ahaBtn rounded-pill shadow-lg">
                        </form>
                    <?php
                            }
                    ?>
                    <?php
                        }
                    ?>
                    <form action="logout.php" method="post">
                        <input type="submit" value="Log out" class="ahaBtnRed rounded-pill shadow-lg">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        if($_SESSION["typeUser"] == "admin"){
    ?>
    <div class="container">
        <div class="reqHeader d-flex justify-content-between align-items-center p-4 rounded-4 shadow">
            <h2>Users requests</h2>
            <input type="button" class="btn ahaBtn" id="toggleBtn" value="Show requests">
        </div>
        <div class="requests shadow-lg" id="toggleTarget">
            <?php
                $re2 = $connexion->prepare("SELECT * FROM request WHERE idAdmin IS NULL;");
                $re2->execute();
                if($re2->rowCount() == 0){
            ?>
            <h1 class="text-center py-5">There's currently no requests</h1>
            <?php
                }
                while($request = $re2->fetch()){
                    $re3 = $connexion->prepare("SELECT * FROM ahauser WHERE idUser=?");
                    $re3->execute([$request["idUser"]]);
                    $user = $re3->fetch();
            ?>
            <div class="row request border-bottom-1 text-center align-items-center">
                <div class="col-3">From <?php echo $user["firstName"] . " " . $user["lastName"]; ?></div>
                <div class="col-3">Date requested : <?php echo $request["dateRequest"]; ?></div>
                <div class="col-3">Type of Request : <?php echo $request["typeRequest"]; ?></div>
                <div class="col-3">
                    <div class="row h-100">
                        <div class="col-12 col-lg-6 my-3 d-flex justify-content-center align-items-center h-lg-100">
                            <form action="appRequest.php" method="post">
                                <input type="hidden" name="idUser" value="<?php echo $request["idUser"]; ?>">
                                <input type="submit" value="Approve" class="btn btn-outline-success">
                            </form>
                        </div>
                        <div class="col-12 col-lg-6 my-3 d-flex justify-content-center align-items-center h-lg-100">
                            <form action="decRequest.php" method="post">
                                <input type="hidden" name="idUser" value="<?php echo $request["idUser"]; ?>">
                                <input type="submit" value="Decline" class="btn btn-outline-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <?php
        }
    ?>





<?php
        if($_SESSION["typeUser"] == "author"){
    ?>
    <div class="container">
        <div class="reqHeader d-flex justify-content-between align-items-center p-4 rounded-4 shadow">
            <h2>Your books</h2>
            <div class="d-flex">
                <form class="mx-1 mx-md-3" action="addBook.php" method="post">
                    <input type="submit" value="Add book" class="btn ahaBtn">
                </form>
                <input type="button" class="btn ahaBtn mx-1 mx-md-3" id="toggleBtn" value="Show book">
            </div>
        </div>
        <div class="requests shadow-lg" id="toggleTarget">
            <?php
                $re2 = $connexion->prepare("SELECT * FROM ahabook WHERE idauthor=?");
                $re2->execute([$_SESSION["idAuthor"]]);
                if($re2->rowCount() == 0){
                ?>
                <h2 class="text-center py-5">There's no books...</h2>
                <?php
                }
                while($book = $re2->fetch()){
            ?>
            <div class="row request border-bottom-1 text-center align-items-center">
                <div class="col-3 p-5"><img src="<?php echo $book["bookPicture"]; ?>" alt="" class="img-fluid rounded-4"></div>
                <div class="col-6"><a class="" href="bookPage.php?idBook=<?php echo $book["idBook"]; ?>"><?php echo $book["titreBook"]; ?></a></div>
                <div class="col-3">
                    <div class="row h-100">
                        <div class="col-12 col-lg-6 my-3 d-flex justify-content-center align-items-center h-lg-100">
                            <form action="editBook.php" method="post">
                                <input type="hidden" name="idBook" value="<?php echo $book["idBook"]; ?>">
                                <input type="submit" value="Modify" class="btn btn-outline-success">
                            </form>
                        </div>
                        <div class="col-12 col-lg-6 my-3 d-flex justify-content-center align-items-center h-lg-100">
                            <form action="deleteBook.php" method="post">
                                <input type="hidden" name="idBook" value="<?php echo $book["idBook"]; ?>">
                                <input type="submit" value="Remove" class="btn btn-outline-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <?php
        }
    ?>




    <div class="bg-dark p-5 text-center" style="color: #EA9571; margin-top: 120px;">
        &copy; AHAbooks - DEV104
    </div>


    <script>
        const myButton = document.querySelector("#toggleBtn");
        const requests = document.querySelector("#toggleTarget");
        requests.style.display = "none";

        myButton.addEventListener("click", () => {

            if(requests.style.display == "none"){
                requests.style.display = "block";
                myButton.value = "Hide <?php echo isset($_SESSION["idAuthor"])?"book":"requests"; ?>";
            }
            else{
                requests.style.display = "none";
                myButton.value = "Show <?php echo isset($_SESSION["idAuthor"])?"book":"requests"; ?>";
            }
        })
    </script>










</body>
</html>

