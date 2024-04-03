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
    <link rel="stylesheet" href="request.css">
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



    <div class="container" style="z-index: 100; margin-top: 100px;">
        <div class="row p-4 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 shadow-lg p-4 rounded-4">
                <h1 class="text-center pt-3">Request</h1>
                <form action="addRequestAction.php" method="post" class="py-2">
                    <div class="form-group my-3">
                        <label for="" class="from-label ps-2 mb-3" style="z-index: 1;">Type of request</label>
                        <select name="typeRequest" id="" class="form-control" style="height: 60px;">
                            <option value="admin">Admin</option>
                            <option value="author">Author</option>
                        </select>
                    </div>
                    <div class="form-group mt-4 text-center">
                        <input type="submit" value="Submit Request" class="ahaBtn rounded-pill">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="bg-dark p-5 text-center" style="color: #EA9571; margin-top: 120px;">
        &copy; AHAbooks - DEV104
    </div>



</body>
</html>