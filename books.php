<?php
    session_start(); // Start the session

    if(!isset($_SESSION["idUser"])){
        header("Location: login.php");
    }
    elseif(!isset($_GET["category"])){
        header("Location: homePage.php");
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
    <link rel="stylesheet" href="newReleases.css">
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
        $re1 = $connexion->prepare("SELECT * FROM ahabook INNER JOIN ahaauthor ON ahabook.idauthor = ahaauthor.idauthor WHERE categoryBook LIKE ? ORDER BY RAND() LIMIT 18");
        $re1->execute(["%" . $_GET["category"] . "%"]);
    ?>


    <div class="container-fluid my-5 px-4">
        <h1><?php echo $_GET["category"] ?> Books</h1>
        
        <div class="row py-4">
            <?php
                while($book = $re1->fetch()){
                
                $bookTitle = $book["titreBook"];
                $shownTitle = $bookTitle;
                if(strlen($shownTitle) > 17){
                    $shownTitle = substr($bookTitle, 0, 17) . "...";
                }

                $pDate = explode("-", $book["publicationDate"]);
                $year = $pDate[0];
                $month = $pDate[1];
                $day = $pDate[2];

                switch($month){
                    case 1 : $month = "January"; break;
                    case 2 : $month = "February"; break;
                    case 3 : $month = "March"; break;
                    case 4 : $month = "April"; break;
                    case 5 : $month = "May"; break;
                    case 6 : $month = "June"; break;
                    case 7 : $month = "July"; break;
                    case 8 : $month = "August"; break;
                    case 9 : $month = "September"; break;
                    case 10 : $month = "October"; break;
                    case 11 : $month = "November"; break;
                    case 12 : $month = "December"; break;
                }
                            
            ?>
            <div class="col-12 col-md-6 col-lg-4 px-4 pb-5" style="align-self: stretch;">
                <a href="bookPage.php?idBook=<?php echo $book["idBook"]; ?>" title="Read <?php echo $bookTitle;  ?>">
                    <div class="row bookContainer h-100">
                        <div class="col-4 py-2 imgContainer h-100 d-flex" style="align-self: stretch; align-items: center;">
                            <img class="img-fluid" src="<?php echo $book["bookPicture"]; ?>" alt="">
                        </div>
                        <div class="col-8 py-2">
                            <h5 class="my-2" title="<?php echo $bookTitle; ?>"><?php echo $shownTitle; ?></h5>
                            <div class="my-1 text-muted"><?php echo $book["categoryBook"]; ?></div>
                            <div class="my-1 text-muted">By <?php echo str_replace("-", " ", $book["firstName"] . " " . $book["lastName"]); ?></div>
                            <div class="my-1 text-muted">First Published <?php echo $month . " " . $day . ", " . $year; ?></div>
                            <h5 class="text-danger mt-3">$<?php echo $book["price"]; ?></h5>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                }
            ?>
        </div>
    </div>


    <div class="bg-dark p-5 text-center" style="color: #EA9571; margin-top: 120px;">
        &copy; AHAbooks - DEV104
    </div>



</body>
</html>