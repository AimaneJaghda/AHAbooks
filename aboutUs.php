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
    <link rel="stylesheet" href="aboutUs.css">
    <title>About Admins</title>
    <style>
        p{
            font-size: larger;
            font-weight: bolder;
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

    <div class="mt-5 aboutUs p-4 shadow-lg rounded-4 w-75 mx-auto">
        <h1 class="my-5 text-center display-1">About our library.</h1>
        <div>
            <p class="text-center">
                Welcome to our digital library. ! <br>
                We are delighted to present to you our online library, a space where you can access a vast collection of cultural and educational resources, wherever you are. <br>
                 Our digital library offers many advantages. You can explore thousands of e-books in various genres..<br>
                 We have designed our platform with advanced search functionality to help you quickly find the books you need. You can also become an author and publish your books.<br>
                Accessing our library is easy and convenient. You can use our platform on various devices such as computers, tablets, and smartphones. We are also proud to be an inclusive digital library.<br>
                Join us now and dive into a world of unlimited knowledge and discoveries. Sign up for free on our website and start your journey into the heart of the digital library.<br>
                Explore, learn, and be inspired by the wonders of our digital library. We look forward to accompanying you on your quest for knowledge!
            </p>
        </div>
    </div>



    <div class="container-fluid" style="margin-top: 170px;">
    <div class="display-1 text-center">Founders</div>
        <div class="row p-5 justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 my-4">
                <div class="founder shadow-lg rounded-4 overflow-hidden">
                    <div class="p-4 picturContainer">
                        <img src="users/ProfilePicture/abdel ghani.jpg" alt="" class="img-fluid rounded-circle">
                    </div>
                    <div class="informationC text-center my-5">
                        <div class="my-3">
                            <small>Name</small>
                            <p>ABDEL GHANI EL KAMRAOUI</p>
                        </div>
                        <div class="my-3">
                            <small>Date of birth</small>
                            <p>April 13, 2003</p>
                        </div>
                        <div class="my-3">
                            <small>Group</small>
                            <p>DEV 104</p>
                        </div>
                        <div class="my-3">
                            <small>Hobbies</small>
                            <p>Football - Sleeping<br>(and sometimes coding)</p>
                        </div>
                        <div class="my-3">
                            <small>Aspirations</small>
                            <p>To be a great developer</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 my-4">
                <div class="founder shadow-lg rounded-4 overflow-hidden">
                    <div class="p-4 picturContainer">
                        <img src="users/ProfilePicture/hicham.jpg" alt="" class="img-fluid rounded-circle">
                    </div>
                    <div class="informationC text-center my-5">
                        <div class="my-3">
                            <small>Name</small>
                            <p>HICHAM EL MATAZI</p>
                        </div>
                        <div class="my-3">
                            <small>Date of birth</small>
                            <p>October 23, 2002</p>
                        </div>
                        <div class="my-3">
                            <small>Group</small>
                            <p>DEV 104</p>
                        </div>
                        <div class="my-3">
                            <small>Hobbies</small>
                            <p>Swimming - Football</p>
                        </div>
                        <div class="my-3">
                            <small>Aspirations</small>
                            <p>To be happy</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 my-4">
                <div class="founder shadow-lg rounded-4 overflow-hidden">
                    <div class="p-4 picturContainer">
                        <img src="users/ProfilePicture/image7.jpg" alt="" class="img-fluid rounded-circle">
                    </div>
                    <div class="informationC text-center my-5">
                        <div class="my-3">
                            <small>Name</small>
                            <p>AIMANE JAGHDA</p>
                        </div>
                        <div class="my-3">
                            <small>Date of birth</small>
                            <p>October 22, 2003</p>
                        </div>
                        <div class="my-3">
                            <small>Group</small>
                            <p>DEV 104</p>
                        </div>
                        <div class="my-3">
                            <small>Hobbies</small>
                            <p>Gaming - Football - Sleeping<br>(and sometimes coding)</p>
                        </div>
                        <div class="my-3">
                            <small>Aspirations</small>
                            <p>Sleep more</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-dark p-5 text-center" style="color: #EA9571; margin-top: 120px;">
        &copy; AHAbooks - DEV104
    </div>

</body>
</html>