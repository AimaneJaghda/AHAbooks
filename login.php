<?php
    session_start();
    if(isset($_SESSION["idUser"])){
        header("Location: homePage.php");
    }
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
    <style>
        body{
            margin: 0;
            padding-top: 106px;
        }
        .mar-0{
            margin: 0;
        }
        .blackColor{
            color: #0f0f0f;
        }
        .login{
            background-color: #fefefe;
            box-sizing: border-box;
            padding: 12px 30px;
            width: 500px;
            margin: auto;
            border: 3px solid #f1f1f1;
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
        }
        .submitBtn:active{
            background-color: #aA6541;
            border: 2px solid #aA6541;
        }
        .inscrire{
            background-color: #fefefe;
            color: #5f5fe4;
            border: 0px;
            text-decoration: underline;
            transition: all 300ms ease-in-out;
        }
        .inscrire:hover{
            color: #8f8f8f;
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
            display: none;
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
<body onload="switchInterface()">
    <input type="hidden" name="" id="switchInter" value="<?php if(isset($_GET["switchIn"])){echo $_GET["switchIn"];} ?>">
    <div class="container-fluid mar-0 position-fixed top-0 py-3 w-100 bg-light shadow-lg" style="z-index: 2;">
        <nav class="navbar navbar-expand-lg">
            <!-- Brand logo -->
            <div class="navbar-brand display-1 fs-1 ms-5 fw-semibold blackColor" style="color: #EA9571;">AHA<span class="display-6" style="color: #323031;">books</span>
            </div>
        </nav>
    </div>

    <div class="login rounded-3 shadow-lg py-4" id="loginP" style="z-index: 100; margin-top: 100px;">
        <form action="loginAction.php" method="post">
            <div class="form-floating my-3">
                <input type="email" name="AHAemail" id="floatingInput" class="form-control <?php if(isset($_GET["msgEmail"])){echo "errorInput";} ?>" value="<?php
                    if(isset($_SESSION["email"])){
                        echo $_SESSION["email"];
                        unset($_SESSION["email"]);
                        session_destroy();
                    }
                    ?>" placeholder="name@example.com">
                <label for="floatingInput bg-none" style="z-index: 1;">Email address</label>
                <?php
                    if(isset($_GET["msgEmail"])){
                        ?>
                <div class="errorMsg">
                    <?php echo $_GET["msgEmail"]; ?>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="form-floating my-3">
                <input type="password" name="AHApassword" id="floatingInput" class="form-control <?php if(isset($_GET["msgPassword"])){echo "errorInput";} ?>" placeholder="password123">
                <label for="floatingInput"">Password</label>
                <?php
                    if(isset($_GET["msgPassword"])){
                ?>
                <div class="errorMsg">
                    <?php echo $_GET["msgPassword"]; ?>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="form-group mt-4 text-center">
                <input type="submit" value="Log in" class="form-control w-100 my-1 submitBtn">
                <hr>
            </div>
        </form>
        <div class="text-center">
            <button class="inscrire" id="insc">Sign up</button>
        </div>
    </div>

    <div class="signup rounded-3 shadow-lg py-4 my-5" id="signupP">
        <form action="signupAction.php" method="post" enctype="multipart/form-data">
            <div class="d-flex">
                <div class="form-group w-50 pe-3">
                    <label for="" class="form-label">First name</label>
                    <input type="text" name="AHAfirstName" id="" class="form-control">
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
                    <input type="text" name="AHAlastName" id="" class="form-control">
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
                <input type="text" name="AHAemail" id="" class="form-control">
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
                <input type="password" name="AHApassword" id="" class="form-control">
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
                    <input type="text" name="AHAday" id="" class="form-control">
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
                    <input type="text" name="AHAmonth" id="" class="form-control">
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
                    <input type="text" name="AHAyear" id="" class="form-control">
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
                    <input type="text" name="AHAcity" id="" class="form-control">
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
                    <input type="text" name="AHAcountry" id="" class="form-control">
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
                <input type="file" name="photoProfil" id="photo" class="form-control" > <!-- -->
            </div>
            <div class="form-group mt-4 text-center">
                <input type="submit" value="Sign up" name="signup" class="form-control my-1 submitBtn">
                <hr>
            </div>
        </form>
        <div class="text-center">
            <button id="conn" class="inscrire">Log in</button>
        </div>
    </div>


    <script>
        document.getElementById("conn").onclick = function (){
            document.getElementById("signupP").style.display = "none";
            document.getElementById("loginP").style.display = "block";
            document.title = "Log in";
        }
        document.getElementById("insc").onclick = function (){
            document.getElementById("loginP").style.display = "none";
            document.getElementById("signupP").style.display = "block";
            document.title = "Sign up";
        }

        function switchInterface(){
            var sw = document.getElementById("switchInter");
            if(sw.value == "signUp"){
                document.getElementById("loginP").style.display = "none";
                document.getElementById("signupP").style.display = "block";
                document.title = "Sign up";
            }
        }
    </script>
</body>
</html>


<?php

?>