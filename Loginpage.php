<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>WebTech Login</title>

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
        <div class="row h-50 justify-content-center align-items-center">
            <form method="post" name="login" action="login.php">
                <h1 class="display-4 text-info" align="Center">Log in</h1>
                <br>
                <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'emptyfields') {
                            echo "<p class='text-secondary'>Fill in all fields</p>";
                        } elseif ($_GET['error'] == 'wrongpwd') {
                            echo "<p class='text-secondary'>Invalid Password</p>";
                        } elseif ($_GET['error'] == 'nouser') {
                            echo "<p class='text-secondary'>Invalid User</p>";
                        }  else if($_GET['login'] == 'success') {
                            echo "<p class='text-secondary'>Signup success!</p>";
                        } 
                    }else {
                            echo "<p class='text-secondary'></p>";
                        }
                    ?>
                    <br>
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control"  placeholder="Enter Username or Email" name="mailuid">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control" placeholder="Enter Password" name="pwd">
                        </div>
                    </div>
                </div>
                <div align="Center">
                    <button type="submit" class="btn btn-info" name="login-submit">
                        <h4>Log in</h4>
                    </button>
                </div>
            </form>
        </div>
        </div>
    <?php
    include 'Footer.php';
    ?>
</body>
 <!--Scripts needed for bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</html>