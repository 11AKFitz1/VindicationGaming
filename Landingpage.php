<?php
include('database.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Landingpage.php']))
    {
        func2();
    }

function func2(){
    $user = $_SESSION['userUid'];
    $sql = "DELETE FROM users WHERE uidUsers=?;";  
    $stmt = mysqli_stmt_init($conn);
    
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        header('Location: Landingpage.php');
}
    ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>WebTech Store</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    #bgimg {
        background-image: url(Images/lpbg.png);
    }
    </style>    
</head>
<body>
    <!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><h3>Company Name</h3></a>
        <div class="collapse navbar-collapse flex-md-column">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><h4>Catalog</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><h4>My Account</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter"><h4 class="text-info">Log In</h4></a>
            </li>
            </ul>
        </div>
    </nav>-->
    <?php
    include 'Navbar.php';

    ?>
    <div class="cotainer-fluid">
        <div id="bgimg">
        <br>
        <br>
        <div class="row text-center">
            <div class="col-md-12">
                <h1 class="display-3 text-info">Get the software you need</h1>
                <h4 class="text-secondary">A catalog full of software. The WebTech store has everything you need, just a few clicks away</h4>
            </div>
        </div>
        <br>
        <div class="row h-50 justify-content-center align-items-center">
            <form action="signup.php" method="post">
                <h1 class="display-5 text-info" align="Center">Create an account today!</h1>
                <br>
                <div class="form-group">
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'emptyfields') {
                            echo "<p class='text-secondary'>Fill in all fields</p>";
                        } elseif ($_GET['error'] == 'invalidmailuid') {
                            echo "<p class='text-secondary'>Invalid username and e-mail</p>";
                        } elseif ($_GET['error'] == 'invalidmail') {
                            echo "<p class='text-secondary'>Invalid mail</p>";
                        } elseif ($_GET['error'] == 'invaliduid') {
                            echo "<p class='text-secondary'>Invalid username</p>";
                        } elseif ($_GET['error'] == 'passwordcheck') {
                            echo "<p class='text-secondary'>Your passwords do not match</p>";
                        } else if ($_GET['error'] == 'usertaken') {
                            echo "<p class='text-secondary'>Username is already taken!</p>";
                        } 
                        else if($_GET['signup'] == 'success') {
                            echo "<p class='text-secondary'>Signup success!</p>";
                        } 
                    }else {
                            echo "<p class='text-secondary'></p>";
                        }
                    ?>
                </div>
                <div class="form-group">
                     <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Enter Username" name="uid">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control"  placeholder="Enter Email" name="mail">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control" placeholder="Enter Password" name="pwd">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="pwd-repeat">
                        </div>
                    </div>
                </div>
                <div align="Center">
                    <button type="submit" name="signup-submit" class="btn btn-info" value="signup-submit">
                        <h4>Signup</h4>
                    </button>
                </div>
            </form>
        </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4" align="Center">
                <h1 class="display-3 text-primary">1</h1>
                <h2>Create an Account</h2>
                <h5>Register an account above to join the hundreds of other people <br>using this service to buy the software they need.</h5>
            </div>
            <div class="col-md-4" align="Center">
                <h1 class="display-3 text-primary">2</h1>
                <h2>Browse the Catalog</h2>
                <h5>Browse the catalog to find the software that you need.Then add<br> it to your cart and continue your search or head to checkout.</h5>
            </div>
            <div class="col-md-4" align="Center">
                <h1 class="display-3 text-primary">3</h1>
                <h2>Checkout</h2>
                <h5>After finding your desired software, go to your cart to checkout. After <br>checking out use the given download link to download the software.</h5>
            </div>
        </div>
        <!--Popup log in Old-
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Log in</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" name="login">
                            <div class="form-group row"><input type="Username" name="luname" class="form-control" placeholder="Enter Username"></div>
                            <div class="form-group row"><input type="Password" name="lpwrd" class="form-control" placeholder="Enter Password"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>-->

    </div>
    <?php
    include 'Footer.php';
    ?>
</body>
 <!--Scripts needed for bootstrap-
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
-->
</html>