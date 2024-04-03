<?php
    session_start();
    if(!isset($_SESSION["idUser"])){
        header("Location: login.php");
    }

    require("cnx.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="header.css">  
    <title>Ajouter Livre</title>
    <style>
        body{
            margin: 0;
            padding-top: 106px;
        }
        .mar-0{
            margin: 0;
        }
        #submitBtn{
            color: #EA9571;
            border: 2px solid #EA9571;
            transition: all 200ms linear;
        }
        #submitBtn:hover{
            color: white;
            background-color: #EA9571;
            outline-offset: 10px;
            box-shadow: 0 1rem 3rem #ea9571ee !important;
        }
        .dateInp{
            width: 33%;
        }
        .signup{
            background-color: #fefefe;
            box-sizing: border-box;
            padding: 12px 30px;
            width: 40%;
            min-width: 450px;
            margin: auto;
            margin-top: 70px;
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
    
    <div class="signup rounded-3 shadow-lg py-4 mb-5">
        <form action="addBookAction.php" method="post" enctype="multipart/form-data">
            <div class="form-group my-2">
                <label for="" class="form-label">Titre de Livre</label>
                <input type="text" name="titreBook" id="" class="form-control">
                <?php
                
                if(isset($_GET['msgtitre'])){
                ?>
                <div class="errorMsg">
                    <?php echo $_GET['msgtitre'] ?>
                </div>
                <?php } ?>
            </div>
            <div class="d-flex">
                <div class="form-group w-50 pe-3">
                    <label for="" class="form-label">Prix</label>
                    <input type="text" name="prixBook" id="" class="form-control">
                    <?php
                
                    if(isset($_GET['msgprix'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET['msgprix'] ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="form-group w-50">
                    <label for="" class="form-label">Numbre des pages</label>
                    <input type="text" name="NpageBook" id="" class="form-control">
                    <?php
                
                    if(isset($_GET['msgNpage'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET['msgNpage'] ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group my-2">
                <label for="" class="form-label">Editeur de Livre</label>
                <input type="text" name="editorBook" id="" class="form-control">
                <?php
                
                if(isset($_GET['msgeditor'])){
                ?>
                <div class="errorMsg">
                    <?php echo $_GET['msgeditor'] ?>
                </div>
                <?php } ?>
            </div>
            <div class="d-flex">
                <div class="form-group w-100 pe-3">
                    <label for="" class="form-label">ISBN</label>
                    <input type="text" name="isbnBook" id="" class="form-control">
                    <?php
                
                    if(isset($_GET['msgisbn'])){
                    ?>
                    <div class="errorMsg">
                        <?php echo $_GET['msgisbn'] ?>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
            <div class="form-group my-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <input type="checkbox" name="category[]" value="Fiction" id="" class="form-check-input">
                        <span>Fiction</span>
                    </div>
                    <div>
                        <input type="checkbox" name="category[]" value="Fantasy" id="" class="form-check-input">
                        <span>Fantasy</span>
                    </div>
                    <div>
                        <input type="checkbox" name="category[]" value="Mystery" id="" class="form-check-input">
                        <span>Mystery</span>
                    </div>
                    <div>
                        <input type="checkbox" name="category[]" value="Romance" id="" class="form-check-input">
                        <span>Romance</span>
                    </div>
                    <div>
                        <input type="checkbox" name="category[]" value="History" id="" class="form-check-input">
                        <span>History</span>
                    </div>
                </div>
                <?php
                
                if(isset($_GET['msgcategorie'])){
                ?>
                <div class="errorMsg mt-2">
                    <?php echo $_GET['msgcategorie'] ?>
                </div>
                <?php } ?>
            </div>
            <div class="form-group my-2">
                <label class="form-label" for="langue">Langue de Livre</label>
                <select class="form-control" name="langue" id="langue">
                    <option value="" selected>Langue de Livre</option>
                    <option value="Français">Français</option>
                    <option value="Arabic">Arabic</option>
                    <option value="English">English</option>
                    <option value="Espagnole">Espagnole</option>
                </select>
                <?php
                
                if(isset($_GET['msglangue'])){
                ?>
                <div class="errorMsg">
                    <?php echo $_GET['msglangue'] ?>
                </div>
                <?php } ?>
            </div>
            <div class="form-group my-2">
                <label for="" class="form-label">Photo</label>
                <input type="file" name="photoBook" id="photo" class="form-control" required>
            </div>
            <div class="form-group my-2">
                <label for="description" class="form-label">Description</label>
                <textarea name="descriptionBook" id="" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group mt-4 text-center">
                <input type="submit" value="Add book" name="ajouter" class="form-control btn btn-outline-warning my-1" id="submitBtn">
            </div>
        </form>
    </div>



    <div class="bg-dark p-5 text-center" style="color: #EA9571; margin-top: 120px;">
        &copy; AHAbooks - DEV104
    </div>



    <script>
        history.pushState(null, null, "addBook.php");
    </script>
</body>
</html>