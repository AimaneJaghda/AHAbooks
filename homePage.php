<?php
 // Start the session
    session_start();
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
    <link rel="stylesheet" href="homePage.css">
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

    <!-- slideshow -->
    <div class="slideshow mb-5">
        <div class="overlay">
            <div class="title">
            <h1 class="text-white mb-3 display-1 text-shadow">AHAbooks</h1>
            <p class="text-white">Your companion to success</p>
            </div>
        </div>
        <!--image slider start-->
        <div class="slider">
            <div class="slides">
            <!--radio buttons start-->
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <!--radio buttons end-->
                <!--slide images start-->
                <div class="slide first">
                    <img src="Images/slideshow1.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="Images/slideshow2.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="Images/slideshow3.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="Images/slideshow4.jpg" alt="">
                </div>
                <!--slide images end-->
                <!--automatic navigation start-->
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
                <!--automatic navigation end-->
        </div>
        <!--manual navigation start-->
        <div class="navigation-manual">
            <label id="btn1" for="radio1" class="manual-btn"></label>
            <label id="btn2" for="radio2" class="manual-btn"></label>
            <label id="btn3" for="radio3" class="manual-btn"></label>
            <label id="btn4" for="radio4" class="manual-btn"></label>
        </div>
        <!--manual navigation end-->
        </div>
        <!--image slider end-->
    </div>

    <?php
        require("cnx.php");
        $categories = ["Fiction", "Fantasy", "Mystery", "Romance", "History"];
        $category = $categories[rand(0, 4)];
        $re1 = $connexion->prepare("SELECT * FROM ahabook INNER JOIN ahaauthor ON ahabook.idauthor = ahaauthor.idauthor WHERE categoryBook LIKE ? ORDER BY RAND() LIMIT 6");
        $re1->execute(["%" . $category . "%"]);
    ?>

    <!-- random category books -->
    <h2 class="ms-5" style="margin-top: 150px;"><?php echo $category . " Books" ?></h2>
    <div class="container-fluid px-4 mb-5">
        <div class="d-flex overflow-scroll snap-scroll py-4" style="flex-wrap: nowrap;">
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

    <!-- categories -->
    <div class="container-fluid px-5" style="margin-top: 150px;">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 py-2">
                <a href="books.php?category=Fantasy">
                    <h3 class="categoryBody categoryBody1 rounded-4">
                        <div class="typeCate">
                            <div>Fantasy</div>
                        </div>
                    </h3>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 py-2">
                <a href="books.php?category=History">
                    <h3 class="categoryBody categoryBody2 rounded-4">
                        <div class="typeCate">
                            <div>History</div>
                        </div>
                    </h3>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 py-2 d-block d-md-none d-lg-block">
                <a href="books.php?category=Fiction">
                    <h3 class="categoryBody categoryBody3 rounded-4">
                        <div class="typeCate">
                            <div>Fiction</div>
                        </div>
                    </h3>
                </a>
            </div>
        </div>
    </div>

    <!-- most recent -->
    <?php
        $re1 = $connexion->prepare("SELECT * FROM ahabook INNER JOIN ahaauthor ON ahabook.idauthor = ahaauthor.idauthor ORDER BY publicationDate DESC LIMIT 12");
        $re1->execute();
    ?>
    <h2 class="ms-5" style="margin-top: 50px;">Recent books</h2>
    <div class="container-fluid px-4">
        <div class="d-flex overflow-scroll snap-scroll py-4" style="flex-wrap: nowrap;">
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

    <!-- budget option -->
    <?php
        $re1 = $connexion->prepare("SELECT * FROM ahabook INNER JOIN ahaauthor ON ahabook.idauthor = ahaauthor.idauthor ORDER BY price ASC LIMIT 12");
        $re1->execute();
    ?>
    <h2 class="ms-5" style="margin-top: 40px;">Budget options</h2>
    <div class="container-fluid px-4 mb-5">
        <div class="d-flex overflow-scroll snap-scroll py-4" style="flex-wrap: nowrap;">
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


    <!-- random category books -->
    <?php
        do{
            $category2 = $categories[rand(0, 4)];
        }
        while($category == $category2);
        $re1 = $connexion->prepare("SELECT * FROM ahabook INNER JOIN ahaauthor ON ahabook.idauthor = ahaauthor.idauthor WHERE categoryBook LIKE ? ORDER BY RAND() LIMIT 6");
        $re1->execute(["%" . $category2 . "%"]);
    ?>

    <h2 class="ms-5" style="margin-top: 40px;"><?php echo $category2 . " Books" ?></h2>
    <div class="container-fluid px-4 mb-5">
        <div class="d-flex overflow-scroll snap-scroll py-4" style="flex-wrap: nowrap;">
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



    <!-- random books -->
    <?php
        $re1 = $connexion->prepare("SELECT * FROM ahabook INNER JOIN ahaauthor ON ahabook.idauthor = ahaauthor.idauthor ORDER BY RAND() LIMIT 12");
        $re1->execute();
    ?>

    <h2 class="ms-5" style="margin-top: 40px;">Spin the wheel</h2>
    <div class="container-fluid px-4 mb-5">
        <div class="row overflow-scroll snap-scroll py-4" style="flex-wrap: nowrap;">
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

    
    




    <div class="bg-dark p-5 text- text-center" style="color: #EA9571;">
        &copy; AHAbooks - DEV104
    </div>

    <script>
        var btn1 = document.getElementById("btn1");
        var btn2 = document.getElementById("btn2");
        var btn3 = document.getElementById("btn3");
        var btn4 = document.getElementById("btn4");
        btn1.style.backgroundColor = "#f0f0f0";
        btn1.onclick = function(){
            btn1.style.backgroundColor = "#f0f0f0";
            btn2.style.backgroundColor = "#f0f0f000";
            btn3.style.backgroundColor = "#f0f0f000";
            btn4.style.backgroundColor = "#f0f0f000";
        }
        btn2.onclick = function(){
            btn1.style.backgroundColor = "#f0f0f000";
            btn2.style.backgroundColor = "#f0f0f0";
            btn3.style.backgroundColor = "#f0f0f000";
            btn4.style.backgroundColor = "#f0f0f000";
        }
        btn3.onclick = function(){
            btn1.style.backgroundColor = "#f0f0f000";
            btn2.style.backgroundColor = "#f0f0f000";
            btn3.style.backgroundColor = "#f0f0f0";
            btn4.style.backgroundColor = "#f0f0f000";
        }
        btn4.onclick = function(){
            btn1.style.backgroundColor = "#f0f0f000";
            btn2.style.backgroundColor = "#f0f0f000";
            btn3.style.backgroundColor = "#f0f0f000";
            btn4.style.backgroundColor = "#f0f0f0";
        }
    </script>
</body>
</html>
