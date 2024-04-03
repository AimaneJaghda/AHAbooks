<?php
    session_start();
    if(!isset($_SESSION["idUser"])){
        header("Location: login.php");
    }


    $idUser = $_SESSION["idUser"];
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
    <link rel="stylesheet" href="cart.css">
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
        $re1 = $connexion->prepare("SELECT * FROM ahacart INNER JOIN ahabook ON ahacart.idBook = ahabook.idBook where idUser=?");
        $re1->execute([$idUser]);
    ?>


    <h1>Your cart</h1>
    <div class="container-fluid tableContainer my-5">
        <table class="table">
            <tr align="center" valign="middle">
                <th></th>
                <th>Name of the book</th>
                <th>Author</th>
                <th>Date added</th>
                <th>Price</th>
                <th></th>
            </tr>
            <tbody>
                <?php
                    while($book = $re1->fetch()){
                        $re2 = $connexion->prepare("SELECT lastName, firstName FROM ahaauthor WHERE idAuthor=?");
                        $re2->execute([$book["idAuthor"]]);
                        $author = $re2->fetch();
                ?>
                <tr align="center" valign="middle">
                    <td style="width: 13%;" class="p-3"><img src="<?php echo $book["bookPicture"]; ?>" alt="" class="img-fluid rounded-3"></td>
                    <td><a href="bookPage.php?idBook=<?php echo $book["idBook"]; ?>"><?php echo $book["titreBook"]; ?></a></td>
                    <td><?php echo $author["firstName"] . " " . $author["lastName"] ?></td>
                    <td><?php echo $book["purchaseDate"]; ?></td>
                    <td>$<?php echo $book["price"]; ?></td>
                    <td> <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Remove from cart
                        </button>

                        <!-- Modal -->
                        <div class="modal removeModal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="m-0">Remove "<?php echo $book["titreBook"]; ?>"</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to remove "<?php echo $book["titreBook"]; ?>" from your cart?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No</button>
                                <form action="removeFromCart.php" method="post">
                                    <input type="hidden" name="idBook" value="<?php echo $book["idBook"]; ?>">
                                    <input type="submit" value="Yes" class="deleteBtn btn">
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
            if(isset($_GET["msgSuccess"])){
        ?>
        <div class="msg alert alert-success shadow-lg">
            The book was successfully removed
        </div>
        <?php
            }
        ?>
    </div>




    <div class="bg-dark p-5 text-center" style="color: #EA9571; margin-top: 170px;">
        &copy; AHAbooks - DEV104
    </div>



</body>
</html>