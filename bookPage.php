<?php
    require("cnx.php");
    $re1 = $connexion->prepare("SELECT * FROM ahabook INNER JOIN ahaauthor ON ahabook.idauthor = ahaauthor.idauthor WHERE idBook = ?");
    $re1->execute([$_GET["idBook"]]);
    echo $re1->rowCount();
    session_start();
    if(!isset($_SESSION["idUser"])){
        header("Location: login.php");
    }
    elseif(!isset($_GET["idBook"])){
        header("Location: homePage.php");
    }
    elseif($re1->rowCount() == 0){
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
    <link rel="stylesheet" href="bookPage.css">
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
        
        $book = $re1->fetch();
        $author = $book["idAuthor"];
        $categories = explode(" ", trim($book["categoryBook"]));
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



    <!-- the book -->
    <div class="container my-5 px-4">
        <div class="row bookContainer shadow-lg">
            <div class="col-12 col-lg-4 imgContainer d-flex justify-content-center align-items-start">
                <img class="img-fluid" src="<?php echo $book["bookPicture"]; ?>" alt="">
            </div>
            <div class="col-12 col-lg-8 informationConatiner">
                <h1 class="" style="margin-bottom: 45px;"><?php echo $book["titreBook"]; ?></h1>
                <div class="my-3">
                    <?php
                        foreach($categories as $category){
                    ?>
                    <a href="books.php?category=<?php echo $category ?>" class="categoryBook rounded-pill me-2 shadow"><?php echo $category; ?></a>
                    <?php
                        }
                    ?>
                </div>
                <div class="may-5 mb-3">
                    <h3>Author</h3>
                    <p><?php echo $book["firstName"] . " " . $book["lastName"] ?></p>
                </div>
                <div class="mb-3">
                    <h3 class="">Description</h3>
                    <p class=""><?php echo $book["bookDescription"]; ?></p>
                </div>
                <div class="my-3">
                    <h3>Date Published</h3>
                    <p>Firstly Published <?php echo $month . " " . $day . ", " . $year; ?></p>
                </div>
                <div class="my-3">
                    <h3>Editor</h3>
                    <p><?php echo $book["editorBook"]; ?></p>
                </div>
                <div class="my-3">
                    <h3>ISBN</h3>
                    <p><?php echo $book["ISBN"]; ?></p>
                </div>
                <div class="my-3">
                    <h3>Language</h3>
                    <p><?php echo $book["langueBook"]; ?></p>
                </div>
                <div class="my">
                    number of pages : <?php echo $book["numberPages"] ?>
                </div>
                <div class="my-4 d-flex justify-content-between align-items-center">
                    <div class="h3 text-danger">$<?php echo $book["price"]; ?></div>
                    <?php
                        if(isset($_SESSION["idAuthor"])){
                            if($_SESSION["idAuthor"] == $book["idAuthor"]){
                    ?>
                    <form action="editBook.php" method="post">
                        <input type="hidden" name="idBook" value="<?php echo $book["idBook"]; ?>">
                        <input type="submit" value="Modify" class="btn btn-outline-success shadow-lg">
                    </form>
                    <?php
                            }
                            else{
                    ?>
                    <form action="addToCart.php" method="post">
                        <input type="hidden" name="idBook" value="<?php echo $book["idBook"]; ?>">
                        <input  type="submit" name="subm" value="Add to cart" class="w-100 btn btn-success mt-4">
                    </form>
                    <?php
                            }
                        }
                        else{
                    ?>
                    <form action="addToCart.php" method="post">
                        <input type="hidden" name="idBook" value="<?php echo $book["idBook"]; ?>">
                        <input  type="submit" name="subm" value="Add to cart" class="w-100 btn btn-success mt-4">
                    </form>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
        if(isset($_GET["msgExist"])){
        ?>
        <div id="msg" class="msg alert alert-danger shadow-lg">
            <?php echo $_GET["msgExist"];  ?>
        </div>
        <?php
        }
    ?>
    <?php
        if(isset($_GET["msgSuccess"])){
    ?>
    <div id="msg" class="msg alert alert-success shadow-lg">
        "<?php echo $book["titreBook"] . '" ' . $_GET["msgSuccess"]; ?>
    </div>
    <?php
        }
    ?>
    

    <div class="bg-dark p-5 text-center" style="color: #EA9571; margin-top: 120px;">
        &copy; AHAbooks - DEV104
    </div>


</body>
</html>

